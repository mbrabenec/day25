<?php

require_once 'DBBlackbox.php';

// start the session in order to be able to flash data
session_start();
 
// if this is a POST request ($_POST is not empty array)
if ($_POST) {
 
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
            'firstname' => '',
            'lastname' => '',
            'email' => '',
            'phone' => '',
        ];
    }
 
    // update data from request
    $data['firstname'] = $_POST['firstname'] ?? $data['firstname'];
    $data['lastname'] = $_POST['lastname'] ?? $data['lastname'];
    $data['email'] = $_POST['email'] ?? $data['email'];
    $data['phone'] = $_POST['phone'] ?? $data['phone'];
    // ...
 
    // validate data
    $valid = true; // we assert that everything is ok
    if ($data['firstname'] == '') {
 
        // add an error message
        $messages[] = 'Firstname must not be empty';
 
        $valid = false; // we indicate that not everything is ok
    }
 
    // if validation succeeded
    if ($valid) {
 
        // somehow save the data into the database
        insert($data);
 
        // inform the user
        $messages[] = 'Successfully saved the data.';
 
        // redirect!
        header('Location: display-form.php');
    }
 
    // flash messages
    $_SESSION['flashed_messages'] = $messages;
 
    // redirect!
    header('Location: display-form.php');
}