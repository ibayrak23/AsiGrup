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
    <title>Krediler</title>
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
                            <legend class="text-center header">Krediler</legend>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="credit" name="credit" type="text"  placeholder="Kredi Miktarı" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="rentCount" name="rentCount" type="text" maxlength="3" placeholder="Taksit Sayısı" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="payDate" name="payDate" type="date" placeholder="Ödeme Günü" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="rentCost" name="rentCost" type="text" placeholder="Taksit Tutarı" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="bankName" name="bankName" type="text" placeholder="Banka Adı" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="topFaiz" name="topFaiz" type="text" placeholder="Toplam Ödenecek Faiz" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="topPay" name="topPay" type="text" placeholder="Toplam Ödeme" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="state" name="state" type="text" maxlength="1" placeholder="Ödendi - Ödenmedi" class="form-control">
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
    $credit= isset($_POST['credit']) ? $_POST['credit'] : '';
    $rentCount= isset($_POST['rentCount']) ? $_POST['rentCount'] : '';
    $payDate= isset($_POST['payDate']) ? $_POST['payDate'] : '';
    $rentCost= isset( $_POST['rentCost']) ?  $_POST['rentCost'] : '';
    $bankName= isset( $_POST['bankName']) ?  $_POST['bankName'] : '';
    $topFaiz= isset( $_POST['topFaiz']) ?  $_POST['topFaiz'] : '';
    $topPay= isset( $_POST['topPay']) ?  $_POST['topPay'] : '';
    $state= isset( $_POST['state']) ?  $_POST['state'] : '';

    if (isset($_POST['button'])){
        if(empty($_POST['credit'])){
            echo "<script type='text/javascript'>alert('Kredi Miktarını Yazınız...');</script>";
        }elseif(empty($_POST['rentCount'])){
            echo "<script type='text/javascript'>alert('Taksit Sayısını Yazınız...');</script>";
        }elseif(empty($_POST['payDate'])){
            echo "<script type='text/javascript'>alert('Ödeme Gününü Yazınız...');</script>";
        }elseif(empty($_POST['rentCost'])){
            echo "<script type='text/javascript'>alert('Taksit Tutarını Yazınız...');</script>";
        }elseif(empty($_POST['bankName'])){
            echo "<script type='text/javascript'>alert('Banka Adını Yazınız...');</script>";
        }elseif(empty($_POST['topFaiz'])){
            echo "<script type='text/javascript'>alert('Toplam Ödenecek Faizi Yazınız...');</script>";
        }elseif(empty($_POST['topPay'])){
            echo "<script type='text/javascript'>alert('Toplam Ödemeyi Yazınız...');</script>";
        }elseif(empty($_POST['state'])){
            echo "<script type='text/javascript'>alert('Ödendi-Ödenmedi Bilgisini Yazınız...');</script>";
        }else{
            $sql = "INSERT INTO krediler (krediMiktari,taksitSayisi,odemeGunu,taksitTutari,bankaAdi,toplamFaiz,toplamOdeme,durum)
        VALUES ('$credit','$rentCount','$payDate','$rentCost','$bankName','$topFaiz','$topPay','$state')";
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
