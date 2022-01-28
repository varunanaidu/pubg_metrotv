<?php

class Reject_model extends CI_Model{

	public function find($key){
		$this->db->select("*");
		$this->db->where("RegistCode", $key);
		$q = $this->db->get("vw_regist_detail");
		if ( $q->num_rows() == 0 )
			return FALSE;
		return $q->result();
	}

	public function _get_datatable_query(){

		$__order 			= ['RegistDateTs'=>'DESC'];
		$__column_search 	= ['RegistID', 'MediaName', 'TeamName', 'ZoneName'];
		$__column_order     = ['RegistID', 'MediaName', 'TeamName', 'ZoneName'];

		$this->db->select('*');
		$this->db->from('vw_regist_header');
		$this->db->where('StatusID', 4);

		$i = 0;
		$search_value = $this->input->post('search')['value'];
		foreach ($__column_search as $item){
			if ($search_value){
				if ($i === 0){ 
					$this->db->group_start(); 
					$this->db->like("UPPER({$item})", strtoupper($search_value), FALSE);
				}
				else{
					$this->db->or_like("UPPER({$item})", strtoupper($search_value), FALSE);
				}
				if (count($__column_search) - 1 == $i) $this->db->group_end(); 
			}
			$i++;
		}

		if ($this->input->post('order') != null){
			$this->db->order_by($__column_order[$this->input->post('order')['0']['column']], $this->input->post('order')['0']['dir']);
		} 
		else if (isset($__order)){
			$order = $__order;
			$this->db->order_by(key($order), $order[key($order)]);
		}

	}

	public function get_datatable(){
		$this->_get_datatable_query();
		if ($this->input->post('length') != -1) $this->db->limit($this->input->post('length'), $this->input->post('start'));
		$query = $this->db->get();
		return $query->result();
	}

	public function get_datatable_count_filtered(){
		$this->_get_datatable_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_datatable_count_all(){
		$this->db->from('vw_regist_header');
		$this->db->where('StatusID', 4);
		return $this->db->count_all_results();
	}

}

?>