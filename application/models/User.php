<?php
class User extends CI_model {
	public function selectAll() {
		$status = "1";
		$this->db->where('status', $status);
	return $this->db->get('user')->result();
	}
	public function json() {
		$status = 1;
		$this->datatables->select('id_user,username,status');
		$this->datatables->where('status', $status);
        $this->datatables->from('user');
		$this->datatables->add_column('action', '<a href="#" onclick="ganti($1)" class="table-action-btn h3"><i class="mdi mdi-pencil-box-outline text-success"></i></a> 
		<a href="#" onclick="hapus($1)" class="table-action-btn h3"><i class="mdi mdi-close-box-outline text-danger"></i></a>', 'id_user');
        return $this->datatables->generate();
	}
	public function add() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$akses_id = $this->input->post('akses_id');
		$divisi_id = $this->input->post('divisi_id');
		$chat_id = $this->input->post('chat_id');
		$status = "1";

		$res = implode(",",$akses_id);
		if($divisi_id != NULL) {
			$res1 = implode(",",$divisi_id);
		} else {
			$res1 = "";
		}
		$data = array('username' => $username,'password' => md5($password),
						'akses_id' => $res, 'divisi_id' => $res1, 'chat_id' => $chat_id, 'status' => $status);
		$this->db->insert('user', $data);
		$this->db->insert_id();
		
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$datalog = array('user_id' => $user_id, 'ket' => "Tambah User"." ".$username, 'tgl' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function delete($id){
		$this->db->where('id_user', $id);
		$this->db->update('user', array('status' => "0"));
		
		$this->db->where('id_user', $id);
		$ak = $this->db->get('user')->row();
		
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$datalog = array('user_id' => $user_id, 'ket' => "Delete User"." ".$ak->username, 'tgl' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function edit($id){
		$this->db->where('id_user', $id);
		return $this->db->get('user')->row();
	}
	public function update(){
		$id = $this->input->post('id_user');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$akses_id = $this->input->post('akses_id');
		$divisi_id = $this->input->post('divisi_id');
		$chat_id = $this->input->post('chat_id');
		
		if($divisi_id != NULL) {
			$res1 = implode(",",$divisi_id);
		} else {
			$res1 = "";
		}
		$res = implode(",",$akses_id);
		$user_id = $this->session->userdata('user_id');
		if ($password == NULL) {
			$data = array('username' => $username,
								'akses_id' => $res, 'divisi_id' => $res1, 'chat_id'=> $chat_id);
			$this->db->where('id_user', $id);
			$this->db->update('user', $data);
		} else {
			$data = array('username' => $username,'password' => md5($password),
								'akses_id' => $res, 'divisi_id' => $res1, 'chat_id'=> $chat_id);
			$this->db->where('id_user', $id);
			$this->db->update('user', $data);
		}

		if ($user_id == $id) {
			$this->session->set_userdata('akses_id', $res);
		}
		
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$datalog = array('user_id' => $user_id, 'ket' => "Update User"." ".$username, 'tgl' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function cekpass() {
		$user_id = $this->session->userdata('user_id');
		$password = $this->input->post('lama');
		$this->db->where('password', md5($password));
		$this->db->where('id_user', $user_id);
		$data = $this->db->get('user')->row();
		if($data != NULL) {
			return 1;
		} else {
			return 0;
		}
	}
	public function updatepass() {
		$user_id = $this->session->userdata('user_id');
		$password = $this->input->post('password');
		$data = array('password' => md5($password));
		$this->db->where('id_user', $user_id);
		$this->db->update('user', $data);
	}
}