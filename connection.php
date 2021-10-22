<?php
function connect_database(){
    $config = [
        'servername' => 'localhost',
        'database' => 'webcoursera',
        'username' => 'root',
        'password' => '',
    ];

    $conn = mysqli_connect(
        $config['servername'],
        $config['username'],
        $config['password'],
        $config['database']
    );
    if(!$conn) {
        die("MySQL connection failed: ". mysqli_connect_error());
    }
    // else{
    //     echo "Connected";
    // }
    return $conn;
}
?>