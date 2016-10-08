<?php

class Pagination_model extends CI_Model 
{
	
	function __construct(){

		parent::__construct();

	}
	
	public function data_count($sql){

		$query 	= $this->db->query($sql);
		return $query->num_rows();

	}

	public function get_list($sql,$url,$show,$page){

		$list = array();
		$this->load->library('pagination');
		$this->load->helper('url');
		$total = $this->data_count($sql);

		$config = array(
			'base_url'          => $url,
			'total_rows'        => $total,
			'per_page'          => $show,
			'num_links'         => 5,
			'use_page_numbers'  => true,
			'page_query_string' => false,
			'uri_segment'       => 6,
			'full_tag_open'     => '<ul class="pagination pull-right">',
			'full_tag_close'    => '</ul>',
			'first_link'        => '<<',
			'first_tag_open'    => '<li>',
			'first_tag_close'   => '</li>',
			'last_link'         => '>>',
			'last_tag_open'     => '<li>',
			'last_tag_close'    => '</li>',
			'next_link'         => '>',
			'next_tag_open'     => '<li>',
			'next_tag_close'    => '</li>',
			'prev_link'         => '<',
			'prev_tag_open'     => '<li>',
			'prev_tag_close'    => '</li>',
			'cur_tag_open'      => '<li class="active"><a>',
			'cur_tag_close'     => '</a></li>',
			'num_tag_open'      => '<li>',
			'num_tag_close'     => '</li>'
		);


		$this->pagination->initialize($config);
		$pagination = $this->pagination->create_links();
		$list["pagination"] =$pagination;

		if(!empty($page)){ $start = ($page*$show)-$show; } else { $start = 0; } 

		$query 	= $this->db->query($sql." limit ".$start." , ".$show);

		if($query->num_rows()>0){
			$list["list"] = $query->result_array();
		}
		else{
			$list["list"] = "";
		}
		
		$list["total"] = $total;

		return $list;

	}



}
