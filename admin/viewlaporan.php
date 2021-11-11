<?php
include"hakakses.php";
include"../koneksi.php";

$getid = $_GET['id'];
$query = mysql_query("select * from pelanggan join pembayaran on(pelanggan.idpelanggan=pembayaran.idpelanggan) join tarif on (pelanggan.id_tarif=tarif.id_tarif) where pelanggan.idpelanggan='$getid'");
while($hasil = mysql_fetch_array($query)){
    $nometer = $hasil['nometer'];
    $nama = $hasil['nama'];
    $alamat = $hasil['alamat'];
    $kodetarif = $hasil['kodetarif'];
    $nohp = $hasil['nohp'];
    $daya = $hasil['daya'];
    $kategori = $hasil['kategori'];
    $total = $hasil['total'];
    $tgl = $hasil['tanggal']."-".$hasil['bulanbayar']."-".$hasil['tahun'];
}
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Welcome | <?php echo $_SESSION['user'];  ?></title>
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/bootstrap.css" rel="stylesheet">
        <style>
            table{
                font-weight: bold;
            }
        </style>
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
                    <p style="color:white;">Home > laporan</p>
                    </div>
                </div>

                <div class="rows">
                    <div class="col-md-12 bottom-utama">

                            <div class="rows">
                                  <a href="laporan.php" class="btn btn-danger btn-sm" style="margin-top:10px;"><i class="glyphicon glyphicon-remove"></i> &nbsp; Kembali</a>
                                <div class="col-md-12" style="margin-top:10px;height:370px;background:#f8f8f8;border-radius:5px;overflow:auto;paddin:10px;">
                                    <td>
                                                  
                                                </td>
                                    <table class="table">
                                        <tr>
                                            <td style="width:200px;">Nometer</td>
                                            <td style="width:10px;">:</td>
                                            <td><?php echo $nometer; ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td><?php echo $nama; ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td><?php echo $alamat; ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Kode tarif</td>
                                            <td>:</td>
                                            <td><?php echo $kodetarif; ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>No hp</td>
                                            <td>:</td>
                                            <td><?php echo $nohp; ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Daya</td>
                                            <td>:</td>
                                            <td><?php echo $daya; ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Kategori</td>
                                            <td>:</td>
                                            <td><?php echo $kategori; ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Tanggal bayar</td>
                                            <td>:</td>
                                            <td><?php echo $tgl; ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Total bayar</td>
                                            <td>:</td>
                                            <td><?php echo"Rp. ".number_format($total,0,',','.'); ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
            <!-- tutup -->
        </div>
    </body>
</html>