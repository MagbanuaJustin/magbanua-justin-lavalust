<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentMiddleware
{
    /**
     * Protects the student profile route.
     * Access is granted if the 'student_access' session flag is true.
     */
    public function handle($next)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!empty($_SESSION['student_access']) && $_SESSION['student_access'] === true) {
            // Access granted -> continue to the controller method
            return $next();
        }

        // Access denied -> show 404
        http_response_code(404);

        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>404 - Page Not Found</title>
            <style>
                * {
                    box-sizing: border-box;
                    margin: 0;
                    padding: 0;
                }

                body {
                    min-height: 100vh;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    background: #0a0a0b;
                    color: #f4f4f5;
                    font-family: Arial, sans-serif;
                    text-align: center;
                    padding: 20px;
                }

                .error-container {
                    max-width: 600px;
                }

                .error-code {
                    font-size: 7rem;
                    font-weight: 800;
                    color: #dd4814;
                    line-height: 1;
                    margin-bottom: 20px;
                    text-shadow: 0 0 30px rgba(221, 72, 20, 0.35);
                }

                h1 {
                    font-size: 2rem;
                    margin-bottom: 15px;
                }

                p {
                    color: #71717a;
                    line-height: 1.6;
                    margin-bottom: 30px;
                }

                a {
                    display: inline-block;
                    padding: 12px 22px;
                    background: #dd4814;
                    color: white;
                    text-decoration: none;
                    border-radius: 8px;
                    transition: 0.2s;
                }

                a:hover {
                    background: #b83a10;
                    box-shadow: 0 0 25px rgba(221, 72, 20, 0.3);
                }
            </style>
        </head>
        <body>

            <div class="error-container">
                <div class="error-code">404</div>

                <h1>Page Not Found</h1>

                <p>
                    The page you are looking for does not exist or you do not
                    have permission to access it directly.
                </p>

                <a href="/index.php/student">Go to Student Page</a>
            </div>

        </body>
        </html>';

        exit;
    }
}