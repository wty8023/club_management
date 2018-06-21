<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Active extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('active_model');
    }


    public function active_detail()
    {
        $active_id = $this->input->get('active_id');
        $row = $this->active_model->get_active_by_id($active_id);
        $result = $this->active_model->get_active_member($active_id);
        if($row){
            $this->load->view('active_detail',array(
                'active' => $row[0],
                'member' => $result
            ));
        }else{
            echo 'fail';
        }
    }

    public function del_st()
    {
        $user = $this->session->userdata('user');
        $user_id = $this->input->get('user_id');
        $row = $this->active_model->del_st($user_id);
        if($row>0){
            redirect('user/my_club?club_id='.$user->club_id);
        }else{
            echo 'fail';
        }
    }

    public function join()
    {
        $user = $this->session->userdata('user');
        $active_id = $this->input->get('active_id');
        $res = $this->active_model->check_join($active_id,$user->user_id);
        if(count($res)>0){
            echo "exist";
        }else{
            $row = $this->active_model->join_in(array(
                'user_id' => $user->user_id,
                'active_id' => $active_id
            ) );
            if($row>0){
                echo "success";
            }else{
                echo 'fail';
            }
        }


    }

}
?>