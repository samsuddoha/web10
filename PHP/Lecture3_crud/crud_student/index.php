<?php
    include "dbconnect.php";

    $sql="SELECT *FROM student";
    $result=$conn->query($sql);
           
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            width:80%;
            margin:auto;
        }
        table, th, td{
            border-collapse:collapse; 
        }
         th, td{
                border: solid 1px black
                padding:15px;
                text-align:center;
            }
            a{
                display: block; 
                width: 150px;        
                margin: 20px auto;        
                padding: 10px 20px;    
                background-color: #28a745; 
                color: white;          
                text-decoration: none; 
                border-radius: 5px;    
                text-align: center; 
            }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Student List </h2>
        <table border="1">
            <tr>
                <th>Serial</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Mark 1</th>
                <th> Mark 2</th>
            </tr>
            <?php
            $counter=1;
                while($data=$result->fetch_assoc())
             {
            
             echo "<tr>";
                echo "<td>". $counter++ . "</td>";
                echo "<td>". $data['name'] . "</td>";
                echo "<td>". $data['gender'] . "</td>";
                echo "<td>". $data['mark1'] . "</td>";
                echo "<td>". $data['mark2'] . "</td>";
             echo "</tr>";
            }
            $conn->close();
            ?>
        </table>
        <a href="submit_form.php">Add New Record</a>
</body>
</html>