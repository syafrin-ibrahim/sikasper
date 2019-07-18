<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Fpdf_lib
{

    function __construct()
    {
        include_once APPPATH . '/third_party/FPDF/fpdf.php';
    }

    
}
