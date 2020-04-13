<?php include ("navbar.php");
include ("baglanti.php");
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
    <title>Kasa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<?php
$gID=$_GET['id'];
$sql = "SELECT * FROM kasa WHERE id=".$gID;

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        ?>
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
                            <legend class="text-center header">Kasa</legend>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i> </span>
                                <div class="col-md-8">
                                    <input id="topPara" name="topPara" type="text" value="<?php echo $row['toppara'];?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="takenMoney" name="takenMoney" type="text" value="<?php echo $row['gelenPara'];?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="givenMoney" name="givenMoney" type="text" value="<?php echo $row['gidenpara'];?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="takenDate" name="takenDate" type="date" value="<?php echo $row['geltarih'];?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="givenDate" name="givenDate" type="date"value="<?php echo $row['gittarih'];?>" class="form-control">
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
    $topPara= isset($_POST['topPara']) ? $_POST['topPara'] : '';
    $takenMoney= isset($_POST['takenMoney']) ? $_POST['takenMoney'] : '';
    $givenMoney= isset($_POST['givenMoney']) ? $_POST['givenMoney'] : '';
    $takenDate= isset( $_POST['takenDate']) ?  $_POST['takenDate'] : '';
    $givenDate= isset( $_POST['givenDate']) ?  $_POST['givenDate'] : '';

    if (isset($_POST['button'])){
        if(empty($_POST['topPara'])){
            echo "<script type='text/javascript'>alert('Toplam Parayı Yazınız...');</script>";
        }elseif(empty($_POST['takenMoney'])){
            echo "<script type='text/javascript'>alert('Ödeme Tarihini Yazınız...');</script>";
        }elseif(empty($_POST['givenMoney'])){
            echo "<script type='text/javascript'>alert('Verildiği Tarihi Yazınız...');</script>";
        }elseif(empty($_POST['takenDate'])){
            echo "<script type='text/javascript'>alert('Kime Verildiğini Yazınız...');</script>";
        }elseif(empty($_POST['givenDate'])){
            echo "<script type='text/javascript'>alert('Kimden Geldiğini Yazınız...');</script>";
        }else{

            $sql = "UPDATE kasa SET toppara='$topPara',  gelenPara='$takenMoney', gidenpara='$givenMoney', 
                geltarih='$takenDate', gittarih='$givenDate' WHERE id='$gID'";

        }
        if (mysqli_query($conn, $sql)) {

        echo "<script type='text/javascript'>alert('Güncelleme Başarılı...');</script>";
                header("Location: kasa.php");


        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }}
    ?>

    <style> .header { color: #36A0FF;font-size: 27px;padding: 10px; }.bigicon { font-size: 35px; color: #36A0FF; } </style>
</div>
</body>
<?php }    }  ?>
</html>
