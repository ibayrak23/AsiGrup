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
    <title>Kredi Kartları</title>
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
                            <legend class="text-center header">Kredi Kartları</legend>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="cardName" name="cardName" type="text" placeholder="Kart Adı" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="bankName" name="bankName" type="text" placeholder="Ait Olduğu Banka" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="limit" name="limit" type="text" placeholder="Kart Limiti" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="date" name="date" type="date" placeholder="Hesap Kesim Tarihi" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="lastDate" name="lastDate" type="date" placeholder="Son Ödeme Tarihi" class="form-control">
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
    $cardName= isset($_POST['cardName']) ? $_POST['cardName'] : '';
    $bankName= isset($_POST['bankName']) ? $_POST['bankName'] : '';
    $limit= isset($_POST['limit']) ? $_POST['limit'] : '';
    $date= isset( $_POST['date']) ?  $_POST['date'] : '';
    $lastDate= isset( $_POST['lastDate']) ?  $_POST['lastDate'] : '';

if (isset($_POST['button'])){
    if(empty($_POST['cardName'])){
        echo "<script type='text/javascript'>alert('Kart Adını Yazınız...');</script>";
    }elseif(empty($_POST['bankName'])){
        echo "<script type='text/javascript'>alert('Banka Adını Yazınız...');</script>";
    }elseif(empty($_POST['limit'])){
        echo "<script type='text/javascript'>alert('Kart Limitini Yazınız...');</script>";
    }elseif(empty($_POST['date'])){
        echo "<script type='text/javascript'>alert('Hesap Kesim Tarihini Yazınız...');</script>";
    }elseif(empty($_POST['lastDate'])){
        echo "<script type='text/javascript'>alert('Son Ödeme Tarihini Yazınız...');</script>";
    }else{
        $sql = "INSERT INTO kredikartlari (kartAdi,banka,kartLimit,kesimTarihi,sonOdeme)
        VALUES ('$cardName','$bankName','$limit','$date','$lastDate')";
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
