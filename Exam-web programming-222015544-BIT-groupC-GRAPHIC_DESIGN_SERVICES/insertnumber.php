<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $var1=$_POST["var1"];
        $var2=$_POST["var2"];
        $sum=$var1+$var2;
        echo "<p>the sum of $var1 and $var2 is:$sum</p>";
    }
    ?>
</body>
</html>