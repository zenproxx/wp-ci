<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contoh extends CI_Controller {

    public function __construct()

    {

        parent::__construct();

    }
    
    
    public function index()

    {
        $this->template->load('template_contoh','contoh');
    }

}