<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {

	public function Settings_model()
	{
		date_default_timezone_set('Europe/Istanbul'); setlocale(LC_TIME,"turkish");
		$this->session->set_userdata('fulltime',date("d.m.Y").' - '.iconv("ISO-8859-9","UTF-8",strftime('%A')));
		if(!$this->session->userdata('settings')){
			$this->session->set_userdata('settings',(array)$this->get_data()[0]);
			
		}
		//phpinfo();
		//print_r($this->session->all_userdata());
	}

	public function footer_reklam(){
		
		return $this->db->select("*")
				->from("li_boats")
				->where("status","1")
				->get()
				->result();
	}

	

	public function get_data($id=1)
	{
		$this->db->select('*');	
		$this->db->from('li_settings');
		if($id){$this->db->where('id',$id);}
		$query =$this->db->get();
		return $query->result();
	}
	
	public function update_settings($data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('li_settings',$data);
		$this->session->set_userdata('settings',(array)$this->get_data()[0]);
		return ($this->db->affected_rows() != 1 ) ? false:true;
	}

	public function county_select_option($parent_id=0, $id=0){

		$result ='<label class="col-sm-2 control-label">İl<span style="color:red;">*</span></label><div class="col-sm-10"><select class="form-control"  name="county" id="county" required>';
		$result.='<option value="">İl Seçiniz</option>';

		$query 	= $this->db->query("SELECT * FROM li_county WHERE parent_id=0 ORDER BY value ASC");
		foreach($query->result_array() as $row){
			if($row['id']==$parent_id){
				$result .= '<option value="'.$row['id'].'" selected="selected">'.$row["value"].'</option>';
			}else{
				$result .= '<option value="'.$row['id'].'">'.$row["value"].'</option>';
			}
		}
		$result.='</select></div>';
		if($parent_id==0){return $result;}
		else{
			$result.='<label class="col-sm-2 control-label m-t">İlçe<span style="color:red;">*</span></label><div class="col-sm-10 m-t"><select class="form-control" name="town" id="town" required>';
			$result.='<option value="">İlçe Seçiniz</option>';
			$query 	= $this->db->query("SELECT * FROM li_county WHERE parent_id=".$parent_id." ORDER BY value ASC");
			foreach($query->result_array() as $row){
				if($row['id']==$id){
					$result .= '<option value="'.$row['id'].'" selected="selected">'.$row["value"].'</option>';
				}else{
					$result .= '<option value="'.$row['id'].'">'.$row["value"].'</option>';
				}
			}
			return $result.'</select></div>';
			 
		}

	}

	public function county_multiselect_option($parent_id=0, $id=0){
		
		$result ='<label class="col-sm-2 control-label">İl</label>
				  <div class="col-sm-10">
					<input type="hidden" name="county" value="'.$parent_id.'">
					<select class="form-control" name="counties[]" id="multiselect1" multiple="multiple">';
		$parent_id=explode(',', $parent_id);
		$query 	= $this->db->query("SELECT * FROM li_county WHERE parent_id=0 ORDER BY value ASC");
		foreach($query->result_array() as $row){
			if(array_search($row['id'],$parent_id)!==false){
				$result .= '<option value="'.$row['id'].'" selected="selected">'.$row["value"].'</option>';
			}else{
				$result .= '<option value="'.$row['id'].'">'.$row["value"].'</option>';
			}
		}
		$result.='</select>
				</div>';

		if(count($parent_id)==1 && $parent_id[0]){
			$result.='<label class="control-label col-sm-2 m-t multiselect2">İlçe</label>
					  <div class="col-sm-10 m-t multiselect2">
						<input type="hidden" name="town" value="'.$id.'">
						<select class="form-control" name="towns[]" id="multiselect2" multiple="multiple">';
			$id=explode(',', $id);
			$query 	= $this->db->query("SELECT * FROM li_county WHERE parent_id=".$parent_id[0]." ORDER BY value ASC");
			foreach($query->result_array() as $row){
				if(array_search($row['id'],$id)!==false){
					$result .= '<option value="'.$row['id'].'" selected="selected">'.$row["value"].'</option>';
				}else{
					$result .= '<option value="'.$row['id'].'">'.$row["value"].'</option>';
				}
			}
			$result.= '</select>
					</div>';
		}
		return $result;

	}

}
?>