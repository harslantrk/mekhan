<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	function __construct(){
			
		parent::__construct();

	}

	public function login_control()
	{

		if(!$this->session->userdata('id')){ 
			redirect(base_url().'admin'); 
		}else{ 
			return true; 
		}
	}

	public function login_up()
	{

		$user=$this->input->post('username');
		$pass=$this->input->post('password');
		$query=$this->db->query("select id, username, email, fullname, tel, img from li_users where ( username='".$user."' or  email='".$user."' ) and password='".$pass."' and status=1");
		
		if($query->num_rows()>0){

			$data = $query->row_array();
			$this->session->set_userdata($data);
			$this->authentication($user_id=$data['id']);
			set_cookie('ckf_role','admin',2592000*10); // 10 ay
			if($this->input->post('remember_me')){
				set_cookie('id',$data['id'],2592000*10); // 10 ay
			}
			$this->log_model->insert_log('Giriş Yapıldı ','login');
			return $data;
		}
		else{
			$this->log_model->insert_log('Giriş Başarısız ','login');
			return false;
		}
		
		
	}

	
	public function cookie_login_up()
	{

		$query=$this->db->query("select id, username, email, fullname, tel, img from li_users where id='".get_cookie('id')."' and status=1");
		
		if($query->num_rows()>0){
			$data = $query->row_array();
			$this->session->set_userdata($data);
			$this->authentication($user_id=$data['id']);
			set_cookie('ckf_role','admin',2592000*10); // 10 ay
			set_cookie('id',$data['id'],2592000*10); // süre yenileme
			$this->log_model->insert_log('Giriş Yapıldı ','login');
			return $data;
		}
		else{
			$this->log_model->insert_log('Giriş Başarısız ','login');
			return false;
		}
	}

	public function authentication($user_id=false)
	{
		$query=$this->db->query("select * from li_auth where user_id='".$user_id."' ");
		if($query->num_rows()>0){
			$data = $query->row_array();
			$data_result=array();
			foreach($data as $key=>$au){
				$au=explode(',', $au);
				$data_result[$key]=$au;
			}
			$this->session->set_userdata('auth',$data_result);
		}
	}

	public function password_reset(){	

		$email	 	= $this->security->xss_clean($this->input->post('email'));
		$query 		= $this->db->query("select * from li_users where email='".$email."'");
		
		if($query->num_rows()==1){
			
			$row   = $query->row_array();
			$times = date('Y-m-d H:i:s',strtotime('+1 day',time()));
			$key   = md5('Limitless'.time());
			$data  = array(
				'user_id' 	=> $row["id"],
				'email' 	=> $email,
				'token' 	=> $key,
				'times' 	=> $times,
				'ip'		=> $this->input->ip_address()
			);
			
			$insert = $this->db->insert('li_remember',$data);
			$mesaj  = "";
			$mesaj .= "Sayın ".$row["fullname"].";<br /><br />";
			$mesaj .= "Aşağıdaki bağlantıyı tıklayarak parola sıfırlama işlemini gerçekleştirebilirsiniz. <br /><br />";
			$mesaj .= "Kullanıcı Adınız : ".$row["username"]."<br /><br />";
			$mesaj .= '<a href="'.base_url().'admin/password_reset/key/'.$key.'" target="_blank" title="Password Reset" style="text-decoration:none;color:blue;font-size:14px;">Parola Sıfırlamak için tıklayınız</a>';
			
			require("./assets/mail/mail-class/class.phpmailer.php");
			require("./assets/mail/mail-class/class.smtp.php");

			$SenderName	="Limitless Panel";
			$SenderMail	=$this->session->userdata("settings")["smtp_email"];
			$Password	=$this->session->userdata("settings")["smtp_pass"];
			$mail=new PHPMailer();
			$mail->IsSMTP();
			$mail->IsHTML(true);
			//$mail->setLanguage('tr');
			$mail->Host 	 = $this->session->userdata("settings")["smtp_host"];
			$mail->SMTPAuth  = true;
			$mail->SMTPSecure= 'tls'; // ssl or tls
			$mail->Port 	 = 587;
			//$mail->SMTPDebug  = 2;   
			$mail->Username  = $SenderMail;
			$mail->Password  = $Password;
			$mail->FromName  = $SenderName;
			$mail->From 	 = $SenderMail;
			$mail->Subject 	 = 'Parola Sifirlama';					
			$mail->Body    	 = $mesaj;
			$mail->AddAddress($email);
			//$mail->addBCC("admin@limitsizbilgi.com", "Yönetim");
			
			if(!$mail->Send()){
				return 0; // E-mail Gönderilemedi
				//echo 'Mailer Error: ' . $mail->ErrorInfo;	
			}
			else{
				return 1; // Gönderildi
			}
		}
		else{
			return 2; // Böyle bir üyelik yoktur
		}
		
		

	}

	public function key_control($key=false)
	{
		$this->db->where("NOW() > times");
		$this->db->delete('li_remember');

		$query=$this->db->query("select user_id from li_remember where token='".$key."' and NOW() < times ");
		if($query->num_rows()>0){
			$data = $query->row_array();
			return $data['user_id'];
		}else{
			return false;
		}	
	}

	public function key_delete($key=false)
	{
		$this->db->where(" token='".$key."' ");
		$this->db->delete('li_remember');
		return ($this->db->affected_rows() != 1 ) ? false:true;	
	}

	public function update_password($data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('li_users',$data);
		return ($this->db->affected_rows() != 1 ) ? false:true;
	}



}?>