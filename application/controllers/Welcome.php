<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('welcome_model');
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /12.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	    $user_flag = $this->session->userdata('user_flag');
        if ($user_flag == 2){//社团管理员

        }else{//普通用户
            $notice = $this->welcome_model->get_all_notice();
            $this->load->view('index',array(
                'clubs' => $notice
            ));
        }

	}
	public function login(){
	    $this->load->view('login');
    }
    public function admin_login()
    {
        $this->load->view('admin_login');
    }
    public function std_index(){
        $this->load->view('student_index');
    }
    public function reg(){
        $this->load->view('reg');
    }
    public function add_notice(){
        $this->load->view('add_notice');
    }
    public function add_active(){
        $this->load->view('add_active');
    }
    public function check_club()
    {
        $clubs = $this->welcome_model->check_clubs();
        $this->load->view('check_club',array(
            "clubs" => $clubs
        ));
    }

    public function check_active()
    {
        $actives = $this->welcome_model->check_actives();
        $this->load->view('check_active',array(
            "actives" => $actives
        ));
    }

    public function check_notice()
    {
        $notice = $this->welcome_model->check_notice();
        $this->load->view('check_notice',array(
            "notice" => $notice
        ));
    }

    public function post_notice(){
        $this->load->view('post_notice');
    }
    public function all_clubs(){
        $this->load->view('post_notice');
    }
    public function add_club(){
        $this->load->view('add_club');
    }
    public function post_message(){
        $user = $this->session->userdata('user');
        if($user){
            $this->load->model('user_model');
            $result = $this->user_model->get_all();
            $arr['result'] = $result;
            $this->load->view('post_message',$arr);
        }else{
            $this->load->view('login.php');
        }

    }
}
