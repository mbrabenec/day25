<?php
session_start();
require_once 'DBBlackbox.php';

$messages = [];

if ($_POST) {

    $is_valid = true;
    $data = [];
    $data['name'] = '';
    $data['description'] = '';
    $data['year'] = '';

    if (empty($_POST['name'])) {
        $is_valid = false;
        $messages[] = "Your data is invalid - name is empty";
    }

    if ($_POST['year'] < 1900) {
        $is_valid = false;
        $messages[] = "Your data is invalid - year is not correct";
    }

    if ($is_valid) {
        $data['name'] = $_POST['name'];
        $data['description'] = $_POST['description'];
        $data['year'] = $_POST['year'];

        if (empty($_POST['id'])) {
            $id = insert($data);
            $messages[] = "Your data is saved under id ".$id;
            $target = "add";
        } else {
            update($_POST['id'], $data);
            $messages[] = "Your data is updated under id ".$_POST[$id];
            $target = "browse";
        }
    }

    $_SESSION['messages'] = $messages;
    header("Location: index.php?page=add");
    exit;
}
