<div class="col-md-2" style="padding:0;height:100%;background:#175499;position:absolute">
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
                            <p><?php echo $_SESSION['user'];  ?></p>
                            <p class="btn btn-default btn-xs" style="color:green;border:0;"><span class="glyphicon glyphicon-record"></span> Online</p>
                        </div>
                    </div>
                </div>

                <div class="rows">
                    <div class="col-md-12 menu" style="padding-left:0;padding-right:0;">
                        <ul class="nav navbar">
                        <a href="home.php"><li><span class="glyphicon glyphicon-home"></span> &nbsp; Beranda</li></a>
                        <a href="pengguna.php"><li><span class="glyphicon glyphicon-user"></span> &nbsp; Pelanggan</li></a>
                        <a href="tarif.php"><li><span class="glyphicon glyphicon-usd"></span> &nbsp; Tarif</li></a>
                        <a href="laporan.php"><li><span class="glyphicon glyphicon-list"></span> &nbsp; Laporan</li></a>
                        <a href="logout.php"><li><span class="glyphicon glyphicon-log-out"></span> &nbsp; Logout</li></a>
                        </ul>
                    </div>
                </div>
            </div>