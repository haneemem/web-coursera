<?php
    require "connection.php";
    
    $conn = connect_database();
    
    $course_name = $_POST['course_name'];
    $enrol_id = $_POST['enrol_id'];
    $resource_id = $_POST['resource_id'];
    
    $qry = "UPDATE {$course_name} SET {$resource_id} = 1-{$resource_id} WHERE e_id={$enrol_id};" ;
    $res = mysqli_query($conn, $qry);
    var_dump($qry);
    mysqli_close($conn);
    if(!$res) {
        echo mysqli_error($conn);

        header("HTTP/1.1 200 Found");
    }
    else{
        header("HTTP/1.1 200 OK");
    }
?>