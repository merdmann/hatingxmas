<?php namespace michaelslab\xmas\core\html;

require_once $_SERVER[DOCUMENT_ROOT] . '/vendor/autoload.php';
require_once $_SERVER[DOCUMENT_ROOT] . '/app/libs/logging.php';

// Simple HTML helper class
class HtmlHelper 
{
    var $config;

    public function __construct() {
        $this->config = $GLOBALS['config'];      
    }

    // Generates a html unordered list from an associative array
    function ul($array) {
        $list = '<ul>';

        foreach($array as $item => $value) {
            $list .= '<li>';

            if(is_array($value))
                $list .= $item . $this->ul($value);
            else
                $list .= $value;

            $list .= '</li>';
        }

        $list .= '</ul>';
        return $list;
    }

    public function open_form($url = NULL, $method = 'POST', $multitype = FALSE) {
        $url = is_null($url) ? $_SERVER['REQUEST_URI'] : $this->path($url);
        $type = $multitype ? ' enctype="multipart/form-data" ' : '';

        return '<form action="' . $url . '" method="' . 
                $method . '" '.$type.'>';
    }

    // Parses an URL and returns a relative URL, ignoring /index.php/
    function path_content($url) {
        \core\info("fake_url =" . $this->config['fake_pretty_urls']);
        return str_replace('//', '/', $this->config['base_path'] . '/' . $url);
    }

    function path_page($url) {
        return str_replace('//', '/', $this->config['base_path'] . '/' . 
            ($this->config['fake_pretty_urls'] ? 'index.php/' : '') . $url);
    }

    function link($name, $url, $options = null) {
        if(strpos($url, 'http') !== 0)
            $url = $this->path_page($url);

        return '<a href="' . $url . '" ' . $this->_parse_options($options) . '>' . $name . '</a>';
    }

    function redirect($url) {
        header('Location:' . $this->path_page($url));
    }

    function img($url, $options = null) {
        if(strpos($url, 'http') !== 0)
            $url = $this->path_content($url);

        return '<img src="' . $url . '" ' . $this->_parse_options($options) . '/>';
    }
    
    
    function button($name, $text, $options = null) {
            return '<button type="button" id="' .$name . '" ' . $this->_parse_options($options) . ">" . $text . "</button>";
    }

    function js($url, $options = null) {
        return '<script src="' . $this->path_content($url) . '" ' . $this->_parse_options($options) . "></script>";
    }

    function css($url, $options = null) {
        return '<link rel="stylesheet" href="' . $this->path_content($url) . '" ' . $this->_parse_options($options) . '>';
    }

    function urlify($url) {
        $url = str_replace(array(' ', '!', '?'), array('-', '', ''), $url);
        return strtolower($url);
    }

    function div($text, $options = null) {
        return '<div '. $this->_parse_options($options) . '>' . $text . '</div>';
    }
    // Private method, array to html attribute list
    function _parse_options($options) {
        if(!isset($options))
            return '';

        $output = '';
        foreach($options as $k => $v) {
            $output .= " $k=\"$v\" ";
        }

        return $output;
    }
}