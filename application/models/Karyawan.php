<?php
class Karyawan extends CI_model {
	public function selectAll() {
		$status = "1";
		$this->db->select('*');
		$this->db->from('karyawan');
		$this->db->join('divisi', 'karyawan.divisi_id = divisi.id_divisi');
		$this->db->where('karyawan.status', $status);
		$this->db->order_by('nama', "asc");
    return $this->db->get()->result();
  }
  public function json() {
	  $status = 1;
		$this->datatables->select('id_karyawan,nama,email');
		$this->datatables->join('divisi', 'karyawan.divisi_id = divisi.id_divisi');
		$this->datatables->where('karyawan.status', $status);
        $this->datatables->from('karyawan');
		$this->datatables->select('divisi.divisi');
		$this->datatables->add_column('action', '<a href="#" onclick="ganti($1)" class="table-action-btn h3"><i class="mdi mdi-pencil-box-outline text-success"></i></a> 
		<a href="#" onclick="hapus($1)" class="table-action-btn h3"><i class="mdi mdi-close-box-outline text-danger"></i></a>', 'id_karyawan');
        return $this->datatables->generate();
  }
  public function add() {
		$status = "1";
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$ttl = $this->input->post('ttl');
		$no_ktp = $this->input->post('no_ktp');
		$telp = $this->input->post('telp');
		$alamat = $this->input->post('alamat');
		$divisi_id = $this->input->post('divisi_id');
		$masuk = $this->input->post('masuk');
		$data = array('nama' => $nama, 'no_ktp' => $no_ktp, 'email' => $email, 'ttl' => $ttl, 'telp' => $telp, 'alamat' => $alamat, 
		'divisi_id' => $divisi_id, 'masuk' => $masuk, 'status' => $status);
		$this->db->insert('karyawan', $data);
		$this->db->insert_id();
		
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$datalog = array('user_id' => $user_id, 'ket' => "Tambah Karyawan"." ".$nama, 'tgl' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function delete($id){
		$this->db->where('id_karyawan', $id);
		$this->db->update('karyawan', array('status' => "0"));
		
		$this->db->where('id_karyawan', $id);
		$ak = $this->db->get('karyawan')->row();
		
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$datalog = array('user_id' => $user_id, 'ket' => "Delete Karyawan"." ".$ak->nama, 'tgl' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function edit($id){
		$status = "1";
		$this->db->select('*');
		$this->db->from('karyawan');
		$this->db->join('divisi', 'karyawan.divisi_id = divisi.id_divisi');
		$this->db->where('karyawan.status', $status);
		$this->db->where('id_karyawan', $id);
		return $this->db->get()->row();
	}
	public function update(){
		$id = $this->input->post('id_karyawan');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$ttl = $this->input->post('ttl');
		$no_ktp = $this->input->post('no_ktp');
		$telp = $this->input->post('telp');
		$alamat = $this->input->post('alamat');
		$divisi_id = $this->input->post('divisi_id');
		$masuk = $this->input->post('masuk');
		$data = array('nama' => $nama, 'no_ktp', 'email' => $email, 'ttl' => $ttl, 'telp' => $telp, 'alamat' => $alamat, 
		'divisi_id' => $divisi_id, 'masuk' => $masuk);
		$this->db->where('id_karyawan', $id);
		$this->db->update('karyawan', $data);
		
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$datalog = array('user_id' => $user_id, 'ket' => "Update Karyawan"." ".$nama, 'tgl' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function cek($value){
		$this->db->where('id_karyawan', $value);
		return $this->db->get('karyawan')->row();
	}
	public function divisi() {
		$id = $this->session->userdata('divisi_id');
		$res = explode(",",$id);
		$no = 1;
		$status = "1";
		$this->db->select('*');
		$this->db->from('karyawan');
		$this->db->join('divisi', 'karyawan.divisi_id = divisi.id_divisi');
		$this->db->where('karyawan.status', $status);
		foreach($res as $key => $value) {
			if($no == 1) {
				$this->datatables->like('karyawan.divisi_id', $value);
			} else {
				$this->datatables->or_like('karyawan.divisi_id', $value);
			}
		$no++; }
		$this->db->select('karyawan.status AS status_karyawan');
		$this->db->order_by('nama', "asc");
    return $this->db->get()->result();
	}
}