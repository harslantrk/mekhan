<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Func_lib {
	var $CI;

	function Func_lib(){
		$this->CI =& get_instance();
		log_message('debug','Private libraray class initialized.');
	}

	function header() {
        $sosyalmedya = $this->settings_model->get_definitions();
        $data['sosyalmedya'] = array();
        $data['sosyalmedya'] = json_decode($sosyalmedya[0]['definitions'], true);
        $this->load->view("header", $data);
    }

}