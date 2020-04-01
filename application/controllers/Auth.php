<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('form_validation');
      $this->form_validation->set_error_delimiters(
         '<small class="form-text text-danger font-italic">',
         '</small>'
      );
   }

   public function index()
   {
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');

      if ($this->form_validation->run() == false) {
         $data['title'] = 'login';
         $this->load->view('auth/index', $data);
      } else {
         $this->login();
      }
   }

   private function login()
   {
      $email      = $this->input->post('email');
      $password   = $this->input->post('password');
      // mengambil data dr tabel user berdasarkan email yg didapat dr input email(login)
      $user = $this->db->get_where('user', ['email' => $email])->row_array();

      if ($user) {
         // jika user aktif
         if ($user['is_active'] == 1) {
            // cek password apakah sama dengan password yang ada di tabel user atau tidak
            if (password_verify($password, $user['password'])) {
               // setelah login siapkan data yg dibutuhkan saja, jgn memasukan password dlm session
               $data = [
                  'email'     => $user['email'],
                  'level_id'   => $user['level_id'],
                  'is_login'  => '1'
               ];
               $this->session->set_userdata($data);
               // mengarahkan halaman login sesuai level
               if ($user['level_id'] == 1) {
                  redirect('akun');
               } else {
                  if ($user['level_id'] == 2) {
                     redirect('akun');
                  }
                  redirect('akun');
               }
               // akhir mengarahkan
            } else {
               $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
               redirect('auth');
            }
         } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum diaktifkan!</div>');
            redirect('auth');
         }
      } else {
         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar!</div>');
         redirect('auth');
      }
   }

   public function register()
   {
      $this->form_validation->set_rules('name', 'Nama', 'trim|required');
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
      $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
      $this->form_validation->set_rules('password1', 'Password', 'trim|required|matches[password]');

      if ($this->form_validation->run() == false) {
         $data['title']  = 'Register';
         $this->load->view('auth/register', $data);
      } else {
         $data = [
            // penambahan true untuk menghindari SSS
            'foto'         => 'avatar.jpg',
            'name'         => htmlspecialchars($this->input->post('name', true)),
            'email'        => htmlspecialchars($this->input->post('email', true)),
            'password'     => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'level_id'     => 1,
            'is_active'    => 1,
            'date_created' => time()
         ];
         // mamasukan data ke database - data harus berurut sesuai di tabel
         $this->db->insert('user', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please Login. </div>');
         redirect('auth');
      }
   }
}
/* End of file Controllername.php */
