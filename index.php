<?php 
$pesan ="";
$alamat = "";
$nama = "";

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
            <div class="row">
                <div class="col-md-offset-2 col-md-8 col-sm-offset-0 col-sm-12 kolom-info">
                    <table classt="table">
                        <tr>
                            <td>Nomor Meter</td>
                            <td>:</td>
                            <td><?php echo $nometer; ?></td>
                        </tr>

                        <tr>
                            <td>Nama Pelanggan</td>
                            <td>:</td>
                            <td><?php echo $nama; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?php echo $alamat; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-offset-2 col-md-8 col-sm-offset-0 col-sm-12 form-index">
                <form target="_self" method="post">
                    <div class="form-group">
                        <div class="col-md-10 col-sm-12" style="padding:0;">
                            <input type="search" name="no_meter" require class="form-control" placeholder="Masukkan no meter">
                        </div>
                        <div class="col-md-2 col-sm-12" >
                            <button type="submit" class="btn btn-primary form-control"><span class="glyphicon glyphicon-search"></span> &nbsp; Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>