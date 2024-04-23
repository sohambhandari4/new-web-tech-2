<!DOCTYPE html>
<html>
<head>
    <title>Simple Interest Calculator</title>
</head>
<body>
    <h2>Simple Interest Calculator</h2>

    <?php
    $principal = $_POST["principal"] ?? "";
    $rate = $_POST["rate"] ?? "";
    $time = $_POST["time"] ?? "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
     {
        if ($principal > 0 && $rate > 0 && $time > 0) 
        {
            $result = ($principal * $rate * $time) / 100;
            echo "<p>Simple Interest: $result</p>";
        } 
        else
         {
            echo "<p>Error: All fields must be positive numbers.</p>";
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Principal:</label>
        <input type="text" name="principal" value="<?= $principal ?>"><br><br>
        <label>Rate:</label>
        <input type="text" name="rate" value="<?= $rate ?>"><br><br>
        <label>Time (in years):</label>
        <input type="text" name="time" value="<?= $time ?>"><br><br>
        <input type="submit" value="Calculate">
    </form>
</body>
</html>
