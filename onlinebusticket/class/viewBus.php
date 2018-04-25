<?php

class viewBus {
    protected $connection;
    public function __construct() {
        $host_name = 'localhost';
        $user_name = 'root';
        $password = '';
        $db_name = 'db_bus';
        $this->connection = mysqli_connect($host_name, $user_name, $password, $db_name);
        if(!$this->connection){
            die('Connection Fail'.mysqli_error($this->connection));
        }
    }

    public function save_student_info($data){
      $sql = "INSERT INTO tbl_student(student_name, phone_number, email_address, address)"
        ."VALUES('$data[student_name]','$data[phone_number]','$data[email_address]','$data[address]')";
        
        if(mysqli_query($this->connection, $sql)){
            $message = 'Student info save successfully';
            return $message;
        }else{
            die('Query problem'.mysqli_errno($this->connection));
        }
    }
    
    public function select_all_bus_info(){
        $sql = "SELECT bus_name FROM tbl_bus_info where (origin_name='Sylhet' && destination_name='Dhaka') || (origin_name='Sylhet Bus Stand' && destination_name='Gabtoli, Dhaka') ";
        if(mysqli_query($this->connection, $sql)){
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        }else{
            die('Query Problem'.mysqli_error($this->connection));
        }
    }
    
    public function select_student_info_by_id($student_id){
        $sql = "SELECT * FROM tbl_student WHERE student_id = '$student_id'";
        if(mysqli_query($this->connection, $sql)){
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        }else{
            die('Query Problem'.mysqli_error($this->connection));
        }
        
    }
}
