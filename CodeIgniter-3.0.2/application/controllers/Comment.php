<?php
/**
 * Created by PhpStorm.
 * User: wsdevotion
 * Date: 15/11/5
 * Time: 下午2:04
 */

class Comment extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('comment_model');
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->helper('url');
    }

    public function set_comments(){
        $blog_id = $this->comment_model->set_comment();
        redirect('blog/contents/'.$blog_id, 'refresh');
    }

    public function toComment($blog_id){
        $data['blog_id'] = $blog_id;
        $this->load->view('blog/comment', $data);
    }


}