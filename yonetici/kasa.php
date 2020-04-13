<?php include ("navbar.php");
include("baglanti.php"); ?>

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
$sql = "SELECT id, toppara, gelenpara,gidenpara,geltarih,gittarih FROM kasa";
$result = $conn->query($sql);
if (isset($_GET['del']) && is_numeric($_GET['del']))
{
    $del = $_GET['del'];
    $sql = "DELETE FROM kasa WHERE id=$del";
    if ($conn->query($sql) == TRUE) {
        echo "<script type='text/javascript'>alert('Kayıt Silindi...');</script>";
        header("Location: kasa.php");

    } else {
        echo "Error deleting record: " . $conn->error;
    }
  //  $result3 = $result->query($sql_delete) or die ("Error Querying Database 3");
}
else if(isset($_GET['upd']) && is_numeric($_GET['upd'])){
    header("Location: deneme.php");
}
?>

<body>
<div class="container">
        <div class="row">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Toplam Para</th>
                    <th>Gelen Para</th>
                    <th>Giden Para</th>
                    <th>Gelen Para Tarihi</th>
                    <th>Giden Para Tarihi</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>id</th>
                    <th>Toplam Para</th>
                    <th>Gelen Para</th>
                    <th>Giden Para</th>
                    <th>Gelen Para Tarihi</th>
                    <th>Giden Para Tarihi</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </tfoot>
        <?php        if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    ?>
                    <tbody>
                    <tr role="row" class="odd">
                        <td><?php echo $row["id"]. "<br>"; ?></td>
                        <td><?php echo $row["toppara"]. "<br>"; ?></td>
                        <td><?php echo $row["gelenpara"]. "<br>"; ?></td>
                        <td><?php echo $row["gidenpara"]. "<br>"; ?></td>
                        <td><?php echo $row["geltarih"]. "<br>"; ?></td>
                        <td><?php echo $row["gittarih"]. "<br>"; ?></td>
                        <td>
                            <a href="../kasa.php?id=<?= $row['id']; ?>" class='btn btn-info btn-group-sm update'> İncele </a>
                        </td>
                        <td>
                            <a href="deneme.php?id=<?= $row['id']; ?>" class='btn btn-warning btn-group-sm update'> Güncelle </a>
                        </td>

                        <td>
                            <a href="?del=<?= $row['id']; ?>" class='btn btn-group-sm btn-danger'>Sil</a>
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