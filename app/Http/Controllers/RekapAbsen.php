<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\RekapAbsenModel;
use PDF;


class RekapAbsen extends Controller
{
    public function __construct(){
        $this->RekapAbsenModel = new RekapAbsenModel(); 
    }
   
    public function index()
    { 
        $data = array('listing'=>$this->RekapAbsenModel->allData());
        return view('rekap_absen',$data);

    }

     
    public function create()
    { 
        $data = array('selectpegawai'=>$this->RekapAbsenModel->selectpegawai());
        return view('rekap_absen_create',$data);
    } 
    
     
    public function store(Request $request)
    {  
        $data = [
            'kode_rekap' => Request()->kode_rekap,
            'tanggal_rekap' => Request()->tanggal_rekap,
            'id_pengguna' => Request()->id_pengguna,
            'id_pegawai' => Request()->id_pegawai,
            'jumlah_hadir' => Request()->jumlah_hadir,
            'jumlah_lembur' => Request()->jumlah_lembur
        ];

        $this->RekapAbsenModel->savedata($data);
        return redirect()->route('rekapabsen')->with('pesan','Data Berhasil Ditambahkan!'); 
       
    }

     
    public function show($id)
    { 

    }

    
    public function edit($id)
    { 
        $data = array('listing'=>$this->RekapAbsenModel->getData($id),
                      'selectpegawai'=>$this->RekapAbsenModel->selectpegawai());
        return view('rekap_absen_edit',$data);
    }

    public function print($id)
    { 
        $data = array('listing'=>$this->RekapAbsenModel->getDataPrint($id));
        $pdf = PDF::loadView('rekap_absen_print', $data);
 
        return $pdf->stream();

        // $data = array('listing'=>$this->RekapAbsenModel->getDataPrint($id));
        // return view('rekap_absen_print',$data);
    }

     
    public function update(Request $request)
    {
        $data = [
            'kode_rekap' => Request()->kode_rekap,
            'tanggal_rekap' => Request()->tanggal_rekap,
            'id_pengguna' => Request()->id_pengguna,
            'id_pegawai' => Request()->id_pegawai,
            'jumlah_hadir' => Request()->jumlah_hadir,
            'jumlah_lembur' => Request()->jumlah_lembur
        ];
        $id = Request()->id;
        $this->RekapAbsenModel->updateData($data,$id); 
        return redirect()->route('rekapabsen')->with('pesan','Data Berhasil Dirubah!');
    }

   
    public function destroy($id)
    {
        $this->RekapAbsenModel->deleteData($id);
        return redirect()->route('rekapabsen')->with('pesan','Data Berhasil Dihapus!');
    }
}
