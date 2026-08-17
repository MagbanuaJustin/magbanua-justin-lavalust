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

        if (!isset($_SESSION['student_access'])) {
            $_SESSION['student_access'] = true;
        }

        if (!empty($_SESSION['student_access']) && $_SESSION['student_access'] === true) {
            // Access granted -> continue to the controller method
            return $next();
        }

        // Access denied -> redirect back to the student home page
        redirect('student');
    }
}