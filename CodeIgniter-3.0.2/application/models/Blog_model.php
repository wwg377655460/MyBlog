<?php
/**
 * Created by PhpStorm.
 * User: wsdevotion
 * Date: 15/11/1
 * Time: 下午8:49
 */


class Blog_model extends CI_Model{

    public function __construct(){
        $this->load->database();
        date_default_timezone_set('prc');
    }

    public function get_users($username){
        $query = $this->db->get_where('users', array('username' => $username));
        return $query->row_array();
    }

    public function set_blog($file){

        $data = array(
            'name' => $this->input->post("name"),
            'desctext' => $this->input->post("desctext"),
            'contents' => $this->input->post("contents"),
            'imgurl' => "../../uploads/".$file,
            'date' => date('y-m-d H:i:s',time())
        );

        $this->db->insert('blogs', $data);
        return $this->db->insert_id();

    }

    public function get_blogs($id)
    {
        if ($id === NULL)
        {
            $query = $this->db->get('blogs');
            return $query->result_array();
        }

        $query = $this->db->get_where('blogs', array('id' => $id));
        return $query->row_array();
    }

    public function upload()
    {
        // 把需要的配置放入config数组
        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '102400';
        $this -> load -> library('upload', $config); //调用CI的upload类
        $this -> upload -> do_upload('upfile'); //使用do_upload('上传框的name')方法进行上传
        if ($this -> upload -> do_upload('upfile')) { //上传成功
            $data = array('upload_data' => $this -> upload -> data()); //将文件信息存入数组
            $file = $data['upload_data']['file_name'];
            return $file;
        }
        return "1.jpg";

        // 以下代码为拓展的，非必要
//        if ($this -> upload -> do_upload('upfile')) { //上传成功
//            $data = array('upload_data' => $this -> upload -> data()); //将文件信息存入数组
//            var_dump($data); //打印文件信息
//        } else { //上传失败
//            $error = array('error' => $this -> upload -> display_errors());//将错误信息存入数组
//            var_dump($error); //打印错误信息
//        }
    }

    public function get_blogs_gid($gid=0,$num="")
    {

//        $this->db->where("gid",$gid);

        $this->db->limit($num,$gid);//$this->db->limit(10,15); 每条10条，从15条开始
        $this->db->order_by("date", "desc");


//        select a.aid,a.atitle ,a.atext,group_concat(b.bclass)
//FROM `a`left JOIN B ON a.aid = b.aid WHERE a.aid=1
//group by a.aid

        $query = $this->db->query("select blogs.id,blogs.name ,blogs.desctext,blogs.contents, blogs.imgurl,blogs.zan, blogs.date ,group_concat(blogs_tag_table.tag_id)
  FROM blogs left JOIN blogs_tag_table ON blogs.id = blogs_tag_table.blog_id
  group by blogs.id ORDER BY date desc limit $gid,$num");

//        $this->db->select('a.aid,a.atitle ,a.atext');
//        $this->db->group_concat('b.bclass');
//        $this->db->from('');

//        $this->db->select('*');
//        $this->db->from('blogs');
//        $this->db->join('blogs_tag_table', 'blogs_tag_table.blog_id = blogs.id');
//        $query = $this->db->get();


//        $query = $this->db->get('blogs');
        return $query->result_array();
    }

    public function get_blogs_zan($gid=0,$num="")
    {

//        $this->db->where("gid",$gid);


        $this->db->limit($num,$gid);//$this->db->limit(10,15); 每条10条，从15条开始
        $this->db->order_by("zan", "desc");
        $query = $this->db->get('blogs');
        return $query->result_array();
    }

    public function delete_blogs($id){

        $this->db->where('id',$id);//这里是做where条件这个相当重要，如果没有这个你有可能把这个表数据都清空了
        $this->db->delete('blogs');//删除指定id数据
    }

    public function update_blog($array){
//        $query = $this->db->get_where('blogs', array('id' => $id));//同上取的get传值过来的ID
//        $array = $query->row_array();

        $this->db->where('id',$array['id']);//同上准备where条件
        $this->db->update('blogs',$array);//跟新操作
    }



}