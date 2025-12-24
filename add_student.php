<?php
include "header.php";

function formatName($name) {
    return ucwords(trim($name));
}
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function cleanSkills($string) {
    return array_map('trim', explode(',', $string));
}
function saveStudent($name, $email, $skillsArray) {
    $file = __DIR__ . "/students.txt";

    if (!file_exists($file)) {
        throw new Exception("students.txt file not found.");
    }

    if (!is_writable($file)) {
        throw new Exception("students.txt is not writable.");
    }

    $data = "Name: $name | Email: $email | Skills: " . implode(", ", $skillsArray) . PHP_EOL;
    file_put_contents($file, $data, FILE_APPEND);
}

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $name = formatName($_POST["name"]);
        $email = $_POST["email"];
        $skills = $_POST["skills"];

        if (!$name || !validateEmail($email) || !$skills) {
            throw new Exception("All fields are required and email must be valid.");
        }

        $skillsArray = cleanSkills($skills);
        saveStudent($name, $email, $skillsArray);

        $msg = "<div class='success'>Student saved successfully 🎉</div>";
    } catch (Exception $e) {
        $msg = "<div class='error'>" . $e->getMessage() . "</div>";
    }
}
?>

<div class="card">
    <h2>Add Student</h2>
    <?php echo $msg; ?>
    <form method="post">
        <input type="text" name="name" placeholder="Full Name">
        <input type="email" name="email" placeholder="Email">
        <textarea name="skills" placeholder="Skills (comma separated)"></textarea>
        <button type="submit">Save Student</button>
    </form>
</div>

<?php include "footer.php"; ?>