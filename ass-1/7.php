<!DOCTYPE html>
<html><head>
    <title>File Upload and Information Display</title>
</head>
<body>   <h2>File Upload and Information Display</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) 
    {
        $file = $_FILES["file"];
        if ($file["error"] == 0) 
        {
            $file_info = [
                "Name" => $file["name"],
                "Type" => $file["type"],
                "Size" => $file["size"]
            ];
            echo implode("<br>", array_map(function ($key, $value)
             {
                return "$key: $value";

            }, array_keys($file_info), $file_info));
            
            $destination = "uploads/" . $file["name"];
            echo move_uploaded_file($file["tmp_name"], $destination) ? "<p>File uploaded successfully.</p>" : "<p>Failed to upload file.</p>";
        }
         else 
         {
            echo "<p>Error occurred while uploading the file.</p>";
        }
    }
    ?>
    <form method="post" enctype="multipart/form-data">
        <label>Select File:</label>
        <input type="file" name="file"><br><br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>

