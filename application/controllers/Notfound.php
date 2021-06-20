<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NotFound extends CI_Controller
{


    public function index()
    {
        $this->load->view('errors/error404');
    }
}
