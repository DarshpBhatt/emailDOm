<!DOCTYPE html>
<html>
<head>
<title>Yop-Mail Send Mail</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="index.js"></script>
<link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>

	<div id = "topNav">
<!-- Top Navigation Menu -->
<div class="topnav">
  <a href="index.php" class="active" style="text-align: center;">E-M@il</a>
  <div id="myLinks">
    <a href="newMail.php">New Email</a>
    <a href="sentmail.php">Sent</a>
    <a href="spamMail.php">Spam</a>
    <a href="archivedMail.php">Archive</a>
    <a href="https://www.theweathernetwork.com">Weather</a>
  </div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<BR>
<div style="padding-left:16px" id = "NewMail">

  <form action="" method="post">
        <label for="To">To:</label><br>
        <input type="text" name="To" id="To">
    <P>
        <label for="subject">Subject:</label><br>
        <input type="text" name="subject" id="subject">
    </p>
    <p>
        <label for="message">Email:</label><br>
        <input type="text" name="message" id="message" style="width: 95%; height: 340px;">
    </p>

    <input type="submit" value="Send Email" name="submit">
</form>
	
</div>
	</div>

</body>

<?php
if (isset($_POST["submit"]))
{
$To = $_POST["To"]; 
$subject = $_POST["subject"]; 
$message = $_POST["message"]; 



$servername = "localhost";
$username = "darsh";
$password = "Test123!";
$dbname = "Emails";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO SentEmail (sentTp , subject , message)
VALUES ('$To' , '$subject', '$message')";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
echo 'alert("message successfully sent")';
echo '</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}

?>
