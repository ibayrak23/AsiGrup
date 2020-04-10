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
    <title>Senetler</title>
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
                            <legend class="text-center header">Senetler</legend>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="senNo" name="senNo" type="text" placeholder="Senet Numarasi" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="payDate" name="payDate" type="date" placeholder="Ödeme Tarihi" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="givenDate" name="givenDate" type="date" placeholder="Verildiği Tarih" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="givenWho" name="givenWho" type="text" placeholder="Kime Verildi" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="takenWho" name="takenWho" type="text" placeholder="Kimden Geldi" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="bankName" name="bankName" type="text" placeholder="Banka Adı" class="form-control">
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
    $senNo= isset($_POST['senNo']) ? $_POST['senNo'] : '';
    $payDate= isset($_POST['payDate']) ? $_POST['payDate'] : '';
    $givenDate= isset($_POST['givenDate']) ? $_POST['givenDate'] : '';
    $givenWho= isset( $_POST['givenWho']) ?  $_POST['givenWho'] : '';
    $takenWho= isset( $_POST['takenWho']) ?  $_POST['takenWho'] : '';
    $bankName= isset( $_POST['bankName']) ?  $_POST['bankName'] : '';

    if (isset($_POST['button'])){
        if(empty($_POST['senNo'])){
            echo "<script type='text/javascript'>alert('Senet Numarasını Yazınız...');</script>";
        }elseif(empty($_POST['payDate'])){
            echo "<script type='text/javascript'>alert('Ödeme Tarihini Yazınız...');</script>";
        }elseif(empty($_POST['givenDate'])){
            echo "<script type='text/javascript'>alert('Verildiği Tarihi Yazınız...');</script>";
        }elseif(empty($_POST['givenWho'])){
            echo "<script type='text/javascript'>alert('Kime Verildiğini Yazınız...');</script>";
        }elseif(empty($_POST['takenWho'])){
            echo "<script type='text/javascript'>alert('Kimden Geldiğini Yazınız...');</script>";
        }else{
            $sql = "INSERT INTO senetler (senetNo,OdemeTarihi,VerildigiTarih,KimeVerildi,KimdenGeldi)
        VALUES ('$senNo','$payDate','$givenDate','$givenWho','$takenWho')";
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
