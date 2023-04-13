<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('alat_model');
    }
    
    public function index()
    {
        // Melakukan parshing. sehingga ketika memilih menu title juga akan muncul
        $data['title'] = 'Alat';
        $data['alat'] = $this->alat_model->get_data('tbl_alat')->result();

        $this->load->view('master/header', $data);
        $this->load->view('master/sidebar', $data);
        $this->load->view('master_alat/alat', $data);
        $this->load->view('master/footer');
    }

    public function tambah()
    {
        // Melakukan parshing. sehingga ketika memilih menu title juga akan muncul
        $data['title'] = 'Tambah Alat';
            
        $this->load->view('master/header', $data);
        $this->load->view('master/sidebar', $data);
        $this->load->view('master_alat/tambah_alat', $data);
        $this->load->view('master/footer');
    }
    public function tambah_proses()
    {
        $this->_rules();
        if ($this->form_validation->run()== FALSE){
            $this->tambah();
        }else {
            $data = array(
            'nama_alat' => $this->input->post('nama_alat')
            );
            $this->alat_model->insert_data($data,'tbl_alat');
            $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible fade show" role="alert">
            Data Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"> &times; </span></button></div>');
            redirect('alat');        
        }
    }
    public function edit_proses($id_alat)
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
            'id_alat' => $id_alat,     
            'nama_alat' => $this->input->post('nama_alat')
            );
            $this->alat_model->update_data($data,'tbl_alat');
            $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible fade show" role="alert">
            Data Berhasil Diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"> &times; </span></button></div>');
            redirect('alat');          
        }

    }
    public function delete_proses($id)
    {
       $data = array('id_alat' => $id);

        $this->alat_model->delete_data($data,'tbl_alat');
        $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible fade show" role="alert">
        Data Berhasil Didihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"> &times; </span></button></div>');
        redirect('alat');          
    }
    public function _rules()
    {
        $this->form_validation->set_rules('nama_alat', 'Nama Alat', 'required', array(
            'required' => '%s harus diisi !!'
        ));
    }
    
}