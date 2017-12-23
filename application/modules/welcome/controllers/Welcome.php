<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller
{
	public function index()
	{
        $this->template->append_js('webpack::backend.js', true, 'global');
        $this->template->append_css('webpack::backend.css', true, 'global');
	    $this->template->title('Welcome to CodeIgniter');
	    $this->template->build('welcome/welcome_message');
	}
}
