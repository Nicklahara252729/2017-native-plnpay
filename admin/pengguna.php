<!DOCTYPE html>
<html>
    <head>
        <title>Welcome | admin</title>
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
        <div class="container-fluid" style="padding:0;">
            <!-- bagian yang warna biru -->
            <div class="col-md-2" style="padding:0;height:100%;background:#084267;position:absolute">
                <div class="rows">
                    <div class="col-md-12 txt-admin">
                        <span class="glyphicon glyphicon-dashboard"></span> &nbsp; administrator
                    </div>
                </div>

                <div class="rows">
                    <div class="col-md-12 admin-info">
                        <div class="col-md-4" style="padding:0;">
                            <img src="../img/admin.png" class="img-admin">
                        </div>
                        <div class="col-md-8 admin-status">
                            Username<br>
                            Online
                        </div>
                    </div>
                </div>

                <div class="rows">
                    <div class="col-md-12 menu" style="padding-left:0;padding-right:0;">
                        <ul class="nav navbar">
                        <a href="home.php"><li><span class="glyphicon glyphicon-home"></span> &nbsp; Beranda</li></a>
                        <a href="pengguna.php"><li><span class="glyphicon glyphicon-user"></span> &nbsp; Pengguna</li></a>
                        <a href="tarif.php"><li><span class="glyphicon glyphicon-usd"></span> &nbsp; Tarif</li></a>
                        <a href="laporan.php"><li><span class="glyphicon glyphicon-list"></span> &nbsp; Laporan</li></a>
                        <a href="logout.php"><li><span class="glyphicon glyphicon-log-out"></span> &nbsp; Logout</li></a>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- tutup -->

            <!-- bagian utama -->
            <div class="col-md-10" style="height:100%;float:right;padding:0;">
                <div class="rows">
                    <div class="col-md-12 top-utama">
                        <p>Home > Pengguna</p>
                    </div>
                </div>

                <div class="rows">
                    <div class="col-md-12 bottom-utama">

                            <div class="rows">
                                <div class="col-md-12" style="margin-top:10px;height:500px;">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nomor Meter</th>
                                                <th>Nama pengguna</th>
                                                <th>Bulan</th>
                                                <th>Tagihan</ht>
                                                <th>Biaya admin</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>1234567890</td>
                                                <td>Test</td>
                                                <td>Test</td>
                                                <td>Test</td>
                                                <td>Test</td>
                                                <td>Test</td>
                                            </tr>
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