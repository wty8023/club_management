<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: 王天禹
 * Date: 2018/6/17
 * Time: 15:49
 */
class admin_model extends CI_Model
{
    public function get_name_by_pass($user_num,$user_pass){//通过账号密码获取登录用户的信息
        $data=array(
            'user_name'=>$user_num,
            'admin_pass'=>$user_pass,
        );
        $query=$this->db->get_where('t_admin',$data);
        return $query->row();
    }

    public function get_all_clubs()
    {
        $sql ="select * from  clubs,t_user where clubs.status = 1 and clubs.user_id = t_user.user_id order by clubs.club_id DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function pass_club($club_id)
    {
        $sql = "update clubs set status = 1 where club_id = $club_id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function refuse_club($club_id)
    {
        $sql = "DELETE FROM clubs WHERE club_id = $club_id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function club_detail($club_id)
    {
        $sql = "select * from  clubs,t_user where clubs.club_id = $club_id and clubs.user_id = t_user.user_id ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function del_club($club_id)
    {
        $sql = "DELETE FROM clubs WHERE club_id = $club_id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function refuse_active($active_id)
    {
        $sql = "DELETE FROM active WHERE active_id = $active_id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function pass_active($active_id)
    {
        $sql = "update active set active_status = 1 where active_id = $active_id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function pass_notice($notice_id)
    {
        $sql = "update notice set status = 1 where notice_id = $notice_id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function refuse_notice($notice_id)
    {
        $sql = "DELETE FROM notice WHERE notice_id = $notice_id";
        $query = $this->db->query($sql);
        return $query;
    }


}