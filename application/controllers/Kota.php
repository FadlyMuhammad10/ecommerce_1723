<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kota extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
    }
    public function index()
    {
        $data['kota'] = $this->Mcrud->get_all_data('tbl_kota')->result();
        $this->template->load('layout_admin', 'admin/pengiriman/kota/index', $data);
    }
    public function add()
    {
        $this->template->load('layout_admin', 'admin/pengiriman/kota/form_add');
    }
    public function save()
    {
        $namaKota = $this->input->post('namaKota');
        $dataInsert = array('namakota' => $namaKota);
        $this->Mcrud->insert('tbl_kota', $dataInsert);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data successfully added!
            </div>');
        redirect('kota');
    }
    public function edit($id)
    {
        $data = ['idKota' => $id];
        $data['kota'] = $this->Mcrud->get_by_id('tbl_kota', $data)->row_object();
        $this->template->load('layout_admin', 'admin/pengiriman/kota/form_edit', $data);
    }
    public function update()
    {
        $id = $this->input->post('id');
        $namaKota = $this->input->post('namaKota');
        $dataUpdate = array('namakota' => $namaKota);
        $this->Mcrud->update('tbl_kota', $dataUpdate, 'idKota', $id);
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
            Data success to changed!
            </div>');
            redirect('kota');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data failed to changed!
            </div>');
            redirect('kota');
        }
    }
    public function delete($id)
    {
        $this->Mcrud->delete('tbl_kota', 'idKota', $id);
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
            Data success to deleted!
            </div>');
            redirect('kota');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data failed to deleted!
            </div>');
            redirect('kota');
        }
    }
}
