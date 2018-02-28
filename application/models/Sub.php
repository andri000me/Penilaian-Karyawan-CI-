<?php
class Sub extends CI_model {
	public function selectAll() {
		$status = "1";
		$this->db->select('*');
		$this->db->from('sub');
		$this->db->join('kategori', 'sub.kategori_id = kategori.id_kategori');
		$this->db->where('sub.status', $status);
    return $this->db->get()->result();
  }
  public function json() {
	  $status = 1;
		$this->datatables->select('id_sub,sub,jumlah');
		$this->datatables->join('kategori', 'sub.kategori_id = kategori.id_kategori');
		$this->datatables->where('sub.status', $status);
        $this->datatables->from('sub');
		$this->datatables->select('nama');
		$this->datatables->add_column('action', '<a href="#" onclick="ganti($1)" class="table-action-btn h3"><i class="mdi mdi-pencil-box-outline text-success"></i></a> 
		<a href="#" onclick="hapus($1)" class="table-action-btn h3"><i class="mdi mdi-close-box-outline text-danger"></i></a>', 'id_sub');
        $this->db->order_by('id_sub', "desc");
		return $this->datatables->generate();
  }
  public function add() {
		$status = "1";
		$sub = $this->input->post('sub');
		$divisi_id = $this->input->post('divisi_id');
		$jumlah = $this->input->post('jumlah');
		$kategori_id = $this->input->post('kategori_id');
		if($divisi_id != NULL) {
			$res1 = implode(",",$divisi_id);
		} else {
			$res1 = "";
		}
		$data = array('sub' => $sub, 'jumlah' => $jumlah, 'kategori_id' => $kategori_id, 'divisi_id' => $res1, 'status' => $status);
		$this->db->insert('sub', $data);
		$this->db->insert_id();
		
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$datalog = array('user_id' => $user_id, 'ket' => "Tambah Subkategori"." ".$sub, 'tgl' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function delete($id){
		$this->db->where('id_sub', $id);
		$this->db->update('sub', array('status' => "0"));
		
		$this->db->where('id_sub', $id);
		$ak = $this->db->get('sub')->row();
		
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$datalog = array('user_id' => $user_id, 'ket' => "Delete Subkategori"." ".$ak->sub, 'tgl' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function edit($id){
		$this->db->where('id_sub', $id);
		return $this->db->get('sub')->row();
	}
	public function update(){
		$id = $this->input->post('id_sub');
		$sub = $this->input->post('sub');
		$jumlah = $this->input->post('jumlah');
		$kategori_id = $this->input->post('kategori_id');
		$divisi_id = $this->input->post('divisi_id');
		if($divisi_id != NULL) {
			$res1 = implode(",",$divisi_id);
		} else {
			$res1 = "";
		}
		$data = array('sub' => $sub, 'jumlah' => $jumlah, 'kategori_id' => $kategori_id, 'divisi_id' => $res1);
		$this->db->where('id_sub', $id);
		$this->db->update('sub', $data);
		
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$datalog = array('user_id' => $user_id, 'ket' => "Update Subkategori"." ".$sub, 'tgl' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function kategori() {
		$id = $this->input->post('kategori_id');
		$this->db->where('kategori_id', $id);
		return $this->db->get('sub')->result();
	}
}
