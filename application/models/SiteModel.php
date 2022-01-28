<?php

    Class SiteModel Extends CI_Model
    {
		Public Function save($table, $data)
		{
			$this -> db -> insert($table, $data);
			if($this -> db -> affected_rows() > 0){
				Return $this -> db -> insert_id();
			}
		}

		function update($table, $data, $where){
			$this->db->trans_start();
				$this->db->where($where);
				$this->db->update($table, $data);
			$this->db->trans_complete();
			
			if ( $this->db->trans_status() === FALSE )
				return '0';
			else
				return '1';
		}
		
        Public Function getData($table, $where = NULL)
		{
			$this -> db -> from($table);
			if($where) {
				foreach($where as $conditions => $val) {
					$this -> db -> like($conditions, $val);
				}
			}
			
			$query = $this -> db -> get();
			
			return $query -> result_array();
		}

		Public Function GenerateNumber($table, $order ,$prefix)
		{
			$date = date("ymd");
			
			$this -> db -> select("Right(".$order.",3) as kode, SUBSTRING(".$order.", 6, 6) dates",false);
            $this -> db -> order_by($order, "desc");
            $this -> db -> limit(1);
            $query = $this -> db -> get($table);
			
            if($query -> num_rows() <> 0) {
                $data = $query -> row();
				$tgl = $data -> dates;
                
				if($date == $tgl) {
					$kode = intval($data -> kode) + 1;
					$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
					$kodejadi  = $prefix."-".$tgl."-".$kodemax;
				} else {
					$kode = 1;
					$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
					$kodejadi  = $prefix."-".$date."-".$kodemax;
				}
            } else {
                $kode = 1;
				$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
				$kodejadi  = $prefix."-".$date."-".$kodemax;
            }
			
			return $kodejadi;
		}
		
		function view($table, $select, $where=false, $join=false, $order_by=false, $limit=false, $start=false, $ex_select = true, $group_by=false){
			$this->db->select($select, $ex_select);
			$this->db->from($table);
			if ( $where )
				$this->db->where($where);
			
			if ( $order_by )
				$this->db->order_by($order_by);
			
			if ( $join ){
				foreach($join as $key => $value){
					$exp = explode(',', $value);
					$this->db->join($key, $exp[0], $exp[1]);
				}
			}
			
			if ( $limit ){
				if ( $start != 0) {
					$this->db->limit($limit, $start);
				}else{	
					$this->db->limit($limit);
				}
			}
			
			if ( $group_by )
				$this->db->group_by($group_by);
			
			$q = $this->db->get();
			if ( $q->num_rows() > 0 )
				return $q->result();
			else
				return '0';
		}
    }

?>