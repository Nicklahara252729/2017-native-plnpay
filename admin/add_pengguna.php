<?php
include"../koneksi.php";
include"hakakses.php";

if (isset($_GET['edit'])){
	$editquery=mysql_query("select * from pelanggan where idpelanggan='$_GET[edit]'");
	while($row=mysql_fetch_array($editquery)){
		$nometer1=$row['nometer'];
		$nama1=$row['nama'];
		$alamat1=$row['alamat'];
		$id_tarif1=$row['id_tarif'];
		$no_hp1=$row['nohp'];
		$id=$row['idpelanggan'];
        $title="Edit";
	}
}else{
	$nometer1='';
		$nama1='';
		$alamat1='';
		$id_tarif1='';
		$no_hp1='';
		$id='';
        $title="Tambah";
	}
if(isset($_POST['id'])){
if($_POST['id']==""){
	$nometer = $_POST['nometer'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$id_tarif = $_POST['id_tarif'];
	$nohp = $_POST['nohp'];	
	$query = mysql_query("insert into pelanggan set nometer='$nometer', nama='$nama', alamat='$alamat', id_tarif='$id_tarif', nohp='$nohp'");
	if($query){
		header("location:pengguna.php");
	}
}else if(!empty($_POST['id'])){
        $id2= $_POST['id'];
        $nometer2=$_POST['nometer'];
		$nama2=$_POST['nama'];
		$alamat2=$_POST['alamat'];
		$id_tarif2=$_POST['id_tarif'];
		$no_hp2=$_POST['nohp'];
		$proses_update=mysql_query("update pelanggan set nometer='$nometer2',nama='$nama2',alamat='$alamat2',id_tarif='$id_tarif2',nohp='$no_hp2'  where idpelanggan='$id2'");
		if ($proses_update){
			header("location:pengguna.php");
		}
} }
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
                        <p style="color:white;">Home > Pengguna > <?php echo $title; ?> Pelanggan </p>
                    </div>
                </div>

                <div class="rows">
                    <div class="col-md-12 bottom-utama">
					

                            <div class="rows">
                                <div class="col-md-12" style="margin-top:10px;height:500px;">
                                    <div class="col-md-offset-2 col-md-8" style="background:#f8f8f8;border:dashed 1px lightgray;padding:10px;border-radius:5px;">
                                        <div class="rows">
                                            <div class="col-md-12" style="padding:0;height:50px;line-height:40px;text-align:center;font-size:20px;text-transform:uppercase;">
                                                <p><?php echo $title; ?> Pelanggan</p>
                                            </div>
                                        </div>
                                        <div class="rows">
                                            <div class="col-md-12" style="padding:0;">
									<form target="_self" method="post">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <table class="table">
                                            <tr>
                                                <td>Nomor meter</td>
                                                <td>:</td>
                                                <td><div class="form-group">
                                                <input value="<?php echo $nometer1;?>" type="text" name="nometer" placeholder="Nomor Meter" required class="form-control">
                                                </div></td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Nama</td>
                                                <td>:</td>
                                                <td><div class="form-group">
											<input  value="<?php echo $nama1;?>" type="text" name="nama" placeholder="Nama" required class="form-control">
										</div></td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                <td><div class="form-group">
											<input value="<?php echo $alamat1;?>" type="text" name="alamat" placeholder="Alamat" required class="form-control">
										</div></td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Kode tarif</td>
                                                <td>:</td>
                                                <td><div class="form-group">
											<select name="id_tarif" class="form-control" required>
											<option selected disabled>Pilih Kodetarif</option>
											<?php
											$query_option=mysql_query("select * from tarif");
											while($hasil=mysql_fetch_array($query_option)){
												?>
												<option value="<?php echo $hasil['id_tarif'];?>" <?php if($hasil['id_tarif']==$id_tarif1){echo"selected";}?>><?php echo $hasil['kodetarif']?></option>
												<?php
											}?>
											</select>
										</div></td>
                                            </tr>
                                            
                                            <tr>
                                                <td width="150px">Nomor handphone</td>
                                                <td>:</td>
                                                <td><div class="form-group">
											<input value="<?php echo $no_hp1;?>" type="text" name="nohp" placeholder="Nomor Handphone" required class="form-control">
										</div></td>
                                            </tr>
										
										<tr>
                                                
                                                <td colspan="3">
											<button type="submit" class="btn btn-primary btn-sm pull-right"><span class="glyphicon glyphicon-send" ></span> &nbsp; SIMPAN</button> 
											<button type="reset" class="btn btn-warning btn-sm pull-right"><span class="glyphicon glyphicon-refresh" ></span> &nbsp; RESET</button> 
                                            <a href="pengguna.php"><button type="button" class="btn btn-danger btn-sm pull-right"><span class="glyphicon glyphicon-remove" ></span> &nbsp; CANCEL</button> </a>
										</td>
                                            </tr>
                                        </table>
									</form>
                                                </div>
                                            </div>
									</div>
									
									
                                </div>
                            </div>

                    </div>
                </div>
            </div>
            <!-- tutup -->
        </div>
    </body>
</html>