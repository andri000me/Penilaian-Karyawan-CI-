<?php
class Aktivitas extends CI_model {
  public function json() {
	  $status = 1;
		$this->datatables->select('id_log,ket,tgl');
        $this->datatables->from('log');
		$this->datatables->join('user', 'log.user_id = user.id_user');
		$this->datatables->select('username');
		$this->db->order_by('tgl', "desc");
        return $this->datatables->generate();
  }
}