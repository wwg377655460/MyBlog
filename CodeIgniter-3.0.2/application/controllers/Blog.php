<?php

/**
 * Created by PhpStorm.
 * User: wsdevotion
 * Date: 15/11/1
 * Time: 下午8:32
 */
class Blog extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('blog_model');
        $this->load->model('tag_model');
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->helper('url');
    }

    public function login()
    {
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $user = $this->blog_model->get_users($username);
        if (count($user) != 0 && $user['password'] == $password) {
            $this->session->set_userdata($user);
            redirect('blog/index', 'refresh');
        } else {
            redirect('blog/index', 'refresh');
        }
    }

    public function tologin()
    {
        $this->session->unset_userdata('msg');
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            $user = $this->blog_model->get_users($_SESSION['username']);
            if($user['password'] == $_SESSION['password']){
                $this->session->set_userdata('msg', '你已经登录了');
                redirect('blog/index', 'refresh');
            }
        }

        $this->load->view('blog/login');
    }

    public function upload()
    {
        $file = $this->blog_model->upload();
        $id = $this->blog_model->set_blog($file);//返回添加的id
        $this->tag_model->set_blog_tag($id);//关联表
//        $this->load->view('blog/blog_list');
        redirect('blog/lists', 'refresh');
    }

    public function toupload(){
        $this->session->unset_userdata('msg');
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            $user = $this->blog_model->get_users($_SESSION['username']);
            if($user['password'] != $_SESSION['password']){
                $this->session->set_userdata('msg', '你还没有登录');
                redirect('blog/index', 'refresh');
            }
        }else{
            $this->session->set_userdata('msg', '你还没有登录');
            redirect('blog/index', 'refresh');
        }


        $data['tags'] = $this->tag_model->get_tags();
        $this->load->view('blog/upload', $data);
    }

    public function lists($gid)
    {

        $this->session->unset_userdata('msg');

        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/blog/lists';
        $config['total_rows'] = $this->db->count_all('blogs');
        $config['per_page'] = '5';
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $config['first_link'] = '首页';
        $config['last_link'] = '尾页';
        $this->pagination->initialize($config);
        //传参数给VIEW
        $data['page_links'] = $this->pagination->create_links();
        $data['tags'] = $this->tag_model->get_tags();
        //再次查询，得到需要显示的数据
        $data['blogs'] = $this->blog_model->get_blogs_gid($gid,$config['per_page']);

//            print_r($data['blogs']);
//        $data['blogs'] = $this->blog_model->get_blogs(NULL);
        $this->load->view('blog/blog_list', $data);
    }

    public function manage($gid){
        $this->session->unset_userdata('msg');
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            $user = $this->blog_model->get_users($_SESSION['username']);
            if($user['password'] != $_SESSION['password']){
                $this->session->set_userdata('msg', '你还没有登录');
                redirect('blog/index', 'refresh');
            }
        }else{
            $this->session->set_userdata('msg', '你还没有登录');
            redirect('blog/index', 'refresh');
        }

        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/blog/manage';
        $config['total_rows'] = $this->db->count_all('blogs');
        $config['per_page'] = '5';
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $config['first_link'] = '首页';
        $config['last_link'] = '尾页';
        $this->pagination->initialize($config);
        //传参数给VIEW
        $data['page_links'] = $this->pagination->create_links();
        //再次查询，得到需要显示的数据
        $data['blogs'] = $this->blog_model->get_blogs_gid($gid,$config['per_page']);

        $this->load->view('blog/manage', $data);
    }

    public function tozan($id){
        if($id === NULL){
            redirect('blog/lists', 'refresh');
        }

        $blog = $this->blog_model->get_blogs($id);
        $blog['zan'] += 1;
        $this->blog_model->update_blog($blog);
        redirect('blog/lists', 'refresh');

    }

    public function logout(){
        $this->session->unset_userdata('msg');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        redirect('blog/index', 'refresh');
    }

    public function delete($id){
        if($id === NULL){
            redirect('blog/lists', 'refresh');
        }

        $this->tag_model->delete_blog_tag($id);
        $this->blog_model->delete_blogs($id);
        redirect('blog/manage', 'refresh');
    }

    public function index(){
        $data['blogs'] = $this->blog_model->get_blogs_zan(0, 6);
        $data['blogs_new'] = $this->blog_model->get_blogs_gid(0,9);
        $this->load->view('blog/index', $data);
    }

    public function contents($id){
        $this->session->unset_userdata('msg');
        if($id === NULL){
            redirect('blog/lists', 'refresh');
        }

        $data['blog'] = $this->blog_model->get_blogs($id);
        $data['blogs_new'] = $this->blog_model->get_blogs_gid(0,9);
        $this->load->view('blog/myblog', $data);
    }


}