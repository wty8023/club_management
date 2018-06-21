<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model
{
//    public function get_name_by_pass($user_num,$user_pass){//通过账号密码获取登录用户的信息
//        $data=array(
//            'user_num'=>$user_num,
//            'user_pass'=>$user_pass,
//        );
//        $query=$this->db->get_where('user',$data);
//        return $query->row();
//    }

    public function test($tel){//验证登录
        $query = $this->db->get_where('t_user', array('user_num' => $tel));
        return $query->result();
    }

    public function get_club_by_name($club_name){//注册时看账号或社团名是否存在
        $query = $this->db->get_where('clubs', array('club_name' => $club_name));
        return $query->result();
    }
    public function add_club($user_id,$user_name,$user_intro,$time){//添加社团
        $data = array(
            'user_id' => $user_id,
            'club_name' => $user_name,
            'club_intro' => $user_intro,
            'time' => $time
         );
        $sql = "update t_user set flag = 2 where t_user.user_id = $user_id";
        $res = $this->db->query($sql);
        if($res>0) {
            $result = $this->db->insert('clubs', $data);
            return $result;
        }else{
            return false;
        }
    }

    public function get_my_club($club_id)
    {
        $sql = "select * from t_user,clubs where clubs.club_id = $club_id and t_user.club_id = $club_id";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function get_my_active($club_id)
    {
        $sql = "select * from active,clubs where active.club_id = $club_id and clubs.club_id = $club_id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_all_member($club_id)
    {
        $sql = "select * from t_user where t_user.club_id = $club_id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function add_notice($mes)
    {
        $this->db->insert('notice',$mes);
        return $this->db->affected_rows();
    }

    public function add_user($mes)
    {
        $this->db->insert('t_user',$mes);
        return $this->db->affected_rows();
    }

    public function add_active($mes)
    {
        $this->db->insert('active',$mes);
        return $this->db->affected_rows();
    }

    public function join_in($user_id,$club_id)
    {
        $sql = "update t_user set club_id = $club_id where t_user.user_id = $user_id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function del_st($user_id){
        $sql = "update t_user set flag = 0,club_id = 0 where t_user.user_id = $user_id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function pass_st($user_id){
        $sql = "update t_user set flag = 3 where t_user.user_id = $user_id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function refuse_st($user_id){
        $sql = "update t_user set club_id = 0 where t_user.user_id = $user_id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_by_num($user_id){
        $sql = "select * from t_user u ,clubs c where u.user_num=".$user_id.' and u.club_id = c.club_id';
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function get_by_id($user_id){
        $sql = "select * from t_user  where user_id= $user_id";
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function change($user_id,$user_pass,$user_sex,$user_age,$user_tel){
        $sql = "update t_user set user_pass= '$user_pass' ,user_sex='$user_sex',user_age= '$user_age',user_tel='$user_tel' where user_id=$user_id";
        $query = $this->db->query($sql);
        return $query;
    }
    public function get_all(){
        $sql = 'select * from t_user';
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function get_all_clubs()
    {
        $sql ="select * from  clubs,t_user where clubs.status = 1 and clubs.user_id = t_user.user_id order by clubs.club_id DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }
}
?>