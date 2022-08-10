<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PenggunaModel extends Model
{
    use HasFactory;
    public $tablename = 'pengguna';

    public function allData(){
        $data =   DB::table($this->tablename)
        ->join('pegawai', 'pengguna.id_pegawai', '=', 'pegawai.id') 
        ->select('pengguna.*','pegawai.kode_pegawai', 'pegawai.nama_lengkap')
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

    public function selectpegawai(){
        return DB::table('pegawai')->get();
    }
}
