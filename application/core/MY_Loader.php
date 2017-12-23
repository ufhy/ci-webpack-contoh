<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Loader.php";

class MY_Loader extends MX_Loader
{
    public function __construct()
    {
        parent::__construct();
    }

    public function view($view, $vars = array(), $return = FALSE)
    {
        list($path, $_view) = Modules::find($view, $this->_module, 'views/');

        if ($path != FALSE)
        {
            $this->_ci_view_paths = array($path => TRUE) + $this->_ci_view_paths;
            $view = $_view;
        }

        if (method_exists($this, '_ci_object_to_array')) {
            $ob_array = $this->_ci_object_to_array($vars);
        }
        else {
            $ob_array = $this->_ci_prepare_view_vars($vars);
        }

        return $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $ob_array, '_ci_return' => $return));

        //return $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
    }
}