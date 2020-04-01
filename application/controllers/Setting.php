<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends MY_Controller
{
   private $id;

   public function __construct()
   {
      parent::__construct();
      $is_login   = $this->session->userdata('is_login');
      $this->id   = $this->session->userdata('id');
      // jika belum login akan diarahkan ke halaman home
      if (!$is_login) {
         redirect(base_url());
         return;
      }
   }

   // ******************************************************************************************
   // ******************** LEVEL & MENU AKSES **************************************************
   public function level_menuAkses()
   {
      $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $data['title']       = 'Level & Menu Akses';
      $data['user']        = $user;
      $data['level']       = $this->db->get('user_level')->result_array();
      $data['page']        = 'setting/level_menuAkses';
      return $this->view($data);
   }

   // #################### lavel ###############################################################
   public function tambahLevel()
   {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('level_id', 'Level ID', 'trim|required|is_unique[user_level.level_id]');
      $this->form_validation->set_rules('level', 'Level', 'trim|required|is_unique[user_level.level]');

      if ($this->form_validation->run() == false) {
         $this->session->set_flashdata('error', 'Level ID & Nama Level harus diisi dengan benar.');
         redirect('setting/level_menuAkses');
      } else {
         $input = $this->input->post(null, true); // mengambil semua data input berupa array
         $this->db->insert('user_level', $input);
         $this->session->set_flashdata('success', 'Data berhasil disimpan!');
         redirect('setting/level_menuAkses');
      }
   }

   public function editLevel()
   {
      // $data['levelData'] = $this->setting->ambilBarisTabel($id); // setting_model

      $this->load->library('form_validation');
      $this->form_validation->set_rules('level_id', 'Level ID', 'trim|required');
      $this->form_validation->set_rules('level', 'Level', 'trim|required');

      if ($this->form_validation->run() == false) {
         $this->session->set_flashdata('error', 'Form harus diisi dengan benar.');
         redirect('setting/level_menuAkses');
      } else {
         $this->setting->updateLevel(); // setting_model
         $this->session->set_flashdata('success', 'Data berhasil diubah.');
         redirect('setting/level_menuAkses');
      }
   }

   public function hapusLevel($id)
   {
      $this->setting->deleteLevel($id); // setting_model
      $this->session->set_flashdata('success', 'Data berhasil dihapus.');
      redirect('setting/level_menuAkses');
   }

   public function menu_akses($level_id)
   {
      $data['title'] = 'Level & Menu Akses';
      // mengambil data user dr tabel user berdasarkan email yang ada di session
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      // mengambil data role dr tabel user_level berdasarkan id yang di dapat dari level_id
      $data['level'] = $this->db->get_where('user_level', ['level_id' => $level_id])->row_array();
      $data['access_menu'] = $this->db->get('user_access_menu')->result_array();

      $this->db->where('menu_id !=', 3); // menampilkan semua menu kecuali menu_id 3
      $data['menu']     = $this->db->get('user_menu')->result_array();
      $data['page']     = 'setting/menu_akses';
      return $this->view($data);
   }

   public function ubah_akses() // method untuk jquary
   {
      // ambil data dari ajax yang ada di footer
      $level_id = $this->input->post('levelId');
      $menu_id = $this->input->post('menuId');

      $data = [
         'level_id' => $level_id,
         'menu_id' => $menu_id
      ];

      $result = $this->db->get_where('user_access_menu', $data);
      if ($result->num_rows() < 1) {
         $this->db->insert('user_access_menu', $data); // kalau tidak ada maka tambah data
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akses berhasil ditambah.</div>');
      } else {
         $this->db->delete('user_access_menu', $data); // kalau ada maka hapus data
         $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Akses berhasil dihapus.</div>');
      }
   }



   // *****************************************************************************************
   // ******************** MENU & SUBMENU *****************************************************
   public function menu_submenu()
   {
      $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $data['title']    = 'Menu & Submenu';
      $data['user']     = $user;
      $data['menu']     = $this->db->get('user_menu')->result_array();
      $data['submenu']  = $this->db->get('user_submenu')->result_array();
      $data['page']     = 'setting/menu_submenu';
      return $this->view($data);
   }

   // #################### menu ################################################################
   public function tambahMenu()
   {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('menu_id', 'Menu ID', 'trim|required|is_unique[user_menu.menu_id]');
      $this->form_validation->set_rules('menu_title', 'Menu Title', 'trim|required|is_unique[user_menu.menu_title]');
      $this->form_validation->set_rules('icon', 'Icon', 'trim|required');

      if ($this->form_validation->run() == false) {
         $this->session->set_flashdata('error', 'Level ID & Nama Level harus diisi dengan benar.');
         redirect('setting/menu_submenu');
      } else {
         $input = $this->input->post(null, true); // mengambil semua data input berupa array
         $this->db->insert('user_menu', $input);
         $this->session->set_flashdata('success', 'Data berhasil disimpan!');
         redirect('setting/menu_submenu');
      }
   }

   public function hapusMenu($id)
   {
      $this->setting->deleteMenu($id); // setting_model
      $this->session->set_flashdata('success', 'Data berhasil dihapus.');
      redirect('setting/menu_submenu');
   }

   // #################### submenu #############################################################
   public function tambahSubmenu()
   {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('menu_id', 'Menu ID', 'trim|required');
      $this->form_validation->set_rules('submenu_title', 'Submenu Title', 'trim|required|is_unique[user_submenu.submenu_title]');
      $this->form_validation->set_rules('url', 'URL', 'trim|required|is_unique[user_submenu.url]');
      $this->form_validation->set_rules('icon', 'Icon', 'trim|required');
      // $this->form_validation->set_rules('is_active', 'Akrif', 'trim|required');

      if ($this->form_validation->run() == false) {
         $this->session->set_flashdata('error', 'Semua harus diisi dengan benar.');
         redirect('setting/menu_submenu');
      } else {
         $data = [
            'menu_id'         => $this->input->post('menu_id'),
            'submenu_title'   => $this->input->post('submenu_title'),
            'url'             => $this->input->post('url'),
            'icon'            => $this->input->post('icon'),
            'is_active'       => 1
         ];
         $this->db->insert('user_submenu', $data);
         $this->session->set_flashdata('success', 'Data berhasil disimpan!');
         redirect('setting/menu_submenu');
      }
   }

   public function hapusSubmenu($id)
   {
      $this->setting->deleteSubmenu($id); // setting_model
      $this->session->set_flashdata('success', 'Data berhasil dihapus.');
      redirect('setting/menu_submenu');
   }
}
