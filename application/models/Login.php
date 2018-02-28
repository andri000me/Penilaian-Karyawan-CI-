<?php
class Login extends CI_model {
	function log() {
		$status = 1;
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = array('username'=>$username, 'password'=>md5($password), 'status'=> $status);
		$cek1 = $this->db->get_where('user', $data)->num_rows();
		if($cek1 > 0) {
			$cek = $this->db->get_where('user', $data)->row();
			$data_session = array(
						'user_id' => $cek->id_user,
						'username' => $cek->username,
						'akses_id' => $cek->akses_id,
						'divisi_id' => $cek->divisi_id,
						'status' => "login" );
			$this->session->set_userdata($data_session);
		}
	}
}