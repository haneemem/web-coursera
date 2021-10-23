<?php

function getResourcesStatus($enrol_id, $course_name) {
    require_once '../connection.php';
    $conn = connect_database();
    $qry = "SELECT * FROM {$course_name} WHERE e_id = {$enrol_id};";
    $res = mysqli_query($conn, $qry);
    $row = mysqli_fetch_row($res);
    mysqli_close($conn);
    return $row;
    //print_r($row);
}

?>  