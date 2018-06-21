<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: 王天禹
 * Date: 2018/6/17
 * Time: 15:48
 */
class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('user_model');
    }

    public function index()
    {
        $clubs = $this->admin_model->get_all_clubs();
        $this->load->view('admin_index',array(
            'result' => $clubs
        ));
    }

    public function login(){//登录用户
        $user_num = $this->input->post('user_num');
        $user_pass = $this->input->post('user_pass');
        $result = $this->admin_model->get_name_by_pass($user_num,$user_pass);
        if($result){
            $this->session->set_userdata(array(
                'user' => $result
            ));

            redirect('admin/index');
        }else{
            $this->load->view('admin_login');
        }
    }
    public function logout(){//用户退出
        $this->session->unset_userdata('user');
        redirect('welcome/admin_login');
    }

    public function pass_club()
    {
        $club_id = $this->input->get('club_id');
        $row = $this->admin_model->pass_club($club_id);
        if($row>0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    public function refuse_club()
    {
        $club_id = $this->input->get('club_id');
        $row = $this->admin_model->refuse_club($club_id);
        if($row>0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }
    public function club_detail()
    {
        $club_id = $this->input->get('club_id');
        $row = $this->admin_model->club_detail($club_id);
        $active = $this->user_model->get_my_active($club_id);
        $member = $this->user_model->get_all_member($club_id);
        if($row){
            $this->load->view('club_detail',array(
                'club' =>$row,
                'active' => $active,
                'member' => $member
            ));
        }else{
            echo 'fail';
        }
    }

    public function del_club()
    {
        $club_id = $this->input->get('club_id');
        $row = $this->admin_model->del_club($club_id);
        if($row){
            redirect('user/all_club');
        }else{
            echo 'fail';
        }
    }

    public function pass_active()
    {
        $active_id = $this->input->get('active_id');
        $row = $this->admin_model->pass_active($active_id);
        if($row){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    public function refuse_active()
    {
        $active_id = $this->input->get('active_id');
        $row = $this->admin_model->refuse_active($active_id);
        if($row){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    public function pass_notice()
    {
        $notice_id = $this->input->get('notice_id');
        $row = $this->admin_model->pass_notice($notice_id);
        if($row){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    public function refuse_notice()
    {
        $notice_id = $this->input->get('notice_id');
        $row = $this->admin_model->refuse_notice($notice_id);
        if($row){
            echo 'success';
        }else{
            echo 'fail';
        }
    }





}