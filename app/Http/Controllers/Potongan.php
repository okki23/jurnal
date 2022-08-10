<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PotonganModel;

class Potongan extends Controller
{
    public function __construct(){
        $this->PotonganModel = new PotonganModel(); 
    }
   
    public function index()
    { 
        $data = array('listing'=>$this->PotonganModel->allData());
        return view('potongan',$data);

    }

     
    public function create()
    {  
        return view('potongan_create');
    } 
    
     
    public function store(Request $request)
    {   
        $data = [
            'kode_potongan' => Request()->kode_potongan,
            'nama_potongan' => Request()->nama_potongan,
            'nominal' => Request()->nominal
        ];

        $this->PotonganModel->savedata($data);
        return redirect()->route('potongan')->with('pesan','Data Berhasil Ditambahkan!'); 
       
    }

     
    public function show($id)
    { 

    }

    
    public function edit($id)
    { 
        $data = array('listing'=>$this->PotonganModel->getData($id));
        return view('potongan_edit',$data);
    }

     
    public function update(Request $request)
    {
        $data = [
            'kode_potongan' => Request()->kode_potongan,
            'nama_potongan' => Request()->nama_potongan,
            'nominal' => Request()->nominal
        ];

        $id = Request()->id;
        $this->PotonganModel->updateData($data,$id); 
        return redirect()->route('potongan')->with('pesan','Data Berhasil Dirubah!');
    }

   
    public function destroy($id)
    {
        $this->PotonganModel->deleteData($id);
        return redirect()->route('potongan')->with('pesan','Data Berhasil Dihapus!');
    }
}
