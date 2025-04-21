<?php
if (isset($_POST['generate_qr'])) {
    $url = $_POST['url'];
    include 'qrlib.php';  // Include the QR Code library
    QRcode::png($url, 'qrcode.png');  // Generate QR Code
    echo '<img src="qrcode.png" />';   // Display the generated QR Code
}
?>

<form method="POST">
    <input type="text" name="url" placeholder="Enter URL to generate QR" required><br>
    <input type="submit" name="generate_qr" value="Generate QR Code">
</form>
