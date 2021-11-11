<?php
include"hakakses.php";
include"../koneksi.php";
error_reporting(0);
if(isset($_POST['nometer'])){
	$cari          = $_POST['nometer'];
    
    //mengambil data pelanggan
	$query_cari    = mysql_query("select * from pelanggan where nometer='$cari'"); 
	$getid         = mysql_fetch_array($query_cari);
	$id            = $getid['idpelanggan'];
    //menghitung jumlah pelanggan
	$jumlah        = mysql_num_rows($query_cari);
    
    //kode otomatis meterawal
    $meter_awal_text="123456789";
    $panjang_text_meterawal= strlen($meter_awal_text);
    $hasil_meterawal="";
    for($i=0;$i<=1;$i++){
        $hasil_meterawal = trim($hasil_meterawal).substr($meter_awal_text,mt_rand(0,$panjang_text_meterawal),1);	
    }
    //tutup kode
    
    //kode otomatis meterakhir
    $meter_akhir_text="123456789";
    $panjang_text_meterakhir= strlen($meter_akhir_text);
    $hasil_meterakhir="";
    for($i=0;$i<=1;$i++){
        $hasil_meterakhir = trim($hasil_meterakhir).substr($meter_akhir_text,mt_rand(0,$panjang_text_meterakhir),1);	
    }
    //tutup kode
    
    //kode otomatis meterakhir
    $jumlahmeter_text="123456789";
    $panjang_text_jumlahmeter= strlen($jumlahmeter_text);
    $hasil_jumlahmeter="";
    for($i=0;$i<=1;$i++){
        $hasil_jumlahmeter = trim($hasil_jumlahmeter).substr($jumlahmeter_text,mt_rand(0,$panjang_text_jumlahmeter),1);	
    }
    //tutup kode
    
	if($query_cari){
		$bulan = Date('m');
		$tahun = Date('Y');
        
        //mencari data penggunaan dan tagihan berdasarkan nometer
        $seleksi_penggunaan     = mysql_query("select * from penggunaan where idpelanggan='$id' and bulan='$bulan' and tahun='$tahun'");
        $seleksi_tagihan        = mysql_query("select * from tagihan where idpelanggan='$id' and bulan='$bulan' and tahun='$tahun'");
        //menghitung jumlah pelanggan yang di dapat
        $jumlah_penggunaan      = mysql_num_rows($seleksi_penggunaan);
        $jumlah_tagihan         = mysql_num_rows($seleksi_tagihan);
        
        //jika jumlah data ditemukan artinya jumlah = 1 maka
        if($jumlah_penggunaan > 0 && $jumlah_tagihan > 0){
            //melaksanakan perintah mengambil data pelanggan 
                $query_take_all     = mysql_query("select * from pelanggan join tarif on(pelanggan.id_tarif=tarif.id_tarif)join penggunaan 
                on(pelanggan.idpelanggan=penggunaan.idpelanggan) 
                join tagihan on(pelanggan.idpelanggan=tagihan.idpelanggan)where pelanggan.nometer='$cari' and penggunaan.bulan='$bulan' and penggunaan.tahun='$tahun'");
            
		//jika jumlah data tidak ditemukan artinya jumlah = 0 maka
	   }else{
            //melaksanakan perintah input data penggunaan dan tagihan 
        $query_input_penggunaan = mysql_query("insert into penggunaan set idpelanggan='$id',bulan='$bulan',tahun='$tahun', meterawal='$hasil_meterawal', meterakhir='$hasil_meterakhir'");
		$query_input_tagihan    = mysql_query("insert into tagihan set idpelanggan='$id',bulan='$bulan',tahun='$tahun', jumlahmeter='$hasil_jumlahmeter'");
            
            //jikan berhasil di input maka
            if($query_input_penggunaan && $query_input_tagihan){
                
                //melaksanakan perintah mengambil data pelanggan 
                $query_take_all     = mysql_query("select * from pelanggan join tarif on(pelanggan.id_tarif=tarif.id_tarif)join penggunaan 
                on(pelanggan.idpelanggan=penggunaan.idpelanggan) 
                join tagihan on(pelanggan.idpelanggan=tagihan.idpelanggan)where pelanggan.nometer='$cari' and penggunaan.bulan='$bulan' and penggunaan.tahun='$tahun'");
            }    
        }
        
    }else{
        echo"Pelanggan Tidak Ada";
    }
    
}


if(isset($_POST['totalbayar'])){
    $tbayar = $_POST['totalbayar'];
    $admin  = $_POST['admin'];
    $idpl   = $_POST['idpel'];
    $tang   = Date('d');
    $bul    = Date('m');
    $tah    = Date('Y');
    //kode otomatis meterakhir
    $text="123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $panjang= strlen($text);
    $hsl="";
    for($i=0;$i<=12;$i++){
        $hsl = trim($hsl).substr($text,mt_rand(0,$panjang),1);	
    }
    $sil    = $_SESSION['user'].$hsl;
    //tutup kode   
    
    $cekbayar           = mysql_query("select * from pembayaran where idpelanggan='$idpl' and tanggal='$tang' and bulanbayar='$bul' and tahun='$tah'");
    if(mysql_num_rows($cekbayar) > 0){
        $pesanbayar = "Sudah di bayar";
    }else{
        $insert_pembayaran  = mysql_query("insert into pembayaran set idbayar='$sil', idpelanggan='$idpl', tanggal='$tang', bulanbayar='$bul', tahun='$tah', biayaadmin='$admin', total='$tbayar'");
        if($insert_pembayaran){
            header("location:print.php?id=$sil");
            $pesanbayar = "";
        }
    }
    
    
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome | <?php echo $_SESSION['user']; ?></title> 
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
        <div class="container-fluid" style="padding:0;">
            <!-- bagian yang warna biru -->
            <?php include("menu.php"); ?>
            <!-- tutup -->

            <!-- bagian utama -->
            <div class="col-md-10" style="height:100%;float:right;padding:0;">
                <div class="rows">
                    <div class="col-md-12 top-utama">
                    <p style="color:white;">Home</p>
                    </div>
                </div>

                <div class="rows">
                    <div class="col-md-12 bottom-utama">
                            <div class="rows">
                                <div class="col-md-12 form-meter">
                                    <form target="_self" method="post">
                                        <div class="col-md-10">
                                        <input type="search" name="nometer" placeholder="Masukkan Nomor Meter" required class="form-control">
                                        </div>
                                        <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary form-control"><span class="glyphicon glyphicon-search"></span> &nbsp; Cari</button>
                                        </div>
                                    </form> 
                                </div>
                            </div>

                            <div class="rows">
                                <div class="col-md-12" style="margin-top:10px;height:200px;background:#f8f8f8;border-radius:5px;overflow:auto;">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nomor Meter</th>
                                                <th>Nama pengguna</th>
                                                <th>Bulan</th>
                                                <th>Jumlah meter</th>
                                                <th>Biaya admin</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php $no=1; while($hasil=mysql_fetch_array($query_take_all)){ 
                                            $idpel  = $hasil['idpelanggan'];
                                            $biaya  = $hasil['adminbank'];
                                            ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $hasil['nometer']; ?></td>
                                                <td><?php echo $hasil['nama']; ?></td>
                                                <td><?php echo $hasil['bulan']; ?></td>
                                                <td><?php echo $hasil['jumlahmeter'];?></td>
                                                <td><?php echo $hasil['adminbank'];?></td>
                                                <td>
                                                    <?php
                                                    $mawal      = $hasil['meterawal'];
                                                    $makhir     = $hasil['meterakhir'];
                                                    $pemakaian  = $hasil['jumlahmeter'];
                                                    $tarif      = $hasil['tarifperkwh'];
                                                    $bank      = $hasil['adminbank'];
                                                    $tagl       = Date('d');
                                                    if($tagl > 20){
                                                        $d      = 2;
                                                    }else{
                                                        $d      = 0;
                                                    }
                                                    $denda      = $d * ($pemakaian * $tarif);
                                                    $total      = ($pemakaian * $tarif) + $denda + $bank;
                                                    echo"Rp. ".number_format($total,0,',','.');
                                                    ?>
                                                </td>
                                            </tr>
										<?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>  


                            <div class="rows">
                            <div class="col-md-12 " style="margin-top:20px;">
                            <form target="_self" method="post">
                                <div class="col-md-5">
                                <input type="hidden" name="idpel" value="<?php echo $idpel; ?>">
                                <input type="hidden" name="admin" value="<?php echo $biaya; ?>">
                                <input type="text" name="totalbayar" placeholder="Total keseluruhan tagihan" required class="form-control">
                                </div>
                                <div class="col-md-2">
                                <button type="submit" class="btn btn-primary form-control"><span class="glyphicon glyphicon-search"></span> &nbsp; Bayar</button>
                                </div>
                                <div class="col-md-2">
                                <button type="submit" class="btn btn-danger form-control"><span class="glyphicon glyphicon-remove"></span> &nbsp; Batal</button>
                                </div>
                            </form> 
                        </div>
                            </div>
                        
                        <?php if($pesanbayar!=""){ ?>
                        <div class="rows">
                                <div class="col-md-12" style="margin-top:20px;height:100px;background:#A2D246;border-radius:5px;overflow:auto;">
                                    <span style="color:white;font-size:30px;line-height:100px;"><center><?php echo $pesanbayar; ?></center></span>
                                </div>
                            </div>  
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
            <!-- tutup -->
        </div>
    </body>
</html>