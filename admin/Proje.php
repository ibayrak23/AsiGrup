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
    <title>Projeler</title>
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
                            <legend class="text-center header">Projeler</legend>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="projectName" name="projectName" type="text" placeholder="Proje Adı" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="adaParsel" name="adaParsel" type="text" placeholder="Ada Parsel" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="startDate" name="startDate" type="date" placeholder="Başlama Tarihi" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="freeArea" name="freeArea" type="text" maxlength="2" placeholder="Bağımsız Bölüm Sayısı" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="ProjectCost" name="ProjectCost" type="text" placeholder="Proje Maliyeti" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="payCost" name="payCost" type="text" placeholder="Proje Satış Bedeli" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="rate" name="rate" type="text" placeholder="Kar Oranı" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="finishDate" name="finishDate" type="date" placeholder="Bitiş Tarihi" class="form-control">
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
    $projectName= isset($_POST['projectName']) ? $_POST['projectName'] : '';
    $adaParsel= isset($_POST['adaParsel']) ? $_POST['adaParsel'] : '';
    $startDate= isset($_POST['startDate']) ? $_POST['startDate'] : '';
    $freeArea= isset( $_POST['freeArea']) ?  $_POST['freeArea'] : '';
    $ProjectCost= isset( $_POST['ProjectCost']) ?  $_POST['ProjectCost'] : '';
    $payCost= isset( $_POST['payCost']) ?  $_POST['payCost'] : '';
    $rate= isset( $_POST['rate']) ?  $_POST['rate'] : '';
    $finishDate= isset( $_POST['finishDate']) ?  $_POST['finishDate'] : '';

    if (isset($_POST['button'])){
        if(empty($_POST['projectName'])){
            echo "<script type='text/javascript'>alert('Proje Adını Yazınız...');</script>";
        }elseif(empty($_POST['adaParsel'])){
            echo "<script type='text/javascript'>alert('Ada Parseli Yazınız...');</script>";
        }elseif(empty($_POST['startDate'])){
            echo "<script type='text/javascript'>alert('Başlama Tarihini Yazınız...');</script>";
        }elseif(empty($_POST['freeArea'])){
            echo "<script type='text/javascript'>alert('Bağımsız Bölüm Sayısını Yazınız...');</script>";
        }elseif(empty($_POST['ProjectCost'])){
            echo "<script type='text/javascript'>alert('proje Maliyetini Yazınız...');</script>";
        }elseif(empty($_POST['payCost'])){
            echo "<script type='text/javascript'>alert('Satış Bedelini Yazınız...');</script>";
        }elseif(empty($_POST['rate'])){
            echo "<script type='text/javascript'>alert('Kar Oranını Yazınız...');</script>";
        }elseif(empty($_POST['finishDate'])){
            echo "<script type='text/javascript'>alert('Bitiş Tarihini Yazınız...');</script>";
        }else{
            $sql = "INSERT INTO proje (projeAdi,adaParsel,baslamaTarihi,bagimsizBolumSayisi,maliyet,satisBedeli,karOrani,bitisTarihi)
        VALUES ('$projectName','$adaParsel','$startDate','$freeArea','$ProjectCost','$payCost','$rate','$finishDate')";
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
