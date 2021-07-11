<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Karyawan_model extends CI_Model{
    public function get_posisi(){
        $this->db->from('upah');
        $this->db->order_by("Posisi", "asc");
        $data = $this->db->get();
        return $data->result();
    }
    public function getDataPagination($limit, $offset, $keyword=null)
    {
        if ($keyword){
            $this -> db -> like('Nama',$keyword);
            $this -> db -> or_like('Domisili',$keyword);
            $this -> db -> or_like('Umur',$keyword);
            $this -> db -> or_like('Posisi',$keyword);
        }
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('upah','karyawan.id_upah = upah.id_upah','LEFT');
        $this->db->order_by('Posisi', 'asc');
        $this->db->limit($limit, $offset);

        return $this->db->get()->result_array();
    }
    public function save($data)
    {
        return $this->db->insert('karyawan', $data);
    }
    public function getById($id)
    {   
        $this->db->join('upah','karyawan.id_upah = upah.id_upah','LEFT');
        return $this->db->get_where('karyawan', ["id_karyawan" => $id])->row();
    }
    public function update($data,$id)
    {
        return $this->db->update('karyawan', $data, array('id_karyawan' => $id));
    }
    public function delete($id)
    {
        return $this->db->delete('karyawan', array("id_karyawan" => $id));
    }
 
}