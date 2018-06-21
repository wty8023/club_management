<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }
    public function login(){//登录用户
        $user_num = $this->input->post('user_num');
        $user_pass = $this->input->post('user_pass');
        $result = $this->user_model->test($user_num);
        if(count($result) == 0){
            echo 'tel not exist';
        }else if($result[0]->user_pass == $user_pass) {
            $this->session->set_userdata(array(
                'user' => $result[0]
            ));
            redirect('Welcome/index');
        }
        else{
            $this->load->view('login.php');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('user');
        redirect('Welcome/index');
    }

    public function add_club(){//注册社团
        $user = $this->session->userdata('user');
        $time = date('y-m-d h:i:s');
        $club_name = $this->input->get('name');
        $club_intro = $this->input->get('intro');
        $row = $this->user_model->get_club_by_name($club_name);
            if(count($row) > 0){
                echo 'club is exist';
            }else{
                $result = $this->user_model->add_club($user->user_id,$club_name,$club_intro,$time);
                if($result){
                    echo 'success';
                }else{
                    echo 'fail';
                }
            }


    }

    public function add_user()
    {
        $tel = $this->input->get('tel');
        $num = $this->input->get('num');
        $pwd1 = $this->input->get('pwd1');
        $pwd2 = $this->input->get('pwd2');
        $name = $this->input->get('name');
        $sex = $this->input->get('sex');
        $row = $this->user_model->test($num);
        if($row>0){
            echo 'num is exist';
        }
        if($pwd1 != $pwd2){
            echo 'pwd-error';
            die();
        }
        $rows = $this->user_model->add_user(array(
            'user_num' => $num,
            'user_name' => $name,
            'user_tel'=>$tel,
            'user_pass'=>$pwd1,
            'user_sex'=>$sex
        ));
        if($rows > 0){
//            redirect('url/login');
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    public function add_notice()
    {
        $user = $this->session->userdata('user');
        $title = $this->input->get('title');
        $time = $this->input->get('time');
//        $died_time = date('y-m-d h:i:s');
        $content = $this->input->get('content');
        $result = $this->user_model->add_notice(array(
            'notice_title' => $title,
            'notice_time' => $time,
            'notice_con' => $content,
            'club_id' => $user->club_id
        ));
        if($result){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    public function add_active()
    {
        $user = $this->session->userdata('user');
        $title = $this->input->get('title');
        $died_time = $this->input->get('time');
        $time = date('y-m-d h:i:s');
        $room = $this->input->get('room');
        $note= $this->input->get('note');
        $result = $this->user_model->add_active(array(
            'active_name' => $title,
            'active_date' => $time,
            'active_room' => $room,
            'active_note' => $note,
            'died_date' => $died_time,
            'club_id' => $user->club_id,
            'user_name' => $user->user_name,
            'user_id' => $user->user_id
        ));
        if($result){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    public function del_st(){
        $user = $this->session->userdata('user');
        $user_id = $this->input->get('user_id');
        $result = $this->user_model->del_st($user_id);
        if($result){
            redirect('user/my_club?club_id='.$user->club_id);
            echo "<script>alert('移除成员成功');</script>";

        }else{
            echo '删除失败';
        }
    }

    public function pass_st(){
        $user = $this->session->userdata('user');
        $user_id = $this->input->get('user_id');
        $result = $this->user_model->pass_st($user_id);
        if($result){
            redirect('user/my_club?club_id='.$user->club_id);
        }else{
            echo '审核失败';
        }
    }

    public function refuse_st(){
        $user = $this->session->userdata('user');
        $user_id = $this->input->get('user_id');
        $result = $this->user_model->refuse_st($user_id);
        if($result){
            redirect('user/my_club?club_id='.$user->club_id);
        }else{
            echo '拒绝失败';
        }
    }



    public function all_club()
    {
        $clubs = $this->user_model->get_all_clubs();
        $this->load->view('all_clubs',array(
            'result' => $clubs
        ));
    }
    public function my_club()
    {
        $club_id = $this->input->get('club_id');
        $club = $this->user_model->get_my_club($club_id);
//        var_dump($club);die();
        $active = $this->user_model->get_my_active($club_id);
        $member = $this->user_model->get_all_member($club_id);
        $this->load->view('my_club',array(
            'club' => $club,
            'active' => $active,
            'member' => $member
        ));
    }

    public function join_in()
    {
        $user= $this->session->userdata('user');
        $club_id = $this->input->get('club_id');
        $result = $this->user_model->join_in($user->user_id,$club_id);
        if($result>0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    public function change(){
        $user= $this->session->userdata('user');
        if($user->club_id != 0 ) {
            $result = $this->user_model->get_by_num($user->user_num);
        }else{
            $result = $this->user_model->get_by_id($user->user_id);
        }
        $this->load->view('change',array(
            'result' => $result
        ));
    }
    public function do_change(){
        $user = $this->session->userdata('user');
        $user_pass = $this->input->post('user_pass');
        $user_sex = $this->input->post('user_sex');
        $user_age = $this->input->post('user_age');
        $user_tel = $this->input->post('user_tel');
        $result = $this->user_model->change($user->user_id,$user_pass,$user_sex,$user_age,$user_tel);
        if($result){
            redirect('user/change');
        }else{
            echo '更新失败';
        }
    }
}
?>
