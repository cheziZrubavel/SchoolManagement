<?php 

    class SchoolDB {
        private $conn;
        const HOST = 'localhost';
        const USERNAME = 'root';
        const PASSWORD = '';
        const DB = 'project';

        function __construct() {
            $this->conn = new mysqli(self::HOST, self::USERNAME, self::PASSWORD, self::DB);
            if ($this->conn->connect_error) {
                throw new Exception("Connection failed: " . $this->conn->connect_error);   
            } 
        }
        function getStd() {
            $result = $this->conn->query('select * from student');
            $count = $result->num_rows;
            $nmbStd = array();
            if ($count > 0) {
             while($row = $result->fetch_assoc()) {
                    array_push($nmbStd, $row);
                    // return $result;
                }
             } 
             return $nmbStd;
        }
        function getAdmin() {
            $result = $this->conn->query('select * from administrator');
            $count = $result->num_rows;
            $nmbAdmin = array();
            if ($count > 0) {
             while($row = $result->fetch_assoc()) {
                    array_push($nmbAdmin, $row);
                }
             } 
             return $nmbAdmin;
        }
        function getCourse() {
            $result = $this->conn->query('select * from course ');
            $count = $result->num_rows;
            $nmbCourse = array();
            if ($count > 0) {
             while($row = $result->fetch_assoc()) {
                    array_push($nmbCourse, $row);
                }
             } 
             return $nmbCourse;
        }
        function getAllAdminDetails($getAllAdminDetails) {
            $result = $this->conn->query("SELECT * FROM administrator WHERE email = '$getAllAdminDetails'");
            $count = $result->num_rows;
            $adminDetails = array();
            if ($count > 0) {
                while($row = $result->fetch_assoc()) {
                    array_push($adminDetails, $row);
                }
            }
        return $adminDetails;
        }
        function checkValidate($checkEmail,$checkPassword) {
            $result = $this->conn->query("SELECT * FROM administrator WHERE email = '$checkEmail' AND password = '$checkPassword'");
            $count = $result->num_rows;
            return $count;
        }

        function newStd($stdName, $stdPhone, $stdEmail, $stdImg) {
            $query = "INSERT INTO student(`name`, `phone`, `email`, `image`) VALUES ('$stdName', '$stdPhone', '$stdEmail', '$stdImg')";
            $this->conn->query($query);
        }
        function deleteStd($stdName, $stdPhone, $stdEmail, $stdImg) {
            $query = "DELETE FROM student WHERE name = '$stdName'";
            $this->conn->query($query);
        }
        function newCourse($courseName, $courseDesc, $courseImg) {
            $query = "INSERT INTO course(`name`, `description`, `image`) VALUES ('$courseName', '$courseDesc','$courseImg')";
            $this->conn->query($query);
        }
        function deleteCourse($courseName, $courseDesc, $courseImg) {
            $query = "DELETE FROM course WHERE name = '$courseName'";
            $this->conn->query($query);
        }
        function newAdmin($adminName, $adminDesc, $adminImg) {
            $query = "INSERT INTO administrator(`name`, `description`, `image`) VALUES ('$adminName', '$adminDesc','$adminImg')";
            $this->conn->query($query);
        }
        function deleteAdmin($adminName, $adminDesc, $adminImg) {
            $query = "DELETE FROM administrator WHERE name = '$adminName'";
            $this->conn->query($query);
        }
        function student_Course() {
            $query = "SELECT student.name, student.phone, student.email, student.img, course.name  
            FROM student   
            JOIN course ON student.email = course.name";
            $result = $this->conn->query($query);
            $count = $result->num_rows;
            $course_Student = array();
            if ($count > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($course_Student, $row);
            } 
        }
            return $course_Student;
        }    
        function course_Students($Course_Id) {
            $result = $this->conn->query("SELECT *
            FROM student
            INNER JOIN student_course
            ON student.studentId = student_course.studentId
            INNER JOIN course
            ON course.courseId = student_course.courseId
            WHERE course.courseId = '$Course_Id'
            ");
            return $result;
             $count = $result->num_rows;
             $result = array();
             
                 while($row = $result->fetch_assoc()) {
                     array_push($courseNmb, $row);
                     return $result;
                     }
                }
        function __destruct(){
            $this->conn->close();
        }
    }    

?>