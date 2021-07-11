<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Upah_model extends CI_Model{
    public function getpdf(){
        $query = $this->db->query('SELECT id_tabel, potongan, total, karyawan.Nama, upah.upah
        FROM input_upah 
        JOIN karyawan on input_upah.id_karyawan = karyawan.id_karyawan
        join upah on input_upah.id_upah = upah.id_upah
        WHERE id_tabel IN (
            SELECT MAX(id_tabel)
            FROM input_upah
            GROUP BY input_upah.id_karyawan
        )
        ORDER BY Nama ASC;');
        return $query->result_array(); 
    }
    public function getDataPagination($limits, $offsets, $keyword=null)
    {
        if ($keyword){
            $query = $this->db->query('SELECT id_tabel, potongan, total, karyawan.Nama, upah.upah
            FROM input_upah 
            JOIN karyawan on input_upah.id_karyawan = karyawan.id_karyawan
            join upah on input_upah.id_upah = upah.id_upah
            WHERE id_tabel IN (
            SELECT MAX(id_tabel)
            FROM input_upah
            GROUP BY input_upah.id_karyawan
            ) AND
            Nama LIKE "%'.$keyword.'%" 
            ORDER BY Nama ASC
            LIMIT '.$limits.' OFFSET '.$offsets.'; ');
            // $this -> db -> like('Nama',$keyword);
            // $this -> db -> or_like('upah',$keyword);
            // $this -> db -> or_like('potongan',$keyword);
            // $this -> db -> or_like('total',$keyword);
        }else{
            $query = $this->db->query('SELECT id_tabel, potongan, total, karyawan.Nama, upah.upah
            FROM input_upah 
            JOIN karyawan on input_upah.id_karyawan = karyawan.id_karyawan
            join upah on input_upah.id_upah = upah.id_upah
            WHERE id_tabel IN (
                SELECT MAX(id_tabel)
                FROM input_upah
                GROUP BY input_upah.id_karyawan
            )
            ORDER BY Nama ASC 
            LIMIT '.$limits.' OFFSET '.$offsets.';');
            }
        return $query->result_array();
    }
    public function getUpah()
    {
        $this->db->select('upah');
        $this->db->from('upah');
        $this->db->join('karyawan','upah.id_upah = karyawan.id_upah','LEFT');	
        //$this->db->where('id_karyawan', $id);	
        return $this->db->get()->result();
    }
    public function delete($id)
    {
        return $this->db->delete('input_upah', array("id_karyawan" => $id));
    }
    public function save_batch($data){    
        return $this->db->insert_batch('input_upah', $data);  
    }
    public function totalOutcome(){
        $query = $this->db->query('SELECT sum(total) as total 
        FROM input_upah 
        WHERE id_tabel IN 
        ( SELECT MAX(id_tabel) FROM input_upah GROUP BY input_upah.id_karyawan )');
        return $query->result();
    }
    public function getTinggi(){
        $query = $this->db->query('SELECT max(total) as upahtinggi
        FROM input_upah WHERE id_tabel IN 
        ( SELECT MAX(id_tabel) FROM input_upah GROUP BY input_upah.id_karyawan )');
        return $query->result();
    }
    public function getRendah(){
        $query = $this->db->query('SELECT min(total) as upahrendah
        FROM input_upah WHERE id_tabel IN 
        ( SELECT MAX(id_tabel) FROM input_upah GROUP BY input_upah.id_karyawan )');
        return $query->result();
    }
}