<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Template Configuration
 */
$config['template'] = array(
    'parser_enabled' => false,
    'parser_body_enabled' => true,
    'title_separator' => ' :: ',
    'theme' => null,
    'theme_locations' => array(APPPATH . 'themes/'),
    'minify_enabled' => (ENVIRONMENT == 'production')
);


$config['cache_dir'] = APPPATH . 'cache' . DIRECTORY_SEPARATOR;

/**
 * ============================================
 * Assets Configuration
 * ============================================
 */

/**
 * array(
 *    'core' => 'assets/'
 * )
 *
 * array (
 *    'some_key' => array(
 *      'path' => 'more_assets/',
 *      'js_dir' => 'javascript/',
 *      'css_dir' => 'scss/'
 *      'img_dir' => 'images/',
 *    ),
 * )
 */
$config['assets.asset_paths'] = array(
    'core' => 'assets/',
    'module' => 'modules/',
);

$config['assets.asset_js_dir'] = 'js/';
$config['assets.asset_css_dir'] = 'css/';
$config['assets.asset_img_dir'] = 'img/';

$config['assets.asset_cache_path'] = 'assets/cache/';

$config['assets.asset_min'] = (ENVIRONMENT == 'production');
$config['assets.asset_combine'] = (ENVIRONMENT == 'production');

$config['assets.asset_show_files'] = false;
$config['assets.asset_show_files_inline'] = false;

$config['assets.asset_deps_max_depth'] = 2;
$config['assets.asset_post_load_callback'] = null;
$config['assets.asset_filepath_callback'] = null;

$config['assets.asset_groups'] = array();
$config['assets.asset_symlinks'] = array();