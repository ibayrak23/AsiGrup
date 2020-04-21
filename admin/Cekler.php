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
    <title>Çekler</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<?php
$sql1 = "SELECT adiSoyadi FROM banka";
$result1 = $conn->query($sql1);
$sql2 = "SELECT adiSoyadi FROM musteri";
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql2);
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
                            <legend class="text-center header">Çekler</legend>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="cekNo" name="cekNo" type="number" maxlength="20" placeholder="Çek Numarasi" class="form-control">
                                </div>
                            </div>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                    <div class="col-md-8">
                                        <input id="cekNo" name="miktar" type="miktar" maxlength="20" placeholder="Miktarı" class="form-control">
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
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <select class="form-control" id="source"  name="source">
                                        <?php        if ($result2->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result2->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $row["adiSoyadi"]; ?>" > <?php echo $row["adiSoyadi"]; ?></option>
                                            <?php  }}?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <select class="form-control" id="target"  name="target">
                                        <?php        if ($result3->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result3->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $row["adiSoyadi"]; ?>" > <?php echo $row["adiSoyadi"]; ?></option>
                                            <?php  }}?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <select class="form-control" name="bankName">
                                        <?php    if ($result1->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result1->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $row["adiSoyadi"]; ?>">  <?php echo $row["adiSoyadi"]; ?></option>
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
    $cekNo= isset($_POST['cekNo']) ? $_POST['cekNo'] : '';
    $miktar= isset($_POST['miktar']) ? $_POST['miktar'] : '';
    $payDate= isset($_POST['payDate']) ? $_POST['payDate'] : '';
    $givenDate= isset($_POST['givenDate']) ? $_POST['givenDate'] : '';
    $source= isset( $_POST['source']) ?  $_POST['source'] : '';
    $target= isset( $_POST['target']) ?  $_POST['target'] : '';
    $bankName= isset( $_POST['bankName']) ?  $_POST['bankName'] : '';



    if (isset($_POST['button'])){
       // echo $_POST['givenWho'].'---';
        if(empty($_POST['cekNo'])){
            echo "<script type='text/javascript'>alert('Çek Numarasını Yazınız...');</script>";
        }elseif(empty($_POST['miktar'])){
            echo "<script type='text/javascript'>alert('Miktarı Yazınız...');</script>";
        }elseif(empty($_POST['payDate'])){
            echo "<script type='text/javascript'>alert('Ödeme Tarihini Yazınız...');</script>";
        }elseif(empty($_POST['givenDate'])){
            echo "<script type='text/javascript'>alert('Verildiği Tarihi Yazınız...');</script>";
        }elseif(empty($_POST['source'])){
            echo "<script type='text/javascript'>alert('Kime Verildiğini Yazınız...');</script>";
        }elseif(empty($_POST['target'])){
            echo "<script type='text/javascript'>alert('Kimden Geldiğini Yazınız...');</script>";
        }elseif(empty($_POST['bankName'])){
            echo "<script type='text/javascript'>alert('Banka Adını Yazınız...');</script>";
        }else{
            $sql = "INSERT INTO cekler (cekNo,miktar,odemeGunu,verilisTarihi,kaynak,hedef,banka)
        VALUES ('$cekNo','$miktar','$payDate','$givenDate','$source','$target','$bankName')";
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
