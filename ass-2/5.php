<!DOCTYPE html>
<html>
<head>
    <title>File Listing</title>
</head>
<body>
    <h2>File Listing</h2>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="directory">Enter the directory path:</label>
        <input type="text" name="directory" id="directory" required><br><br>
        
        <label for="extension">Enter the file extension:</label>
        <input type="text" name="extension" id="extension" required><br><br>

        <input type="submit" value="List Files">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $directory = $_POST["directory"];
        $extension = $_POST["extension"];

        if (!is_dir($directory))
         {
            echo "<p>Invalid directory path.</p>";
            exit;
        }

        if (!preg_match('/^\.[a-zA-Z0-9]+$/', $extension))
         {
            echo "<p>Invalid file extension format.</p>";
            exit;
        }

        $files = glob("$directory/*$extension");

        if (!empty($files))
         {
            echo "<h3>Files with extension '$extension' in directory '$directory':</h3>";
            echo "<ul>";
            foreach ($files as $file)
             {
                echo "<li>$file</li>";
            }
            echo "</ul>";
        }
         else 
         {
            echo "<p>No files found with extension '$extension' in directory '$directory'.</p>";
        }
    }
    ?>
</body>
</html>
