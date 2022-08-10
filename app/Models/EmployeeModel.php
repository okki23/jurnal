<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EmployeeModel extends Model
{
    use HasFactory;

    public function index(){
    
    }
    public function datastore(){
        $data = ['nama'=>'Okki Setyawan','alamat'=>'Jakarta'];
        return $data;
    }
}

