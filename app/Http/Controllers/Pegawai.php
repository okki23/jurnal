<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PegawaiModel;

class Pegawai extends Controller
{
    public function __construct(){ 
        $this->PegawaiModel = new PegawaiModel(); 
    }
   
    public function index()
    { 
        $data = array('listing'=>$this->PegawaiModel->allData());
        return view('pegawai',$data);

    }

     
    public function create()
    { 
        $data = array('selectjabatan'=>$this->PegawaiModel->selectjabatan());
        return view('pegawai_create',$data);
    } 
    
     
    public function store(Request $request)
    {  
        $data = [
            'kode_pegawai' => Request()->kode_pegawai,
            'nama_lengkap' => Request()->nama_lengkap,
            'tempat_lahir' => Request()->tempat_lahir,
            'tanggal_lahir' => Request()->tanggal_lahir,
            'jenkel' => Request()->jenkel,
            'no_hp' => Request()->no_hp,
            'email' => Request()->email,
            'alamat' => Request()->alamat,
            'id_jabatan' => Request()->id_jabatan
        ];

        $this->PegawaiModel->savedata($data);
        return redirect()->route('pegawai')->with('pesan','Data Berhasil Ditambahkan!'); 
       
    }

     
    public function show($id)
    { 

    }

    
    public function edit($id)
    { 
        $data = array('listing'=>$this->PegawaiModel->getData($id),
                      'selectjabatan'=>$this->PegawaiModel->selectjabatan());
        return view('pegawai_edit',$data);
    }

     
    public function update(Request $request)
    {
        $data = [
            'kode_pegawai' => Request()->kode_pegawai,
            'nama_lengkap' => Request()->nama_lengkap,
            'tempat_lahir' => Request()->tempat_lahir,
            'tanggal_lahir' => Request()->tanggal_lahir,
            'jenkel' => Request()->jenkel,
            'no_hp' => Request()->no_hp,
            'email' => Request()->email,
            'alamat' => Request()->alamat,
            'id_jabatan' => Request()->id_jabatan             
        ];
        $id = Request()->id;
        $this->PegawaiModel->updateData($data,$id); 
        return redirect()->route('pegawai')->with('pesan','Data Berhasil Dirubah!');
    }

   
    public function destroy($id)
    {
        $this->PegawaiModel->deleteData($id);
        return redirect()->route('pegawai')->with('pesan','Data Berhasil Dihapus!');
    }
}
