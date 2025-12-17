<!-- //4th part -->
<?php
require "header.php";
require "functions.php";

echo "<h2>Student List</h2>";

if (file_exists("students.txt")) {
    $lines = file("students.txt");

    foreach ($lines as $line) {
        list($name, $email, $skills) = explode("|", trim($line));
        $skillsArray = explode(",", $skills);

        echo "<p><strong>Name:</strong> $name<br>";
        echo "<strong>Email:</strong> $email<br>";
        echo "<strong>Skills:</strong> ";
        print_r($skillsArray);
        echo "</p><hr>";
    }
} else {
    echo "<p>No students found.</p>";
}

require "footer.php";
?>
