<?php include ("navbar.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "asideneme";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Veritabanına Bağlanılamadı: " . $conn->connect_error);
}

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
<?php
$sql = "SELECT adiSoyadi FROM banka";
$result = $conn->query($sql);
$sql1 = "SELECT adiSoyadi FROM musteri";
$result1 = $conn->query($sql1);
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
                            <legend class="text-center header">Kredi Kartları</legend>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="cardID" name="cardID" type="number" placeholder="Kart ID" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <select class="form-control" id="owner"  name="owner">
                                        <?php        if ($result1->num_rows > 0) {
                                            // output data of each row
                                            while($row1 = $result1->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $row1["adiSoyadi"]; ?>" > <?php echo $row1["adiSoyadi"]; ?></option>
                                            <?php  }}?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="cardName" name="cardName" type="text" placeholder="Kart Adı" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="iban" name="iban" type="text" placeholder="IBAN" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <select class="form-control" id="bankName"  name="bankName">
                                        <?php        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $row["adiSoyadi"]; ?>" > <?php echo $row["adiSoyadi"]; ?></option>
                                            <?php  }}?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="limit" name="limit" type="number" placeholder="Kart Limiti" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="kmh" name="kmh" type="text" placeholder="KMH" class="form-control">
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
    $cardID= isset($_POST['cardID']) ? $_POST['cardID'] : '';
    $owner= isset($_POST['owner']) ? $_POST['owner'] : '';
    $cardName= isset($_POST['cardName']) ? $_POST['cardName'] : '';
    $iban= isset( $_POST['iban']) ?  $_POST['iban'] : '';
    $bankName= isset( $_POST['bankName']) ?  $_POST['bankName'] : '';
    $limit= isset( $_POST['limit']) ?  $_POST['limit'] : '';
    $kmh= isset( $_POST['kmh']) ?  $_POST['kmh'] : '';


if (isset($_POST['button'])){
    if(empty($_POST['cardID'])){
        echo "<script type='text/javascript'>alert('Kart ID Yazınız...');</script>";
    }elseif(empty($_POST['owner'])){
        echo "<script type='text/javascript'>alert('Kart Sahibini Yazınız...');</script>";
    }elseif(empty($_POST['cardName'])){
        echo "<script type='text/javascript'>alert('Kart Adını Yazınız...');</script>";
    }elseif(empty($_POST['iban'])){
        echo "<script type='text/javascript'>alert('IBAN No Yazınız...');</script>";
    }elseif(empty($_POST['limit'])){
        echo "<script type='text/javascript'>alert('Bakiye Yazınız...');</script>";
    }elseif(empty($_POST['kmh'])){
        echo "<script type='text/javascript'>alert('KMH Değerini Yazınız...');</script>";
    }
    else{
        $sql = "INSERT INTO kredikarti (kartID,kaynak,kartAdi,IBAN,bakiye,KMH,banka)
        VALUES ('$cardID','$owner','$cardName','$iban','$limit','$kmh','$bankName')";
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
