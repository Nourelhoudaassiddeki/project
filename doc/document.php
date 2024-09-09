<?php
include('doc.php');
if (isset($_POST["Submit"])) {
    $pseudo =  $_POST["pseudo"];
    $fonction =  $_POST["fonction"];
    $service = $_POST["service"];
    $password = $_POST["password"];
    $passwd = $_POST["passwd"];
    $privileges = $_POST["pri"];
    $requete =mysqli_query($connexion, "INSERT INTO nouna ( PSEUDO, FONCTION, SECTION, MOT_DE_PASS, PASSWD, PRIVILEGE) VALUES ('$pseudo', '$fonction', '$service', '$password', '$passwd', '$privilege')");
    if($requete){
        echo"<script>alert(data inserted)</script>";
    }else{
        echo"<script>alert(data not inserted)</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aero</title>
</head>
<body>
<aside style="width: 100; padding-left: 15px; float: right;margin-right: 0%; margin-left: 50px; background-color: lightgray;position: relative;
    top: 50px; ">
    <form action=""  method="post" autocomplete="off" style="height: 100%;">
        <label for="">Add users</label><hr>
        <label for="">Pseudo:</label><br>
        <input  type="text" name="pseudo" id="" placeholder="user_name" style="margin: 10px; margin-left: 50px; "required><br/> <br />
        <label for="">Fontion:</label><br>
        <input type="text" name="fonction" id="" placeholder="fonction" style="margin: 10px; margin-left: 50px;" required><br/> <br />
        <label for="">Service/Section:</label><br>
        <select name="service" id="" required><br/> <br />
            <option value="" selected hidden>Select service </option><br>
            <option value="" > agent d'embarquement</option><br>
            <option value="">agent de securite</option><br><br>
            <option value="">agent d'assistance aux passagers</option><br>
            <option value=""> service technique navigation</option><br>
            <option value="">section controle aerien</option><br>
        </select><br/> <br />
        <label for="">password:</label><br/> <br />
        <input type="password" name="password" placeholder="password" style="margin: 10px; margin-left: 50px;" required> <br/> <br />
        <label for="">confirm pass:</label><br/> <br />
        <input type="password" name="passwd" placeholder="password" style="margin: 10px; margin-left: 50px;" required><br/> <br />
        <label for="" style="margin: 10px;">privilege:</label><br/> <br />
        <input type="checkbox" style="margin-top: 10px;" name="pri" value="Download docs">Download docs<br/> <br />
        <input type="checkbox"  style="margin-top: 10px;"name="pri" value="Add docs">Add docs <br/> <br />
        <input type="checkbox"  style="margin-top: 10px;"name="pri" value="delete docs">delete docs <br/> <br />
        <input type="checkbox"  style="margin-top: 10px; margin-bottom: 10px;"name="pri" value="Access to all docs">Access to all docs<br/> <br />
        <label for="" >Profile pic:</label><br/> <br />
        <input type="file" id="avatar" name="avatar" style="margin-top: 10px; margin-bottom: 10px;" required accept="image/png, image/jpge" >  <br/> <br />
        <button type="submit" style="margin-top: 10px; margin-bottom: 4px;" name="Submit">Add user</button>
    </form>
</aside>
</body>
</html>