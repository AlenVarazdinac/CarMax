<?php

include_once 'config.php';

$contactEmail = $_POST['contactEmail'];
$contactSubject = $_POST['contactSubject'];
$contactMessage = $_POST['contactMessage'];

if ($contactEmail && $contactSubject && $contactMessage !== '') {
    // Database request
    $command = $db->prepare("INSERT INTO contact_us (contact_mail, contact_subject, contact_message) VALUES('$contactEmail', '$contactSubject', '$contactMessage')");
    $command->execute();   
    
    header('location: public/about.php?msgsent');    
} else {
    header('location: public/about.php?notset');
}
