<?php 
include"koneksi.php";
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
        
        while($hasil=mysql_fetch_array($query_take_all )){
            $nometer    = $hasil['nometer'];
            $nama    = $hasil['nama'];
            $tarif    = $hasil['kodetarif'];
            $admin  = $hasil['adminbank'];
            
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
            $bulan    = $hasil['bulan'];
            $reg      = $total - 2500;
            
        }
        
    }else{
        echo"Pelanggan Tidak Ada";
    }
    
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Selamat Datang di Plnpay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style-index.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="container">
            
            <div class="col-md-offset-2 col-md-8 col-sm-offset-0 col-sm-12 form-index">
                <form target="_self" method="post">
                    <div class="form-group">
                        <div class="col-md-10 col-sm-12" style="padding:0;">
                            <input type="search" name="nometer" require class="form-control" placeholder="Masukkan no meter">
                        </div>
                        <div class="col-md-2 col-sm-12" >
                            <button type="submit" class="btn btn-primary form-control"><span class="glyphicon glyphicon-search"></span> &nbsp; Cari</button>
                        </div>
                    </div>
                </form>
            </div>
            
            <?php if(isset($total)){ ?>
            <div class="col-md-offset-2 col-md-8 col-sm-offset-0 col-sm-12 form-struk">
                <div class="rows">
                    <center><h3>INFORMASI TAGIHAN LISTRIK</h3></center>
                </div>
                <div class="rows">
                    <table class="">
                        <tr>
                            <td style="width:200px;">NOMOR METER</td>
                            <td style="width:10px;">:</td>
                            <td><?php echo $nometer; ?></td>
                        </tr>
                        
                        <tr>
                            <td>NAMA</td>
                            <td>:</td>
                            <td><?php echo $nama; ?></td>
                        </tr>
                        
                        <tr>
                            <td>TARIF / DAYA</td>
                            <td>:</td>
                            <td><?php echo $tarif; ?></td>
                        </tr>
                        
                        <tr>
                            <td>RP TAG PLN</td>
                            <td>:</td>
                            <td><?php echo"Rp. ".number_format($reg,0,',','.'); ?></td>
                        </tr>
                    </table>
                    
                    
                    <table class="">
                        
                        <tr>
                            <td style="width:200px;">BULAN</td>
                            <td style="width:10px;">:</td>
                            <td><?php echo $bulan; ?></td>
                        </tr>
                        
                        <tr>
                            <td style="width:200px;">ADMIN BANK</td>
                            <td style="width:10px;">:</td>
                            <td><?php echo"Rp. ".number_format($admin,0,',','.'); ?></td>
                        </tr>
                        
                        <tr>
                            <td>TOTAL BAYAR</td>
                            <td>:</td>
                            <td><?php echo"Rp. ".number_format($total,0,',','.'); ?></td>
                        </tr>
                    </table>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>