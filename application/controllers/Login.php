<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function aksi_login()
    {
        $this->load->model('Mlogin');
        $u = $this->input->post('username');
        $p = $this->input->post('password');

        $cek = $this->Mlogin->cek_login($u, $p)->num_rows();
        if ($cek == 1) {
            $data_session = array(
                "userName" => $u,
                'status' => 'login'
            );
            $this->session->set_userdata($data_session);
            redirect('adminpanel/dashboard');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Wrong Password!
            </div>');
            redirect('adminpanel');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('userName');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            You have been logged out!
            </div>');

        redirect('adminpanel');
    }
}
