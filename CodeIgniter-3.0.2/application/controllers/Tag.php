<?php
/**
 * Created by PhpStorm.
 * User: wsdevotion
 * Date: 15/11/4
 * Time: 上午9:20
 */

class Tag extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('tag_model');
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->helper('url');
    }

    public function get_tag(){

    }
}