<!DOCTYPE html>
<html>
    <head>
        <title>Selamat datang admin</title>
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
    <div class="container-fluid backlogin">
        <div class="container">
            <div class="col-md-offset-2 col-md-8 kolom-login" style="padding:0;">

            <!-- bagian yang berwarna orange -->
                <div class="col-md-5 kiri-kolom-login">
                    <div class="rows">
                    <center><img src="../img/registration_bg.svg" classi="img-responsive"></center>
                    </div>
                    <div class="rows txt-kiri">
                        <p>login </p>
                    </div>
                </div>
            <!-- tutup -->
            
            <!-- bagian form login -->
                <div class="col-md-7 kanan-kolom-login">
                    <div class="col-md-offset-1 col-md-10 form-login">
                            <form target="_self" method="post">
                                    <div class="rows">
                                        <input type="text" name="username" required title="Masukkan username" placeholder="Username" class="form-control">
                                    </div>
                                    <div class="rows">
                                        <input type="password" name="username" required title="Masukkan password" placeholder="Password" class="form-control">
                                    </div>
                                    <div class="rows">
                                        <button type="submit" class="btn btn-primary form-control"><span class="glyphicon glyphicon-log-in"></span> &nbsp; Login</button>
                                    </div>
                            </form>
                    </div>
                </div>
            <!-- tutup -->

            </div>
        </div>
    </div>
    </body>
</html>