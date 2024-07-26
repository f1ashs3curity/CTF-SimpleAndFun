<?php
session_start();

if (!in_array('lfi', $_SESSION['completed_challenges'])) {
    echo "You must complete the previous challenge first.";
    exit();
}

if (isset($_GET['cmd'])) {
    $cmd = $_GET['cmd'];
    system($cmd);
    $_SESSION['completed_challenges'][] = 'rce';
} else {
    echo "Please provide a command to execute.";
}
?>
