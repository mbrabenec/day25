<?php 


require_once 'DBBlackbox.php';


$student = [
    'first_name' => 'John',
    'last_name' => 'Rambo'
];
 
update(1, $student);
