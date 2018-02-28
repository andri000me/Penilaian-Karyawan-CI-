<?php
class Surat extends CI_model {
	public function selectAll() {
    return $this->db->get('email')->row();
  }
	public function edit($id){
		$this->db->where('id_email', $id);
		return $this->db->get('email')->row();
	}
	public function update(){
		$id = $this->input->post('id_email');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$data = array('email' => $email, 'password' => $password);
		$this->db->where('id_email', $id);
		$this->db->update('email', $data);
		
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$datalog = array('user_id' => $user_id, 'ket' => "Set Email"." ".$email, 'tgl' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
}
