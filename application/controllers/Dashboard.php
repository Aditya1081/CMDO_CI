<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function index()
    {
        // Melakukan parshing. sehingga ketika memilih menu title juga akan muncul
        $data['title'] = 'Dashboard';

        $this->load->view('master/header', $data);
        $this->load->view('master/sidebar', $data);
        $this->load->view('dashboard');
        $this->load->view('master/footer');
    }
}