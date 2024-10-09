<?php
    include("conn.php");
    echo "connection successful...<br>";

    $studname = filter_input(INPUT_POST, 'studname1');
    $studurn = filter_input(INPUT_POST, 'studurn1');
    $studmobile = filter_input(INPUT_POST, 'studmobile1');
    $studcourse = filter_input(INPUT_POST, 'studcourse1');
    $studyear = filter_input(INPUT_POST, 'studyear1');

    echo "$studname<br>";
    echo "$studurn<br>";
    echo "$studmobile<br>";
    echo "$studcourse<br>";
    echo "$studyear<br>";

?>