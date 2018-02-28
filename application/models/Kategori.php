<?php
class Kategori extends CI_model {
	public function selectAll() {
		$status = "1";
		$this->db->where('status', $status);
		$this->db->order_by('nama', "asc");
    return $this->db->get('kategori')->result();
  }
  public function json() {
	  $status = 1;
		$this->datatables->select('id_kategori,nama,status');
		$this->datatables->where('status', $status);
        $this->datatables->from('kategori');
		$this->datatables->add_column('action', '<a href="#" onclick="ganti($1)" class="table-action-btn h3"><i class="mdi mdi-pencil-box-outline text-success"></i></a> 
		<a href="#" onclick="hapus($1)" class="table-action-btn h3"><i class="mdi mdi-close-box-outline text-danger"></i></a>', 'id_kategori');
        return $this->datatables->generate();
  }
  public function add() {
		$status = "1";
		$nama = $this->input->post('nama');
		$warna = $this->input->post('warna');
		$data = array('nama' => $nama, 'warna' => $warna, 'status' => $status);
		$this->db->insert('kategori', $data);
		$this->db->insert_id();
		
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$datalog = array('user_id' => $user_id, 'ket' => "Tambah Kategori"." ".$nama, 'tgl' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function delete($id){
		$this->db->where('id_kategori', $id);
		$this->db->update('kategori', array('status' => "0"));
		
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$datalog = array('user_id' => $user_id, 'ket' => "Delete Kategori"." ".$ak->nama, 'tgl' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function edit($id){
		$this->db->where('id_kategori', $id);
		return $this->db->get('kategori')->row();
	}
	public function update(){
		$id = $this->input->post('id_kategori');
		$nama = $this->input->post('nama');
		$warna = $this->input->post('warna');
		$data = array('nama' => $nama, 'warna' => $warna);
		$this->db->where('id_kategori', $id);
		$this->db->update('kategori', $data);
		
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$datalog = array('user_id' => $user_id, 'ket' => "Update Kategori"." ".$nama, 'tgl' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
}
