
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDir = "uploads/"; // Directory to store uploaded files
    $targetFile = $targetDir . basename($_FILES["csv_file"]["name"]);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is a CSV file
    if ($fileType == "csv") {
        if (move_uploaded_file($_FILES["csv_file"]["tmp_name"], $targetFile)) {
            echo "File uploaded successfully.";
        } else {
            echo "Error uploading the file.";
        }
    } else {
        echo "Invalid file format. Please upload a CSV file.";
    }
} else {
    echo "Invalid request.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File upload and conversion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>File Upload and Conversion</h2>
        <form action="file.php" method="post" enctype="multipart/form-data">
            <label for="csv_file">Upload CSV File:</label>
            <input type="file" name="csv_file" id="csv_file" accept=".csv" required>
            <button type="submit">Upload and Convert</button>
        </form>
    </div>
</body>
</html>