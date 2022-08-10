<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RekapAbsenModel extends Model
{
    use HasFactory;
    public $tablename = 'rekap_absen';

    public function allData(){
        $data =   DB::table($this->tablename)
        ->join('pegawai','rekap_absen.id_pegawai','pegawai.id')
        ->join('jabatan','pegawai.id_jabatan','jabatan.id')
        ->select('rekap_absen.*','pegawai.nama_lengkap','jabatan.nama_jabatan') 
        ->get();
        return $data;
    }

    public function saveData($data){
        return DB::table($this->tablename)->insert($data);
    }

    public function getData($id){
        return DB::table($this->tablename)->where('id',$id)->first();
    }

    public function getDataPrint($id){
        return DB::table($this->tablename)
        ->join('pegawai','rekap_absen.id_pegawai','pegawai.id')
        ->join('jabatan','pegawai.id_jabatan','jabatan.id')
        ->select('rekap_absen.*','pegawai.kode_pegawai','pegawai.nama_lengkap','jabatan.nama_jabatan')
        ->where('rekap_absen.id',$id)
        ->first();
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
