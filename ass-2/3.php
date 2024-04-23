<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

<h2>Student Details</h2>

<table>
    <tr>
        <th>Roll No</th>
        <th>Name</th>
        <th>Marks 1</th>
        <th>Marks 2</th>
        <th>Marks 3</th>
        <th>Total</th>
        <th>Percentage</th>
    </tr>
    
    <?php
    // Open the file
    $file = fopen("data/Student.dat", "r") or die("Unable to open file!");


    // Read data line by line and display in table
    while (!feof($file)) {
        $data = fgets($file);

        // Explode data to get individual fields
        $fields = explode(",", $data);

        // Calculate total marks and percentage
        $total_marks = $fields[2] + $fields[3] + $fields[4];
        $percentage = ($total_marks / 3);

        echo "<tr>";
        echo "<td>{$fields[0]}</td>";
        echo "<td>{$fields[1]}</td>";
        echo "<td>{$fields[2]}</td>";
        echo "<td>{$fields[3]}</td>";
        echo "<td>{$fields[4]}</td>";
        echo "<td>{$total_marks}</td>";
        echo "<td>{$percentage}%</td>";
        echo "</tr>";
    }

    // Close the file
    fclose($file);
    ?>
</table>

</body>
</html>
