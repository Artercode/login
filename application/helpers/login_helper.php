<!-- didalam helper thidak mengenal perintah CI atau $this -->
<?php
// untuk check sesuai dengan tabel
function check_akses($level_id, $menu_id)
{
   $ci = get_instance();
   // $ci->db->get_where('user_access_menu', [
   //    'level_id'  => $level_id,
   //    'menu_id'   => $menu_id
   // ]);
   // atau
   $ci->db->where('level_id', $level_id);
   $ci->db->where('menu_id', $menu_id);
   $result = $ci->db->get('user_access_menu');

   if ($result->num_rows() > 0) {
      return "checked='checked'";
   }
}
