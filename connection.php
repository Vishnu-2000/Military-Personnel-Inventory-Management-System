<?php 
            $servername = "localhost";
            $database = "project-db";
            $username = "root";
            $password = "";
            $db = mysqli_connect($servername, $username, $password, $database);
            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }
?>