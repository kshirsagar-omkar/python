
<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "mydb");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = $_POST['comment'];
    // Save comment to database
    $sql = "INSERT INTO comments (comment) VALUES ('$comment')";
    mysqli_query($conn, $sql);
}
?>


<form method="POST">
    <textarea name="comment" placeholder="Enter your comment"></textarea><br>
    <input type="submit" value="Submit">
</form>


<h1> Previous commenrs </h1>

<?php
// Display comments
$result = mysqli_query($conn, "SELECT comment FROM comments");
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['comment'] . "<br>";
}
?>

