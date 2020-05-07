<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NhanVien_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function inserDataToMySQL($ten,$tuoi,$sdt,$anhavatar,$linkFB,$sodonhang )
	{
		$dulieu = array(
			'ten' =>$ten ,
			'tuoi' =>$tuoi,
			'sdt' =>$sdt,
			'anhavatar' =>$anhavatar,
			'linkFB' =>$linkFB,
			'sodonhang'=>$sodonhang 
			 );
		$this->db->insert('nhan_vien', $dulieu);
		return $this->db->insert_id();
	}
	public function getAllData()
	{
		$this->db->select('*');
		$this->db->order_by('id', 'asc');
		$dulieu=$this->db->get('nhan_vien');
		$dulieu =$dulieu->result_array();
		return $dulieu;
	}
	// get Nhien vien by Id
	public function getDataById($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$dulieu = $this->db->get('nhan_vien');
		$dulieu = $dulieu->result_array();
		return $dulieu;
	}
	public function updateById($id,$ten,$tuoi,$sdt,$anhavatar,$linkFB,$sodonhang)
	{
		$data = array(
			'id' =>$id , 
			'ten'=>$ten,
			'tuoi'=>$tuoi,
			'sdt'=>$sdt,
			'anhavatar'=>$anhavatar,
			'linkFB'=>$linkFB,
			'sodonhang'=>$sodonhang		
		);
		$this->db->where('id', $id);
		return $this->db->update('nhan_vien', $data);
	}
	public function deleteById($idnhanvao)
	{
		$this->db->select('*');
		$this->db->where('id', $idnhanvao);
		return $this->db->delete('nhan_vien');
	}
}	

/* End of file NhanVien_model.php */
/* Location: ./application/models/NhanVien_model.php */