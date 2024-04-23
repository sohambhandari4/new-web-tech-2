<html>
<body>
<form method=post action="<?php echo $_SERVER['PHP_SELF'] ?>">
Enter String : <input type=text name=str1><br>
<input type=submit name=submit value =Reverse>
</form>

<?php
            if(isset($_POST['submit']))
    {
                        $str=$_POST['str1'];
                        $nstr=strrev($str);
                        echo"<br>".$nstr;
    }
?>
</body>

</html>