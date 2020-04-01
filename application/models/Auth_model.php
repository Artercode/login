<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends MY_Model
{
	// menentukan tabel yang digunakan karena nama model tidak sama dengan nama tabel
	protected $table = 'user';

	public function getDefaultValues()
	{
		return [
			'name'     	=> '',
			'address' 	=> '',
			'kota'     	=> '',
			'provinsi'	=> '',
			'handphone'	=> '',
			'email'     => '',
			'password'  => ''
		];
	}

	// fungsi input validasi
	public function validate()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters(
			'<small class="form-text text-danger">',
			'</small>'
		);
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		return $this->form_validation->run();
	}

	public function run($input)
	{
		// mencari email apa sudah terdaftar atau belum
		$query = $this->where('email', strtolower($input->email))
			->where('is_active', 1)
			->first();
		// jika email ada dalam database

		$sess_data = [
			'id'        => $query->id,
			'name'      => $query->name,
			'email'     => $query->email,
			'role'      => $query->role,
			'is_login'  => true,
		];
		$this->session->set_userdata($sess_data);
		return true;
	}
}

/* End of file Login_model.php */
