<?php
session_start();

// Initialize session variables
if (!isset($_SESSION['page_totals'])) {
    $_SESSION['page_totals'] = [0, 0, 0]; // Initialize page totals to zero
}

// Process purchase
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['item1'])) {
        $_SESSION['page_totals'][0] += $_POST['item1'];
    } elseif (isset($_POST['item2'])) {
        $_SESSION['page_totals'][1] += $_POST['item2'];
    } elseif (isset($_POST['item3'])) {
        $_SESSION['page_totals'][2] += $_POST['item3'];
    } elseif (isset($_POST['item4'])) {
        $_SESSION['page_totals'][0] += $_POST['item4'];
    } elseif (isset($_POST['item5'])) {
        $_SESSION['page_totals'][1] += $_POST['item5'];
    } elseif (isset($_POST['item6'])) {
        $_SESSION['page_totals'][2] += $_POST['item6'];
    } elseif (isset($_POST['item7'])) {
        $_SESSION['page_totals'][0] += $_POST['item7'];
    } elseif (isset($_POST['item8'])) {
        $_SESSION['page_totals'][1] += $_POST['item8'];
    } elseif (isset($_POST['item9'])) {
        $_SESSION['page_totals'][2] += $_POST['item9'];
    }
    
    // Redirect to next page or bill
    if (isset($_POST['item7']) || isset($_POST['item8']) || isset($_POST['item9'])) {
        header("Location: bill.php");
        exit;
    } else {
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Mall</title>
</head>
<body>
    <?php if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) : ?>
        <h2>Login</h2>
        <!-- Login form goes here -->
    <?php else : ?>
        <h2>Shopping Mall</h2>
        <!-- Page 1 -->
        <h3>Page 1</h3>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label>Item 1 Price:</label>
            <input type="number" name="item1" value="0"><br><br>
            <input type="submit" value="Add to Cart">
        </form>
        <p>Page Total: <?php echo $_SESSION['page_totals'][0]; ?></p>
        
        <!-- Page 2 -->
        <h3>Page 2</h3>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label>Item 4 Price:</label>
            <input type="number" name="item4" value="0"><br><br>
            <input type="submit" value="Add to Cart">
        </form>
        <p>Page Total: <?php echo $_SESSION['page_totals'][1]; ?></p>
        
        <!-- Page 3 -->
        <h3>Page 3</h3>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label>Item 7 Price:</label>
            <input type="number" name="item7" value="0"><br><br>
            <input type="submit" value="Add to Cart">
        </form>
        <p>Page Total: <?php echo $_SESSION['page_totals'][2]; ?></p>
        
        <!-- Bill Page -->
        <?php
        if (isset($_POST['item7']) || isset($_POST['item8']) || isset($_POST['item9'])) {
            $total_bill = array_sum($_SESSION['page_totals']);
            $_SESSION['page_totals'] = [0, 0, 0]; // Reset page totals
            echo "<h3>Bill</h3>";
            echo "<p>Total Bill: $total_bill</p>";
        }
        ?>
    <?php endif; ?>
</body>
</html>

