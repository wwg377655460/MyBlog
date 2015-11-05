<?php
/**
 * Created by PhpStorm.
 * User: wsdevotion
 * Date: 15/11/5
 * Time: 下午2:11
 */

class Comment_model extends CI_Model{

    public function __construct(){
        $this->load->database();
        date_default_timezone_set('prc');
    }

    public function set_comment(){
        $blog_id = $this->input->post("blog_id");
        $data = array(
            'contents' => $this->input->post("contents"),
            'blog_id' => $blog_id,
            'date' => date('y-m-d H:i:s',time())
        );

        $this->db->insert('comments', $data);
        return $blog_id;

    }

    public function get_comments($blog_id){
        $query = $this->db->get_where('comments', array('blog_id' => $blog_id));
        return $query->result_array();
    }
}