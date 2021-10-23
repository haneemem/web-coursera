<?php

    function enroll_user($course_name, $username) {
        require "../connection.php";
        $conn = connect_database();

        $qry = "SELECT c_name FROM course INNER JOIN enrollment ON (course.c_id = enrollment.c_id AND enrollment.username ='{$username}' AND course.c_name = '{$course_name}');";
        
        $res = mysqli_query($conn, $qry);
        //$res = mysqli_fetch_all($res);
        $t = "SELECT c_id FROM course WHERE course.c_name = '{$course_name}';";
        $course_id = mysqli_query($conn, $t);
            
        //$course_id = mysqli_fetch_all($course_id); 
        $course_id = mysqli_fetch_row($course_id);
        if(mysqli_num_rows($res) == 0) {

            $sql = "INSERT INTO enrollment (c_id,username) VALUES ('{$course_id[0]}', '{$username}');";
            $res = mysqli_query($conn, $sql);
            $last_id = mysqli_insert_id($conn);
            
            $t2 = "INSERT INTO {$course_name} (e_id) VALUES ('{$last_id}');";
            $res = mysqli_query($conn, $t2);
            //echo "New record created successfully. Last inserted ID is: " . ;
            mysqli_close($conn);
            return $last_id;

        }else {
            $sql = "SELECT e_id FROM enrollment WHERE( username= '{$username}' AND c_id = '{$course_id[0]}');";
            $res = mysqli_query($conn, $sql);
            $enrol_id = mysqli_fetch_row($res);
            //echo $enrol_id[0];
            mysqli_close($conn);
            return $enrol_id[0];
        }
    }

?>