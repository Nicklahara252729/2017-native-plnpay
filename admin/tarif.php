<?php
include"../koneksi.php";
include"hakakses.php";
$query=mysql_query("select*from tarif order by id_tarif desc");

if (isset($_GET['id'])){
	$id = $_GET['id'];
	$qdelete = mysql_query("delete from tarif where id_tarif='$id'");
	if($qdelete){

header("location:tarif.php");
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
                    <p style="color:white;">Home > Tarif</p>
                    </div>
                </div>

                <div class="rows">
                    <div class="col-md-12 bottom-utama">
					<div class="rows">
					<div class="col-md-12 tbh-data">
						<a href="add_tarif.php"><button type="button" class="btn btn-success">Tambah Data</button></a>
						</div>
						</div>
                            <div class="rows">
                                <div class="col-md-12" style="margin-top:10px;height:500px;background:#f8f8f8;border-radius:5px;overflow:auto;">
                                    <table class="table">
                                        <thead>
                                            <tr>
												<th>No</th>
                                                <th>Kodetarif</th>
                                                <th>Daya</th>
                                                <th>TarifperKwh</th>
                                                <th>Admin Bank</th>
                                                <th>Kategori</th>
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
											       <td><?php echo $hasil['kodetarif'];
											   ?></td>
                                                     <td><?php echo $hasil['daya'];
											   ?></td>
                                                    <td><?php echo $hasil['tarifperkwh'];
											   ?></td>
                                                     <td><?php echo $hasil['adminbank'];
											   ?></td>
                                                     <td><?php echo $hasil['kategori'];
											   ?></td>	
              <td><a href="tarif.php?id=<?php echo $hasil['id_tarif'];?>"
              class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash" ></span> &nbsp; Hapus </a> &nbsp; &nbsp;<a href="add_tarif.php?edit=<?php echo $hasil['id_tarif'];?>"
              class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-pencil" ></span> &nbsp; Edit </a></td>

         </tr>
										<?php $no++;} ?>	
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