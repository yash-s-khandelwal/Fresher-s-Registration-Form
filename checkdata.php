<?php
    include("conn.php");
    echo "connection successful...<br>";
    echo "$samplename <br>";
   
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


    // $sql = "INSERT INTO registered (URN,Name,MobileNo,Course,Year) SELECT '$studurn','$studname','$studmobile','$studcourse',$studyear FROM verify WHERE URN = '$studurn';";

    try{

        $sql = "SELECT EXISTS (SELECT 1 FROM verify WHERE URN = '$studurn' ) AS urn_exists;";
        $result = mysqli_query($conn, $sql); // Assuming you have a MySQLi connection
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($row['urn_exists'] == 1) {
                echo "URN found <br>";
                echo "Now Payment Gateway page will open <br>";
                // if URN is correct it will redirect to payment gateway
                // header("Location:payment_gateway.php");
            } 
            else {
                echo "No URN found";
                header("Location:first.html?error=invalidURN");            
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    catch(Exception $e){
        echo "query not executed.";
    }
    
?>
