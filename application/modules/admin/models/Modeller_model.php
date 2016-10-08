<?php

class Modeller_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->library("pagination");
		$this->load->model('pagination_model');
	}

	public function modeller_data($id='')
	{
		$this->db->select("*");
		$this->db->from('li_modeller');
		if($id){
			$this->db->where('id',$id);
		}
		return $this->db->get()->result_array();
	}

	public function insert_modeller(){

		$data_img = array();
		$img=$this->input->post('img');
		$img_title=$this->input->post('img_title');
		$img_btn=$this->input->post('img_btn');
		$img_link=$this->input->post('img_link');

		if($img){
			foreach ($img as $key => $value) {
				$data_img[]=array('img'=>$img[$key], 'img_title'=>$img_title[$key], 'img_btn'=>$img_btn[$key], 'img_link'=>$img_link[$key] );
			}
		}

		if($this->input->post('status')){$status=1;}else{$status=0;}

		$data=array(
					'title'  	 =>$this->input->post('title'),
					'img'	 	 =>json_encode($data_img),
					'priority'   =>$this->input->post('priority'),
					'status'     =>$status
					);

		$this->db->insert('li_boats',$data);
		return ($this->db->affected_rows() != 1 ) ? false:true;
	}
	
	public function update_gallery($id)
	{
		$data_img = array();
		$img=$this->input->post('img');
		$img_title=$this->input->post('img_title');
		$img_btn=$this->input->post('img_btn');
		$img_link=$this->input->post('img_link');

		if($img){
			foreach ($img as $key => $value) {
				$data_img[]=array('img'=>$img[$key], 'img_title'=>$img_title[$key], 'img_btn'=>$img_btn[$key], 'img_link'=>$img_link[$key] );
			}
		}

		if($this->input->post('status')){$status=1;}else{$status=0;}
		$data=array(
					'title'  	 =>$this->input->post('title'),
					'img'	 	 =>json_encode($data_img),
					'priority'   =>$this->input->post('priority'),
					'status'     =>$status
					);


		$this->db->where('id',$id);
		$this->db->update("li_boats",$data);
		return ($this->db->affected_rows() == 1 || $this->db->affected_rows() == 2 ) ? true:false;
	}

	public function update_gallery_status($data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update("li_boats",$data);
		return ($this->db->affected_rows() == 1 ) ? true:false;
	}

	public function delete_gallery($id)
	{
		$this->db->where("id='".$id."'");
		$this->db->delete('li_boats');
		return ($this->db->affected_rows() == 1 ) ? true:false;
	}


}
