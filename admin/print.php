<?php
include"hakakses.php";
include"../koneksi.php";
$getid = $_GET['id'];
$query = mysql_query("select * from pembayaran join pelanggan on(pembayaran.idpelanggan=pelanggan.idpelanggan) join tarif on (pelanggan.id_tarif=tarif.id_tarif) where pembayaran.idbayar='$getid'");
while($hasil = mysql_fetch_array($query)){
    $nometer    = $hasil['nometer'];
    $nama    = $hasil['nama'];
    $tarif    = $hasil['kodetarif'];
    $total    = $hasil['total'];
    $admin    = $hasil['biayaadmin'];
    $total    = $hasil['total'];
    $reg      = $total - $admin;
    $tgl    =$hasil['tanggal']."-".$hasil['bulanbayar']."-".$hasil['tahun'];
}
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Welcome | <?php echo $_SESSION['user'];  ?></title>
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/bootstrap.css" rel="stylesheet">
    </head>
    <body onload="window.print();">
        <div class="container-print">
            <div class="print-page" style="padding:20px;">
                <div class="rows">
                    <center><h3>STRUK PEMBAYARAN TAGIHAN LISTRIK</h3></center>
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
                    
                    <div class="rows">
                    <center><h5>PLN menyatakan struk ini sebagai bukti pembayaran yang sah</h5></center>
                </div>
                    <table class="">
                        <tr>
                            <td style="width:200px;">TANGGAL BAYAR</td>
                            <td style="width:10px;">:</td>
                            <td><?php echo $tgl; ?></td>
                        </tr>
                        
                        <tr>
                            <td>ADMIN BANK</td>
                            <td>:</td>
                            <td><?php echo"Rp. ".number_format($admin,0,',','.'); ?></td>
                        </tr>
                        
                        <tr>
                            <td>TOTAL BAYAR</td>
                            <td>:</td>
                            <td><?php echo"Rp. ".number_format($total,0,',','.'); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>