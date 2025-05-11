<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Check if request is AJAX
        $isAjax = $request->ajax();
        
        // Validate form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'product' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try {
            // Send email - with log driver, this will be written to log files
            Mail::to('ahensugar75@gmail.com')->send(new ContactFormMail($validated));
            
            // Log a success message to make it easier to find in logs
            Log::info('Contact form submitted successfully', ['email' => $validated['email']]);
            
            // Return response based on request type
            if ($isAjax) {
                return response()->json([
                    'success' => true,
                    'message' => 'Thank you for your message. We will get back to you soon!'
                ]);
            } else {
                return redirect()->back()->with('success', 'Thank you for your message. We will get back to you soon!');
            }
        } catch (\Exception $e) {
            // Log the error with detailed information
            Log::error('Contact form email error: ' . $e->getMessage());
            Log::error('Error details: ' . $e->getTraceAsString());
            
            // Return response based on request type
            if ($isAjax) {
                return response()->json([
                    'success' => false,
                    'message' => 'There was a problem sending your message. Please try again later or contact us directly at ahensugar75@gmail.com',
                    'error' => $e->getMessage()
                ], 500);
            } else {
                return redirect()->back()->withInput()->withErrors(['email_error' => 'There was a problem sending your message. Please try again later or contact us directly at ahensugar75@gmail.com']);
            }
        }
    }
    
    // Test function to verify email configuration
    public function testEmail()
    {
        try {
            $data = [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'phone' => '123456789',
                'subject' => 'Test Email',
                'product' => 'Test Product',
                'message' => 'This is a test message to verify email configuration.',
            ];
            
            Mail::to('ahensugar75@gmail.com')->send(new ContactFormMail($data));
            
            return response()->json([
                'success' => true,
                'message' => 'Test email written to log file. Check storage/logs/laravel.log to view the email content.',
                'mail_driver' => config('mail.mailer')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send test email.',
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ], 500);
        }
    }
}
