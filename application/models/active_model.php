<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Active_model extends CI_Model
{
    public function get_active_by_id($active_id)
    {
        $query = $this->db->get_where('active', array('active_id' => $active_id));
        return $query->result();
    }
    public function get_active_member($active_id)
    {
        $sql = "select * from t_user,t_active_user where t_user.user_id = t_active_user.user_id and t_active_user.active_id = $active_id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function del_st($user_id)
    {
        $sql = "DELETE FROM t_active_user WHERE user_id = $user_id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function join_in($mes)
    {
        $this->db->insert('t_active_user',$mes);
        return $this->db->affected_rows();
    }
    public function check_join($active_id,$user_id)
    {
        $sql = "select * from t_active_user where t_active_user.user_id = $user_id and t_active_user.active_id = $active_id";
        $query = $this->db->query($sql);
        return $query->result();
    }
}
?>