<?php include ("navbar.php");
include("baglanti.php"); ?>
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
$sql = "SELECT id, krediMiktari, taksitSayisi, odemeGunu, taksitTutari,bankaAdi,toplamFaiz,toplamOdeme,durum FROM krediler";
$result = $conn->query($sql);
?>

<body>
<div class="container">
    <div class="row">
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>id</th>
                <th>Kredi Miktarı</th>
                <th>Taksit Sayısı</th>
                <th>Ödeme Günü</th>
                <th>Taksit Tutarı</th>
                <th>Banka Adı</th>
                <th>Toplam Ödenecek Faiz</th>
                <th>Toplam Ödeme</th>
                <th>Ödendi-Ödenmedi </th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <th>id</th>
                <th>Kredi Miktarı</th>
                <th>Taksit Sayısı</th>
                <th>Ödeme Günü</th>
                <th>Taksit Tutarı</th>
                <th>Banka Adı</th>
                <th>Toplam Ödenecek Faiz</th>
                <th>Toplam Ödeme</th>
                <th>Ödendi-Ödenmedi </th>
            </tr>
            </tfoot>
            <?php        if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    ?>
                    <tbody>
                    <tr>
                        <td><?php echo $row["id"]. "<br>"; ?></td>
                        <td><?php echo $row["krediMiktari"].  "<br>"; ?></td>
                        <td><?php echo $row["taksitSayisi"]. "<br>"; ?></td>
                        <td><?php echo $row["odemeGunu"]. "<br>"; ?></td>
                        <td><?php echo $row["taksitTutari"]. "<br>"; ?></td>
                        <td><?php echo $row["bankaAdi"]. "<br>"; ?></td>
                        <td><?php echo $row["toplamFaiz"]. "<br>"; ?></td>
                        <td><?php echo $row["toplamOdeme"]. "<br>"; ?></td>
                        <td><?php echo $row["durum"]. "<br>"; ?></td>
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