<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use App\Models\Gedung_model;
use App\Models\Ruangan_model;
use CodeIgniter\Validation\Rules;

class Landingpage extends BaseController
{
    public function __construct()
    {
        
}
public function index(){
    return view('landingpage');

}
}