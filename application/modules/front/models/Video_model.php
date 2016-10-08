<?php

class Video_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function addVideo(){

    }

    public function getVideos($category){
        return $this->db->select('*')
                        ->from('li_video')
                        ->where('katagori',$category)
                        ->get()
                        ->result();
    }
    public function oneVideo($slug){
        return $this->db->select('*')
                        ->from('li_video')
                        ->where('slug',$slug)
                        ->get()
                        ->row_array();
    }
    public function getAllVideos(){
        return $this->db->select('*')
                        ->from('li_video')
                        ->get()
                        ->result();
    }
}