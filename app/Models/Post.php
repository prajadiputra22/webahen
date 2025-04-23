<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Post extends Model {
    protected $table = 'posts';
    protected $fillable = ['tittle', 'author', 'image', 'slug', 'body'];
    
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('tittle', 'like', '%' . $search . '%')
                         ->orWhere('body', 'like', '%' . $search . '%');
        });
        
        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->where('category', $category);
        });
        
        $query->when($filters['author'] ?? false, function($query, $author) {
            return $query->where('author', $author);
        });
    }
}
