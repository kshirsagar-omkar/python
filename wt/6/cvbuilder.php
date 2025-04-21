<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $experience = $_POST['experience'];
    // Generate and save CV
    $cv_content = "Name: $name\nEmail: $email\nExperience: $experience";
    file_put_contents("./cv_$name.txt", $cv_content);
    echo "CV generated successfully!";
}
?>

<form method="POST">
    <input type="text" name="name" placeholder="Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <textarea name="experience" placeholder="Experience" required></textarea><br>
    <input type="submit" value="Generate CV">
</form>

