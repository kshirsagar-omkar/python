
<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "your_database");

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $item_id = $_POST['item_id'];
    if ($action == 'like') {
        $sql = "UPDATE items SET likes = likes + 1 WHERE id = '$item_id'";
    } elseif ($action == 'dislike') {
        $sql = "UPDATE items SET dislikes = dislikes + 1 WHERE id = '$item_id'";
    }
    mysqli_query($conn, $sql);
}

// Display like/dislike counts
$result = mysqli_query($conn, "SELECT likes, dislikes FROM items WHERE id = '$item_id'");
$row = mysqli_fetch_assoc($result);
echo "Likes: " . $row['likes'] . " Dislikes: " . $row['dislikes'];
?>

<form method="POST">
    <input type="hidden" name="item_id" value="1">
    <input type="submit" name="action" value="like">
    <input type="submit" name="action" value="dislike">
</form>
