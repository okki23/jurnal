<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JurnalModel extends Model
{
    use HasFactory;
    public $tablename = 'jurnal';

    public function allData(){
        $data =   DB::table($this->tablename)
        ->join('akun', 'jurnal.id_akun', '=', 'akun.id') 
        ->select('jurnal.*','akun.kode_akun', 'akun.jenis_akun','akun.nama_akun')
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

    public function selectakun(){
        return DB::table('akun')->get();
    }
}
