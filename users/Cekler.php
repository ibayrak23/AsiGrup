<?php include("navbar.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "asideneme";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>DataTables example - Bootstrap 3</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">

    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
    </script>
</head>
<?php
$sql = "SELECT id, cekNo, odemeGunu, verilisTarihi,kaynak,hedef, durum,hareket,banka FROM cekler";
$result = $conn->query($sql);
?>

<body>
<div class="container">
    <div class="row">
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>id</th>
                <th>Çek No</th>
                <th>Ödeme Tarihi</th>
                <th>Kime Verildiği</th>
                <th>Verildiği Tarih</th>
                <th>Kimden Geldiği</th>
                <th>durum</th>
                <th>Banka Adı</th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <th>id</th>
                <th>Çek No</th>
                <th>Kime Verildiği</th>
                <th>Ödeme Tarihi</th>
                <th>Verildiği Tarih</th>
                <th>Kimden Geldiği</th>
                <th>durum</th>
                <th>Banka Adı</th>
            </tr>
            </tfoot>
            <?php  if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    ?>
                    <tbody>
                    <tr>
                        <td><?php echo $row["id"]. "<br>"; ?></td>
                        <td><?php echo $row["cekNo"].  "<br>"; ?></td>
                        <td><?php echo $row["odemeGunu"]. "<br>"; ?></td>
                        <td><?php echo $row["verilisTarihi"]. "<br>"; ?></td>
                        <td><?php echo $row["kaynak"]. "<br>"; ?></td>
                        <td><?php echo $row["hedef"]. "<br>"; ?></td>
                        <td><?php if($row["durum"]){echo "Ödendi"; } else{echo "Ödenmedi";}  "<br>"; ?></td>
                        <td><?php echo $row["banka"]. "<br>"; ?></td>
                    </tr>

                    </tbody>
                    <?php


                }
                //     echo "id: " . $row["id"]. " - Name: " . $row["kayit"]. " " . $row["gelen"]. "<br>";
            }
            ?>

        </table>

        <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>

    </div>
</div>
</body>
</html>