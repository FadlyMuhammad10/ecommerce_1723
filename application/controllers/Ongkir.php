<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ongkir extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
    }
    public function index()
    {
        $data['ongkir'] = $this->Mcrud->join_table('tbl_biaya_kirim bk', 'tbl_kurir k', 'bk.idKurir=k.idKurir', 'tbl_kota a', 'bk.idKotaAsal = a.idKota', 'tbl_kota b', 'bk.idKotaTujuan = b.idKota')->result();
        $this->template->load('layout_admin', 'admin/pengiriman/ongkir/index', $data);
    }
    public function add()
    {
        $data['kota'] = $this->Mcrud->get_all_data('tbl_kota')->result();
        $data['kurir'] = $this->Mcrud->get_all_data('tbl_kurir')->result();
        $this->template->load('layout_admin', 'admin/pengiriman/ongkir/form_add', $data);
    }
    public function save()
    {
        $idKurir = $this->input->post('idKurir');
        $idKotaAsal = $this->input->post('idKotaAsal');
        $idKotaTujuan = $this->input->post('idKotaTujuan');
        $biaya = $this->input->post('biaya');
        $data = [
            'idKurir' => $idKurir,
            'idKotaAsal' => $idKotaAsal,
            'idKotaTujuan' => $idKotaTujuan,
            'biaya' => $biaya
        ];
        $this->Mcrud->insert('tbl_biaya_kirim', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data successfully added!
            </div>');
        redirect('ongkir');
    }
    public function edit($id)
    {
        $id = ['idBiayaKirim' => $id];
        $data['kota'] = $this->Mcrud->get_all_data('tbl_kota')->result();
        $data['kurir'] = $this->Mcrud->get_all_data('tbl_kurir')->result();
        $data['ongkir'] = $this->Mcrud->edit_join('tbl_biaya_kirim bk', 'tbl_kurir k', 'bk.idKurir=k.idKurir', 'tbl_kota a', 'bk.idKotaAsal = a.idKota', 'tbl_kota b', 'bk.idKotaTujuan = b.idKota', $id)->row_object();
        $this->template->load('layout_admin', 'admin/pengiriman/ongkir/form_edit', $data);
    }
    public function update()
    {
        $id = $this->input->post('id');
        $idKurir = $this->input->post('idKurir');
        $idKotaAsal = $this->input->post('idKotaAsal');
        $idKotaTujuan = $this->input->post('idKotaTujuan');
        $biaya = $this->input->post('biaya');
        $data = [

            'idKurir' => $idKurir,
            'idKotaAsal' => $idKotaAsal,
            'idKotaTujuan' => $idKotaTujuan,
            'biaya' => $biaya

        ];
        $this->Mcrud->update('tbl_biaya_kirim', $data, 'idBiayaKirim', $id);
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
            Data success to changed!
            </div>');
            redirect('ongkir');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data failed to changed!
            </div>');
            redirect('ongkir');
        }
    }
    public function delete($id)
    {
        $this->Mcrud->delete('tbl_biaya_kirim', 'idBiayaKirim', $id);
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
