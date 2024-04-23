<!DOCTYPE html>
<html>
<head>
    <title>Total Vowels in File Name</title>
</head>
<body>
    <h2>Total Vowels in File Name</h2>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="fileName">Enter the name of the file:</label>
        <input type="text" name="fileName" id="fileName" required><br><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    // Function to count vowels in a string
    function countVowels($str)
     {
        $vowels = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
        $count = 0;
        foreach (str_split($str) as $char) 
        {
            if (in_array($char, $vowels)) 
            {
                $count++;
            }
        }
        return $count;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
       
        $fileName = $_POST["fileName"];
        $totalVowels = countVowels($fileName);

        echo "<p>Total number of vowels in file name '$fileName': $totalVowels</p>";
    }
    ?>
</body>
</html>

