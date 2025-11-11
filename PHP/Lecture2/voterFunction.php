

<?php 
/*Take an array of ages and name. Check whether a 
person is eligible for vote or not
less than  18--> not eligible for vote
18 to 60--> eligible for vote
morethan 60--> senior citizen and eligible for online voting
*/

function voteEligibility($age){
     if($age<18){
        return 1;
    }
    else if($age>=18 && $age<=60){
        return 2;
    }
    else{
       return 3;
    }   

}

$voters=[
    ["name"=>"Alice", "age"=>20],
    ["name"=>"Brad", "age"=>25],
    ["name"=>"Charlie", "age"=>65],
    ["name"=>"David", "age"=>17]
];
foreach($voters as $voter){

    if(voteEligibility($voter["age"])==1){
        echo "<h2>". $voter["name"].", You are not eligible for vote.</h2>";
    }
    else if(voteEligibility($voter["age"])==2){
        echo "<h2>".$voter["name"].", You are eligible for vote.</h2>";
    }
    else if(voteEligibility($voter["age"])==3){
        echo "<h2>".$voter["name"].",You are senior Citizen and eligible for
         online vote.</h2>";
    }

}


?>
