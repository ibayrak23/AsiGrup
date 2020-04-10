    <html>
    <head>
        <title>Delete Transaction</title>
    </head>
    <body>



    <form action ="" method = "post">
        <?php

        $db = @new mysqli('localhost','root','','asigrup') or die ("Could not Connect! \n");

        // Protect From SQL injection & XSS
        if (isset($_GET)) {
            foreach ($_GET as $key => $value) {
                $_GET[$key] = $db->real_escape_string($value);
                $_GET[$key] = htmlspecialchars(trim($value), ENT_QUOTES, "utf-8");
            }
        }

        if (isset($_POST)) {
            foreach ($_POST as $key => $value) {
                $_POST[$key] = $db->real_escape_string($value);
                $_POST[$key] = htmlspecialchars(trim($value), ENT_QUOTES, "utf-8");
            }
        }

        if (isset($_REQUEST)) {
            foreach ($_REQUEST as $key => $value) {
                $_REQUEST[$key] = $db->real_escape_string($value);
                $_REQUEST[$key] = htmlspecialchars(trim($value), ENT_QUOTES, "utf-8");
            }
        }

        //Your Code
        $sql_query = "SELECT id, toppara, gelenpara,gidenpara,geltarih,gittarih FROM kasa";
        $result1 = $db->query($sql_query) or die ("error querying database");
        if (mysqli_num_rows($result1) > 0) {
            $row = $result1->fetch_assoc();
            $mID = $row['id'];
        } // assigning mID as MemberID

        $sql = "SELECT * FROM kasa WHERE id = '$mID' "; // Getting Members_ID in Sales Table
        $result=mysqli_query($db,$sql) or die ("Error Querying Database");

        $sql_getSalesID = "SELECT * FROM kasa WHERE id ='$mID'"; // Getting SalesID
        $result2 = $db->query($sql_getSalesID) or die ("Error Querying Database 2");
        if (mysqli_num_rows($result2) > 0 ) {
            $row = $result2->fetch_assoc();
            $SalesID = $row['id'];
        }

        // Check if click del button
        if (isset($_GET['del']) && is_numeric($_GET['del']))
        {
            $del = $_GET['del'];
            $sql_delete = "DELETE FROM kasa WHERE id = '$del'";
            $result3 = $db->query($sql_delete) or die ("Error Querying Database 3");
        }

        echo "<table>";
        echo "<tr> <th> User </th>  <th> Item </th> <th> Purchase Date </th> <th> Delete Option </th> </tr>";
        while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['toppara']; ?></td>
                <td><?= $row['gelenPara']; ?></td>
                <td><a href="?del=<?= $row['id']; ?>" class='btn btn-danger'> Delete </a></td>
            </tr>
    <?php
        }
        ?>


    </form>
    </body>
    </html>