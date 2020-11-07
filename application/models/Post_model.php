<?php

class Post_model extends CI_Model
{
    public $table;

    public function __construct()
    {
        parent::__construct();
        $this->table = "posts";
    }

    public function get($where = array())
    {
        return $this->db->where($where)->get($this->table)->row();
    }

    public function get_all_posts($where = array())
    {
        return $this->db->where($where)->get($this->table)->result();
    }

    public function post_list()
    {
        $user = $this->session->userdata("user");

        $sql = "SELECT p.*, v.vote_status,
                (SELECT count(*) FROM votes WHERE vote_status = 1 AND post_id = p.id) AS like_count,
                (SELECT count(*) FROM votes WHERE vote_status = -1 AND post_id = p.id) AS dislike_count
                FROM posts p
                LEFT JOIN votes v ON p.id = v.post_id AND v.user_id =". $user->id;

        return $this->db->query($sql)->result();
    }

    public function get_post($post_id)
    {
        $user = $this->session->userdata("user");

        $sql = "SELECT p.*, v.vote_status,
                (SELECT count(*) FROM votes WHERE vote_status = 1 AND post_id = p.id) AS like_count,
                (SELECT count(*) FROM votes WHERE vote_status = -1 AND post_id = p.id) AS dislike_count
                FROM posts p
                LEFT JOIN votes v ON p.id = v.post_id AND v.user_id =". $user->id . " WHERE p.id = $post_id";

        return $this->db->query($sql)->row();
    }
}