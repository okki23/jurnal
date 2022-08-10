 
<div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
            
              
                <div class="col-12">
                  <h4>
                  
                    <div style="text-align:center;">
                    <i class="fas fa-globe"></i> RS BUMI PROKLAMASI
              <h1 style="text-align:center;">Slip Gaji</h1>
              </div>
                    <small class="float-right">Tanggal Cetak : {{ $listing->tanggal_slip }} </small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                   
                  <address style="font-weight: bold;"> 
                    NIP : {{ $listing->kode_pegawai }} <br>
                    Nama : {{ $listing->nama_lengkap }}  <br>
                    Jabatan : {{ $listing->nama_jabatan }}  <br>
                    Jumlah Hadir : {{ $listing->jumlah_hadir }} Hari  <br>
                    Jumlah Lembur : {{ $listing->jumlah_lembur }} Hari <br>
                    
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                 
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>No Slip Gaji : {{ $listing->no_slip }} </b><br>
                  <br>
                
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Rincian</th>  
                      <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td>Gaji Pokok</td> 
                      <td>Rp {{ number_format($listing->gaji_pokok) }}</td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Gaji Lembur ( x {{ $listing->jumlah_lembur }})</td> 
                      <td>Rp {{ number_format($listing->gaji_lembur*$listing->jumlah_lembur) }}</td>  
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Tunjangan ( {{ $listing->nama_tunjangan }})</td>
                      <td>Rp {{ number_format($listing->nominal_tunjangan) }}</td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Potongan ( {{ $listing->nama_potongan }} )</td>
                      <td>Rp {{ number_format($listing->nominal_potongan) }}</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                
                </div>
                <!-- /.col -->
                <div class="col-6">
                 
                  <div class="table-responsive">
                    <table class="table">
                      <tbody style="font-weight:bold; font-size:20px;">
                      <tr>
                        <th>Total:</th>
                        @php
                        function penyebut($nilai) {
                        $nilai = abs($nilai);
                        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
                        $temp = "";
                        if ($nilai < 12) {
                            $temp = " ". $huruf[$nilai];
                        } else if ($nilai <20) {
                            $temp = penyebut($nilai - 10). " belas";
                        } else if ($nilai < 100) {
                            $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
                        } else if ($nilai < 200) {
                            $temp = " seratus" . penyebut($nilai - 100);
                        } else if ($nilai < 1000) {
                            $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
                        } else if ($nilai < 2000) {
                            $temp = " seribu" . penyebut($nilai - 1000);
                        } else if ($nilai < 1000000) {
                            $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
                        } else if ($nilai < 1000000000) {
                            $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
                        } else if ($nilai < 1000000000000) {
                            $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
                        } else if ($nilai < 1000000000000000) {
                            $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
                        }     
                        return $temp;
                    }

                    function terbilang($nilai) {
                        if($nilai<0) {
                            $hasil = "minus ". trim(penyebut($nilai));
                        } else {
                            $hasil = trim(penyebut($nilai))." rupiah";
                        }     		
                        return $hasil;
                    }

 
                            $total = $listing->gaji_pokok+($listing->jumlah_lembur*$listing->gaji_lembur)+$listing->nominal_tunjangan-$listing->nominal_potongan;
                            
                        @endphp
                        <td> Rp {{ number_format($total) }} <br>
                       
                        </td>
                      </tr>
                    </tbody></table>
                    
                  </div>
                </div>
                <div style="text-align:center; font-size:20px; ">
                <h3 style="text-align:center;"> Terbilang :  {{ terbilang($total) }} </h3>
                </div>

                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
            
            </div> 