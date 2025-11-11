

<?php 
/*Take an array of ages. Check whether a 
person is eligible for vote or not
less than  18--> not eligible for vote
18 to 60--> eligible for vote
morethan 60--> senior citizen and eligible for online voting
*/
$age=array(12,34,33,60, 65,20, 30 );
$length=count($age);

for($i=0;$i< $length;$i++){
    if($age[$i]<18){
        echo "<h2>You are not eligible for vote.<br></h2>";
    }
    else if($age[$i]>=18 && $age[$i]<=60){
        echo "<h2>You are eligible for vote.<br></h2>";
    }
    else{
        echo "<h2>You are seniorCitizen and eligible for
         online vote.<br></h2>";
    }

}


?>
