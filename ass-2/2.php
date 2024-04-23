<?php
// Function to append content of first file into second file
function appendFileContent($sourceFile, $destinationFile) {
    // Check if both files exist
    if (file_exists($sourceFile) && file_exists($destinationFile)) {
        // Read content of source file
        $content = file_get_contents($sourceFile);

        // Append content to destination file
        if (file_put_contents($destinationFile, $content, FILE_APPEND | LOCK_EX) !== false) {
            echo "Content from '$sourceFile' appended to '$destinationFile' successfully.\n";
        } else {
            echo "Error appending content from '$sourceFile' to '$destinationFile'.\n";
        }
    } else {
        echo "One or both of the files do not exist.\n";
    }
}

// Main program
echo "Enter the name of the source file: ";
$sourceFile = readline();

echo "Enter the name of the destination file: ";
$destinationFile = readline();

// Call function to append content of source file into destination file
appendFileContent($sourceFile, $destinationFile);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Append File Content</title>
</head>
<body>
    <h1>Append File Content</h1>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
        <label for="sourceFile">Select source file:</label>
        <input type="file" name="sourceFile" id="sourceFile" required><br><br>
        
        <label for="destinationFile">Select destination file:</label>
        <input type="file" name="destinationFile" id="destinationFile" required><br><br>
        
        <input type="submit" value="Append Content">
    </form>
</body>
</html>

