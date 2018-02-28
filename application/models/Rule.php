<?php
class Rule extends CI_model {
	public function selectAll() {
		$status = "1";
		$this->db->where('status', $status);
    return $this->db->get('rule')->result();
  }
  public function json() {
	  $status = 1;
		$this->datatables->select('id_rule,ket,warna,dari,sampai,status');
		$this->datatables->where('status', $status);
        $this->datatables->from('rule');
		$this->datatables->add_column('action', '<a href="#" onclick="ganti($1)" class="table-action-btn h3"><i class="mdi mdi-pencil-box-outline text-success"></i></a> 
		<a href="#" onclick="hapus($1)" class="table-action-btn h3"><i class="mdi mdi-close-box-outline text-danger"></i></a>', 'id_rule');
        return $this->datatables->generate();
  }
  public function add() {
		$status = "1";
		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');
		$warna = $this->input->post('warna');
		$ket = $this->input->post('ket');
		$note = $this->input->post('note');
		$data = array('ket' => $ket, 'warna' => $warna, 'dari' => $dari, 'sampai' => $sampai, 'note' => $note, 'status' => $status);
		$this->db->insert('rule', $data);
		$this->db->insert_id();
		
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$datalog = array('user_id' => $user_id, 'ket' => "Tambah Peraturan"." ".$ket, 'tgl' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function delete($id){
		$this->db->where('id_rule', $id);
		$this->db->update('rule', array('status' => "0"));
		
		$this->db->where('id_rule', $id);
		$ak = $this->db->get('rule')->row();
		
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$datalog = array('user_id' => $user_id, 'ket' => "Delete Peraturan"." ".$ak->ket, 'tgl' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function edit($id){
		$this->db->where('id_rule', $id);
		return $this->db->get('rule')->row();
	}
	public function update(){
		$id = $this->input->post('id_rule');
		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');
		$warna = $this->input->post('warna');
		$ket = $this->input->post('ket');
		$note = $this->input->post('note');
		$data = array('ket' => $ket, 'warna' => $warna, 'dari' => $dari, 'sampai' => $sampai, 'note' => $note);
		$this->db->where('id_rule', $id);
		$this->db->update('rule', $data);
		
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$datalog = array('user_id' => $user_id, 'ket' => "Update Peraturan"." ".$ket, 'tgl' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function cek($value){
		$this->db->where('id_rule', $value);
		return $this->db->get('rule')->row();
	}
}