<?php 

session_start();

if(!isset($_SESSION["string"])){$_SESSION["string"]=array(" "," "," "," "," "," "," "," "," ",);}
$string=$_SESSION["string"];


echo $string[2]."asd";
?>


<!DOCTYPE html>
<html >
<head>

   
    <title>Unbeatable TTT</title>
     <link rel="stylesheet" href="css/tttNew.css">
</head>
<body style="background-image: url('img/about/back.jpg');";>
<h1>Tic Tac Toe</h1>
<h1><?php 
if(isset($_SESSION["message"])) {
  echo $_SESSION["message"];
}
?></h1>
<h1 style="color:red"><?php 
if(isset($_SESSION["result"])) {
  echo $_SESSION["result"];
}
?></h1>


<div class="container-out">
    <div class="container-in">
    <div class="table-container">
        
        <table align="center">
        <tr>
            <td><div class="box" onclick="clicked('00')" id="b00"><?php echo $string[0];?></div></td>
            <td><div class="box" onclick="clicked('01')" id="b01"><?php echo $string[1];?></div></td>
            <td><div class="box" onclick="clicked('02')" id="b02"><?php echo $string[2];?></div></td>
        </tr>
        <tr>
            <td><div class="box" onclick="clicked('10')" id="b10"><?php echo $string[3];?></div></td>
            <td><div class="box" onclick="clicked('11')" id="b11"><?php echo $string[4];?></div></td>
            <td><div class="box" onclick="clicked('12')" id="b12"><?php echo $string[5];?></div></td>
        </tr>
        <tr>
            <td><div class="box" onclick="clicked('20')" id="b20"><?php echo $string[6];?></div></td>
            <td><div class="box" onclick="clicked('21')" id="b21"><?php echo $string[7];?></div></td>
            <td><div class="box" onclick="clicked('22')" id="b22"><?php echo $string[8];?></div></td>
        </tr>
        </table>

        <h2 id="message">Player <span id="winner"></span> Wins</h2>
        <button id="reset" onclick="clickedNew('XX')">Reset</button>
    </div>
    </div>
</div>



</body>
</html>



<script type="text/javascript">
  

  function clicked(p1) {
<?php if(!isset($_SESSION["result"])){?>
    window.location.href = "tttAPI.php?value=".concat(p1);
<?php } ?>
 
}

function clickedNew(p1) {
     window.location.href = "tttAPI.php?value=".concat(p1);
 
}

</script>

