<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kurir extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
    }
    public function index()
    {
        $data['kurir'] = $this->Mcrud->get_all_data('tbl_kurir')->result();
        $this->template->load('layout_admin', 'admin/pengiriman/kurir/index', $data);
    }
    public function add()
    {
        $this->template->load('layout_admin', 'admin/pengiriman/kurir/form_add');
    }
    public function save()
    {
        $namaKurir = $this->input->post('namaKurir');
        $dataInsert = array('namakurir' => $namaKurir);
        $this->Mcrud->insert('tbl_kurir', $dataInsert);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data successfully added!
            </div>');
        redirect('kurir');
    }
    public function edit($id)
    {
        $data = ['idKurir' => $id];
        $data['kurir'] = $this->Mcrud->get_by_id('tbl_kurir', $data)->row_object();
        $this->template->load('layout_admin', 'admin/pengiriman/kurir/form_edit', $data);
    }
    public function update()
    {
        $id = $this->input->post('id');
        $namaKurir = $this->input->post('namaKurir');
        $dataUpdate = array('namakurir' => $namaKurir);
        $this->Mcrud->update('tbl_kurir', $dataUpdate, 'idKurir', $id);
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
            Data success to changed!
            </div>');
            redirect('kurir');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data failed to changed!
            </div>');
            redirect('kurir');
        }
    }
    public function delete($id)
    {
        $this->Mcrud->delete('tbl_kurir', 'idKurir', $id);
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
            Data success to deleted!
            </div>');
            redirect('kurir');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data failed to deleted!
            </div>');
            redirect('kurir');
        }
    }
}
