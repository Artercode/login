<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting_model extends MY_Model
{
   public function getDefaultValuesMenuAkses()
   {
      return [
         'id'        => '',
         'level_id'  => '',
         'menu_id'   => ''
      ];
   }


   public function ambilBarisTabel($id) // ambil 1 baris data sesuai id dari form
   {
      // $query = $this->db->query('SELECT * FROM blog WHERE url = "' . $url . '"');
      return $this->db->get_where('user_level', ['id' => $id]);
   }

   // ******************************************************************************************
   // ******************** LEVEL & MENU AKSES **************************************************
   // #################### lavel ###############################################################
   public function updateLevel()
   {
      $data = [
         'level_id'  => $this->input->post('level_id', true),
         'level'     => $this->input->post('level', true)
      ];
      $this->db->where('id', $this->input->post('id')); // id dari input hidden
      $this->db->update('user_level', $data);
      return $this->db->affected_rows();
   }

   public function deleteLevel($id) // id yang dikirim dari tombol delete
   {
      // $this->db->where('id', $id);
      // $this->db->delete('user_level');
      // atau pakai 
      $this->db->delete('user_level', ['id' => $id]); // id yang sama dengan $id
      return $this->db->affected_rows(); // menhasilkan angka 1 guna membuat pesan / alert
   }

   // #################### menu akses ##########################################################
   public function deleteMenuAkses($id)
   {
      $this->db->delete('user_access_menu', ['id' => $id]);
      return $this->db->affected_rows();
   }



   // *****************************************************************************************
   // ******************** MENU & SUBMENU *****************************************************
   // #################### menu ################################################################
   public function deleteMenu($id)
   {
      $this->db->delete('user_menu', ['id' => $id]);
      return $this->db->affected_rows();
   }


   // #################### submenu #############################################################
   public function deleteSubmenu($id)
   {
      $this->db->delete('user_submenu', ['id' => $id]);
      return $this->db->affected_rows();
   }
}
