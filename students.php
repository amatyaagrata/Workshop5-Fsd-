<?php include "header.php"; ?>
<div class="card">
    <h2>Students List</h2>
    <?php
    if (file_exists("students.txt")) {
        $lines = file("students.txt");
        foreach ($lines as $line) {
            echo "<p>" . htmlspecialchars($line) . "</p>";
        }
    } else {
        echo "<div class='error'>No data found.</div>";
    }
    ?>
</div>
<?php include "footer.php"; ?>