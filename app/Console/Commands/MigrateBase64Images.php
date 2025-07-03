<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MigrateBase64Images extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:migrate-base64';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate base64 encoded images to files for social media compatibility';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Starting migration of base64 images to files...');
        
        // Get all posts with base64 images
        $posts = Post::whereRaw("image LIKE 'data:image%'")->get();
        
        $bar = $this->output->createProgressBar(count($posts));
        $bar->start();
        
        $success = 0;
        $failed = 0;
        
        foreach ($posts as $post) {
            try {
                if (!$post->image || strpos($post->image, 'data:image') !== 0) {
                    $bar->advance();
                    continue;
                }
                
                // Extract image type and data
                $imageInfo = $this->parseBase64Image($post->image);
                if (!$imageInfo) {
                    $this->error("Invalid base64 image format for post {$post->id}");
                    $failed++;
                    $bar->advance();
                    continue;
                }
                
                // Generate a unique filename based on post title and ID
                $slug = Str::slug($post->tittle);
                $filename = "{$slug}-{$post->id}.{$imageInfo['extension']}";
                $directory = "posts/{$post->id}";
                $path = "{$directory}/{$filename}";
                
                // Create directory if it doesn't exist
                if (!Storage::disk('public')->exists($directory)) {
                    Storage::disk('public')->makeDirectory($directory);
                }
                
                // Save the image to storage
                Storage::disk('public')->put($path, base64_decode($imageInfo['data']));
                
                // Update the post with the new image URL
                $post->image = Storage::url($path);
                $post->save();
                
                $success++;
            } catch (\Exception $e) {
                $this->error("Error processing post {$post->id}: {$e->getMessage()}");
                $failed++;
            }
            
            $bar->advance();
        }
        
        $bar->finish();
        $this->newLine(2);
        
        $this->info("Migration complete: {$success} images migrated successfully, {$failed} failed.");
        
        return 0;
    }
    
    /**
     * Parse a base64 image string into its components.
     *
     * @param string $base64Image
     * @return array|null
     */
    protected function parseBase64Image($base64Image)
    {
        if (!$base64Image || strpos($base64Image, 'data:image/') !== 0) {
            return null;
        }
        
        // Split the string to extract the MIME type and data
        $parts = explode(';base64,', $base64Image, 2);
        if (count($parts) !== 2) {
            return null;
        }
        
        // Get the MIME type and extension
        $mimeType = str_replace('data:', '', $parts[0]);
        $extension = $this->getExtensionFromMimeType($mimeType);
        
        // Get the data
        $data = $parts[1];
        
        return [
            'mime_type' => $mimeType,
            'extension' => $extension,
            'data' => $data,
        ];
    }
    
    /**
     * Get file extension from MIME type.
     *
     * @param string $mimeType
     * @return string
     */
    protected function getExtensionFromMimeType($mimeType)
    {
        $mimeToExt = [
            'image/jpeg' => 'jpg',
            'image/jpg' => 'jpg',
            'image/png' => 'png',
            'image/gif' => 'gif',
            'image/svg+xml' => 'svg',
            'image/webp' => 'webp',
        ];
        
        return $mimeToExt[$mimeType] ?? 'jpg';
    }
}