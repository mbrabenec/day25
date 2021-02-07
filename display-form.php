<?php
 
// start the session in order to get flashed data
session_start();
 
// we will need some way to keep and present messages for the user
// we will use flashed messages from the session or start just with 
// an empty array
$messages = $_SESSION['flashed_messages'] ?? [];
 
// delete flashed messages once we have them (that is the principle of flashing)
unset($_SESSION['flashed_messages']);
 
// somehow we must determine whether this is creating a new record
// or updating an existing one
$is_edit = false;
 
if ($is_edit) {
 
    // somehow retrieve existing data from some storage
    $data = [
        // ...
    ];
} else {
 
    // prepare empty data with the same structure as those that
    // would be retrieved from some storage
    $data = [
        'foo' => 'default value'
    ];
}

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
    
</body>
</html>

<!-- display messages -->
<?php foreach ($messages as $message) : ?>
    <div class="message">
        <?php echo $message; ?>
    </div>
<?php endforeach; ?>
 
<form action="" method="post">
 
    <!-- display the form prefilled with the current data -->
    <input type="text" name="foo" value="<?php echo htmlspecialchars($data['foo']); ?>">
 
    <input type="submit" value="Submit">
 
</form>