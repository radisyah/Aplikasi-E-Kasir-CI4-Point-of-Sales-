<?php 
namespace App\Models;
use CodeIgniter\Model;

class ModelSetting extends Model
{
  public function all_data(){
    return $this->db->table('tbl_setting')
    ->where('id_toko','1')
    ->get()
    ->getRowArray();
  }

  public function update_data($data)
  {
   return $this->db->table('tbl_setting')
   ->where('id_toko', $data['id_toko'])
   ->update($data);
  }


	
}
