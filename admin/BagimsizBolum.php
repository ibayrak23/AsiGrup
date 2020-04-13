<?php include ("navbar.php"); include ("baglanti.php");
?>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
    </script>
    <meta charset="utf-8" />
    <title>Bağımsız Bölüm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="page-header">
    </div>
    <!-- Contact Form - START -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well well-sm">
                    <form class="form-horizontal" method="post">
                        <fieldset>
                            <legend class="text-center header">Bağımsız Bölüm</legend>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="freeNo" name="freeNo" type="text" placeholder="Bağımsız Bölüm No" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="FreeUnit" name="FreeUnit" type="text" placeholder="Bağımsız Bölüm Blok" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="freeAreaNo" name="freeAreaNo" type="text" placeholder="Bağımsız Bölüm Ada Parsel No" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="front1" name="front1" type="text" placeholder="Cephe Bilgisi 1" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="front2" name="front2" type="text" placeholder="Cephe Bilgisi 2" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="layerNo" name="layerNo" type="text" placeholder="Bulunduğu Kat" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" name="button" class="btn btn-primary btn-lg">Kaydet</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    $freeNo= isset($_POST['freeNo']) ? $_POST['freeNo'] : '';
    $freeUnit= isset($_POST['freeUnit']) ? $_POST['freeUnit'] : '';
    $freeAreaNo= isset($_POST['freeAreaNo']) ? $_POST['freeAreaNo'] : '';
    $front1= isset( $_POST['front1']) ?  $_POST['front1'] : '';
    $front2= isset( $_POST['front2']) ?  $_POST['front2'] : '';
    $layerNo= isset( $_POST['layerNo']) ?  $_POST['layerNo'] : '';

    if (isset($_POST['button'])){
        if(empty($_POST['freeNo'])){
            echo "<script type='text/javascript'>alert('Bağımsız Bölüm No Yazınız...');</script>";
        }elseif(empty($_POST['freeUnit'])){
            echo "<script type='text/javascript'>alert('Bağımsız Bölüm Blok Yazınız...');</script>";
        }elseif(empty($_POST['freeAreaNo'])){
            echo "<script type='text/javascript'>alert('Başlama Tarihini Yazınız...');</script>";
        }elseif(empty($_POST['front1'])){
            echo "<script type='text/javascript'>alert('Bağımsız Bölüm Sayısını Yazınız...');</script>";
        }elseif(empty($_POST['front2'])){
            echo "<script type='text/javascript'>alert('proje Maliyetini Yazınız...');</script>";
        }elseif(empty($_POST['layerNo'])){
            echo "<script type='text/javascript'>alert('Satış Bedelini Yazınız...');</script>";
        }else{
            $sql = "INSERT INTO bagimsizbolum (bolumNo,bolumBlok,adaParsel,cepheBilgisi1,cepheBilgisi2,bulunduguKat)
        VALUES ('$freeNo','$freeUnit','$freeAreaNo','$front1','$front2','$layerNo')";
        }
        if (mysqli_query($conn, $sql)) {
            echo "<script type='text/javascript'>alert('Kayıt Başarılı...');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }}
    ?>
    <style> .header { color: #36A0FF;font-size: 27px;padding: 10px; }.bigicon { font-size: 35px; color: #36A0FF; } </style>
</div>
</body>
</html>
