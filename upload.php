<!-- /Third part for uploading file  -->

<?php
require "header.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $allowed = ["pdf", "jpg", "png"];
        $file = $_FILES["portfolio"];
        $ext = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed)) {
            throw new Exception("Invalid file type.");
        }

        if ($file["size"] > 2 * 1024 * 1024) {
            throw new Exception("File too large.");
        }

        if (!is_dir("uploads")) {
            throw new Exception("Upload directory missing.");
        }

        $newName = uniqid("portfolio_") . "." . $ext;

        if (!move_uploaded_file($file["tmp_name"], "uploads/" . $newName)) {
            throw new Exception("Upload failed.");
        }

        $message = "File uploaded successfully!";
    } catch (Exception $e) {
        $message = "Error: " . $e->getMessage();
    }
}
?>

<h2>Upload Portfolio File</h2>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="portfolio" required>
    <br><br>
    <button type="submit">Upload</button>
</form>

<p><?php echo $message; ?></p>

<?php require "footer.php"; ?>
