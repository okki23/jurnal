<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AkunModel;

class Akun extends Controller
{
    public function __construct(){
        $this->AkunModel = new AkunModel(); 
    }
   
    public function index()
    { 
        $data = array('listing'=>$this->AkunModel->allData());
        return view('akun',$data);

    }

     
    public function create()
    {  
        return view('akun_create');
    } 
    
     
    public function store(Request $request)
    {  
        $data = [ 
            'nama_akun' => Request()->nama_akun
        ];

        $this->AkunModel->savedata($data);
        return redirect()->route('akun')->with('pesan','Data Berhasil Ditambahkan!'); 
       
    }

     
    public function show($id)
    { 

    }

    
    public function edit($id)
    { 
        $data = array('listing'=>$this->AkunModel->getData($id));
        return view('akun_edit',$data);
    }

     
    public function update(Request $request)
    {
        $data = [
            'kode_akun' => Request()->kode_akun,
            'nama_akun' => Request()->nama_akun,
            'jenis_akun' => Request()->jenis_akun
        ];
        $id = Request()->id;
        $this->AkunModel->updateData($data,$id); 
        return redirect()->route('akun')->with('pesan','Data Berhasil Dirubah!');
    }

   
    public function destroy($id)
    {
        $this->AkunModel->deleteData($id);
        return redirect()->route('akun')->with('pesan','Data Berhasil Dihapus!');
    }
}
