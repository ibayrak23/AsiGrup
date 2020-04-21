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
    <title>Müşteriler</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<?php
$sql = "SELECT adiSoyadi FROM banka";
$result = $conn->query($sql);
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
                            <legend class="text-center header">Müşteriler</legend>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="name" name="name" type="text" placeholder="Adı Soyadı" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="tcNo" name="tcNo" type="number" maxlength="11" placeholder="Tc Numarası" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="telNo" name="telNo" type="number" maxlength="11" placeholder="Telefon Numarası" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="adress" name="adress" type="text" placeholder="Adresi" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="taxNo" name="taxNo" type="number" maxlength="10" placeholder="Vergi Numarası" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="payment" name="payment" type="number" placeholder="Ödediği Peşinat" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="debt" name="debt" type="number" placeholder="Kalan Miktar" class="form-control">
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
    $name= isset($_POST['name']) ? $_POST['name'] : '';
    $tcNo= isset($_POST['tcNo']) ? $_POST['tcNo'] : '';
    $telNo= isset($_POST['telNo']) ? $_POST['telNo'] : '';
    $adress= isset( $_POST['adress']) ?  $_POST['adress'] : '';
    $taxNo= isset( $_POST['taxNo']) ?  $_POST['taxNo'] : '';
    $payment= isset( $_POST['payment']) ?  $_POST['payment'] : '';
    $debt= isset( $_POST['debt']) ?  $_POST['debt'] : '';
    $bankName= isset( $_POST['bankName']) ?  $_POST['bankName'] : '';

    if (isset($_POST['button'])){
        if(empty($_POST['name'])){
            echo "<script type='text/javascript'>alert('Adı Soyadı Yazınız...');</script>";
        }elseif(empty($_POST['tcNo'])){
            echo "<script type='text/javascript'>alert('TC No Yazınız...');</script>";
        }elseif(empty($_POST['telNo'])){
            echo "<script type='text/javascript'>alert('Tel No Yazınız...');</script>";
        }elseif(empty($_POST['adress'])){
            echo "<script type='text/javascript'>alert('Adresi Yazınız...');</script>";
        }elseif(empty($_POST['taxNo'])){
            echo "<script type='text/javascript'>alert('Vergi No Yazınız...');</script>";
        }elseif(empty($_POST['payment'])){
            echo "<script type='text/javascript'>alert('Ne kadar Ödediğini Yazınız...');</script>";
        }elseif(empty($_POST['debt'])){
            echo "<script type='text/javascript'>alert('Ne kadar Ödeyeceğini Yazınız...');</script>";
        }else{  echo $bankName.'---------';
            $sql = "INSERT INTO musteri (adiSoyadi,tc,gsm,adres,vergiNo,odenenBorc,kalanBorc,banka)
        VALUES ('$name','$tcNo','$telNo','$adress','$taxNo','$payment','$debt','$bankName')";
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
