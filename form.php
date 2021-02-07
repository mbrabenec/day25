<?php 

// var_dump($_GET);
// var_dump($_POST);

session_start();

$_SESSION['start'] = date("H:i:s");
$_SESSION['message'] = "hello";

echo($_SESSION['start']);
echo($_SESSION['message']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
<input type="text" name="foo" value="">
    <input type="submit" value="Submit!">
</form>

</body>
</html>