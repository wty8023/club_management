<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Message extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('message_model');
    }
    public function post_mess(){
        $user = $this->session->userdata('user');
        $recieve = $this->input->post('recieve');
        $time = $this->input->post('time');
        $details = $this->input->post('details');
        $post = $user->user_name;

        $result = $this->message_model->post_mess($recieve,$time,$details,$post);
        if($result){
            redirect('message/message_history');
        }
    }
    public function message_history(){
        $user = $this->session->userdata('user');
        if($user){
            $result = $this->message_model->get_all();

            $this->load->view('message_history',array(
                'results' => $result
            ));
        }else{
            $this->load->view('login.php');
        }

    }
    public function del_mess()
    {
        $mess_id = $this->input->get('mess_id');
        $result = $this->message_model->del_mess($mess_id);
        if($result){
            redirect('message/message_history');
        }else{
            echo '删除失败';
        }
    }
}
?>
