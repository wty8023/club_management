<?php

/**
 * Created by PhpStorm.
 * User: 王天禹
 * Date: 2018/5/9
 * Time: 9:24
 */
class Welcome_Model extends CI_Model
{

    public function get_all_notice()
    {
        $sql = 'select * from notice n, clubs c where n.club_id = c.club_id and n.status = 1';
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function check_clubs()
    {
        $sql = "select * from t_user u, clubs c where c.status = 0 and c.user_id = u.user_id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function check_actives()
    {
        $sql = "select * from active a,clubs c where a.active_status = 0 and a.club_id = c.club_id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function check_notice()
    {
        $sql = "select * from notice n,clubs c,t_user u where n.status = 0 and n.club_id = c.club_id and c.user_id = u.user_id";
        $query = $this->db->query($sql);
        return $query->result();
    }


}