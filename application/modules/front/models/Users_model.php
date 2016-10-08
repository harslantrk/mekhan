<?  
	class Users_model extends CI_Model{

		public $StableList;

		function __construct(){
			
			parent::__construct(); 
			
			$this->StableList = $this->session->userdata('stable_list');
			$this->load->model('settings_model');
			$this->load->helper('security');
		}
		public function search_in_service(){
			$search_word=$this->security->xss_clean($this->input->get('ara'));
			if($this->input->get('sayfa'))
			{
				$sayfa=$this->security->xss_clean($this->input->get('sayfa'));
			}
			else
			{
				$sayfa=1;
			}
			$limit_sentence=NULL;
			$limit_sentence.=' limit ';
			$perPage=12;
			if($sayfa==0)
			{
				$sayfa=1;
			}
			elseif($sayfa==1)
			{
				$start=0;
			}
			elseif($sayfa>1)
			{
				$start=($perPage*$sayfa)-1;
			}
			$limit_sentence.=$start.', '.$perPage;
			$query = $this->db->query("select li_services.id as service_id, li_services.member_id, li_services.county as county_service, li_services.town as town_service, li_services.cat_id, (select title from li_categories where id=li_services.cat_id) as cat_name, li_services.title, li_services.details, li_services.tel, li_members.firm, li_members.fullname, li_members.county as county_member, (select value from li_county where id=li_members.county) as county_name_member, li_members.town as town_member, (select value from li_county where id=li_members.town) as town_name_member, li_members.img from li_services, li_members where li_members.id=li_services.member_id and li_members.status = 1 and li_services.status = 1 and	( li_members.fullname LIKE '%".$search_word."%' or li_services.`title` LIKE '%".$search_word."%' or	li_services.`details` LIKE '%".$search_word."%' or li_services.`id` = '".$search_word."' or li_members.`id` = '".$search_word."' ) order by li_services.id desc ".$limit_sentence);
			$result=$query->result_array();
			$data=array();
			$data_row=array();
			foreach($result as $result_one)
			{
				$data_row['service_id']=$result_one['service_id'];
				$data_row['member_id']=$result_one['member_id'];
				$data_row['cat_id']=$result_one['cat_id'];
				$data_row['cat_name']=$result_one['cat_name'];
				$ask_cat=$this->db->query("select top_id from li_categories where id='".$data_row['cat_id']."'");
				$ask_cat_result=$ask_cat->row_array();
				if($ask_cat_result['top_id']==0)
				{
					$data_row['top_cat_name']=$result_one['cat_name'];
				}
				else
				{
					$ask_cat_name=$this->db->query("select title from li_categories where id='".$ask_cat_result['top_id']."'");
					$ask_cat_name_result=$ask_cat_name->row_array();
					$data_row['top_cat_name']=$ask_cat_name_result['title'];
				}
				$data_row['title']=$result_one['title'];
				$data_row['details']=$result_one['details'];
				$data_row['tel']=$result_one['tel'];
				$data_row['firm']=$result_one['firm'];
				$data_row['full_name']=$result_one['fullname'];
				$data_row['county_member']=$result_one['county_member'];
				$data_row['town_member']=$result_one['town_member'];
				$data_row['county_name_member']=$result_one['county_name_member'];
				$data_row['town_name_member']=$result_one['town_name_member'];
				$data_county_service_name=NULL;
				$data_town_service_name=NULL;
				if($result_one['county_service']!='')
				{
					if(stristr($result_one['county_service'], ','))
					{
						$result_one_county_service=explode(',', $result_one['county_service']);
						foreach($result_one_county_service as $result_one_county_service_one)
						{
							$result_one_county_service_query=$this->db->query("select value from li_county where id='$result_one_county_service_one'");
							$result_one_county_service_result=$result_one_county_service_query->row_array();
							if($data_county_service_name==''){$data_county_service_name=$result_one_county_service_result['value'];}else{$data_county_service_name.='|'.$result_one_county_service_result['value'];}
						}
					}
					else
					{
						$result_one_county_service_query=$this->db->query("select value from li_county where id='".$result_one['county_service']."'");
						$result_one_county_service_result=$result_one_county_service_query->row_array();
						if($data_county_service_name==''){$data_county_service_name=$result_one_county_service_result['value'];}else{$data_county_service_name.='|'.$result_one_county_service_result['value'];}
						if(stristr($result_one['town_service'], ','))
						{
							$result_one_town_service=explode(',', $result_one['town_service']);
							foreach($result_one_town_service as $result_one_town_service_one)
							{
								$result_one_town_service_query=$this->db->query("select value from li_county where id='$result_one_town_service_one'");
								$result_one_town_service_result=$result_one_town_service_query->row_array();
								if($data_town_service_name==''){$data_town_service_name=$result_one_town_service_result['value'];}else{$data_town_service_name.='|'.$result_one_town_service_result['value'];}
							}
						}
						else
						{
							$result_one_town_service_query=$this->db->query("select value from li_county where id='".$result_one['town_service']."'");
							$result_one_town_service_result=$result_one_town_service_query->row_array();
							if($data_town_service_name==''){$data_town_service_name=$result_one_town_service_result['value'];}else{$data_town_service_name.='|'.$result_one_town_service_result['value'];}
						}
					}
				}
				$data_row['county_name_service']=$data_county_service_name;
				$data_row['town_name_service']=$data_town_service_name;
				$data_county_service_name=NULL;
				$data_town_service_name=NULL;
				unset($data_county_service_name);
				unset($data_town_service_name);
				$data_row['img']=$result_one['img'];
				$data[]=$data_row;
				$data_row=NULL;
				unset($data_row);
			}
			return $data;
		}
		public function search_in_service_total(){
			$search_word=$this->security->xss_clean($this->input->get('ara'));
			if($this->input->get('sayfa'))
			{
				$sayfa=$this->security->xss_clean($this->input->get('sayfa'));
			}
			else
			{
				$sayfa=1;
			}
			$queryTotal=$this->db->query("select li_services.id from li_services, li_members where li_members.id=li_services.member_id and li_members.status = 1 and li_services.status = 1 and	( li_members.fullname LIKE '%".$search_word."%' or li_services.`title` LIKE '%".$search_word."%' or	li_services.`details` LIKE '%".$search_word."%' or li_services.`id` = '".$search_word."' or li_members.`id` = '".$search_word."' ) order by li_services.id desc");
			$num = $queryTotal->num_rows();
			return $num;
		}
		public function search_in_service_possible_pages(){
			$search_word=$this->security->xss_clean($this->input->get('ara'));
			$queryTotal=$this->db->query("select li_services.id from li_services, li_members where li_members.id=li_services.member_id and li_members.status = 1 and li_services.status = 1 and	( li_members.fullname LIKE '%".$search_word."%' or li_services.`title` LIKE '%".$search_word."%' or	li_services.`details` LIKE '%".$search_word."%' or li_services.`id` = '".$search_word."' or li_members.`id` = '".$search_word."' ) order by li_services.id desc");
			$num = $queryTotal->num_rows();
			$perPage=12;
			$remain=$num%$perPage;
			$result=($num-$remain)/$perPage;
			$possiblePages=0;
			if($remain==0)
			{
				$possiblePages=$result;
			}
			else
			{
				$possiblePages=$result+1;
			}
			return $possiblePages;
		}
		public function ask_member_for_signin(){
			$email=$this->input->post('form_login_email');
			$password=md5($this->input->post('form_login_password'));
			$query = $this->db->query("select * from li_members where email='".$email."' and password='".$password."' and `status`=1");
			if($query->num_rows()>0)
			{
				$row=$query->row_array();
				return $row['id'];
			}
			else
			{
				return false;
			}
		}
		public function forgot_my_password_change_update()
		{
			$member_id=$this->security->xss_clean($this->input->get('member_id'));
			$token=$this->security->xss_clean($this->input->get('token'));
			$password=$this->security->xss_clean($this->input->post('form_forgot_password_1'));
			$askRecord=$this->db->query("select * from li_remember, li_members where li_remember.user_id=li_members.id and user_id='".$member_id."' and token='".$token."' and li_remember.times>NOW() order by li_remember.id desc limit 1");
			$askRecordNum=$askRecord->num_rows();
			$delete=$this->db->query("delete from li_remember where user_id='".$member_id."' and token='".$token."'");
			$update=$this->db->query("update li_members set password='".md5($password)."' where id='".$member_id."'");
			if($update==true)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function ask_create_password_auth()
		{
			$member_id=$this->security->xss_clean($this->input->get('member_id'));
			$token=$this->security->xss_clean($this->input->get('token'));
			$query=$this->db->query("select * from li_remember where user_id='".$member_id."' and token='".$token."' and times>NOW() order by id desc limit 1");
			$queryNum=$query->num_rows();
			if($queryNum!=0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function forgot_my_password()
		{
			$email=$this->input->post('form_forgot_email');
			$askMember=$this->db->query("select id, fullname from li_members where email='".$email."' and `status`=1 ");
			$askMemberNum=$askMember->num_rows();
			if($askMemberNum!=1)
			{
				return 0;
			}
			$askMember_id=$askMember->row_array();
			$askRecord=$this->db->query("select * from li_remember where email='".$email."' and user_id=".$askMember_id['id']." and times>NOW() order by id desc limit 1");
			$askRecordNum=$askRecord->num_rows();
			$askRecordInfo=$askRecord->row_array();
			if($askRecordNum>0)
			{
				$times = date('Y-m-d H:i:s',strtotime('+1 day',time()));
				$key   = $askRecordInfo['token'];
			}
			else
			{
				$times = date('Y-m-d H:i:s',strtotime('+1 day',time()));
				$key   = md5('Limitless'.time());
				$data  = array(
					'user_id' 	=> $askMember_id['id'],
					'email' 	=> $this->input->post('form_forgot_email'),
					'token' 	=> $key,
					'times' 	=> $times,
					'ip'		=> $this->input->ip_address()
				);
				$insert = $this->db->insert('li_remember',$data);
			}
			$mesaj  = "";
			$mesaj .= "<b>Merhaba ".$askMember_id['fullname'].",</b><br /><br />";
			$mesaj .= "Şifreni unuttuğun için sana bir şifre yenileme bağlantısı gönderiyoruz.<br /><br />";
			$mesaj .= "Eğer tıklayamıyorsanız kopyalayıp tarayıcının adres satırına yapıştırıp gidebilirsiniz.<br /><br />";
			$mesaj .= "<b>Lütfen Aşağıdaki Bağlantıya Tıkla. <br /><br />";
			$mesaj .= "<a href='".base_url()."sifre-olusturma?member_id=".$askMember_id['id']."&token=".$key."'>ŞİFRENİZİ YENİLEMEK İÇİN LÜTFEN BURAYA TIKLAYINIZ</a><br /><br />";
			$mesaj .= "Eğer bu talebi siz oluşturmadıysanız lütfen bu maili dikkate almayınız.<br /><br />";
			require("./assets/mail/mail-class/class.phpmailer.php");
			require("./assets/mail/mail-class/class.smtp.php");
			$data_settings	= $this->settings_model->get_data_all();
			$data_settings=$data_settings[0];
			$mail=new PHPMailer();
			$mail->IsSMTP();
			$mail->IsHTML(true);
			$mail->setLanguage('tr');
			$mail->Host 	 = $data_settings['smtp_host'];
			$mail->SMTPAuth  = true;
			$mail->SMTPSecure= 'tls';
			$mail->Port 	 = 587;
			$mail->Username  = $data_settings['smtp_email'];
			$mail->Password  = $data_settings['smtp_pass'];
			$mail->FromName  = "Uzmani.kim";
			$mail->From 	 = $data_settings['smtp_email'];
			$mail->Subject 	 = 'Uzmani.kim Şifre Hatırlatma Servisi';
			$mail->Body    	 = $mesaj;
			$mail->AddAddress($this->input->post('form_forgot_email'), $askMember_id['fullname']);
			$mail->Send();
			return 1;
		}
		public function ask_member_for_activate($_member_id, $_activation_code){
			$member_id=$_member_id;
			$activation_code=$_activation_code;
			$query = $this->db->query("select * from li_remember where user_id='".$member_id."' and token='".$activation_code."' and times>NOW() order by id desc limit 1");
			if($query->num_rows()>0)
			{
				$row=$query->row_array();
				$updateActivation=$this->db->query("delete from li_remember where id='".$row['id']."'");
				$updateMemberStatus=$this->db->query("update li_members set `status`='1' where id='$member_id'");
				return true;
			}
			else
			{
				return false;
			}
		}
		public function update_member($member_id){
			if(($this->input->post('password_1')!='' && $this->input->post('password_2')!='') && ($this->input->post('password_1')==$this->input->post('password_2')))
			{
				$sql_sentence="update li_members set `firm`='".$this->input->post('firm')."', `fullname`='".$this->input->post('fullname')."', `email`='".$this->input->post('email')."', `password`='".md5($this->input->post('password_1'))."', `tel`='".$this->input->post('tel')."', `gsm`='".$this->input->post('gsm')."', `county`='".$this->input->post('county')."', `town`='".$this->input->post('town')."', `address`='".$this->input->post('address')."' where id='".$member_id."' ";
			}
			else
			{
				$sql_sentence="update li_members set `firm`='".$this->input->post('firm')."', `fullname`='".$this->input->post('fullname')."', `email`='".$this->input->post('email')."', `tel`='".$this->input->post('tel')."', `gsm`='".$this->input->post('gsm')."', `county`='".$this->input->post('county')."', `town`='".$this->input->post('town')."', `address`='".$this->input->post('address')."' where id='".$member_id."' ";
			}
			$query=$this->db->query($sql_sentence);
			if($query==true)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function insert_member(){
			$data=array('fullname'		 		=>$this->input->post('form_register_name_surname'),
						'email'  			 	=>$this->input->post('form_register_email'),
						'password'  			=>md5($this->input->post('form_register_password_1')),
						'ip'					=>$this->input->ip_address()
						);
			$this->db->insert('li_members',$data);
			if($this->db->affected_rows()!= 1)
			{
				return false;
			}
			else
			{
				$query = $this->db->query("select * from li_members where email='".$this->input->post('form_register_email')."'");
				$row   = $query->row_array();
				$times = date('Y-m-d H:i:s',strtotime('+1 day',time()));
				$key   = md5('Limitless'.time());
				$data  = array(
					'user_id' 	=> $row["id"],
					'email' 	=> $this->input->post('form_register_email'),
					'token' 	=> $key,
					'times' 	=> $times,
					'ip'		=> $this->input->ip_address()
				);
				$insert = $this->db->insert('li_remember',$data);
				$mesaj  = "";
				$mesaj .= "<b>Merhaba ".$this->input->post('form_register_name_surname').",</b><br /><br />";
				$mesaj .= "<b>Aramıza hoşgeldin.</b><br /><br />";
				$mesaj .= "<b>Portalımızı daha etkili ve kullanışlı kullanabilmen için E-Posta adresini onaylaman gerekiyor.</b> <br /><br />";
				$mesaj .= "<b>Lütfen Aşağıdaki Bağlantıya Tıkla. <br /><br />";
				$mesaj .= "<a href='".base_url()."hesap-aktivasyonu/?member_id=".$row["id"]."&activation_code=".$key."'>HESABINIZI AKTİVE ETMEK İÇİN LÜTFEN BURAYA TIKLAYINIZ.</a><br /><br />";
				$mesaj .= "Eğer bağlantıya tıklamada sorun yaşıyorsanız aşağıdaki kodu da kullanabilirsiniz. <br /><br />";
				$mesaj .= "------------------------------------------------------------<br /><br />";
				$mesaj .= "-".$key."-<br /><br />";
				$mesaj .= "------------------------------------------------------------<br /><br />";
				require("./assets/mail/mail-class/class.phpmailer.php");
				require("./assets/mail/mail-class/class.smtp.php");
				$data_settings	= $this->settings_model->get_data_all();
				$data_settings=$data_settings[0];
				$mail=new PHPMailer();
				$mail->IsSMTP();
				$mail->IsHTML(true);
				$mail->setLanguage('tr');
				$mail->Host 	 = $data_settings['smtp_host'];
				$mail->SMTPAuth  = true;
				$mail->SMTPSecure= 'tls';
				$mail->Port 	 = 587;
				$mail->Username  = $data_settings['smtp_email'];
				$mail->Password  = $data_settings['smtp_pass'];
				$mail->FromName  = "Uzmani.kim";
				$mail->From 	 = $data_settings['smtp_email'];
				$mail->Subject 	 = 'Uzmani.kim Hesap Aktivasyonu';
				$mail->Body    	 = $mesaj;
				$mail->AddAddress($this->input->post('form_register_email'), $this->input->post('form_register_name_surname'));
				$mail->Send();
				return $row["id"];
			}
		}
		public function ask_member_code_email()
		{
			$member_id=$this->session->userdata('member')['id'];
			$askStatus=$this->db->query("select `status` from li_members where id=$member_id");
			$result=$askStatus->result_array();
			if($result[0]['status']==1)
			{
				return 1;
			}
			else
			{
				$query = $this->db->query("select * from li_remember where user_id='".$member_id."' and token='".$this->input->post('code_eposta')."' and times>NOW() order by id desc limit 1");
				if($query->num_rows()>0)
				{
					$row=$query->row_array();
					$updateActivation=$this->db->query("delete from li_remember where user_id='member_id'");
					$updateMemberStatus=$this->db->query("update li_members set `status`='1' where id='$member_id'");
					return 2;
				}
				else
				{
					$query = $this->db->query("select * from li_members where id='".$member_id."'");
					$row   = $query->row_array();
					$times = date('Y-m-d H:i:s',strtotime('+1 day',time()));
					$key   = md5('Limitless'.time());
					$data  = array(
						'user_id' 	=> $member_id,
						'email' 	=> $row['id'],
						'token' 	=> $key,
						'times' 	=> $times,
						'ip'		=> $this->input->ip_address()
					);
					$insert = $this->db->insert('li_remember',$data);
					$mesaj  = "";
					$mesaj .= "<b>Merhaba ".$row['fullname'].",</b><br /><br />";
					$mesaj .= "<b>Portalımızı daha etkili ve kullanışlı kullanabilmen için E-Posta adresini onaylaman gerekiyor.</b> <br /><br />";
					$mesaj .= "<b>Lütfen Aşağıdaki Bağlantıya Tıkla. <br /><br />";
					$mesaj .= "<a href='".base_url()."hesap-aktivasyonu/?member_id=".$row["id"]."&activation_code=".$key."'>HESABINIZI AKTİVE ETMEK İÇİN LÜTFEN BURAYA TIKLAYINIZ.</a><br /><br />";
					$mesaj .= "Eğer bağlantıya tıklamada sorun yaşıyorsanız aşağıdaki kodu da kullanabilirsiniz. <br /><br />";
					$mesaj .= "------------------------------------------------------------<br /><br />";
					$mesaj .= "-".$key."-<br /><br />";
					$mesaj .= "------------------------------------------------------------<br /><br />";
					require("./assets/mail/mail-class/class.phpmailer.php");
					require("./assets/mail/mail-class/class.smtp.php");
					$data_settings	= $this->settings_model->get_data_all();
					$data_settings=$data_settings[0];
					$mail=new PHPMailer();
					$mail->IsSMTP();
					$mail->IsHTML(true);
					$mail->setLanguage('tr');
					$mail->Host 	 = $data_settings['smtp_host'];
					$mail->SMTPAuth  = true;
					$mail->SMTPSecure= 'tls';
					$mail->Port 	 = 587;
					$mail->Username  = $data_settings['smtp_email'];
					$mail->Password  = $data_settings['smtp_pass'];
					$mail->FromName  = "Uzmani.kim";
					$mail->From 	 = $data_settings['smtp_email'];
					$mail->Subject 	 = 'Uzmani.kim Hesap Aktivasyonu';
					$mail->Body    	 = $mesaj;
					$mail->AddAddress($row['email'], $row['fullname']);
					$mail->Send();
					return 3;
				}
			}
		}
		public function send_code_email_confirmation()
		{
			$member_id=$this->session->userdata('member')['id'];
			$askStatus=$this->db->query("select `status` from li_members where id=$member_id");
			$result=$askStatus->result_array();
			if($result[0]['status']==1)
			{
				return 1;
			}
			else
			{
				$query = $this->db->query("select * from li_members where id='".$member_id."'");
				$row   = $query->row_array();
				$times = date('Y-m-d H:i:s',strtotime('+1 day',time()));
				$key   = md5('Limitless'.time());
				$data  = array(
					'user_id' 	=> $member_id,
					'email' 	=> $row['id'],
					'token' 	=> $key,
					'times' 	=> $times,
					'ip'		=> $this->input->ip_address()
				);
				$insert = $this->db->insert('li_remember',$data);
				$mesaj  = "";
				$mesaj .= "<b>Merhaba ".$row['fullname'].",</b><br /><br />";
				$mesaj .= "<b>Portalımızı daha etkili ve kullanışlı kullanabilmen için E-Posta adresini onaylaman gerekiyor.</b> <br /><br />";
				$mesaj .= "<b>Lütfen Aşağıdaki Bağlantıya Tıkla. <br /><br />";
				$mesaj .= "<a href='".base_url()."hesap-aktivasyonu/?member_id=".$row["id"]."&activation_code=".$key."'>HESABINIZI AKTİVE ETMEK İÇİN LÜTFEN BURAYA TIKLAYINIZ.</a><br /><br />";
				$mesaj .= "Eğer bağlantıya tıklamada sorun yaşıyorsanız aşağıdaki kodu da kullanabilirsiniz. <br /><br />";
				$mesaj .= "------------------------------------------------------------<br /><br />";
				$mesaj .= "-".$key."-<br /><br />";
				$mesaj .= "------------------------------------------------------------<br /><br />";
				require("./assets/mail/mail-class/class.phpmailer.php");
				require("./assets/mail/mail-class/class.smtp.php");
				$data_settings	= $this->settings_model->get_data_all();
				$data_settings=$data_settings[0];
				$mail=new PHPMailer();
				$mail->IsSMTP();
				$mail->IsHTML(true);
				$mail->setLanguage('tr');
				$mail->Host 	 = $data_settings['smtp_host'];
				$mail->SMTPAuth  = true;
				$mail->SMTPSecure= 'tls';
				$mail->Port 	 = 587;
				$mail->Username  = $data_settings['smtp_email'];
				$mail->Password  = $data_settings['smtp_pass'];
				$mail->FromName  = "Uzmani.kim";
				$mail->From 	 = $data_settings['smtp_email'];
				$mail->Subject 	 = 'Uzmani.kim Hesap Aktivasyonu';
				$mail->Body    	 = $mesaj;
				$mail->AddAddress($row['email'], $row['fullname']);
				$mail->Send();
				return 2;
			}
		}
		public function sosyal_medya_hesaplarim_update()
		{
			$member_id=$this->session->userdata('member')['id'];
			$social_media_array=array();
			$social_media_array['facebook']=$this->input->post('facebook');
			$social_media_array['twitter']=$this->input->post('twitter');
			$social_media_array['instagram']=$this->input->post('instagram');
			$social_media_json=json_encode($social_media_array);
			$query=$this->db->query("update li_members set social_media='$social_media_json' where id=$member_id");
			return true;
		}
		public function get_status()
		{
			$member_id=$this->session->userdata('member')['id'];
			$query=$this->db->query("select `status` from li_members where id=$member_id");
			$result=$query->result_array();
			return $result[0]['status'];
		}
		public function get_city_list_for_profile_edit($id){
			$query=$this->db->query("select * from li_county where parent_id='0' order by id asc");
			$result=$query->result_array();
			$data=NULL;
			foreach($result as $result_one)
			{
				if($id==$result_one['id'])
				{
					$data.='<option value="'.$result_one['id'].'" selected="selected">'.$result_one['value'].'</option>';
				}
				else
				{
					$data.='<option value="'.$result_one['id'].'">'.$result_one['value'].'</option>';
				}
			}
			return $data;
		}
		public function get_town_list_for_profile_edit($county_id, $town_id){
			$query=$this->db->query("select * from li_county where parent_id='".$county_id."' order by id asc");
			$result=$query->result_array();
			$data=NULL;
			foreach($result as $result_one)
			{
				if($town_id==$result_one['id'])
				{
					$data.='<option value="'.$result_one['id'].'" selected="selected">'.$result_one['value'].'</option>';
				}
				else
				{
					$data.='<option value="'.$result_one['id'].'">'.$result_one['value'].'</option>';
				}
			}
			return $data;
		}
		public function get_data_member($member_id){
			$query=$this->db->query("select * from li_members where id='".$member_id."'");
			$result=$query->result_array();
			return $result[0];
		}
	}	
?>