<?php
include"../koneksi.php";
include"hakakses.php";

if(isset($_GET['edit'])){
	$editquery=mysql_query("select * from tarif where id_tarif='$_GET[edit]'");
	while($row=mysql_fetch_array($editquery)){
		$id2=$row['id_tarif'];
		$kodetarif2=$row['kodetarif'];
		$daya2=$row['daya'];
		$tarifperkwh2=$row['tarifperkwh'];
		$adminbank2=$row['adminbank'];
		$kategori2=$row['kategori'];
        $readonly = "readonly";
        $title ="Edit";
	}
}else{
	$id2='';
	$kodetarif2='';
		$daya2='';
		$tarifperkwh2='';
		$adminbank2='';
		$kategori2='';
    $title="Tambah";
        $readonly = "";
	}

if(isset($_POST['id'])){
if($_POST['id']==""){
	$kodetarif1 = $_POST['kodetarif'];
	$daya1 = $_POST['daya'];
	$tarifperkwh1 = $_POST['tarifperkwh'];
	$adminbank1 = $_POST['adminbank'];
	$kategori1 = $_POST['kategori'];	
	$query = mysql_query("insert into tarif set kodetarif='$kodetarif1', daya='$daya1', tarifperkwh='$tarifperkwh1', adminbank='$adminbank1', kategori='$kategori1'");
	if($query){
			header("location:tarif.php");
	}
}else if(!empty($_POST['id'])){
        $id3 = $_POST['id'];
		$kodetarif3 = $_POST['kodetarif'];
	$daya3 = $_POST['daya'];
	$tarifperkwh3 = $_POST['tarifperkwh'];
	$adminbank3 = $_POST['adminbank'];
	$kategori3 = $_POST['kategori'];	
		$proses_update=mysql_query("update tarif set kodetarif='$kodetarif3',daya='$daya3',tarifperkwh='$tarifperkwh3',adminbank='$adminbank3',kategori='$kategori3'  where id_tarif='$id3'");
		if ($proses_update){
			header("location:tarif.php");
		}
} }

?>
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
            <?php include("menu.php"); ?>
            <!-- tutup -->

            <!-- bagian utama -->
            <div class="col-md-10" style="height:100%;float:right;padding:0;">
                <div class="rows">
                    <div class="col-md-12 top-utama">
                        <p style="color:white;">Home > Pengguna > <?php echo $title; ?> Tarif </p>
                    </div>
                </div>

                <div class="rows">
                    <div class="col-md-12 bottom-utama">

                            <div class="rows">
                                <div class="col-md-12" style="margin-top:10px;height:500px;">
								
								
                                   <div class="col-md-offset-2 col-md-8" style="background:#f8f8f8;border:dashed 1px lightgray;padding:10px;border-radius:5px;">
                                       <div class="rows">
                                            <div class="col-md-12" style="padding:0;height:50px;line-height:40px;text-align:center;font-size:20px;text-transform:uppercase;">
                                                <p><?php echo $title; ?> Tarif</p>
                                            </div>
                                        </div>
                                       <div class="rows">
                                            <div class="col-md-12" style="padding:0;">
									<form target="_self" method="post">
                                        <table class="table">
                                            <tr>
                                                <td>Kode tarif</td>
                                                <td>:</td>
                                                <td>
                                                    <div class="form-group">
                                                    <input value="<?php echo $id2;?>" type="hidden" name="id" >
                                                    <input value="<?php echo $kodetarif2;?>" type="text" name="kodetarif" placeholder="Kodetarif" required class="form-control" <?php //echo $readonly; ?>>
                                                    </div>
                                                </td>
                                            </tr>
										    <tr>
                                                <td>Daya</td>
                                                <td>:</td>
                                                <td>
                                                    <div class="form-group">
                                                    <input  value="<?php echo $daya2;?>" type="text" name="daya" placeholder="Daya" required class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
										      <tr>
                                                <td>Tariperkwh</td>
                                                <td>:</td>
                                                <td>
                                                    <div class="form-group">
                                                    <input value="<?php echo $tarifperkwh2;?>" type="text" name="tarifperkwh" placeholder="Tarifperkwh" required class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
										      <tr>
                                                <td>Admin Bank</td>
                                                <td>:</td>
                                                <td>
                                                    <div class="form-group">
                                                    <input value="<?php echo $adminbank2;?>" type="text" name="adminbank" placeholder="Adminbank" required class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
										      <tr>
                                                <td>Kategori</td>
                                                <td>:</td>
                                                <td>
                                                    <div class="form-group">
                                                        <select name="kategori" required class="form-control">
                                                            <option disabled selected>Choose</option>
                                                            <option value="Subsidi" <?php if($kategori2=="Subsidi"){echo"selected";}?>>Subsidi</option>
                                                            <option value="Non-Subsidi"  <?php if($kategori2=="Non-Subsidi"){echo"selected";}?>>Non-Subsidi</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
										  <tr>
                                                <td colspan="3">
                                                    <button type="submit" class="btn btn-primary btn-sm pull-right"><span class="glyphicon glyphicon-send"></span> &nbsp; SIMPAN</button> 
                                                    <button type="reset" class="btn btn-warning btn-sm pull-right"><span class="glyphicon glyphicon-refresh"></span> &nbsp; RESET</button>
                                                    <a href="tarif.php"><button type="button" class="btn btn-danger btn-sm pull-right"><span class="glyphicon glyphicon-remove"></span> &nbsp; CANCEL</button></a>
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