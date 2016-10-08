<?php

class Definitions_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	public function get_data($id=1)
	{
		$this->db->select('*');	
		$this->db->from('li_settings');
		if($id){$this->db->where('id',$id);}
		$query =$this->db->get();
		return $query->result();
	}
	public function update_definitions()
	{
		$data_definitions = array();
		$definitions_group=$this->input->post('definitions_group');
		$definitions_id=$this->input->post('definitions_id');
		$definitions_name=$this->input->post('definitions_name');
		$definitions_status=$this->input->post('definitions_status');
		$definitions_val1=$this->input->post('definitions_val1');
		$definitions_val2=$this->input->post('definitions_val2');
		
		if($definitions_group){
			foreach ($definitions_group as $key  => $value) {
				$data_definitions[]=array('group' =>$definitions_group[$key],
										  'id'	  =>$definitions_id[$key],
										  'name'  =>$definitions_name[$key],
										  'status'=>$definitions_status[$key],
										  'val1'  =>$definitions_val1[$key],
										  'val2'  =>$definitions_val2[$key]
										  );
			}
		}
		
		$data=array('definitions'=>json_encode($data_definitions) );

		$this->db->where('id',1);
		$this->db->update("li_settings",$data);
		return ($this->db->affected_rows() == 1 ) ? true:false;
	}


}
