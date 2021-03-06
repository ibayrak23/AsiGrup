<?php include("navbar.php");
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
$sql = "SELECT id,kart_id, kartAdi, banka, kartLimit, kesimTarihi,sonOdeme FROM kredikartlari";
$result = $conn->query($sql);
?>

<body>
<div class="container">
    <div class="row">
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>id</th>
                <th>Kart id</th>
                <th>Kart Adı</th>
                <th>Banka</th>
                <th>Kart Limiti</th>
                <th>Hesap Kesim Tarihi</th>
                <th>Son Ödeme Günü</th>
                <th></th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <th>id</th>
                <th>Kart id</th>
                <th>Kart Adı</th>
                <th>Banka</th>
                <th>Kart Limiti</th>
                <th>Hesap Kesim Tarihi</th>
                <th>Son Ödeme Günü</th>
                <th></th>
            </tr>
            </tfoot>
            <?php        if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    ?>
                    <tbody>
                    <tr>
                        <td><?php echo $row["id"]. "<br>"; ?></td>
                        <td><?php echo $row["kart_id"]. "<br>"; ?></td>
                        <td><?php echo $row["kartAdi"].  "<br>"; ?></td>
                        <td><?php echo $row["banka"]. "<br>"; ?></td>
                        <td><?php echo $row["kartLimit"]. "<br>"; ?></td>
                        <td><?php echo $row["kesimTarihi"]. "<br>"; ?></td>
                        <td><?php echo $row["sonOdeme"]. "<br>"; ?></td>
                        <td>
                            <a href="../admin/deneme.php?id=<?= $row['kart_id']; ?>" class='btn btn-info btn-group-sm update'> İncele </a>
                        </td>
                    </tr>
                    </tbody>
                    <?php
                }
            }
            ?>
        </table>
        <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>
    </div>
</div>
</body>
</html>