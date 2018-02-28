<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Login');
		$this->load->model('Akses');
		$this->load->model('User');
		$this->load->model('Kategori');
		$this->load->model('Sub');
		$this->load->model('Karyawan');
		$this->load->model('Rule');
		$this->load->model('Nilai');
		$this->load->model('Divisi');
		$this->load->model('Aktivitas');
		$this->load->model('Surat');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function home()
	{
		$menu['akses'] = $this->Akses->selectAll();
		$data['karyawan'] = $this->Karyawan->divisi();
		$this->load->view('template/header');
		$this->load->view('template/menu', $menu);
		$this->load->view('home', $data);
		$this->load->view('template/footer');
	}
	public function beranda()
	{
		$menu['akses'] = $this->Akses->selectAll();
		$data['karyawan'] = $this->Karyawan->divisi();
		//$this->load->view('template/header');
		//$this->load->view('template/menu', $menu);
		$this->load->view('home', $data);
		//$this->load->view('template/footer');
	}
	public function ubah()
	{
		$menu['akses'] = $this->Akses->selectAll();
		$data['karyawan'] = $this->Karyawan->divisi();
		//$this->load->view('template/header');
		//$this->load->view('template/menu', $menu);
		$this->load->view('ubah', $data);
		//$this->load->view('template/footer');
	}
	public function index() {
		if($_POST != NULL) {
			$this->Login->log();
			$q = $this->session->userdata('status');
			if($q == "login") {
				redirect(base_url('home'));
			} else {
				echo "<script>alert('Username/Password salah')
				location.replace('')</script>";
			}
		} else {
			$this->load->view('index');
		}
	}
	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}
	public function user() {
		$akses_id = $this->session->userdata('akses_id');
		$res1 = explode(',',$akses_id);
		foreach ($res1 as $key => $value) {
			$cek = $this->Akses->cek($value);
			if (strtolower($cek->akses) == "user") {
				$count = $cek->akses;
			}
		}
		$counting = count($count);
		if ($counting > 0) {
			$menu['akses'] = $this->Akses->selectAll();
			//$this->load->view('template/header');
			//$this->load->view('template/menu', $menu);
			$this->load->view('user');
			//$this->load->view('template/footer');
		} else {
			redirect(base_url('home'));
		}
	}
	function jsonuser(){
		header('Content-Type: application/json');
        $data = $this->User->json();
		print_r($data);
    }
	public function modaluser() {
		$data['cek'] = 0;
		$data['akses'] = $this->Akses->selectAll();
		$data['divisi'] = $this->Divisi->selectAll();
		$this->load->view('modal/user', $data);
	}
	public function adduser() {
		$this->User->add();
		echo json_encode(array("status" => TRUE));
	}
	public function edituser($id) {
		$data['cek'] = 1;
		$data['akses'] = $this->Akses->selectAll();
		$data['divisi'] = $this->Divisi->selectAll();
		$data['user'] = $this->User->edit($id);
		$this->load->view('modal/user', $data);
	}
	public function deleteuser($id) {
		$this->User->delete($id);
		echo json_encode(array("status" => TRUE));
	}
	public function updateuser() {
		$this->User->update();
		echo json_encode(array("status" => TRUE));
	}
	public function kategori() {
		$akses_id = $this->session->userdata('akses_id');
		$res1 = explode(',',$akses_id);
		foreach ($res1 as $key => $value) {
			$cek = $this->Akses->cek($value);
			if (strtolower($cek->akses) == "kategori") {
				$count = $cek->akses;
			}
		}
		$counting = count($count);
		if ($counting > 0) {
			$menu['akses'] = $this->Akses->selectAll();
			//$this->load->view('template/header');
			//$this->load->view('template/menu', $menu);
			$this->load->view('kategori');
			//$this->load->view('template/footer');
		} else {
			redirect(base_url('home'));
		}
	}
	function jsonkategori(){
		header('Content-Type: application/json');
        $data = $this->Kategori->json();
		print_r($data);
    }
	public function modalkategori() {
		$data['cek'] = 0;
		$this->load->view('modal/kategori', $data);
	}
	public function addkategori() {
		$this->Kategori->add();
		echo json_encode(array("status" => TRUE));
	}
	public function editkategori($id) {
		$data['cek'] = 1;
		$data['kategori'] = $this->Kategori->edit($id);
		$this->load->view('modal/kategori', $data);
	}
	public function deletekategori($id) {
		$this->Kategori->delete($id);
		echo json_encode(array("status" => TRUE));
	}
	public function updatekategori() {
		$this->Kategori->update();
		echo json_encode(array("status" => TRUE));
	}
	public function akses() {
		$akses_id = $this->session->userdata('akses_id');
		$res1 = explode(',',$akses_id);
		foreach ($res1 as $key => $value) {
			$cek = $this->Akses->cek($value);
			if (strtolower($cek->akses) == "akses") {
				$count = $cek->akses;
			}
		}
		$counting = count($count);
		if ($counting > 0) {
			$menu['akses'] = $this->Akses->selectAll();
			//$this->load->view('template/header');
			//$this->load->view('template/menu', $menu);
			$this->load->view('akses');
			//$this->load->view('template/footer');
		} else {
			redirect(base_url('home'));
		}
	}
	function jsonakses(){
		header('Content-Type: application/json');
        $data = $this->Akses->json();
		print_r($data);
    }
	public function modalakses() {
		$data['cek'] = 0;
		$this->load->view('modal/akses', $data);
	}
	public function addakses() {
		$this->Akses->add();
		echo json_encode(array("status" => TRUE));
	}
	public function editakses($id) {
		$data['cek'] = 1;
		$data['akses'] = $this->Akses->edit($id);
		$this->load->view('modal/akses', $data);
	}
	public function deleteakses($id) {
		$this->Akses->delete($id);
		echo json_encode(array("status" => TRUE));
	}
	public function updateakses() {
		$this->Akses->update();
		echo json_encode(array("status" => TRUE));
	}
	public function nilai() {
		$akses_id = $this->session->userdata('akses_id');
		$res1 = explode(',',$akses_id);
		foreach ($res1 as $key => $value) {
			$cek = $this->Akses->cek($value);
			if (strtolower($cek->akses) == "nilai") {
				$count = $cek->akses;
			}
		}
		$counting = count($count);
		if ($counting > 0) {
			$menu['akses'] = $this->Akses->selectAll();
			//$this->load->view('template/header');
			//$this->load->view('template/menu', $menu);
			$this->load->view('subkategori');
			//$this->load->view('template/footer');
		} else {
			redirect(base_url('home'));
		}
	}
	function jsonsub(){
		header('Content-Type: application/json');
        $data = $this->Sub->json();
		print_r($data);
    }
	public function modalsub() {
		$data['cek'] = 0;
		$data['divisi'] = $this->Divisi->selectAll();
		$data['kategori'] = $this->Kategori->selectAll();
		$this->load->view('modal/sub', $data);
	}
	public function addsub() {
		$this->Sub->add();
		echo json_encode(array("status" => TRUE));
	}
	public function editsub($id) {
		$data['cek'] = 1;
		$data['divisi'] = $this->Divisi->selectAll();
		$data['kategori'] = $this->Kategori->selectAll();
		$data['sub'] = $this->Sub->edit($id);
		$this->load->view('modal/sub', $data);
	}
	public function deletesub($id) {
		$this->Sub->delete($id);
		echo json_encode(array("status" => TRUE));
	}
	public function updatesub() {
		$this->Sub->update();
		echo json_encode(array("status" => TRUE));
	}
	public function karyawan() {
		$akses_id = $this->session->userdata('akses_id');
		$res1 = explode(',',$akses_id);
		foreach ($res1 as $key => $value) {
			$cek = $this->Akses->cek($value);
			if (strtolower($cek->akses) == "karyawan") {
				$count = $cek->akses;
			}
		}
		$counting = count($count);
		if ($counting > 0) {
			$menu['akses'] = $this->Akses->selectAll();
			//$this->load->view('template/header');
			//$this->load->view('template/menu', $menu);
			$this->load->view('karyawan');
			//$this->load->view('template/footer');
		} else {
			redirect(base_url('home'));
		}
	}
	function jsonkaryawan(){
		header('Content-Type: application/json');
        $data = $this->Karyawan->json();
		print_r($data);
    }
	public function modalkaryawan() {
		$data['cek'] = 0;
		$data['divisi'] = $this->Divisi->selectAll();
		$this->load->view('modal/karyawan', $data);
	}
	public function addkaryawan() {
		$this->Karyawan->add();
		echo json_encode(array("status" => TRUE));
	}
	public function editkaryawan($id) {
		$data['cek'] = 1;
		$data['divisi'] = $this->Divisi->selectAll();
		$data['karyawan'] = $this->Karyawan->edit($id);
		$this->load->view('modal/karyawan', $data);
	}
	public function deletekaryawan($id) {
		$this->Karyawan->delete($id);
		echo json_encode(array("status" => TRUE));
	}
	public function updatekaryawan() {
		$this->Karyawan->update();
		echo json_encode(array("status" => TRUE));
	}
	public function divisi() {
		$akses_id = $this->session->userdata('akses_id');
		$res1 = explode(',',$akses_id);
		foreach ($res1 as $key => $value) {
			$cek = $this->Akses->cek($value);
			if (strtolower($cek->akses) == "divisi") {
				$count = $cek->akses;
			}
		}
		$counting = count($count);
		if ($counting > 0) {
			$menu['akses'] = $this->Akses->selectAll();
			//$this->load->view('template/header');
			//$this->load->view('template/menu', $menu);
			$this->load->view('divisi');
			//$this->load->view('template/footer');
		} else {
			redirect(base_url('home'));
		}
	}
	function jsondivisi(){
		header('Content-Type: application/json');
        $data = $this->Divisi->json();
		print_r($data);
    }
	public function modaldivisi() {
		$data['cek'] = 0;
		$this->load->view('modal/divisi', $data);
	}
	public function adddivisi() {
		$this->Divisi->add();
		echo json_encode(array("status" => TRUE));
	}
	public function editdivisi($id) {
		$data['cek'] = 1;
		$data['divisi'] = $this->Divisi->edit($id);
		$this->load->view('modal/divisi', $data);
	}
	public function deletedivisi($id) {
		$this->Divisi->delete($id);
		echo json_encode(array("status" => TRUE));
	}
	public function updatedivisi() {
		$this->Divisi->update();
		echo json_encode(array("status" => TRUE));
	}
	public function penilaian() {
		$akses_id = $this->session->userdata('akses_id');
		$res1 = explode(',',$akses_id);
		foreach ($res1 as $key => $value) {
			$cek = $this->Akses->cek($value);
			if (strtolower($cek->akses) == "penilaian") {
				$count = $cek->akses;
			}
		}
		$counting = count($count);
		if ($counting > 0) {
			$menu['akses'] = $this->Akses->selectAll();
			//$this->load->view('template/header');
			//$this->load->view('template/menu', $menu);
			$this->load->view('rule');
			//$this->load->view('template/footer');
		} else {
			redirect(base_url('home'));
		}
	}
	function jsonrule(){
		header('Content-Type: application/json');
        $data = $this->Rule->json();
		print_r($data);
    }
	public function modalrule() {
		$data['cek'] = 0;
		$this->load->view('modal/rule', $data);
	}
	public function addrule() {
		$this->Rule->add();
		echo json_encode(array("status" => TRUE));
	}
	public function editrule($id) {
		$data['cek'] = 1;
		$data['rule'] = $this->Rule->edit($id);
		$this->load->view('modal/rule', $data);
	}
	public function deleterule($id) {
		$this->Rule->delete($id);
		echo json_encode(array("status" => TRUE));
	}
	public function updaterule() {
		$this->Rule->update();
		echo json_encode(array("status" => TRUE));
	}
	public function hasil() {
		$data['divisi'] = $this->Divisi->hasil();
		$data['karyawan'] = $this->Karyawan->divisi();
		$data['sekarang'] = $this->Nilai->sekarang();
		$data['tigabulan'] = $this->Nilai->tigabulan();
		$data['enambulan'] = $this->Nilai->enambulan();
		$data['rule'] = $this->Rule->selectAll();
		$menu['akses'] = $this->Akses->selectAll();
		//$this->load->view('template/header');
		//$this->load->view('template/menu', $menu);
		$this->load->view('nilai', $data);
		//$this->load->view('template/footer');
	}
	public function modalnilai() {
		$data['cek'] = $this->input->post('cek');
		$data['sub'] = $this->Sub->selectAll();
		$id = $this->input->post("karyawan");
		$data['karyawan'] = $this->Karyawan->edit($id);
		$bulan = $this->input->post("bulan");
		$tgl_pertama = date('Y-m-01', strtotime($bulan));
		$tgl_terakhir = date('Y-m-t', strtotime($bulan));
		$data['tgl'] = $bulan;
		$data['nilai'] = $this->Nilai->perbulan();
		$data['kategori'] = $this->Kategori->selectAll();
		
		$tglevent = array();
		while (strtotime($tgl_pertama) <= strtotime($tgl_terakhir)) {
			$tglevent[] = $tgl_pertama;
			$tgl_pertama = date ("Y-m-d", strtotime("+1 day", strtotime($tgl_pertama)));
		}
		$arr = array();
		foreach($tglevent as $keytgl => $value) {
			foreach($data['nilai'] as $key) {
				if($value == $key->tgl) {
					if($key->sub_id == 0) {
						$namasub = "Ok";
						$label = "bg-success";
					} else {
						foreach($data['sub'] as $keysub) {
							if($keysub->id_sub == $key->sub_id) {
								$namasub = $keysub->sub;
								$warna = $keysub->warna;
								if($warna == "red") {
									$label = "bg-danger";
								} elseif($warna == "yellow") {
									$label = "bg-warning";
								} elseif($warna == "blue") {
									$label = "bg-primary";
								} elseif($warna == "black") {
									$label = "inverse";
								}
							}
						}
					}
					$arr[] = array('title' => $namasub, 'start' => $value, 'className' => $label);
				}
			}
		}
		$data['event'] = json_encode($arr);
		$this->load->view('modal/nilai1', $data);
	}
	public function modalsetnilai() {
		$data['sub'] = $this->Sub->selectAll();
		$data['hariini'] = $this->input->post("tgl");
		$id = $this->input->post("karyawan");
		$data['karyawan'] = $this->Karyawan->edit($id);
		$data['nilai'] = $this->Nilai->perhari();
		$data['kategori'] = $this->Kategori->selectAll();
		$bulan = date('Y-m', strtotime($this->input->post("tgl")));
		$tgl_pertama = date('Y-m-01', strtotime($bulan));
		$tgl_terakhir = date('Y-m-t', strtotime($bulan));
		$d1 = array();
		$awal = $data['karyawan']->masuk;
		while (strtotime($awal) <= strtotime($tgl_terakhir)) {
			$d1[] = $awal;
			$awal = date ("Y-m-d", strtotime("+14 day", strtotime($awal)));
		}
		$data['tambahan'] = $d1;
		if($this->input->post('cek') == 0) {
			$this->load->view('modal/setnilai', $data);
		} elseif($this->input->post('cek') == 1) {
			$this->load->view('modal/setnilai1', $data);
		}
	}
	public function modalket($id) {
		$pecah = explode(".", $id);
		$data['karyawan'] = $pecah[2];
		$data['sub_id'] = $pecah[1];
		$data['tgl'] = $pecah[0];
		$this->load->view('modal/ket', $data);
	}
	public function masalah($id = null) {
		date_default_timezone_set('Asia/Jakarta');
		if (null !== $id) {
			} else {
				redirect(base_url('home'));
		}
		$pecah = explode(".", $id);
		$id_karyawan = $pecah[1];
		$bulan = $pecah[0];
		$data['karyawan'] = $this->Karyawan->edit($id_karyawan);
		if($bulan == "ini") {
			$data['dari'] = date("Y-m");
			$data['sampai'] = date("Y-m");
		} elseif($bulan == "tri") {
			
			$date = date("Y-m-01");
		if($date >= date("Y-01-01") && $date <= date("Y-03-t")) {
			$data['dari'] = date("Y-01");
			$data['sampai'] = date("Y-03");
		} elseif($date >= date("Y-04-01") && $date <= date("Y-06-t")) {
			$data['dari'] = date("Y-04");
			$data['sampai'] = date("Y-06");
		} elseif($date >= date("Y-07-01") && $date <= date("Y-09-t")) {
			$data['dari'] = date("Y-07");
			$data['sampai'] = date("Y-09");
		} elseif($date >= date("Y-10-01") && $date <= date("Y-12-t")) {
			$data['dari'] = date("Y-10");
			$data['sampai'] = date("Y-12");
		}
		
		} elseif($bulan == "sem") {
			
			$date = date("Y-m-01");
		if($date >= date("Y-01-01") && $date <= date("Y-06-t")) {
			$data['dari'] = date("Y-01");
			$data['sampai'] = date("Y-06");
		} elseif($date >= date("Y-07-01") && $date <= date("Y-12-t")) {
			$data['dari'] = date("Y-07");
			$data['sampai'] = date("Y-12");
		}
			
		}
		$data['bulan'] = $bulan; 
		$this->load->view('masalah', $data);
	}
	public function addnilai() {
		$this->Nilai->add();
		echo json_encode(array("status" => TRUE));
	}
	public function addlancar($id) {
		$this->Nilai->lancar($id);
		echo json_encode(array("status" => TRUE));
	}
	public function editnilai($id) {
		$data['cek'] = 1;
		$data['nilai'] = $this->Nilai->edit($id);
		$this->load->view('modal/nilai', $data);
	}
	public function deletenilai($id) {
		$this->Nilai->delete($id);
		echo json_encode(array("status" => TRUE));
	}
	public function updatenilai() {
		$this->Nilai->update();
		echo json_encode(array("status" => TRUE));
	}
	public function cekpass() {
		$cek = $this->User->cekpass();
		echo $cek;
	}
	public function updatepass() {
		$this->User->updatepass();
		echo json_encode(array("status" => TRUE));
	}
	public function pengingat() {
		$token = "521870901:AAHmygMGGazRdfDeiKb0nuO8mDCmO6tP2GE";
		$user = $this->User->selectAll();
		foreach($user as $key) {
			$data = ['text' => 'Waktunya Memberi Penilaian.', 'chat_id' => $key->chat_id];
			file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );
		}
		echo "Sukses";
	}
	public function bulanan() {
		$karyawan = $this->Karyawan->selectAll();
		$nilai = $this->Nilai->hasilbulan();
		$rule = $this->Rule->selectAll();
		$eksel['sub'] = $this->Sub->selectAll();
		$em = $this->Surat->selectAll();
		foreach ($karyawan as $key) {
			
			$now = 0;
			foreach ($nilai as $keys) {
				if($keys-> karyawan_id == $key->id_karyawan) {
					$now = $now + $keys->nilai;
				}
			}
			
			$from_email = $em->email; // ganti dengan email kalian
			$subject = 'Skor Bulanan';
			$data['nama'] = $key->nama;
			$data['skor'] = 100-$now;
			$data['untuk'] = 'bulanan';
			foreach($rule as $keyrule) {
				if (100-$now >= $keyrule->dari && 100-$now <= $keyrule->sampai) {
					$warna = $keyrule->warna;
					$catatan = $keyrule->note;
					break;
				}
			}
			$data['warna'] = $warna;
			$data['catatan'] = $catatan;
			
			$eksel['skor'] = 100-$now;
			$eksel['warna'] = $warna;
			$eksel['catatan'] = $catatan;
			$eksel['nilai'] = $this->Nilai->bulanini($key->id_karyawan);
		$eksel['karyawan'] = $this->Karyawan->edit($key->id_karyawan);
		file_put_contents("files/".$key->nama.".doc", $this->load->view('modal/excel', $eksel, TRUE));
			
			
			$message = $this->load->view('email/header', $data, TRUE);
			$message .=$this->load->view('email/bulanan', $data, TRUE);
			$message .=$this->load->view('email/footer', $data, TRUE);
			
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://smtp.gmail.com'; // sesuaikan dengan host email
			$config['smtp_timeout'] = '7';
			$config['smtp_port'] = '465'; // sesuaikan
			$config['smtp_user'] = $from_email;
			$config['smtp_pass'] = $em->password; // ganti dengan password email
			$config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$config['newline'] = "\r\n";
			$config['crlf'] = "\r\n";
			$this->email->initialize($config);

			
			$this->email->set_mailtype("html");
			$this->email->from($from_email, 'Company Name');
			$this->email->to($key->email);
			$this->email->subject($subject);
			$this->email->message($message);
			$this->email->attach("files/".$key->nama.".doc");
			// gunakan return untuk mengembalikan nilai yang akan selanjutnya diproses ke verifikasi email
			$this->email->send();
			unset($eksel['karyawan']);
			unset($eksel['nilai']);
			$this->email->clear(TRUE);
		}
		echo "Sukses";
	}
	public function triwulan () {
		$karyawan = $this->Karyawan->selectAll();
		$nilai = $this->Nilai->tigabulanlalu();
		$rule = $this->Rule->selectAll();
		$eksel['sub'] = $this->Sub->selectAll();
		$em = $this->Surat->selectAll();
		foreach ($karyawan as $key) {
			$tri = 0;
			foreach ($nilai as $keyt) {
				if($keyt-> karyawan_id == $key->id_karyawan) {
					$tri = $tri + $keyt->nilai;
				}
			}
			
			$from_email = $em->email; // ganti dengan email kalian
			$subject = 'Skor Triwulan';
			$data['nama'] = $key->nama;
			$data['skor'] = round($tri/3);
			$data['untuk'] = 'Triwulan';
			foreach($rule as $keyrule) {
				if ($tri/3 >= $keyrule->dari && $tri/3 <= $keyrule->sampai) {
					$warna = $keyrule->warna;
					$catatan = $keyrule->note;
					break;
				}
			}
			$data['warna'] = $warna;
			$data['catatan'] = $catatan;
			
			$eksel['skor'] = round($tri/3);
			$eksel['warna'] = $warna;
			$eksel['catatan'] = $catatan;
			$eksel['nilai'] = $this->Nilai->triwulan($key->id_karyawan);
		$eksel['karyawan'] = $this->Karyawan->edit($key->id_karyawan);
		file_put_contents("files/".$key->nama.".doc", $this->load->view('modal/excel', $eksel, TRUE));
		
			
			$message = $this->load->view('email/header', $data, TRUE);
			$message .=$this->load->view('email/hasil', $data, TRUE);
			$message .=$this->load->view('email/footer', $data, TRUE);
			
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://smtp.gmail.com'; // sesuaikan dengan host email
			$config['smtp_timeout'] = '7';
			$config['smtp_port'] = '465'; // sesuaikan
			$config['smtp_user'] = $from_email;
			$config['smtp_pass'] = $em->password; // ganti dengan password email
			$config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$config['newline'] = "\r\n";
			$config['crlf'] = "\r\n";
			$this->email->initialize($config);

			$this->email->set_mailtype("html");
			$this->email->from($from_email, 'Company Name');
			$this->email->to($key->email);
			$this->email->subject($subject);
			$this->email->message($message);
			$this->email->attach("files/".$key->nama.".doc");
			// gunakan return untuk mengembalikan nilai yang akan selanjutnya diproses ke verifikasi email
			$this->email->send();
			unset($eksel['karyawan']);
			unset($eksel['nilai']);
			$this->email->clear(TRUE);
		}
		echo "Sukses";
	}
	public function semester () {
		$karyawan = $this->Karyawan->selectAll();
		$nilai = $this->Nilai->enambulanlalu();
		$rule = $this->Rule->selectAll();
		$eksel['sub'] = $this->Sub->selectAll();
		$em = $this->Surat->selectAll();
		foreach ($karyawan as $key) {
			$tri = 0;
			foreach ($nilai as $keyt) {
				if($keyt-> karyawan_id == $key->id_karyawan) {
					$tri = $tri + $keyt->nilai;
				}
			}
			$from_email = $em->email; // ganti dengan email kalian
			$subject = 'Skor Semester';
			$data['nama'] = $key->nama;
			$data['skor'] = round($tri/6);
			$data['untuk'] = 'Semester';
			foreach($rule as $keyrule) {
				if ($tri/6 >= $keyrule->dari && $tri/6 <= $keyrule->sampai) {
					$warna = $keyrule->warna;
					$catatan = $keyrule->note;
					break;
				}
			}
			$data['warna'] = $warna;
			$data['catatan'] = $catatan;
			
			$eksel['skor'] = round($tri/6);
			$eksel['warna'] = $warna;
			$eksel['catatan'] = $catatan;
			$eksel['nilai'] = $this->Nilai->semester($key->id_karyawan);
		$eksel['karyawan'] = $this->Karyawan->edit($key->id_karyawan);
		file_put_contents("files/".$key->nama.".doc", $this->load->view('modal/excel', $eksel, TRUE));
			
			
			$message = $this->load->view('email/header', $data, TRUE);
			$message .=$this->load->view('email/hasil', $data, TRUE);
			$message .=$this->load->view('email/footer', $data, TRUE);
			
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://smtp.gmail.com'; // sesuaikan dengan host email
			$config['smtp_timeout'] = '7';
			$config['smtp_port'] = '465'; // sesuaikan
			$config['smtp_user'] = $from_email;
			$config['smtp_pass'] = $em->password; // ganti dengan password email
			$config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$config['newline'] = "\r\n";
			$config['crlf'] = "\r\n";
			$this->email->initialize($config);

			$this->email->set_mailtype("html");
			$this->email->from($from_email, 'Company Name');
			$this->email->to($key->email);
			$this->email->subject($subject);
			$this->email->message($message);
			$this->email->attach("files/".$key->nama.".doc");
			// gunakan return untuk mengembalikan nilai yang akan selanjutnya diproses ke verifikasi email
			$this->email->send();
			unset($eksel['karyawan']);
			unset($eksel['nilai']);
			$this->email->clear(TRUE);
		}
		echo "Sukses";
	}
	public function rincian($id = null) {
		if (null !== $id) {
			} else {
				redirect(base_url('home'));
		}
		$data['karyawan'] = $this->Karyawan->edit($id);
		$this->load->view('rincian', $data);
	}
	public function carinilai() {
		$data['nilai'] = $this->Nilai->cari();
		$this->load->view('modal/carinilai', $data);
	}
	public function carihis() {
		$data['nilai'] = $this->Nilai->carihis();
		$this->load->view('modal/carihasil', $data);
	}
	public function cetakpdf($id) {
		if($_POST != NULL) {
			
		} else {
			$e = explode(".", $id);
			$data['karyawan'] = $this->Karyawan->edit($e[0]);
			$data['nilai'] = $this->Nilai->cetakcari($id);
			// Load all views as normal
			$this->load->view('pdf', $data);
			// Get output html
			$html = $this->output->get_output();

			// Convert to PDF
			$this->dompdf->load_html($html);
			$this->dompdf->set_paper('A4', 'potrait');
			$this->dompdf->render();
			$this->dompdf->stream($data['karyawan']->nama.".pdf");
		}
	}
	public function cetakhis($id) {
		if($_POST != NULL) {
			
		} else {
			$e = explode(".", $id);
			$data['karyawan'] = $this->Karyawan->edit($e[0]);
			$data['nilai'] = $this->Nilai->cetakcarihis($id);
			// Load all views as normal
			$this->load->view('pdfhis', $data);
			// Get output html
			$html = $this->output->get_output();

			// Convert to PDF
			$this->dompdf->load_html($html);
			$this->dompdf->set_paper('A4', 'potrait');
			$this->dompdf->render();
			$this->dompdf->stream($data['karyawan']->nama.".pdf");
		}
	}
	public function aktivitas() {
		$akses_id = $this->session->userdata('akses_id');
		$res1 = explode(',',$akses_id);
		foreach ($res1 as $key => $value) {
			$cek = $this->Akses->cek($value);
			if (strtolower($cek->akses) == "aktivitas") {
				$count = $cek->akses;
			}
		}
		$counting = count($count);
		if ($counting > 0) {
			$menu['akses'] = $this->Akses->selectAll();
			$this->load->view('aktivitas');
		} else {
			redirect(base_url('home'));
		}
	}
	function jsonaktivitas(){
		header('Content-Type: application/json');
        $data = $this->Aktivitas->json();
		print_r($data);
    }
	public function checkses() {
		$ses = $this->session->userdata('status');
		if ($ses != "login") {
			echo 0;
		} else {
			echo 1;
		}
	}
	public function tes() {
		$date = "2018-01-20";
		$a = date('Y-m', strtotime($date));
		print_r($a);
	}
	public function email() {
		$data['email'] = $this->Surat->selectAll();
		$this->load->view('email', $data);
	}
	public function editemail($id) {
		$data['email'] = $this->Surat->edit($id);
		$this->load->view('modal/email', $data);
	}
	public function updateemail() {
		$this->Surat->update();
		echo json_encode(array("status" => TRUE));
	}
	public function bantuan() {
		$this->load->view('faq');
	}
	public function err404() {
		$this->load->view('err404');
	}
}