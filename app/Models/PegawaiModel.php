<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PegawaiModel extends Model
{
    use HasFactory;
    public $tablename = 'pegawai';

    public function allData(){
        $data =   DB::table($this->tablename)
        ->join('jabatan', 'pegawai.id_jabatan', '=', 'jabatan.id') 
        ->select('pegawai.*','jabatan.kode_jabatan', 'jabatan.nama_jabatan')
        ->get();
        return $data;
    }

    public function saveData($data){
        return DB::table($this->tablename)->insert($data);
    }

    public function getData($id){
        return DB::table($this->tablename)->where('id',$id)->first();
    }

    public function updateData($data,$id){
        return DB::table($this->tablename)->where('id',$id)->update($data);
    }

    public function deleteData($id){
        return DB::table($this->tablename)->where('id',$id)->delete();
    }

    public function selectjabatan(){
        return DB::table('jabatan')->get();
    }
}
