<?php

class User extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        
    }

    public function login()
    {
        $this->input->post("user_name");
        $this->load->library('form_validation');

        $this->form_validation->set_rules("user_name", "User Name", "required|trim");
        $this->form_validation->set_rules("password", "Password", "required|trim");

        $error_messages = array(
            "required" => "{field} cannot be empty."
        );
        $this->form_validation->set_message($error_messages);

        if($this->form_validation->run() === FALSE){

            $this->session->set_flashdata("error", validation_errors());
            $this->login_form();

        }else{
            $this->load->model("user_model");
            $user= $this->user_model->get_user(array(
                "user_name" => $this->input->post("user_name"),
                "password" => md5($this->input->post("password"))
            ));

            if($user){
                $this->session->set_userdata("user", $user);
                redirect(base_url("posts"));
            }else{
                $this->session->set_flashdata("error", "User couldn't found.");
            }
        }
    }

    public function login_form()
    {
        $user = $this->session->userdata("user");

        if($user){
            redirect(base_url("posts"));
        }
        $this->load->view("user_login");
    }

    public function logout()
    {
        $this->session->unset_userdata("user");

        redirect(base_url("login"));
    }
}