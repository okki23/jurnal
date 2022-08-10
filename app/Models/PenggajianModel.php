<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PenggajianModel extends Model
{
    use HasFactory;
    public $tablename = 'penggajian';

    public function allData(){
        $data =   DB::table($this->tablename)
        ->join('rekap_absen', 'penggajian.no_rekap', '=', 'rekap_absen.kode_rekap')  
        ->join('pegawai', 'rekap_absen.id_pegawai', '=', 'pegawai.id')  
        ->join('jabatan', 'pegawai.id_jabatan', '=', 'jabatan.id')  
        ->join('potongan', 'penggajian.id_potongan', '=', 'potongan.id')  
        ->join('tunjangan', 'penggajian.id_tunjangan', '=', 'tunjangan.id')  
        ->select('penggajian.*','penggajian.id as idnya', 'rekap_absen.jumlah_hadir','rekap_absen.jumlah_lembur',
        'pegawai.kode_pegawai','pegawai.nama_lengkap','jabatan.kode_jabatan','jabatan.nama_jabatan','jabatan.gaji_lembur',
        'jabatan.gaji_pokok','potongan.kode_potongan','potongan.nama_potongan','potongan.nominal as nominal_potongan',
        'tunjangan.kode_tunjangan','tunjangan.nama_tunjangan','tunjangan.nominal as nominal_tunjangan')
        ->get();
        return $data;
    }

    public function saveData($data){
        return DB::table($this->tablename)->insert($data);
    }
    
    public function detail($id){
         
            $data =   DB::table($this->tablename)
            ->join('rekap_absen', 'penggajian.no_rekap', '=', 'rekap_absen.kode_rekap')  
            ->join('pegawai', 'rekap_absen.id_pegawai', '=', 'pegawai.id')  
            ->join('jabatan', 'pegawai.id_jabatan', '=', 'jabatan.id')  
            ->join('potongan', 'penggajian.id_potongan', '=', 'potongan.id')  
            ->join('tunjangan', 'penggajian.id_tunjangan', '=', 'tunjangan.id')  
            ->select('penggajian.*','penggajian.id as idnya', 'rekap_absen.jumlah_hadir','rekap_absen.jumlah_lembur',
            'pegawai.kode_pegawai','pegawai.nama_lengkap','jabatan.kode_jabatan','jabatan.nama_jabatan','jabatan.gaji_lembur',
            'jabatan.gaji_pokok','potongan.kode_potongan','potongan.nama_potongan','potongan.nominal as nominal_potongan',
            'tunjangan.kode_tunjangan','tunjangan.nama_tunjangan','tunjangan.nominal as nominal_tunjangan')
            ->where('penggajian.id',$id)
            ->first();
            return $data;
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

    public function selectrekap(){
        return DB::table('rekap_absen')->get();
    }
    public function selectpotongan(){
        return DB::table('potongan')->get();
    }
    public function selecttunjangan(){
        return DB::table('tunjangan')->get();
    }
}
