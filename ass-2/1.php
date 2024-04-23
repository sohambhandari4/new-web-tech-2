<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == UPLOAD_ERR_OK) 
    {
        $filename = $_FILES["file"]["tmp_name"];

        $choice = $_POST["choice"]; 
        switch ($choice) 
        {
            case 1:
                // Display type of file
                $fileType = mime_content_type($filename);
                echo "Type of file '$filename': $fileType\n";
                break;
            case 2:
                // Display content of file
                if (file_exists($filename)) 
                {
                    $content = file_get_contents($filename);
                    echo "Content of file '$filename':\n$content\n";
                } 
                else
                 {
                    echo "File '$filename' does not exist.\n";
                }
                break;
            case 3:
                // Delete a file
                if (file_exists($filename)) 
                {
                    unlink($filename);
                    echo "File '$filename' deleted successfully.\n";
                }
                 else 
                 {
                    echo "File '$filename' does not exist.\n";
                }
                break;
            default:
                echo "Invalid choice. Please select a valid option.\n";
        }
    }
     else
      {
        echo "Error uploading file.\n";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>File Operations</title>
</head>
<body>
    <h1>Menu:</h1>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
        <label>Select operation:</label>
        <select name="choice">
            <option value="1">Display type of file</option>
            <option value="2">Display content of file</option>
            <option value="3">Delete a file</option>
        </select><br><br>
        
        <label>Select file:</label>
        <input type="file" name="file" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>




