<?php
session_start();


$_SESSION["name"] = $_SESSION["name"] ?? "";
$_SESSION["email"] = $_SESSION["email"] ?? "";
$_SESSION["gender"] = $_SESSION["gender"] ?? "";
$_SESSION["course"] = $_SESSION["course"] ?? "";


if ($_SERVER["REQUEST_METHOD"] == "POST") 

    foreach ($_POST as $key => $value) 
    {
        $_SESSION[$key] = $value;
    }
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Registration Form</title>
</head>
<body>
    <?php if ($_SESSION["name"] && $_SESSION["email"] && $_SESSION["gender"] && $_SESSION["course"]): ?>
        <h2>Student Details</h2>
        <?php foreach ($_SESSION as $key => $value): ?>
            <p><?= ucfirst($key) ?>: <?= $value ?></p>
        <?php endforeach; ?>
        <?php session_unset(); session_destroy(); ?>

    <?php else: ?>
        <h2>Student Registration Form</h2>
        <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div><label>Name:</label><input type="text" name="name" value="<?= $_SESSION["name"] ?>"></div>
            <div><label>Email:</label><input type="text" name="email" value="<?= $_SESSION["email"] ?>"></div>
            <div>
                <label>Gender:</label>
                <input type="radio" name="gender" value="male"<?= $_SESSION["gender"] == "male" ? " checked" : "" ?>> Male
                <input type="radio" name="gender" value="female"<?= $_SESSION["gender"] == "female" ? " checked" : "" ?>> Female
            </div>
            <div>
                <label>Course:</label>
                <select name="course">
                    <option value="">Select Course</option>
                    <?php foreach (["B.Tech", "M.Tech", "B.Sc", "M.Sc"] as $course): ?>
                        <option value="<?= $course ?>"<?= $_SESSION["course"] == $course ? " selected" : "" ?>><?= $course ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="submit" value="Submit">
        </form>
    <?php endif; ?>
</body>
</html>

                    

