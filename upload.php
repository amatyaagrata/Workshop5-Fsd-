<?php
include "header.php";

function uploadPortfolioFile($file) {
    $allowed = ["pdf", "jpg", "jpeg", "png"];
    $maxSize = 2 * 1024 * 1024;

    $ext = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed)) {
        throw new Exception("Invalid file type.");
    }
    if ($file["size"] > $maxSize) {
        throw new Exception("File size exceeds 2MB.");
    }
    if (!is_dir("uploads")) {
        throw new Exception("Upload directory not found.");
    }

    $newName = "portfolio_" . time() . "." . $ext;
    move_uploaded_file($file["tmp_name"], "uploads/" . $newName);

    file_put_contents("students.txt", "Uploaded File: $newName" . PHP_EOL, FILE_APPEND);
}

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        uploadPortfolioFile($_FILES["portfolio"]);
        $msg = "<div class='success'>File uploaded successfully 📁</div>";
    } catch (Exception $e) {
        $msg = "<div class='error'>" . $e->getMessage() . "</div>";
    }
}
?>

<div class="card">
    <h2>Upload Portfolio</h2>
    <?php echo $msg; ?>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="portfolio" required>
        <button type="submit">Upload</button>
    </form>
</div>

<?php include "footer.php"; ?>