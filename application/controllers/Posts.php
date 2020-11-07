<?php

class Posts extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model("post_model");
        $user = $this->session->userdata("user");
        if (!$user) {
            redirect(base_url("login"));
        }
    }

    public function index()
    {

        $view_data = new stdClass();
        $view_data->user = $this->session->userdata("user");

        //$view_data->posts = $this->post_model->get_all_posts();
        $view_data->posts = $this->post_model->post_list();
        // print_r($this->post_model->get_post(1)); die();
        // print_r($view_data->posts); die();

        $this->load->view("post_list", $view_data);
    }

    public function vote()
    {
        $post_id = $this->input->post("post_id");
        $vote_status = $this->input->post("vote_status");
        $user = $this->session->userdata("user");
        $user_id = $user->id;

        // echo "post_id : $post_id vote: $vote_status user_id: $user_id";

        $this->load->model("vote_model");

        $vote = $this->vote_model->get_vote(
            array(
                "post_id" => $post_id,
                "user_id" => $user_id
            )
        );

        if ($vote) {

            if($vote->vote_status == $vote_status){
                $new_vote_status = 0;
            }else{
                $new_vote_status = $vote_status;
            }

            $update = $this->vote_model->update(
                array(
                    "post_id" => $post_id,
                    "user_id" => $user_id,
                    "vote_status" => $new_vote_status
                ),
                array(
                    "id" => $vote->id
                )
            );

        } else {
            $insert = $this->vote_model->add(
                array(
                    "post_id" => $post_id,
                    "user_id" => $user_id,
                    "vote_status" => $vote_status
                )
            );

        }

        // $render_data["posts"] = $this->post_model->post_list();
        // print_r($render_data["posts"]);
        // echo $this->load->view("renders/post_list_render", $render_data, true);

        $render_data["post"] = $this->post_model->get_post($post_id);
        echo $this->load->view("renders/post_render", $render_data, true);

    }
}