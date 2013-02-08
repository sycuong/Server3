<?php

mysql_connect("instance38235.db.xeround.com:6268","trinhsycuong","daihocmo") or die("plm");
mysql_select_db("slot_machine") or die("PLM");
//$_POST['ID']
$udid = $_POST['ID'];
$money = $_POST['money'];
$spins = $_POST['spins'];
$level = $_POST['level'];
$stare = $_POST['stare'];

echo "CHUOI<br />".$_POST['ID'].$_POST['money'].$_POST['level'].$_POST['stare'].$_POST['spins'];

if($stare == 0)
{
	$query = 'SELECT * FROM devices WHERE deviceID = "'.$udid.'"';
      	$res = mysql_query($query);

	if(mysql_num_rows($res) < 1) 
	{
		$query = 'SELECT * FROM devices WHERE deviceID = "'.$udid.'"';
      		$res = mysql_query($query);
		if(mysql_num_rows($res) == 0)
		{
			
			$query = 'SELECT * FROM tabel';
			$res = mysql_query($query);
			$row = mysql_fetch_array($res);

			$money = $row[0];
			$spins = $row[1];
			$level = $row[2];
			$lb1 = $row[3];
			$b1 = $row[4];
			$lb2 = $row[5];
			$b2 = $row[6];
			$lb3 = $row[7];
			$b3 = $row[8];
			$lb4 = $row[9];
			$b4 = $row[10];
			$lb5 = $row[11];
			$b5 = $row[12];
			$bets = $row[13];
			$t4 = $row[14];
			$t5 = $row[15];
			$t6 = $row[16];
			$t7 = $row[17];
			$t8 = $row[18];
			$t9 = $row[19];
			$t10 = $row[20];
			$t11 = $row[21];
			$t12 = $row[22];
			$freespin1 = $row[23];
			$freespin2 = $row[24];
			$time = $row[25];
			$value1 = $row[26];
			$value2 = $row[27];
			$value3 = $row[28];
			$value4 = $row[29];
			$value5 = $row[30];
			$value6 = $row[31];
			$stringulet = $money."@".$spins."@".$level."@".$lb1."@".$b1."@".$lb2."@".$b2."@".$lb3."@".$b3."@".$lb4."@".$b4."@".$lb5."@".$b5."@".$bets."@".$t4."@".$t5."@".$t6."@".$t7."@".$t8."@".$t9."@".$t10."@".$t11."@".$t12."@".$freespin1."@".$freespin2."@".$time."@".$value1."@".$value2."@".$value3."@".$value4."@".$value5."@".$value6."@";


			echo $stringulet."Download chua ton tai<br />";
		}
		else
		{
			echo 'Application Error,mysql_num_rows($res) < 0';
		}
	}
	else
	{
		$resDevice = mysql_query("SELECT * FROM devices WHERE deviceID  = '".$udid."'");
		$rowDevice = mysql_fetch_array($resDevice);
		$stringulet = explode("@", $rowDevice['string']);
		
		$res = mysql_query("SELECT * FROM tabel");
		$row = mysql_fetch_array($res);
		
		$money = $stringulet[0];
            	$spins = $stringulet[1];
            	$level = $stringulet[2];
		$lb1 = $row[3];
		$b1 = $row[4];
		$lb2 = $row[5];
		$b2 = $row[6];
		$lb3 = $row[7];
		$b3 = $row[8];
		$lb4 = $row[9];
		$b4 = $row[10];
		$lb5 = $row[11];
		$b5 = $row[12];
		$bets = $row[13];
		$t4 = $row[14];
		$t5 = $row[15];
		$t6 = $row[16];
		$t7 = $row[17];
		$t8 = $row[18];
		$t9 = $row[19];
		$t10 = $row[20];
		$t11 = $row[21];
		$t12 = $row[22];
		$freespin1 = $row[23];
		$freespin2 = $row[24];
		$time = $row[25];
		$value1 = $row[26];
		$value2 = $row[27];
		$value3 = $row[28];
		$value4 = $row[29];
		$value5 = $row[30];
		$value6 = $row[31];
			
		$stringulet = $money."@".$spins."@".$level."@".$lb1."@".$b1."@".$lb2."@".$b2."@".$lb3."@".$b3."@".$lb4."@".$b4."@".$lb5."@".$b5."@".$bets."@".$t4."@".$t5."@".$t6."@".$t7."@".$t8."@".$t9."@".$t10."@".$t11."@".$t12."@".$freespin1."@".$freespin2."@".$time."@".$value1."@".$value2."@".$value3."@".$value4."@".$value5."@".$value6."@";

		echo $stringulet."Download da ton tai<br />";
	}
}
else
{
	if($stare == 1)
	{
		$query = 'SELECT * FROM devices WHERE deviceID = "'.$udid.'"';
      		$res = mysql_query($query);

      		if(mysql_num_rows($res) > 0) 
      		{
            		$money = $_POST['money'];
            		$spins = $_POST['spins'];
            		$level = $_POST['level'];
		
			$row = mysql_fetch_array($res);
    	    		$stringulet = explode("@", $row['string']);
	
			if($_POST['money'] != "") {$stringulet[0] = $money;}
			if($_POST['spins'] != "") {$stringulet[1] = $spins;}
			if($_POST['level'] != "") {$stringulet[2] = $level;}
			$ceva = "";
			foreach($stringulet as $r) 
			{
				$ceva .= $r."@";
			}

			$query = "UPDATE devices SET string = '".substr($ceva, 0, -1)."', last_access = '".date('Y-m-d H:i:s')."' WHERE deviceID = '".$udid."'";
			mysql_query($query);
			echo $ceva."<br />";
		}
		else
		{
			$query = 'SELECT * FROM tabel';
			$res = mysql_query($query);
			$row = mysql_fetch_array($res);

			$money = $_POST['money'];
            		$spins = $_POST['spins'];
            		$level = $_POST['level'];
			$lb1 = $row[3];
			$b1 = $row[4];
			$lb2 = $row[5];
			$b2 = $row[6];
			$lb3 = $row[7];
			$b3 = $row[8];
			$lb4 = $row[9];
			$b4 = $row[10];
			$lb5 = $row[11];
			$b5 = $row[12];
			$bets = $row[13];
			$t4 = $row[14];
			$t5 = $row[15];
			$t6 = $row[16];
			$t7 = $row[17];
			$t8 = $row[18];
			$t9 = $row[19];
			$t10 = $row[20];
			$t11 = $row[21];
			$t12 = $row[22];
			$freespin1 = $row[23];
			$freespin2 = $row[24];
			$time = $row[25];
			$value1 = $row[26];
			$value2 = $row[27];
			$value3 = $row[28];
			$value4 = $row[29];
			$value5 = $row[30];
			$value6 = $row[31];
			
			$stringulet = $money."@".$spins."@".$level."@".$lb1."@".$b1."@".$lb2."@".$b2."@".$lb3."@".$b3."@".$lb4."@".$b4."@".$lb5."@".$b5."@".$bets."@".$t4."@".$t5."@".$t6."@".$t7."@".$t8."@".$t9."@".$t10."@".$t11."@".$t12."@".$freespin1."@".$freespin2."@".$time."@".$value1."@".$value2."@".$value3."@".$value4."@".$value5."@".$value6."@";
			mysql_query("INSERT INTO devices VALUES('$udid','$stringulet','".date('Y-m-d H:i:s')."')");
			echo $stringulet."<br />";

		}
	}
}

?>
