<?php
class Member extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
    }

    public function index()
    {
        $data['member'] = $this->Mcrud->get_all_data('tbl_member')->result();
        $this->template->load('layout_admin', 'admin/member/index', $data);
    }

    public function edit($id)
    {
        $data = ['idKonsumen' => $id];
        $data['member'] = $this->Mcrud->get_by_id('tbl_member', $data)->row_object();
        $this->template->load('layout_admin', 'admin/member/form_edit', $data);
    }

    

    public function update()
    {
        $id = $this->input->post('idKonsumen');
        $username = $this->input->post('username');
        $namaKonsumen = $this->input->post('namaKonsumen');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $tlpn = $this->input->post('tlpn');
        $statusAktif = $this->input->post('statusAktif');
        $data = ['username' => $username,
                'namaKonsumen' => $namaKonsumen,
                'alamat' => $alamat,
                'email' => $email,
                'tlpn' => $tlpn,
                'statusAktif' => $statusAktif];
        $this->Mcrud->update('tbl_member', $data,'idKonsumen', $id);
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
            Data success to changed!
            </div>');
            redirect('member');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data failed to changed!
            </div>');
            redirect('member');
        }
    }
   
    
    public function delete($id){
        $this->Mcrud->delete('tbl_member', 'idKonsumen', $id);
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
            Data success to deleted!
            </div>');
            redirect('ongkir');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data failed to deleted!
            </div>');
            redirect('ongkir');
        }
    }
}
