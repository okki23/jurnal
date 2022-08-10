<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PenggunaModel;

class pengguna extends Controller
{
    public function __construct(){
        $this->PenggunaModel = new PenggunaModel(); 
    }
   
    public function index()
    { 
        $data = array('listing'=>$this->PenggunaModel->allData());
        return view('pengguna',$data);

    }

     
    public function create()
    { 
        $data = array('selectpegawai'=>$this->PenggunaModel->selectpegawai());
        return view('pengguna_create',$data);
    } 
    
     
    public function store(Request $request)
    {  
        $data = [
           
            'kode_pengguna' => Request()->kode_pengguna,
            'nama_pengguna' => Request()->nama_pengguna,
            'password' => Request()->password,
            'email' => Request()->email,  
            'level' => Request()->level,
            'id_pegawai' => Request()->id_pegawai
        ];

        $this->PenggunaModel->savedata($data);
        return redirect()->route('pengguna')->with('pesan','Data Berhasil Ditambahkan!'); 
       
    }

     
    public function show($id)
    { 

    }

    
    public function edit($id)
    { 
        $data = array('listing'=>$this->PenggunaModel->getData($id),
                      'selectpegawai'=>$this->PenggunaModel->selectpegawai());
        return view('pengguna_edit',$data);
    }

     
    public function update(Request $request)
    {
        $data = [
            'kode_pengguna' => Request()->kode_pengguna,
            'nama_pengguna' => Request()->nama_pengguna,
            'password' => Request()->password,
            'hak_akses' => Request()->hak_akses,
            'id_pegawai' => Request()->id_pegawai
        ];

        $id = Request()->id;
        $this->PenggunaModel->updateData($data,$id); 
        return redirect()->route('pengguna')->with('pesan','Data Berhasil Dirubah!');
    }

   
    public function destroy($id)
    {
        $this->PenggunaModel->deleteData($id);
        return redirect()->route('pengguna')->with('pesan','Data Berhasil Dihapus!');
    }
}
