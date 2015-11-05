<?php
/**
 * Created by PhpStorm.
 * User: wsdevotion
 * Date: 15/11/4
 * Time: 上午9:22
 */

class Tag_model extends CI_Model{

    public function __construct(){
        $this->load->database();
        date_default_timezone_set('prc');
    }

    public function get_tags(){
        $query = $this->db->get('tag');
        return $query->result_array();
    }

    public function set_blog_tag($id){
        $tags = $this->input->post("tagname");
        foreach($tags as $tag){
            $data = array(
                'blog_id' => $id,
                'tag_id' => $tag
            );
            $this->db->insert('blogs_tag_table', $data);
        }
    }

    public function delete_blog_tag($id){
        $this->db->where('blog_id',$id);//这里是做where条件这个相当重要，如果没有这个你有可能把这个表数据都清空了
        $this->db->delete('blogs_tag_table');//删除指定id数据
    }

}