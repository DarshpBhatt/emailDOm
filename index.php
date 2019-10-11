<!DOCTYPE html>
<html>
<head>
<title>Yop-Mail</title>
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
<div style="padding-left:16px">
	<h2>Inbox</h2>

<br>
<form action="" method="post">
        
        <input type="number" name="idtoDel" id="idtoDel">    
        <input type="submit" value="Delete Email" name="submit">
</form>
<br>
<form action="" method="post">
        
        <input type="number" name="idtoArc" id="idtoArc">    
        <input type="submit" value="Archive Email" name="submitARC">
</form>
<br>
<?php
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

$sql = "SELECT id, recivedFrom, reg_date,subject ,message FROM RecivedEmail WHERE isSpam IS NULL ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>Email UUID:". $row["id"]."<br> From: ". $row["recivedFrom"]. "<br> Sub:" . $row["subject"] . "<br><br> Message:<br>".$row['message']."<br><br> Sent at :".$row["reg_date"]."<p><hr>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
</div>
	</div>
<?php
if (isset($_POST["submit"]))
{
$idtoDel = $_POST["idtoDel"];

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

$sql = "DELETE FROM RecivedEmail WHERE id = $idtoDel	";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
echo 'alert("message successfully Deleted")';
echo '</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}

?>
<?php
if (isset($_POST["submitARC"]))
{
$idtoArc = $_POST["idtoArc"];

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

$sql = "UPDATE RecivedEmail SET isArchived = 1 WHERE id = $idtoArc	";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
echo 'alert("message successfully Archived")';
echo '</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}

?>
</body>
