<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
        <td width="237">
		<?php 
		//address
		$address = str_replace('$PETNAME', $row_RECALL['PETNAME'], $row_POSTCARDS['ADDRESS']); 
		$address = str_replace('$AGE', $age, $address); 
		$address = str_replace('$DOB', $row_RECALL['PDOB'], $address); 
		$address = str_replace('$YEAR', $years, $address); 
		$address = str_replace('$DATE', date('n F, Y'), $address); 
		$address = str_replace('$TITLE', $row_RECALL['TITLE'], $address); 
		$address = str_replace('$SALUTATION', $salutation, $address); 
		$address = str_replace('$NAME', $row_RECALL['CONTACT'], $address); 
		$address = str_replace('$SURNAME', $row_RECALL['COMPANY'], $address); 
		$address = str_replace('$ADDRESS', $row_RECALL['ADDRESS1']."  ".$row_RECALL['ADDRESS2'], $address); 
		$address = str_replace('$CITY', $row_RECALL['CITY'], $address); 
		$address = str_replace('$PROVINCE', $row_RECALL['STATE'], $address); 
		$address = str_replace('$PCODE', $row_RECALL['ZIP'], $address); 
		$address = str_replace('$PHONE', $row_RECALL['PHONE'], $address); 
		$address = str_replace('$BPHONE', $row_RECALL['PHONE2'], $address); 
		$address = str_replace('$SPECIES', $species, $address); 
		$address = str_replace('$BREED', $row_RECALL['PETBREED'], $address); 
		$address = str_replace('$SEX', $sex, $address); 
		$address = str_replace('$RABIES', $row_RECALL['PRABDAT'], $address); 
		$address = str_replace('$ISARE', $isare, $address); 
		$address = str_replace('$NEUTER', $neuter, $address); 
		$address = str_replace('$COLOUR', $row_RECALL['PCOLOUR'], $address); 
		$address = str_replace('$CLIENT', $row_RECALL['TITLE']." ".$row_RECALL['CONTACT']." ".$row_RECALL['COMPANY'], $address); 
		//$address = str_replace('$DOCSIGN', '...........', $address); 

		echo '<span style="white-space:pre-wrap;">'.$address."</span>"; ?>
		</td>
</body>
</html>
