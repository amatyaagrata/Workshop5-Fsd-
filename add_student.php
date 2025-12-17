<!-- //Second part for adding the students.. -->
<?php
require "header.php";
require "functions.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $name = formatName($_POST["name"]);
        $email = $_POST["email"];
        $skills = cleanSkills($_POST["skills"]);

        if (!$name || !validateEmail($email)) {
            throw new Exception("Invalid name or email.");
        }

        $data = $name . "|" . $email . "|" . implode(",", $skills) . PHP_EOL;

        if (!file_put_contents("students.txt", $data, FILE_APPEND)) {
            throw new Exception("Could not save student data.");
        }

        $message = "Student added successfully!";
    } catch (Exception $e) {
        $message = "Error: " . $e->getMessage();
    }
}
?>

<h2>Add Student Info</h2>

<form method="post">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Skills (comma-separated): <input type="text" name="skills" required><br><br>
    <button type="submit">Save</button>
</form>

<p><?php echo $message; ?></p>

<?php require "footer.php"; ?>
