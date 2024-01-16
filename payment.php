<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "payment";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["name"];
    $amount = $_POST["amount"];
    $email = $_POST["email"];
    $dd = $_POST["dd"];
    $mm = $_POST["mm"];
    $yyyy = $_POST["yyyy"];
    $gender = $_POST["gender"];
    $payment = $_POST["paym"];
    $card = $_POST["card"];
    $cvc = $_POST["CVC"];
    $month = $_POST["month"];
    $year = $_POST["year"];
    
    $sql = "INSERT INTO pay(full_name,Amount,email,DOB_date,DOB_month,DOB_year,gender,payment_detail,card,CVC,Month,Year)
     VALUES ('$username', '$amount','$email','$dd','$mm','$yyyy','$gender','$payment','$card','$cvc','$month','$year')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration successful!'); window.location.replace('paymentsucces.html');</script>";
        // You may redirect to the login page or perform other actions
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

?>
