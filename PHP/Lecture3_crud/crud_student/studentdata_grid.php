<?php
    include "dbconnect.php";

    $sql="SELECT *FROM student";
    $result=$conn->query($sql);

    function gpa($mark){
        if($mark>=80)
            return 4.00;
        elseif($mark<80 && $mark>=75)
            return 3.75;
        elseif($mark<75 && $mark>=70)
            return 3.5;
        elseif($mark<70 && $mark>=65)
            return 3.25;
        else
            return 0;

    }

          
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
            .container{
                display: flex;
                flex-wrap: wrap;
            }
            .container div{
                border: solid 2px black;
                width: 20%;
                margin: 10px;
                padding: 10px;
            }
    </style>
</head>
<body>
    <h2 align="center">Student data</h2>
    <div class="container">
        <?php
            $counter=1;
            while($data=$result->fetch_assoc())
             {
                $totalGpa=(gpa($data['mark1'])+ gpa($data['mark2']))/2;
                echo '<div>';
                    echo "<h3> Student: ".$counter."</h3>";
                    echo "<label> Name: </label>";
                    echo "<span>". $data['name'] . "</span> <br>";
                    echo "<label> Gender: </label>";
                    echo "<span>". $data['gender'] . "</span> <br>";
                    echo "<label> Mark 1: </label>";
                    echo "<span>". $data['mark1'] . "</span> <br>";
                    echo "<label> Mark 2: </label>";
                    echo "<span>". $data['mark2'] . "</span> <br>";
                    echo "<label> GPA: </label>";
                    echo "<span>". $totalGpa . "</span> <br>";
                echo "</div>";
                $counter++;
            }
            $conn->close();
            ?>

    </div>
</body>
</html>