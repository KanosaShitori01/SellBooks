<?php 
    class Database{
        const HOST = "localhost";
        const USERNAME = "root";
        const PASSWORD = "";
        const DBNAME = "librarydb";

        public function Connection(){
            $conn = mysqli_connect(self::HOST, self::USERNAME, self::PASSWORD, self::DBNAME);
            mysqli_set_charset($conn, "utf-8");
            if($conn->connect_error){
                die("Connection Failed: ". $conn->connect_error);
            }
            return $conn;
        }
    }
?>