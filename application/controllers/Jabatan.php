<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('KategoriModel','kat');
  }

  function index()
  {
    $data['isDatatable']=true;
    $data['title']='Data Jabatan';
    $data['jabatan']=$this->kat->getJabatan();
    $this->load->view('jabatan/Index', $data);
  }

  public function add()
  {
    $this->load->view('jabatan/AddJabatan');
  }

}
