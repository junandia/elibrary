<?php
Class Publisher_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	# get records
	function Get($id=NULL){
		$this->db->select('*');
		$this->db->from('publisher');
		# check if we're getting only one row or all records
		if($id != NULL){
			# getting only one row
			$this->db->where('id', $id);
			$this->db->limit('1');
			$query = $this->db->get();
			if($query->num_rows() == 1){
				# one row, match!
				return $query->row();
			}else{
				# none
				return FALSE;
			}
		}else{
			# get all
			$this->db->order_by('pub_name','asc');
			$query = $this->db->get();
			if($query->num_rows() > 0){
				# get some rows, return as assoc array
				return $query->result();
			}else{
				# no rows
				return FALSE;
			}
		}
	}
	
	# add records
	function Add($data){
		$this->db->insert('publisher',$data);
		return $this->db->insert_id();
	}
	
	# edit records
	function Update($id,$data){
		$this->db->where('id',$id);
		$this->db->update('publisher',$data);
	}
	
	# delete records
	function Delete($data){
		$this->db->where($data);
		$result = $this->db->delete('publisher');
		return $result;
	}
}