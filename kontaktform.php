<?php
$hostname = "mysql98.unoeuro.com";
$username = "elitegaming_dk";
$password = "AFT8XD14";
$db = "elitegaming_dk_db_kontaktform";


$dbconnect = mysqli_connect($hostname, $username, $password, $db);
if (mysqli_connect_errno()) {
die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
$name = $_POST['name'];
$company = $_POST['company'];
$telephone = $_POST['telephone'];
$email = $_POST ['email'];
$subject = $_POST ['subject'];
}


$stmt = $dbconnect->prepare("INSERT INTO kontakt_form (name, company, telephone, email, subject) VALUES (?, ?, ?)");
$stmt->bind_param("sis", $name, $company, $telephone, $email, $subject);
$stmt->execute();

if ($stmt->execute()) {
echo "Thank you for your review.";
} else {
die("An error occured.");
}
$stmt->close();

?>