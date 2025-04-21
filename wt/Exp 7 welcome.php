<?php
session_start();

$name = $mobile = $email = "";
$nameErr = $mobileErr = $emailErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $mobile = trim($_POST["mobile"]);
    $email = trim($_POST["email"]);

    // Name validation
    if (empty($name)) {
        $nameErr = "Name is required.";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $nameErr = "Only letters and white spaces are allowed.";
    }

    // Mobile validation
    if (empty($mobile)) {
        $mobileErr = "Mobile number is required.";
    } elseif (!preg_match("/^[0-9]{10}$/", $mobile)) {
        $mobileErr = "Invalid mobile number format. Must be 10 digits.";
    }

    // Email validation
    if (empty($email)) {
        $emailErr = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format.";
    }

    // Check if all errors are empty
    if (empty($nameErr) && empty($mobileErr) && empty($emailErr)) {
        header("Location: welcome.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Authentication Form</title>
</head>
<body>
    <h2>User Authentication</h2>
    <form method="POST" action="">
        Name: <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">
        <span style="color:red;"><?php echo $nameErr; ?></span><br><br>

        Mobile: <input type="text" name="mobile" value="<?php echo htmlspecialchars($mobile); ?>">
        <span style="color:red;"><?php echo $mobileErr; ?></span><br><br>

        Email: <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
        <span style="color:red;"><?php echo $emailErr; ?></span><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
