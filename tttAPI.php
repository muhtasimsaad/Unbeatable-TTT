<?php

session_start();



if($_GET["value"]==="XX"){session_destroy();}  				  //restart game
else{$_SESSION["string"]=authorizePlayersMove($_GET["value"],$_SESSION["string"]);
}  //or players move

checkForDraw($_SESSION["string"]);
if (checkResult($_SESSION["string"])===" "){

	$_SESSION["string"]=makeAIMove($_SESSION["string"]);

	if (checkResult($_SESSION["string"])==="O"){$_SESSION["result"]="AI Wins";}

}
else{
	if (checkResult($_SESSION["string"])==="X"){$_SESSION["result"]="Player Wins";}
}

 
checkForDraw($_SESSION["string"]);







header("Location: TicTacToe.php");






function makeAIMove($string){




if(checkIfWinning($string,"O")!==" "){$string[checkIfWinning($string,"O")]="O";return $string;} //checking if AI is winning
if(checkIfWinning($string,"X")!==" "){$string[checkIfWinning($string,"X")]="O";return $string;} //Checking if Player is Winning



//stopping Exceptional cases 

//#1
if((($string[0]===$string[8] && $string[8]==="X") || ($string[2]===$string[6] && $string[6]==="X")) && $string[4]="O"){
	if($string[1]=" "){$string[1]="O";return $string;}
	if($string[3]=" "){$string[3]="O";return $string;}
	if($string[5]=" "){$string[5]="O";return $string;}
	if($string[8]=" "){$string[8]="O";return $string;}
}
 
//#2
if(($string[5]===$string[6] && $string[6]==="X")  && $string[4]="O" ){
	if($string[8]=" "){$string[8]="O";return $string;}
	 
}
 
 

//making a random move
if($string[4]==" "){$string[4]="O";return $string;}
if($string[0]==" "){$string[0]="O";return $string;}
if($string[2]==" "){$string[2]="O";return $string;}
if($string[6]==" "){$string[6]="O";return $string;}
if($string[8]==" "){$string[8]="O";return $string;}
 
 

return $string;
}

function checkForDraw($string){
	 
	 for($val=0;$val<9;$val++){
	 	if($string[$val]===" "){return 0;}
	 }
 $_SESSION["result"]="Match Draw";
	 return 1;
}

function checkIfWinning($string,$val){ //the second parameter determines if it is checking for AI or Player




if($string[0]===$string[1] && $val===$string[1] && $string[2]===" " && $string[0]!==" "){return 2;}
if($string[1]===$string[2] && $val===$string[2] && $string[0]===" " && $string[1]!==" "){return 0;}
if($string[0]===$string[2] && $val===$string[2] && $string[1]===" " && $string[0]!==" "){return 1;}

if($string[3]===$string[4] && $val===$string[4] && $string[5]===" " && $string[3]!==" "){return 5;}
if($string[3]===$string[5] && $val===$string[5] && $string[4]===" " && $string[3]!==" "){return 4;}
if($string[5]===$string[4] && $val===$string[4] && $string[3]===" " && $string[5]!==" "){return 3;}

if($string[6]===$string[7] && $val===$string[7] && $string[8]===" " && $string[6]!==" "){return 8;}
if($string[6]===$string[8] && $val===$string[8] && $string[7]===" " && $string[6]!==" "){return 7;}
if($string[8]===$string[7] && $val===$string[7] && $string[6]===" " && $string[8]!==" "){return 6;}

if($string[0]===$string[3] && $val===$string[3] && $string[6]===" " && $string[0]!==" "){return 6;}
if($string[6]===$string[3] && $val===$string[3] && $string[0]===" " && $string[6]!==" "){return 0;}
if($string[0]===$string[6] && $val===$string[6] && $string[3]===" " && $string[0]!==" "){return 3;}

if($string[1]===$string[4] && $val===$string[4] && $string[7]===" " && $string[1]!==" "){return 7;}
if($string[1]===$string[7] && $val===$string[7] && $string[4]===" " && $string[1]!==" "){return 4;}
if($string[7]===$string[4] && $val===$string[4] && $string[1]===" " && $string[7]!==" "){return 1;}

if($string[2]===$string[5] && $val===$string[5] && $string[8]===" " && $string[2]!==" "){return 8;}
if($string[2]===$string[8] && $val===$string[8] && $string[5]===" " && $string[2]!==" "){return 5;}
if($string[8]===$string[5] && $val===$string[5] && $string[2]===" " && $string[8]!==" "){return 2;}

if($string[0]===$string[4] && $val===$string[4] && $string[8]===" " && $string[0]!==" "){return 8;}
if($string[0]===$string[8] && $val===$string[8] && $string[4]===" " && $string[0]!==" "){return 4;}
if($string[8]===$string[4] && $val===$string[4] && $string[0]===" " && $string[8]!==" "){return 0;}

if($string[2]===$string[4] && $val===$string[4] && $string[6]===" " && $string[2]!==" "){return 6;}
if($string[2]===$string[6] && $val===$string[6] && $string[4]===" " && $string[2]!==" "){return 4;}
if($string[6]===$string[4] && $val===$string[4] && $string[2]===" " && $string[6]!==" "){return 2;}
  
 
return " ";

}









function authorizePlayersMove($str,$string){

	//registering Player's move

if($str==="00" && $string[0]==" "){$string[0]="X";return $string;}
if($str==="01" && $string[1]==" "){$string[1]="X";return $string;}
if($str==="02" && $string[2]==" "){$string[2]="X";return $string;}

if($str==="10" && $string[3]==" "){$string[3]="X";return $string;}
if($str==="11" && $string[4]==" "){$string[4]="X";return $string;}
if($str==="12" && $string[5]==" "){$string[5]="X";return $string;}

if($str==="20" && $string[6]==" "){$string[6]="X";return $string;}
if($str==="21" && $string[7]==" "){$string[7]="X";return $string;}
if($str==="22" && $string[8]==" "){$string[8]="X";return $string;}



return $string;
}

function checkResult($string){

	//checking if match has ended

if($string[0]===$string[1] && $string[1]===$string[2]){return $string[0];}
if($string[3]===$string[4] && $string[4]===$string[5]){return $string[5];}
if($string[6]===$string[7] && $string[7]===$string[8]){return $string[8];}
if($string[0]===$string[3] && $string[3]===$string[6]){return $string[0];}
if($string[1]===$string[4] && $string[4]===$string[7]){return $string[1];}
if($string[2]===$string[5] && $string[5]===$string[8]){return $string[2];}
if($string[0]===$string[4] && $string[4]===$string[8]){return $string[0];}
if($string[2]===$string[4] && $string[4]===$string[6]){return $string[2];}
 
 

return " ";
}


?>