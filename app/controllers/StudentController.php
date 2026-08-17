<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller {
	public function index() {
		$this->call->view('StudentPage');
	}
    public function profile(){
        $student = [
            'student_id' => 'MCC2023-01376',
            'name' => 'Magbanua Justin James E.',
            'course' => 'Bachelor of Science in Information Technology',
            'year' => '3rd Year',
            'section' => '3-F5',
            'email' => 'eborajustin25@gmail.com'
        ];
        $this->call->view('StudentProfile', $student);
    }
}