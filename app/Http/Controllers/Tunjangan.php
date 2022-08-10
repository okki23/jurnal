<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TunjanganModel;

class Tunjangan extends Controller
{
    public function __construct(){
        $this->TunjanganModel = new TunjanganModel(); 
    }
   
    public function index()
    { 
        $data = array('listing'=>$this->TunjanganModel->allData());
        return view('tunjangan',$data);

    }

     
    public function create()
    {  
        return view('tunjangan_create');
    } 
    
     
    public function store(Request $request)
    {   
        $data = [
            'kode_tunjangan' => Request()->kode_tunjangan,
            'nama_tunjangan' => Request()->nama_tunjangan,
            'nominal' => Request()->nominal
        ];

        $this->TunjanganModel->savedata($data);
        return redirect()->route('tunjangan')->with('pesan','Data Berhasil Ditambahkan!'); 
       
    }

     
    public function show($id)
    { 

    }

    
    public function edit($id)
    { 
        $data = array('listing'=>$this->TunjanganModel->getData($id));
        return view('tunjangan_edit',$data);
    }

     
    public function update(Request $request)
    {
        $data = [
            'kode_tunjangan' => Request()->kode_tunjangan,
            'nama_tunjangan' => Request()->nama_tunjangan,
            'nominal' => Request()->nominal
        ];

        $id = Request()->id;
        $this->TunjanganModel->updateData($data,$id); 
        return redirect()->route('tunjangan')->with('pesan','Data Berhasil Dirubah!');
    }

   
    public function destroy($id)
    {
        $this->TunjanganModel->deleteData($id);
        return redirect()->route('tunjangan')->with('pesan','Data Berhasil Dihapus!');
    }
}
