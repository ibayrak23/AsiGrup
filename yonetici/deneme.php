<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>

<form action="deneme.php" method="post">
    <label for="fname">First name:</label><br>
    <input type="text" id="fname" name="fname" value="John"><br>
    <label for="lname">Last name:</label><br>
    <input type="text" id="lname" name="lname" value="Doe"><br><br>
    <input type="submit" id="button" name="button" value="kayıt">
</form>
<?php
if(isset($_POST['button'])){
    echo "<script type='text/javascript'>alert('ok...');</script>";
}else{
    echo "<script type='text/javascript'>alert('no...');</script>";
}

?>



</body>
</html>
