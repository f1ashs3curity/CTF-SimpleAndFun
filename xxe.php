<?php
session_start();

libxml_disable_entity_loader(false);

if (!in_array('sql_injection', $_SESSION['completed_challenges'])) {
    echo "You must complete the previous challenge first.";
    exit();
}

if (isset($_POST['xml'])) {
    $xml = $_POST['xml'];
    $dom = new DOMDocument();
    $dom->loadXML($xml, LIBXML_NOENT | LIBXML_DTDLOAD);
    $data = simplexml_import_dom($dom);

    echo $data;
    $_SESSION['completed_challenges'][] = 'xxe';
} else {
    echo '<form method="post">
            <textarea name="xml" rows="10" cols="30"></textarea><br>
            <input type="submit" value="Submit">
          </form>';
}
?>
