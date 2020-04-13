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
    <title>Borçlar</title>
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
                            <legend class="text-center header">Borçlar</legend>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="debt" name="debt" type="text" placeholder="Borç Miktarı" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="typeMoney" name="typeMoney" type="text" maxlength="1" placeholder="Para Cinsi" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="takenDate" name="takenDate" type="date" placeholder="Alınıdığı Tarih" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="givenDate" name="givenDate" type="date" placeholder="Ödeneceği Tarih" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="takenWho" name="takenWho" type="text" placeholder="Kimden Alındı" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                                <div class="col-md-8">
                                    <textarea class="form-control" id="comment" name="comment" placeholder="Açıklama" rows="7"></textarea>
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
    $debt= isset($_POST['debt']) ? $_POST['debt'] : '';
    $typeMoney= isset($_POST['typeMoney']) ? $_POST['typeMoney'] : '';
    $takenDate= isset($_POST['takenDate']) ? $_POST['takenDate'] : '';
    $givenDate= isset( $_POST['givenDate']) ?  $_POST['givenDate'] : '';
    $takenWho= isset( $_POST['takenWho']) ?  $_POST['takenWho'] : '';
    $comment= isset( $_POST['comment']) ?  $_POST['comment'] : '';

    if (isset($_POST['button'])){
        if(empty($_POST['debt'])){
            echo "<script type='text/javascript'>alert('Borcu Yazınız...');</script>";
        }elseif(empty($_POST['typeMoney'])){
            echo "<script type='text/javascript'>alert('Para Cinsini Yazınız...');</script>";
        }elseif(empty($_POST['takenDate'])){
            echo "<script type='text/javascript'>alert('Alındığı Tarihi Yazınız...');</script>";
        }elseif(empty($_POST['givenDate'])){
            echo "<script type='text/javascript'>alert('Ödeneceği Tarihi Yazınız...');</script>";
        }elseif(empty($_POST['takenWho'])){
            echo "<script type='text/javascript'>alert('Kimden Alındığını Yazınız...');</script>";
        }elseif(empty($_POST['comment'])){
            echo "<script type='text/javascript'>alert('Açıklama Yazınız...');</script>";
        }else{
            $sql = "INSERT INTO borclar (miktar,paraCinsi,alindigiTarih,odenecekTarih,kimdenAlindi,aciklama)
        VALUES ('$debt','$typeMoney','$takenDate','$givenDate','$takenWho','$comment')";
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
