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


<!-- display messages -->
<?php foreach ($messages as $message) : ?>
    <div class="message">
        <?php echo $message; ?>
    </div>
<?php endforeach; ?>

<form action="handle-form.php" method="post">
 
    <!-- display the form prefilled with the current data -->
    <p>First<input type="text" name="firstname" value=""></p>
    <p>Last<input type="text" name="lastname" value=""></p>
    <p>Email<input type="text" name="email" value=""></p>
    <p>Phone<input type="text" name="phone" value=""></p>
 
    <input type="submit" value="Submit">
 
</form>