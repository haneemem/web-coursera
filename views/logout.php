<?php

//Deleting session information

    session_start();
    require_once "../connection.php";
    
    $conn = connect_database();
    
    $username = $_SESSION['uname'];
    $qry = "SELECT e_id, c_name FROM course INNER JOIN enrollment WHERE (username = '{$username}' AND enrollment.c_id = course.c_id);" ;
    $res = mysqli_query($conn, $qry);
    $res = mysqli_fetch_all($res);
    
    $course_list = array();

    foreach($res as $x => $x_value) {
        $qry = "SELECT COUNT(*) AS `columns` FROM `information_schema`.`columns` WHERE `table_schema` = 'webcoursera' AND `table_name` = '{$x_value[1]}';" ;
        //var_dump($qry);
        $col_num = mysqli_query($conn, $qry);
        $col_num = mysqli_fetch_assoc($col_num);
        //var_dump($col_num);
        $col_num = $col_num['columns'];
        //echo $col_num;
        $qry2="SELECT * FROM {$x_value[1]} WHERE e_id={$x_value[0]};";
        $arr = mysqli_query($conn, $qry2);
        $arr = mysqli_fetch_assoc($arr);
        var_dump($col_num);
        $iter = 0;
        $sumAttribute = 0;
        foreach($arr as $y) {
            if($iter > 1) {
                $sumAttribute = $sumAttribute + $y;
            }
            $iter++;
        }

        if($sumAttribute == ($col_num - 2)) {
            $qry3 = "DELETE FROM {$x_value[1]} WHERE e_id={$x_value[0]};";
            $temp = mysqli_query($conn, $qry3);

            $qry4 = "DELETE FROM enrollment WHERE e_id={$x_value[0]};";
            $temp = mysqli_query($conn, $qry4);
        }
    }
    


    mysqli_close($conn);

    session_unset();

    session_destroy();

    header("Location: index.php");

?>