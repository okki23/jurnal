<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\JabatanModel;

class Jabatan extends Controller
{
    public function __construct(){
        $this->JabatanModel = new JabatanModel(); 
    }
   
    public function index()
    { 
        $data = array('listing'=>$this->JabatanModel->allData());
        return view('jabatan',$data);

    }

     
    public function create()
    {  
        return view('jabatan_create');
    } 
    
     
    public function store(Request $request)
    {   
        $data = [
            'kode_Jabatan' => Request()->kode_jabatan,
            'nama_jabatan' => Request()->nama_jabatan,
            'gaji_pokok' => Request()->gaji_pokok,
            'gaji_lembur' => Request()->gaji_lembur
        ];

        $this->JabatanModel->savedata($data);
        return redirect()->route('jabatan')->with('pesan','Data Berhasil Ditambahkan!'); 
       
    }

     
    public function show($id)
    { 

    }

    
    public function edit($id)
    { 
        $data = array('listing'=>$this->JabatanModel->getData($id));
        return view('jabatan_edit',$data);
    }

     
    public function update(Request $request)
    {
        $data = [
            'kode_Jabatan' => Request()->kode_jabatan,
            'nama_jabatan' => Request()->nama_jabatan,
            'gaji_pokok' => Request()->gaji_pokok,
            'gaji_lembur' => Request()->gaji_lembur
        ];

        $id = Request()->id;
        $this->JabatanModel->updateData($data,$id); 
        return redirect()->route('jabatan')->with('pesan','Data Berhasil Dirubah!');
    }

   
    public function destroy($id)
    {
        $this->JabatanModel->deleteData($id);
        return redirect()->route('jabatan')->with('pesan','Data Berhasil Dihapus!');
    }
}
