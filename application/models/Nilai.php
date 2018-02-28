<?php
class Nilai extends CI_model {
	public function selectAll() {
		$status = "1";
		$this->db->where('status', $status);
    return $this->db->get('nilai')->result();
	}
	public function add() {
		$status = "1";
		$id = $this->input->post('karyawan');
		$sub_id = $this->input->post('sub_id');
		$tgl = $this->input->post('tgl');
		$ket = nl2br($this->input->post('ket'));
		$user_id = $this->session->userdata('user_id');
		
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('sub', 'nilai.sub_id = sub.id_sub');
		$this->db->where('nilai.tgl', $tgl);
		$this->db->where('nilai.karyawan_id', $id);
		$this->db->where('nilai.status', $status);
		$nilai = $this->db->get()->result();
		
		$this->db->where('id_sub', $sub_id);
		$this->db->where('status', $status);
		$sub = $this->db->get('sub')->row();
		
		if($nilai == NULL) {
			$cek = 0;
		} else {
			$k = array();
			foreach ($nilai as $key) {
					if ($key->kategori_id == $sub->kategori_id) {
						$k[] = $key->id_nilai;
						$cek = 1;
					} else {
						$cek = 0;
					}
				}
			}
		
		if($cek > 0) {
			$this->db->select('*');
			$this->db->from('nilai');
			$this->db->join('sub', 'nilai.sub_id = sub.id_sub');
			$this->db->where_in('id_nilai', $k);
			$this->db->where('nilai.status', $status);
			$cek1 = $this->db->get()->result();
			foreach ($cek1 as $keyc) {
				if($keyc->kategori_id == $sub->kategori_id) {
					$n = $keyc->id_nilai;
				}
			}
			$data = array('sub_id' => $sub_id, 'ket' => $ket);
			$this->db->where('id_nilai', $n);
			$this->db->update('nilai', $data);
			
			date_default_timezone_set('Asia/Jakarta');
		$waktulog = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$this->db->where('id_karyawan', $id);
		$k = $this->db->get('karyawan')->row();
		$datalog = array('user_id' => $user_id, 'ket' => "Mengubah Nilai"." ".$k->nama." ".$tgl, 'tgl' => $waktulog);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
		} else {
			$data = array('sub_id' => $sub_id, 'tgl' => $tgl, 'karyawan_id' => $id, 'ket' => $ket, 'user_id' => $user_id, 'status' => $status);
			$this->db->insert('nilai', $data);
			$this->db->insert_id();
			
			date_default_timezone_set('Asia/Jakarta');
		$waktulog = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$this->db->where('id_karyawan', $id);
		$k = $this->db->get('karyawan')->row();
		$datalog = array('user_id' => $user_id, 'ket' => "Menambah Nilai"." ".$k->nama." ".$tgl, 'tgl' => $waktulog);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
		}
		
		date_default_timezone_set('Asia/Jakarta');
		$bulanini = date("Y-m");
			$this->db->where('karyawan_id', $id);
			$this->db->like('tgl', $bulanini);
			$h = $this->db->get('hasil')->row();
			
			$this->db->select('*');
			$this->db->from('nilai');
			$this->db->join('sub', 'nilai.sub_id = sub.id_sub');
			$this->db->where('nilai.status', $status);
			$this->db->where('karyawan_id', $id);
			$this->db->like("tgl", $bulanini);
			$ni = $this->db->get()->result();
			$ni1 = 0;
			foreach($ni as $keyni) {
				$ni1 = $ni1 + $keyni->jumlah;
			}
			$ni2 = 100-$ni1;
			$datahasil = array('nilai' => $ni2, 'tgl' => $tgl, 'karyawan_id' => $id);
			if($h != NULL) {
				$this->db->where('id_hasil', $h->id_hasil);
				$this->db->update('hasil', $datahasil);
			} else {
				$this->db->insert('hasil', $datahasil);
				$this->db->insert_id();
			}
	}
	public function lancar($id) {
		$status = 1;
		$id_karyawan = $this->input->post('karyawan');
		$user_id = $this->session->userdata('user_id');
		$pecah = explode(".", $id);
		$sub_id = "0";
		$tgl = $pecah[0];
		$this->db->where('tgl', $tgl);
		$this->db->where('karyawan_id', $id_karyawan);
		$this->db->where('status', $status);
		$c = $this->db->get('nilai')->result();
		if($c != NULL) {
			foreach ($c as $keyc) {
				$dataup = array('status' => "0");
				$this->db->where('id_nilai', $keyc->id_nilai);
				$this->db->update('nilai', $dataup);
			}
		}
		
		$data = array('sub_id' => $sub_id, 'tgl' => $tgl, 'karyawan_id' => $id_karyawan, 'ket' => "Ok", 'user_id' => $user_id, 'status' => "1");
		$this->db->insert('nilai', $data);
		$this->db->insert_id();
		
		date_default_timezone_set('Asia/Jakarta');
		$waktulog = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$this->db->where('id_karyawan', $id_karyawan);
		$k = $this->db->get('karyawan')->row();
		$datalog = array('user_id' => $user_id, 'ket' => "Menambah Nilai"." ".$k->nama." ".$tgl, 'tgl' => $waktulog);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
		
		date_default_timezone_set('Asia/Jakarta');
		$bulanini = date("Y-m");
		
		$this->db->where('karyawan_id', $id_karyawan);
		$this->db->like('tgl', $bulanini);
		$h = $this->db->get('hasil')->row();
			
			$this->db->select('*');
			$this->db->from('nilai');
			$this->db->join('sub', 'nilai.sub_id = sub.id_sub');
			$this->db->where('nilai.status', $status);
			$this->db->where('karyawan_id', $id_karyawan);
			$this->db->like("tgl", $bulanini);
			$ni = $this->db->get()->result();
			$ni1 = 0;
			foreach($ni as $keyni) {
				$ni1 = $ni1 + $keyni->jumlah;
			}
			$ni2 = 100-$ni1;
			$datahasil = array('nilai' => $ni2, 'tgl' => $tgl, 'karyawan_id' => $id_karyawan);
			if($h != NULL) {
				$this->db->where('id_hasil', $h->id_hasil);
				$this->db->update('hasil', $datahasil);
			} else {
				$this->db->insert('hasil', $datahasil);
				$this->db->insert_id();
			}
		
	}
	public function cek() {
		$status = 1;
		$id = $this->input->post('karyawan');
		$this->db->select('*');
		$this->db->from('nilai');
		//$this->db->join('sub', 'nilai.sub_id = sub.id_sub');
		$this->db->where('nilai.status', $status);
		$this->db->where('nilai.karyawan_id', $id);
		return $this->db->get()->result();
	}
	public function sekarang() {
		date_default_timezone_set('Asia/Jakarta');
		$status = 1;
		$date = date("Y-m");
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('sub', 'nilai.sub_id = sub.id_sub');
		$this->db->join('karyawan', 'nilai.karyawan_id = karyawan.id_karyawan');
		$this->db->where('nilai.status', $status);
		$this->db->order_by("tgl", "asc");
		$this->db->like("tgl", $date);
		return $this->db->get()->result();
	}
	public function bulanini($id_karyawan) {
		date_default_timezone_set('Asia/Jakarta');
		$status = 1;
		
		$d = date("Y-m-d");
		$d1 = date ("Y-m-d", strtotime("-1 month", strtotime($d)));
		$d2 = date("Y-m", strtotime($d1));
		$dari = date($d2."-1");
		$sampai = date($d2."-t");
		
		/*$dari = date("Y-m-1");
		$sampai = date("Y-m-t");*/
		
		$this->db->where('nilai.status', $status);
		$this->db->where('karyawan_id', $id_karyawan);
		$this->db->where('tgl >=', $dari);
		$this->db->where('tgl <=', $sampai);
		return $this->db->get('nilai')->result();
	}
	public function triwulan($id_karyawan) {
		date_default_timezone_set('Asia/Jakarta');
		$status = 1;
		
		$d = date("Y-m-d");
		$d1 = date ("Y-m-d", strtotime("-1 month", strtotime($d)));
		$date = date("m", strtotime($d1));
		//$date = date($d2."-1");
		if($date >= 1 && $date <= 3) {
			$dari = date("Y-01-1", strtotime($d1));
			$sampai = date("Y-03-t", strtotime($d1));
		} elseif($date >=4 && $date <= 6) {
			$dari = date("Y-04-1", strtotime($d1));
			$sampai = date("Y-06-t", strtotime($d1));
		} elseif($date >= 7 && $date <= 9) {
			$dari = date("Y-07-1", strtotime($d1));
			$sampai = date("Y-09-t", strtotime($d1));
		} elseif($date >= 10 && $date <= 12) {
			$dari = date("Y-10-1", strtotime($d1));
			$sampai = date("Y-12-t", strtotime($d1));
		}
		
		$this->db->where('nilai.status', $status);
		$this->db->where('karyawan_id', $id_karyawan);
		$this->db->where('tgl >=', $dari);
		$this->db->where('tgl <=', $sampai);
		return $this->db->get('nilai')->result();
	}
	public function tigabulan() {
		$status = 1;
		date_default_timezone_set('Asia/Jakarta');
		$date = date("Y-m-01");
		if($date >= date("Y-01-01") && $date <= date("Y-03-t")) {
			$dari = date("Y-01-01");
			$sampai = date("Y-03-t");
		} elseif($date >= date("Y-04-01") && $date <= date("Y-06-t")) {
			$dari = date("Y-04-01");
			$sampai = date("Y-06-t");
		} elseif($date >= date("Y-07-01") && $date <= date("Y-09-t")) {
			$dari = date("Y-07-01");
			$sampai = date("Y-09-t");
		} elseif($date >= date("Y-10-01") && $date <= date("Y-12-t")) {
			$dari = date("Y-10-01");
			$sampai = date("Y-12-t");
		}
		
		$this->db->where('tgl >=', $dari);
		$this->db->where('tgl <=', $sampai);
		return $this->db->get('hasil')->result();
	}
	public function tigabulanlalu() {
		$status = 1;
		date_default_timezone_set('Asia/Jakarta');
		$d = date("Y-m-d");
		$d1 = date ("Y-m-d", strtotime("-1 month", strtotime($d)));
		$date = date("m", strtotime($d1));
		//$date = date($d2."-1");
		if($date >= 1 && $date <= 3) {
			$dari = date("Y-01-1", strtotime($d1));
			$sampai = date("Y-03-t", strtotime($d1));
		} elseif($date >=4 && $date <= 6) {
			$dari = date("Y-04-1", strtotime($d1));
			$sampai = date("Y-06-t", strtotime($d1));
		} elseif($date >= 7 && $date <= 9) {
			$dari = date("Y-07-1", strtotime($d1));
			$sampai = date("Y-09-t", strtotime($d1));
		} elseif($date >= 10 && $date <= 12) {
			$dari = date("Y-10-1", strtotime($d1));
			$sampai = date("Y-12-t", strtotime($d1));
		}
		
		$this->db->where('tgl >=', $dari);
		$this->db->where('tgl <=', $sampai);
		return $this->db->get('hasil')->result();
	}
	public function enambulan() {
		date_default_timezone_set('Asia/Jakarta');
		$status = 1;
		$date = date("Y-m-01");
		if($date >= date("Y-01-01") && $date <= date("Y-06-t")) {
			$dari = date("Y-01-01");
			$sampai = date("Y-06-t");
		} elseif($date >= date("Y-07-01") && $date <= date("Y-12-t")) {
			$dari = date("Y-07-01");
			$sampai = date("Y-12-t");
		}
		$this->db->where('tgl >=', $dari);
		$this->db->where('tgl <=', $sampai);
		return $this->db->get('hasil')->result();
	}
	public function enambulanlalu() {
		date_default_timezone_set('Asia/Jakarta');
		$status = 1;
		
		$d = date("Y-m-d");
		$d1 = date ("Y-m-d", strtotime("-1 month", strtotime($d)));
		$date = date("m", strtotime($d1));
		
		//$date = date("Y-m-01");
		if($date >= 1 && $date <= 6) {
			$dari = date("Y-01-1", strtotime($d1));
			$sampai = date("Y-06-t", strtotime($d1));
		} elseif($date >= 7 && $date <= 12) {
			$dari = date("Y-07-1", strtotime($d1));
			$sampai = date("Y-12-t", strtotime($d1));
		}
		
		$this->db->where('tgl >=', $dari);
		$this->db->where('tgl <=', $sampai);
		return $this->db->get('hasil')->result();
	}
	public function semester($id_karyawan) {
		date_default_timezone_set('Asia/Jakarta');
		$status = 1;
		
		$d = date("Y-m-d");
		$d1 = date ("Y-m-d", strtotime("-1 month", strtotime($d)));
		$date = date("m", strtotime($d1));
		
		//$date = date("Y-m-01");
		if($date >= 1 && $date <= 6) {
			$dari = date("Y-01-1", strtotime($d1));
			$sampai = date("Y-06-t", strtotime($d1));
		} elseif($date >= 7 && $date <= 12) {
			$dari = date("Y-07-1", strtotime($d1));
			$sampai = date("Y-12-t", strtotime($d1));
		}
		
		$this->db->where('nilai.status', $status);
		$this->db->where('karyawan_id', $id_karyawan);
		$this->db->where('tgl >=', $dari);
		$this->db->where('tgl <=', $sampai);
		return $this->db->get('nilai')->result();
	}
	public function cari() {
		$status = 1;
		$d = $this->input->post('dari');
		$dari = date($d."-1");
		$s = $this->input->post('sampai');
		$sampai = date($s."-t");
		$karyawan_id = $this->input->post('karyawan_id');
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('sub', 'nilai.sub_id = sub.id_sub');
		$this->db->join('user', 'nilai.user_id = user.id_user');
		$this->db->join('karyawan', 'nilai.karyawan_id = karyawan.id_karyawan');
		$this->db->where('nilai.status', $status);
		$this->db->order_by("tgl", "asc");
		$this->db->where('karyawan_id', $karyawan_id);
		$this->db->where('tgl >=', $dari);
		$this->db->where('tgl <=', $sampai);
		return $this->db->get()->result();
	}
	public function cetakcari($id) {
		$status = 1;
		$e = explode(".", $id);
		$d = $e[1];
		$dari = date($d."-1");
		$s = $e[2];
		$sampai = date($s."-t");
		$karyawan_id = $e[0];
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('sub', 'nilai.sub_id = sub.id_sub');
		$this->db->join('user', 'nilai.user_id = user.id_user');
		$this->db->join('karyawan', 'nilai.karyawan_id = karyawan.id_karyawan');
		$this->db->where('nilai.status', $status);
		$this->db->order_by("tgl", "asc");
		$this->db->where('karyawan_id', $karyawan_id);
		$this->db->where('tgl >=', $dari);
		$this->db->where('tgl <=', $sampai);
		return $this->db->get()->result();
	}
	public function carihis() {
		$status = 1;
		$d = $this->input->post('dari');
		$dari = date($d."-1");
		$s = $this->input->post('sampai');
		$sampai = date($s."-t");
		$karyawan_id = $this->input->post('karyawan_id');
		$this->db->select('*');
		$this->db->from('hasil');
		$this->db->join('karyawan', 'hasil.karyawan_id = karyawan.id_karyawan');
		$this->db->order_by("hasil.tgl", "asc");
		$this->db->where('hasil.karyawan_id', $karyawan_id);
		$this->db->where('hasil.tgl >=', $dari);
		$this->db->where('hasil.tgl <=', $sampai);
		return $this->db->get()->result();
	}
	public function cetakcarihis($id) {
		$status = 1;
		$e = explode(".", $id);
		$d = $e[1];
		$dari = date($d."-1");
		$s = $e[2];
		$sampai = date($s."-t");
		$karyawan_id = $e[0];
		$this->db->select('*');
		$this->db->from('hasil');
		$this->db->join('karyawan', 'hasil.karyawan_id = karyawan.id_karyawan');
		$this->db->order_by("hasil.tgl", "asc");
		$this->db->where('hasil.karyawan_id', $karyawan_id);
		$this->db->where('hasil.tgl >=', $dari);
		$this->db->where('hasil.tgl <=', $sampai);
		return $this->db->get()->result();
	}
	public function hasilbulan() {
		date_default_timezone_set('Asia/Jakarta');
		$d = date("Y-m-d");
		$d1 = date ("Y-m-d", strtotime("-1 month", strtotime($d)));
		$date = date("Y-m", strtotime($d1));
		$this->db->like('tgl', $date);
		return $this->db->get('hasil')->result();
	}
	public function hasiltri() {
		date_default_timezone_set('Asia/Jakarta');
		
		$d = date("Y-m-d");
		$d1 = date ("Y-m-d", strtotime("-1 month", strtotime($d)));
		$date = date("Y-m", strtotime($d1));
		if($date >= date("Y-01-01") && $date <= date("Y-03-t")) {
			$dari = date("Y-01-01");
			$sampai = date("Y-03-t");
		} elseif($date >= date("Y-04-01") && $date <= date("Y-06-t")) {
			$dari = date("Y-04-01");
			$sampai = date("Y-06-t");
		} elseif($date >= date("Y-07-01") && $date <= date("Y-09-t")) {
			$dari = date("Y-07-01");
			$sampai = date("Y-09-t");
		} elseif($date >= date("Y-10-01") && $date <= date("Y-12-t")) {
			$dari = date("Y-10-01");
			$sampai = date("Y-12-t");
		}
		
		$this->db->where('tgl >=', $dari);
		$this->db->where('tgl <=', $sampai);
		return $this->db->get('hasil')->result();
	}
	public function hasilsem() {
		date_default_timezone_set('Asia/Jakarta');
		
		$d = date("Y-m-d");
		$d1 = date ("Y-m-d", strtotime("-1 month", strtotime($d)));
		$date = date("Y-m", strtotime($d1));
		if($date >= date("Y-01-01") && $date <= date("Y-06-t")) {
			$dari = date("Y-01-01");
			$sampai = date("Y-06-t");
		} elseif($date >= date("Y-07-01") && $date <= date("Y-12-t")) {
			$dari = date("Y-07-01");
			$sampai = date("Y-12-t");
		}
		$this->db->where('tgl >=', $dari);
		$this->db->where('tgl <=', $sampai);
		return $this->db->get('hasil')->result();
	}
	public function perhari() {
		$status = 1;
		$tgl = $this->input->post('tgl');
		$id = $this->input->post('karyawan');
		$this->db->select('*');
		$this->db->from('nilai');
		//$this->db->join('karyawan', 'nilai.karyawan_id = nilai.id_karyawan');
		$this->db->where('nilai.status', $status);
		$this->db->where('nilai.karyawan_id', $id);
		$this->db->like('tgl', $tgl);
		return $this->db->get()->result();
	}
	public function perbulan() {
		$status = 1;
		$bulan = $this->input->post("bulan");
		$tgl_pertama = date('Y-m-01', strtotime($bulan));
		$tgl_terakhir = date('Y-m-t', strtotime($bulan));
		$id = $this->input->post("karyawan");
		
		$this->db->where('status', $status);
		$this->db->where('karyawan_id', $id);
		$this->db->where('tgl >=', $tgl_pertama);
		$this->db->where('tgl <=', $tgl_terakhir);
		return $this->db->get('nilai')->result();
	}
}