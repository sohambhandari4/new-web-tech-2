<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST')
 {
    if (isset($_POST['submit_info']))
     {
        $_SESSION['student_info'] = ['name' => $_POST['name'], 'class' => $_POST['class'], 'address' => $_POST['address']];
        header("Location: $_SERVER[PHP_SELF]");
        exit;
    }
    
    if (isset($_POST['submit_marks'])) 
    {
        $student_info = $_SESSION['student_info'];
        $total_marks = array_sum($_POST);
        $total_subjects = count($_POST);
        $percentage = ($total_marks / ($total_subjects * 100)) * 100;
        
        echo "<h2>Student Mark Sheet</h2>
        <p><strong>Name:</strong> $student_info[name]</p>
        <p><strong>Class:</strong> $student_info[class]</p>
        <p><strong>Address:</strong> $student_info[address]</p>
        <p><strong>Marks:</strong></p>";

        foreach ($_POST as $subject => $marks)
         echo "<p>$subject: $marks</p>";
        echo "<p><strong>Total Marks:</strong> $total_marks</p>
        <p><strong>Percentage:</strong> $percentage%</p>";
        session_unset();
        session_destroy();
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Information & Marks</title>
</head>
<body>
    <?php if (!isset($_SESSION['student_info'])) : ?>

        <h2>Student Information Form</h2>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label>Name:</label><input type="text" name="name"><br><br>
            <label>Class:</label><input type="text" name="class"><br><br>
            <label>Address:</label><input type="text" name="address"><br><br>
            <input type="submit" name="submit_info" value="Submit">
        </form>
        
    <?php else : ?>

        <h2>Student Marks Form</h2>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <?php foreach (['Physics', 'Biology', 'Chemistry', 'Maths', 'Marathi', 'English'] as $subject) : ?>
                <label><?php echo $subject; ?>:</label><input type="text" name="<?php echo $subject; ?>"><br><br>
            <?php endforeach; ?>

            <input type="submit" name="submit_marks" value="Submit">
        </form>
        
    <?php endif; ?>

</body>
</html>
