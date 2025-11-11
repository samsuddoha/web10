

<?php 
/*Take an array of ages and name. Check whether a 
person is eligible for vote or not
less than  18--> not eligible for vote
18 to 60--> eligible for vote
morethan 60--> senior citizen and eligible for online voting
*/
$voters=[
    ["name"=>"Alice", "age"=>20],
    ["name"=>"Brad", "age"=>25],
    ["name"=>"Charlie", "age"=>65],
    ["name"=>"David", "age"=>17]
];
foreach($voters as $voter){

    if($voter["age"]<18){
        echo "<h2>". $voter["name"].", You are not eligible for vote.</h2>";
    }
    else if($voter["age"]>=18 && $voter["age"]<=60){
        echo "<h2>".$voter["name"].", You are eligible for vote.</h2>";
    }
    else{
        echo "<h2>".$voter["name"].",You are senior Citizen and eligible for
         online vote.</h2>";
    }

}


?>
