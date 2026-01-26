<?php
    include "dbconnect.php";

    $student_name=$_GET["name"];
    $gender=$_GET["gender"];
    $mark1=$_GET["mark1"];
    $mark2=$_GET["mark2"];

    $sql="INSERT INTO student(name, gender, mark1, mark2)
    VALUES('$student_name', '$gender', '$mark1', '$mark2')";

        $res=$conn->query($sql);
        if($res){
           header("Location:index.php");
        }
        else
         echo "Data insertion failed";

        $conn->close();

?>