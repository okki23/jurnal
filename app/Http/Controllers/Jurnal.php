<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\JurnalModel;

class Jurnal extends Controller
{
    public function __construct(){
        $this->JurnalModel = new JurnalModel(); 
    }
   
    public function index()
    { 
        $data = array('listing'=>$this->JurnalModel->allData());
        return view('jurnal',$data);

    }

     
    public function create()
    { 
        $data = array('selectakun'=>$this->JurnalModel->selectakun());
        return view('jurnal_create',$data);
    } 
    
     
    public function store(Request $request)
    {   
        $data = [
            'no_jurnal' => Request()->no_jurnal,
            'tanggal_jurnal' => Request()->tanggal_jurnal,
            'id_pengguna' => Request()->id_pengguna,
            'id_akun' => Request()->id_akun,
            'keterangan' => Request()->keterangan,
            'debet' => Request()->debet,
            'kredit' => Request()->kredit
        ];

        $this->JurnalModel->savedata($data);
        return redirect()->route('jurnal')->with('pesan','Data Berhasil Ditambahkan!'); 
       
    }

     
    public function show($id)
    { 

    }

    
    public function edit($id)
    { 
        $data = array('listing'=>$this->JurnalModel->getData($id),
                      'selectakun'=>$this->JurnalModel->selectakun());
        return view('jurnal_edit',$data);
    }

     
    public function update(Request $request)
    {
        $data = [
            'no_jurnal' => Request()->no_jurnal,
            'tanggal_jurnal' => Request()->tanggal_jurnal,
            'id_pengguna' => Request()->id_pengguna,
            'id_akun' => Request()->id_akun,
            'keterangan' => Request()->keterangan,
            'debet' => Request()->debet,
            'kredit' => Request()->kredit
        ];

        $id = Request()->id;
 
        $this->JurnalModel->updateData($data,$id); 
        return redirect()->route('jurnal')->with('pesan','Data Berhasil Dirubah!');
    }

   
    public function destroy($id)
    {
        $this->JurnalModel->deleteData($id);
        return redirect()->route('jurnal')->with('pesan','Data Berhasil Dihapus!');
    }
}
