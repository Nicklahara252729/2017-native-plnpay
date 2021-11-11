<?php
include"hakakses.php";
include"../koneksi.php";

?>
<!DOCTYPE html>

<html>
    <head>
        <title>Welcome | <?php echo $_SESSION['user'];  ?></title>
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
                    <p style="color:white;">Home > laporan</p>
                    </div>
                </div>

                <div class="rows">
                    <div class="col-md-12 bottom-utama">

                            <div class="rows">
                                <div class="col-md-12" style="margin-top:10px;height:500px;background:#f8f8f8;border-radius:5px;overflow:auto;">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nomor Meter</th>
                                                <th>Nama pengguna</th>
                                                <th>Alamat</th>
                                                <th>Kodetarif</th>
                                                <th>Kategori</th>
                                                <th>Tools</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                            $ambillaporan = mysql_query("select * from pembayaran join pelanggan on (pembayaran.idpelanggan=pelanggan.idpelanggan) join tarif on(pelanggan.id_tarif=tarif.id_tarif)");
                                            $no=1; while($hasil =mysql_fetch_array($ambillaporan)){ ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $hasil['nometer']; ?></td>
                                                <td><?php echo $hasil['nama']; ?></td>
                                                <td><?php echo $hasil['alamat']; ?></td>
                                                <td><?php echo $hasil['kodetarif']; ?></td>
                                                <td><?php echo $hasil['kategori']; ?></td>
                                                <td>
                                                    <a href="viewlaporan.php?id=<?php echo $hasil['idpelanggan']; ?>" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-eye-open"></i> &nbsp; Detail</a>
                                                </td>
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
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