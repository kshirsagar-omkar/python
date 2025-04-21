
<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "mydb");

if (isset($_POST['rate'])) {
    $rating = $_POST['rating'];
    $item_id = $_POST['item_id'];
    // Save rating to database
    $sql = "INSERT INTO ratings (item_id, rating) VALUES ('$item_id', '$rating')";
    mysqli_query($conn, $sql);
}

// Display average rating
$item_id = 1;  // Example item ID
$result = mysqli_query($conn, "SELECT AVG(rating) AS average FROM ratings WHERE item_id = '$item_id'");
$row = mysqli_fetch_assoc($result);
echo "Average Rating: " . round($row['average'], 1);
?>

<form method="POST">
    <input type="number" name="rating" min="1" max="5" placeholder="Rate 1-5" required><br>
    <input type="hidden" name="item_id" value="1">
    <input type="submit" name="rate" value="Submit Rating">
</form>

