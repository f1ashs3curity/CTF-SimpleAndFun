<?php
session_start();

if (!in_array('xxe', $_SESSION['completed_challenges'])) {
    echo "You must complete the previous challenge first.";
    exit();
}

if (isset($_GET['file'])) {
    $file = $_GET['file'];
    include($file);
    $_SESSION['completed_challenges'][] = 'lfi';
} else {
    echo "Please provide a file to include.";
}
?>
