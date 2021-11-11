<?php
include"../koneksi.php";
include"hakakses.php";
$query=mysql_query("select*from pelanggan join tarif on (pelanggan.id_tarif=tarif.id_tarif) order by idpelanggan desc");

if (isset($_GET['id'])){
	$id = $_GET['id'];
	$qdelete = mysql_query("delete from pelanggan where idpelanggan='$id'");
	if($qdelete){

header("location:pengguna.php");
	}else{
		echo "gagal hapus";
	}
}
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
                        <p style="color:white;">Home > Pengguna</p>
                    </div>
                </div>

                <div class="rows">
                    <div class="col-md-12 bottom-utama">
					<div class="rows">
					<div class="colmd-12 tbh-data">
					<a href="add_pengguna.php"><button type="button" class="btn btn-success">Tambah Data</button></a>
					</div>
					</div>

                            <div class="rows">
                                <div class="col-md-12" style="margin-top:10px;height:500px;background:#f8f8f8;border-radius:5px;overflow:auto;">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nomor Meter</th>
                                                <th>Nama pengguna</th>
                                                <th>Alamat</th>
                                                <th>kodetarif</th>
                                                <th>No Telp</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										$no=1;
										while($hasil=mysql_fetch_array($query)){
											?>
											<tr>
											   <td><?php echo $no;
											   ?></td>
											       <td><?php echo $hasil['nometer'];
											   ?></td>
                                                     <td><?php echo $hasil['nama'];
											   ?></td>
                                                    <td><?php echo $hasil['alamat'];
											   ?></td>
                                                     <td><?php echo $hasil['kodetarif'];
											   ?></td>
                                                     <td><?php echo $hasil['nohp'];
											   ?></td>	
              <td><a href="pengguna.php?id=<?php echo $hasil['idpelanggan'];?>"
              class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span> &nbsp; Hapus </a>&nbsp;
                  <a href="add_pengguna.php?edit=<?php echo $hasil['idpelanggan'];?>"
              class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-pencil"></span> &nbsp; Edit </a>
                  
                  <a href="view_pengguna.php?id=<?php echo $hasil['idpelanggan'];?>"
              class="btn btn-xs btn-success"><span class="glyphicon glyphicon-eye-open"></span> &nbsp; Detail </a>
                                                </td>

         </tr>
										<?php $no++;}?>		 
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