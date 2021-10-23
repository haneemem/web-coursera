<?php
    function get_count($c_name) {
        require_once '../connection.php';

        $conn = connect_database();
        $t = "SELECT COUNT(*) FROM {$c_name};";
        $tres = mysqli_query($conn,$t);
        $tres = mysqli_fetch_assoc($tres);
        mysqli_close($conn);
        $tres = $tres['COUNT(*)'];
        return $tres;
    }
?>