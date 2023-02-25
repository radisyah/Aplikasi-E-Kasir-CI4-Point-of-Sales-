<?php 
namespace App\Models;
use CodeIgniter\Model;

class ModelProfil extends Model
{
  public function all_data(){
    return $this->db->table('tbl_profil')
    ->orderBy('id_profil', 'DESC')
    ->get()
    ->getResultArray();
  }

  public function detail_data($id_profil){
    return $this->db->table('tbl_profil')
    ->where('id_profil', $id_profil)
    ->get()
    ->getRowArray();
  }

  public function update_data($data){
    $this->db->table('tbl_profil')
    ->where('id_profil',$data['id_profil'])
    ->update($data);
  }
	
}
