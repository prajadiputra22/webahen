<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Session\TokenMismatchException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $e
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $e)
    {
        // Jika mode debug dimatikan maka akan menampilkan halaman error custom
        if (config('app.debug') === false) {
            // Handle 404 Not Found errors
            if ($e instanceof NotFoundHttpException) {
                return response()->view('errors.404', [
                    'title' => '404 Not Found',
                    'message' => 'Sorry, Page Not Found',
                    'description' => 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.'
                ], 404);
            }

            // Handle model not found (also 404)
            if ($e instanceof ModelNotFoundException) {
                return response()->view('errors.404', [
                    'title' => '404 Not Found',
                    'message' => 'Resource Not Found',
                    'description' => 'The requested resource could not be found on this server.'
                ], 404);
            }

            // Handle authentication exception (401/403)
            if ($e instanceof AuthenticationException) {
                return response()->view('errors.401', [
                    'title' => '401 Unauthorized',
                    'message' => 'Unauthorized Access',
                    'description' => 'You need to be authenticated to access this resource.'
                ], 401);
            }

            // Handle CSRF token mismatch (419)
            if ($e instanceof TokenMismatchException) {
                return response()->view('errors.419', [
                    'title' => '419 Page Expired',
                    'message' => 'Page Expired',
                    'description' => 'Your session has expired. Please refresh and try again.'
                ], 419);
            }

            // Handle HTTP exceptions with custom status codes
            if ($e instanceof HttpException) {
                $statusCode = $e->getStatusCode();
                
                // Check if we have a specific view for this status code
                if (view()->exists("errors.{$statusCode}")) {
                    return response()->view("errors.{$statusCode}", [
                        'title' => $statusCode . ' Error',
                        'message' => $this->getErrorMessage($statusCode),
                        'description' => $this->getErrorDescription($statusCode)
                    ], $statusCode);
                }
                
                // If the status code is 500 or higher, show the 500 error page
                if ($statusCode >= 500) {
                    return response()->view('errors.500', [
                        'title' => '500 Server Error',
                        'message' => 'Server Error',
                        'description' => 'Sorry, something went wrong on our servers.'
                    ], $statusCode);
                }
                
                // For other HTTP exceptions
                return response()->view('errors.default', [
                    'title' => $statusCode . ' Error',
                    'message' => $this->getErrorMessage($statusCode),
                    'description' => $this->getErrorDescription($statusCode)
                ], $statusCode);
            }

            // For all other exceptions, show a generic 500 error
            return response()->view('errors.500', [
                'title' => '500 Server Error',
                'message' => 'Server Error',
                'description' => 'Sorry, something went wrong on our servers.'
            ], 500);
        }

        return parent::render($request, $e);
    }

    /**
     * Get error message based on status code
     */
    protected function getErrorMessage($statusCode)
    {
        $messages = [
            400 => 'Bad Request',
            401 => 'Unauthorized',
            403 => 'Forbidden Access',
            404 => 'Page Not Found',
            405 => 'Method Not Allowed',
            408 => 'Request Timeout',
            419 => 'Page Expired',
            429 => 'Too Many Requests',
            500 => 'Server Error',
            503 => 'Service Unavailable',
        ];

        return $messages[$statusCode] ?? 'Error ' . $statusCode;
    }

    /**
     * Get error description based on status code
     */
    protected function getErrorDescription($statusCode)
    {
        $descriptions = [
            400 => 'The server could not understand the request due to invalid syntax.',
            401 => 'You need to be authenticated to access this resource.',
            403 => 'You do not have permission to access this resource.',
            404 => 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.',
            405 => 'The method specified in the request is not allowed for the resource.',
            408 => 'The server timed out waiting for the request.',
            419 => 'Your session has expired. Please refresh and try again.',
            429 => 'You have sent too many requests in a given amount of time.',
            500 => 'Something went wrong on our servers. We are working to fix the issue.',
            503 => 'The service is temporarily unavailable due to maintenance or capacity issues.',
        ];

        return $descriptions[$statusCode] ?? 'An error occurred with status code ' . $statusCode;
    }
}