<?php
 include 'connection.php';
 $loginUserEmail = 'nourelhoudaassiddeki@gmail.com';

 if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['to'])){

   $to = $_POST['to'];
   $subject = $_POST['subject'];
   $body = $_POST['body'];
   $from = $loginUserEmail;
   $dateTime = date("Y-m-d H:i:s");


   $sql = "INSERT INTO mails (mail_to, mail_from, subject, body, date_time) VALUES ('$to', '$from', '$subject', '$body', '$dateTime')";
   
    if ($conn->query($sql) === TRUE) {
        echo "Email Sent Successfully";
    }
    else {
        echo "Unable to Send the Email, something went wrong";
    }
}

if(isset($_GET['inboxMailId'])){

    $mailId = $_GET['inboxMailId'];
    $sql = "Delete from mails where id = '$mailId' ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Email Deleted Successfully";
        header('location: inbox.php ');
    }
    else {
        echo "Unable to Send the Email, something went wrong";
    }
}

if(isset($_GET['sentMailId'])){

    $mailId = $_GET['sentMailId'];
    $sql = "Delete from mails where id = '$mailId' ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Email Deleted Successfully";
        header('location: sent.php ');
    }
    else {
        echo "Unable to Send the Email, something went wrong";
    }
}
