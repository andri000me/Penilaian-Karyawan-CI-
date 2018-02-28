<?php
class Akses extends CI_model {
	public function selectAll() {
		$status = "1";
		$this->db->where('status', $status);
		$this->db->order_by('akses', "asc");
    return $this->db->get('akses')->result();
  }
  public function json() {
	  $status = 1;
		$this->datatables->select('id_akses,akses,status');
		$this->datatables->where('status', $status);
        $this->datatables->from('akses');
		$this->datatables->add_column('action', '<a href="#" onclick="ganti($1)" class="table-action-btn h3"><i class="mdi mdi-pencil-box-outline text-success"></i></a> 
		<a href="#" onclick="hapus($1)" class="table-action-btn h3"><i class="mdi mdi-close-box-outline text-danger"></i></a>', 'id_akses');
        return $this->datatables->generate();
  }
  public function add() {
		$status = "1";
		$akses = $this->input->post('akses');
		$data = array('akses' => $akses, 'status' => $status);
		$this->db->insert('akses', $data);
		$this->db->insert_id();
		
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$datalog = array('user_id' => $user_id, 'ket' => "Tambah Akses"." ".$akses, 'tgl' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();

	}
	public function delete($id){
		$this->db->where('id_akses', $id);
		$this->db->update('akses', array('status' => "0"));
		
		$this->db->where('id_akses', $id);
		$ak = $this->db->get('akses')->row();
		
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$datalog = array('user_id' => $user_id, 'ket' => "Delete Akses"." ".$ak->akses, 'tgl' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function edit($id){
		$this->db->where('id_akses', $id);
		return $this->db->get('akses')->row();
	}
	public function update(){
		$id = $this->input->post('id_akses');
		$akses = $this->input->post('akses');
		$data = array('akses' => $akses);
		$this->db->where('id_akses', $id);
		$this->db->update('akses', $data);
		
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$datalog = array('user_id' => $user_id, 'ket' => "Update Akses"." ".$akses, 'tgl' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function cek($value){
		$this->db->where('id_akses', $value);
		return $this->db->get('akses')->row();
	}
}
