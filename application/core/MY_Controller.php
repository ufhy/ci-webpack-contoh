<?php

require APPPATH."third_party/MX/Controller.php";

/**
 * Class MY_Controller
 *
 * @property CI_Loader $load
 * @property Template $template
 * @property Asset $asset
 * @property CI_Input $input
 * @property CI_Output $output
 */
class MY_Controller extends MX_Controller
{
    public $_themeName = 'backend';

    public function __construct()
    {
        parent::__construct();

        $this->load->config('application');
        $this->load->library('asset');
        $this->load->library('template');

        Asset::add_path('theme', array(
            'path' => 'themes/' . $this->_themeName . '/',
            'js_dir' => 'assets/js/',
            'css_dir' => 'assets/css/',
            'img_dir' => 'assets/img/'
        ));
        Asset::add_path('webpack', array(
            'path' => 'dist',
            'js_dir' => '/',
            'css_dir' => '/',
            'img_dir' => '/'
        ));
        Asset::set_path('webpack');

        $this->template->set_theme($this->_themeName);
        $this->template->set_layout('default');

        if (ENVIRONMENT === 'development') {
            !$this->input->is_ajax_request() && $this->output->enable_profiler(true);
        }
    }
}