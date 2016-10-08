<?php

class Log_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->library("pagination");
		$this->load->model('pagination_model');
	}

	public function insert_log($process, $log_type='other'){

		$data=array(
			'user_id' => $this->session->userdata('id'),
			'log_type'=> $log_type,
			'log'	  => 'IP: '.$this->input->ip_address().' - '.$this->session->userdata('fullname').' - '.$process
			);
		$this->db->insert('li_logs',$data);
	}
	

	public function log_list($show, $page){
		
		$where="id";
		
		if($this->session->userdata('query_log')){ $where.= " and (log LIKE '%".$this->session->userdata('query_log')."%' or log_type LIKE '%".$this->session->userdata('query_log')."%')"; }

		if($this->session->userdata('datetime_log')){
			$date= explode(' - ', $this->session->userdata('datetime_log'));
			if(check_date($date[0]) && check_date($date[1])){
				$where.=" and (times between '".date('Y-m-d 00:00:00',strtotime($date[0]))."' and '".date('Y-m-d 23:59:59',strtotime($date[1]))."') ";
			}else{
				$this->session->set_flashdata('msg0',"Tarih Alanı Hatalı");
			}
		}

		$sql="select *, (select fullname from li_users where id=li_logs.user_id) as user from li_logs where ".$where." order by id desc";
		
		return  $this->pagination_model->get_list($sql,base_url("admin/logs/log_list/".$show."/"),$show,$page,5);
		
	}
	
	


}
