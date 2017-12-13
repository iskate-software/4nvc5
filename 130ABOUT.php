<?php 
session_start();
unset($_SESSION['company']);
require_once('../tryconnection.php'); 
mysql_select_db($database_tryconnection, $tryconnection);


$a0 = "SELECT HOSPNAME FROM CRITDATA LIMIT 1 " ;
$go_a0 = mysql_query($a0, $tryconnection) or die(mysql_error()) ;
$row_go_a0 = mysqli_fetch_assoc($go_a0) ;
$hospname = $row_go_a0['HOSPNAME'] ;

$a00 = "SELECT ANIMAL, COUNT(PETID) AS PEA, PETTYPE FROM PETMAST  LEFT JOIN ANIMTYPE ON PETMAST.PETTYPE = ANIMTYPE.ANIMALID  WHERE PETTYPE <> 0 AND PDEAD + PMOVED = 0 AND PLASTDATE >= DATE_SUB(NOW(), INTERVAL 5 YEAR) GROUP BY PETTYPE WITH ROLLUP" ;
$go_a00 = mysql_query($a00, $tryconnection) or die(mysql_error()) ;

$a1 = "DROP TABLE IF EXISTS TEMPET ";
$go_a1 = mysql_query($a1, $tryconnection) or die(mysql_error()) ;

$a2 = "CREATE TABLE TEMPET (PETID INT(8) UNSIGNED, CUSTNO INT(6) UNSIGNED, PETTYPE TINYINT(1) UNSIGNED, PSEX CHAR(1), PDOB DATE, PVACOUNT TINYINT(1) UNSIGNED, PNEUTER CHAR(1),  PLASTDATE DATE, POTH8 DATE)" ;
$go_a2 = mysql_query($a2, $tryconnection) or die(mysql_error()) ;

echo 'Retrieving patient data... ' . '</br>' ;

$a3 = "INSERT INTO TEMPET SELECT PETID,CUSTNO,PETTYPE,PSEX,PDOB, PVACOUNT, PNEUTER,PLASTDATE,POTH8 FROM PETMAST WHERE PDEAD + PMOVED = 0  AND PLASTDATE  >= SUBSTR(DATE_SUB(NOW(),INTERVAL 1 YEAR),1,10)" ;
$go_a3 = mysql_query($a3, $tryconnection) or die(mysql_error()) ;

$a4 = "SELECT ANIMAL, PETTYPE, COUNT(PETID) AS PATIENTS, COUNT(DISTINCT(TEMPET.CUSTNO)) AS CLIENTS, ROUND(COUNT(PETID)/COUNT(DISTINCT(TEMPET.CUSTNO)),2) AS AVERAGE FROM TEMPET LEFT JOIN ANIMTYPE ON TEMPET.PETTYPE = ANIMTYPE.ANIMALID  GROUP BY TEMPET.PETTYPE WITH ROLLUP" ;
$go_a4 = mysql_query($a4, $tryconnection) or die(mysql_error()) ;

echo 'Retrieving patient data 2 ... ' . '</br>' ;

$a45 = "SELECT PETMAST.PETTYPE, COUNT(DISTINCT(PETMAST.PETID)) AS PEI FROM PETMAST RIGHT JOIN TEMPET ON PETMAST.CUSTNO = TEMPET.CUSTNO WHERE PETMAST.PETTYPE > 0 AND PDEAD + PMOVED = 0 AND PETMAST.PLASTDATE > DATE_SUB(NOW(), INTERVAL 5 YEAR) GROUP BY PETMAST.PETTYPE WITH ROLLUP" ;
$go_a45 = mysql_query($a45, $tryconnection) or die(mysql_error()) ;


$a5 = "SELECT DISTINCT(PETTYPE) FROM TEMPET ORDER BY PETTYPE DESC LIMIT 1" ;
$go_a5 = mysql_query($a5, $tryconnection) or die(mysql_error()) ;
$row_go_a5 = mysqli_fetch_assoc($go_a5) ;
$max_pet = $row_go_a5['PETTYPE'] ;
echo ' Started ' ;

$animal = array() ;   // the alphabetic name of each species
$species = array() ;  // the numeric value of the pettype
$around = array() ;   // patients whose families have members that have been seen
$patients = array() ; // patients that have actually been seen
$notdead = array() ;  // patients seen in the last 5 years.
$clients = array() ;  // Those who have patients.
$average = array() ;
$appts  = array() ;
$apptl  = array() ;
$examn  = array() ;
$neut   = array() ;
$intm   = array() ;
$intf   = array() ;
$intt   = array() ;
$k9v12  = array() ;
$k9v16  = array() ;
$k9v20  = array() ;
$k9v24  = array() ;
$k9all  = array() ;
$k9nun  = array() ;
$flv12  = array() ;
$flv16  = array() ;
$flv20  = array() ;
$flv24  = array() ;
$flall  = array() ;
$flnun  = array() ;
$dollar = array() ;
$inclinc = array() ;

for ($xa = 0; $xa <= $max_pet +3; $xa++ ) {
 $animal[] = '' ;
 $species[] = '' ;
 $patients[] = '' ;
 $around[] = '' ;
 $notdead[] = '' ;
 $clients[] = '' ;
 $average[] = '' ;
 $appts[]  = '' ;
 $apptl[]  = '' ;
 $examn[]  = '' ;
 $neut[]   = '' ;
 $intm[]   = '' ;
 $intf[]   = '' ;
 $intt[]   = '' ;
 $k9v12[]  = '' ;
 $k9v16[]  = '' ;
 $k9v20[]  = '' ;
 $k9v24[]  = '' ;
 $k9all[]  = '' ;
 $k9nun[]  = '' ;
 $flv12[]  = '' ;
 $flv16[]  = '' ;
 $flv20[]  = '' ;
 $flv24[]  = '' ;
 $flall[]  = '' ;
 $flnun[]  = '' ;
 $dollar[] = '' ;
 $inclinic[] = '' ;
 

}
 // First, pick up all moving, 5 year old patients 
 
 $xn = 0 ;
while ($row_go_a00 = mysqli_fetch_assoc($go_a00) ) {

 $around[$xn] = $row_go_a00['PEA'] ;
 $animal[$xn] =  $row_go_a00['ANIMAL']  ;
 if ($row_go_a00['PETTYPE'] === null ){
    $species[$xn] = 99 ;
   } 
    else {
   $species[$xn] =  $row_go_a00['PETTYPE'] ;$patients[$xn] = $row_go_a4['PATIENTS'] ;
   $clients[$xn] = $row_go_a00['CLIENTS'] ;
   $average[$xn] = $row_go_a00['AVERAGE'] ;
   }

 $xn++ ;
}
 
$xn = 0 ;
while ($row_go_a4 = mysqli_fetch_assoc($go_a4) ) {

/*   if ($row_go_a4['PETTYPE'] === null ){
    $species[$xn] = 99 ;
   } 
    else {
   $species[$xn] =  $row_go_a4['PETTYPE'] ;
   }
 */;
 if ($xn == 2) {
  $patients[$xn] = 0;
  $xn++ ;
 } 
 $patients[$xn] = $row_go_a4['PATIENTS'] ;
 
 if ($xn  == 2) {
   $clients[$xn] =  0 ;
   $average[$xn] = 0 ;
   $xn++ ;
   }
 $clients[$xn] = $row_go_a4['CLIENTS'] ;  
 $average[$xn] = $row_go_a4['AVERAGE'] ;

 $xn++ ;
}

$xtot = $xn ;

$xl = 0 ;
while ($row_go_a45 = mysqli_fetch_assoc($go_a45)) {
 $xc = $row_go_a45['PETTYPE'] -1 ;
 $notdead[$xl] = $row_go_a45['PEI'] ;
 $xl++ ;
}

//echo ' 2 ' ;


$a6 = "SELECT COUNT(DISTINCT(CUSTNO)) FROM TEMPET" ;
$go_a6 = mysql_query($a6, $tryconnection) or die(mysql_error()) ;
$row_go_a6 = mysqli_fetch_assoc($go_a6) ;

$a7 = "SELECT COUNT(APPTNUM) AS APS, RFPETTYPE FROM APPTS WHERE CONCAT(DATEOF,':',TIMEOF) > NOW() AND CONCAT(DATEOF,':',TIMEOF) <= DATE_ADD(NOW(), INTERVAL 28 DAY) AND CANCELLED <> 1  AND PETNAME <> 'BLOCK OFF' AND PETNAME <> 'APPOINTMENTS'  GROUP BY RFPETTYPE WITH ROLLUP";
$go_a7 = mysql_query($a7, $tryconnection) or die(mysql_error()) ;

$xm = 0 ;
while ($row_go_a7 = mysqli_fetch_assoc($go_a7)) {

 if ($row_go_a7['RFPETTYPE'] === null) {
  $appts[$xn-1] = $row_go_a7['APS'] ;
  }
  else {
   $xm = $row_go_a7['RFPETTYPE'] -1 ;
   $appts[$xm] = $row_go_a7['APS'] ;
  }
 }


$a8 = "SELECT COUNT(APPTNUM) AS APS, RFPETTYPE FROM APPTS WHERE CONCAT(DATEOF,':',TIMEOF) > NOW() AND CONCAT(DATEOF,':',TIMEOF) > DATE_ADD(NOW(), INTERVAL 28 DAY) AND CANCELLED <> 1  AND PETNAME <> 'BLOCK OFF'  AND PETNAME <> 'APPOINTMENTS' GROUP BY RFPETTYPE WITH ROLLUP";
$go_a8 = mysql_query($a8, $tryconnection) or die(mysql_error()) ;

while ($row_go_a8 = mysqli_fetch_assoc($go_a8)) {
 
 if ($row_go_a8['RFPETTYPE'] === null) {
  $apptl[$xn-1] = $row_go_a8['APS'] ;
  }
  else {
   $xm = $row_go_a8['RFPETTYPE'] -1 ;
   $apptl[$xm] = $row_go_a8['APS'] ;
  }
}
 /////////// Examined ///////////////////
 
$a9 = "SELECT PETTYPE, COUNT(PETID) AS EXM FROM TEMPET WHERE PETTYPE < 3 AND POTH8 > SUBSTR(DATE_SUB(NOW(),INTERVAL 1 YEAR),1,10) GROUP BY PETTYPE WITH ROLLUP";     //--EXAMINED
$go_a9 = mysql_query($a9, $tryconnection) or die(mysql_error()) ;

$xm = 0 ;
while ($row_go_a9 = mysqli_fetch_assoc($go_a9)) {

 if ($row_go_a9['PETTYPE'] === null) {
  $examn[$xn-1] = $row_go_a9['EXM'] ;
  }
  else {
   $xm = $row_go_a9['PETTYPE'] -1 ;
   $examn[$xm] = $row_go_a9['EXM'] ;
  }
 }
$examn[2] = $examn[0] + $examn[1] ;

////////// Neutered ////////////
 
$a10 = "SELECT PETTYPE, COUNT(PETID) AS NEU FROM TEMPET WHERE PETTYPE < 3 AND PNEUTER GROUP BY PETTYPE WITH ROLLUP";   //---- NEUTERED AND EXAMINED
$go_a10 = mysql_query($a10, $tryconnection) or die(mysql_error()) ;

$xm = 0 ;
while ($row_go_a10 = mysqli_fetch_assoc($go_a10)) {

 if ($row_go_a10['PETTYPE'] === null) {
  $neut[$xn-1] = $row_go_a10['NEU'] ;
  }
  else {
   $xm = $row_go_a10['PETTYPE'] -1 ;
   $neut[$xm] = $row_go_a10['NEU'] ;
  }
 }
$neut[2] = $neut[0] + $neut[1] ;

///// Intact  males

$int1 = "SELECT PETTYPE, COUNT(PETID) AS NEU FROM TEMPET WHERE PETTYPE < 3  AND PSEX = 'M' AND PDOB >= DATE_SUB(NOW(), INTERVAL 6 MONTH) AND NOT PNEUTER GROUP BY PETTYPE WITH ROLLUP";   //---- NEUTERED AND EXAMINED
$go_int1 = mysql_query($int1, $tryconnection) or die(mysql_error()) ;

$xm = 0 ;
while ($row_go_int1 = mysqli_fetch_assoc($go_int1)) {

 if ($row_go_int1['PETTYPE'] === null) {
  }
  else {
   $xm = $row_go_int1['PETTYPE'] -1 ;
   $intm[$xm] = $row_go_int1['NEU'] ;
  }
 }
$intm[2] = $intm[0] + $intm[1] ;

$int2 = "SELECT PETTYPE, COUNT(PETID) AS NEU FROM TEMPET WHERE PETTYPE < 3  AND PSEX = 'F' AND PDOB >= DATE_SUB(NOW(), INTERVAL 6 MONTH) AND NOT PNEUTER GROUP BY PETTYPE WITH ROLLUP";   //---- NEUTERED AND EXAMINED
$go_int2 = mysql_query($int2, $tryconnection) or die(mysql_error()) ;

$xm = 0 ;
while ($row_go_int2 = mysqli_fetch_assoc($go_int2)) {

 if ($row_go_int2['PETTYPE'] === null) {
  $intf[$xn-1] = $row_go_int2['NEU'] ;
  }
  else {
   $xm = $row_go_int2['PETTYPE'] -1 ;
   $intf[$xm] = $row_go_int2['NEU'] ;
  }
 }
$intf[2] = $intf[0] + $intf[1] ;


  for ($xn = 0; $xn < 3; $xn++) {
   $intt[$xn] = $intm[$xn] +  $intf[$xn] ;
  }

///// now do the infant vaccines, from < 12 weeks to < 28 weeks, combining
///// weeks 20 to 28.

// First, we have to zero a 4 row, 1 column array for each species. One row for
// each of the cycle vaccines, plus the last one for no vaccs.

  $k9v12 = 0;
  $k9v16 = 0;
  $k9v28 = 0;
  $k9vnun = 0;
  $flv12 = 0;
  $flv16 = 0;
  $flv28 = 0;
  $flvnun = 0;
// Now fill in the blanks.

echo 'Retrieving vaccination data... ' . '</br>' ;

// $a13 = "SELECT COUNT(PETID) AS PTV, PETTYPE, PVACOUNT FROM TEMPET WHERE PDOB > DATE_SUB(NOW(), INTERVAL 12 WEEK)  GROUP BY PETTYPE" ;
$a13 = "SELECT COUNT(PETID) AS PEDI,PVACOUNT,PETTYPE FROM PETMAST WHERE PDOB > DATE_SUB(NOW(), INTERVAL 1 YEAR )  GROUP BY PETTYPE,PVACOUNT" ;
$go_a13 = mysql_query($a13, $tryconnection) or die(mysql_error()) ;

$xm = 0 ;

while ($row_go_a13 = mysqli_fetch_assoc($go_a13)) {

$sw = $row_go_a13['PVACOUNT'];
$pet = $row_go_a13['PETTYPE'] ;
$numpet = $row_go_a13['PEDI'] ;
 
 switch ($pet) {
   case 1 ;
     if ($sw === null) {$k9vnun = $numpet ;}
     if ($sw == 1)  {$k9v12 = $numpet ;}
     if ($sw == 2)  {$k9v16 = $numpet ;}
     if ($sw == 3)  {$k9v28 = $numpet ;}
     break ;
 
   case 2 ;
     if ($sw === null) {$flvnun = $numpet ;}
     if ($sw == 1)  {$flv12 = $numpet ;}
     if ($sw == 2)  {$flv16 = $numpet ;}
     if ($sw == 3)  {$flv28 = $numpet ;}
     break ;
 }

}
/*switch ($sw) {
  case null ;    // pvacount can only be null or 1 here
    switch ($pet) {
      case 1 ;  // dogs
        $k9vnun = $k9vnun + $row_go_a13['PTV'];
       break ;
      case 2 ;  //cats 
        $flvnun = $flvnun  + $row_go_a13['PTV'];
       break ;
      } 
  break ;
 case 1 ;   //pvacount could be 1
    switch ($pet) {
      case 1 ;  // dogs
        $k9v12 = $k9v12 + $row_go_a13['PTV'];
       break ;
      case 2 ;  //cats 
        $flv12 = $flv12  + $row_go_a13['PTV'];
       break ;
      } 
   break ;
  }
 }

$a14 = "SELECT COUNT(PETID) AS PTV, PETTYPE, PVACOUNT FROM TEMPET WHERE PDOB < DATE_SUB(NOW(), INTERVAL 16 WEEK) 
    AND PDOB >=  DATE_SUB(NOW(), INTERVAL 20 WEEK) GROUP BY PETTYPE" ;
$go_a14 = mysql_query($a14, $tryconnection) or die(mysql_error()) ;

$xm = 0 ;

while ($row_go_a14 = mysql_fetch_assoc($go_a14)) {


$sw = $row_go_a14['PVACOUNT'];
$pet = $row_go_a14['PETTYPE'] ;
switch ($sw) {
  case null ;    // pvacount not registering
    switch ($pet) {
      case 1 ;  // dogs
        $k9vnun = $k9vnun + $row_go_a14['PTV'];
       break ;
      case 2 ;  //cats 
        $flvnun = $flvnun  + $row_go_a14['PTV'];
       break ;
      } 
   break ;
 case 2 ;   //pvacount is 2
    switch ($pet) {
      case 1 ;  // dogs
        $k9v16 = $k9v16 + $row_go_a14['PTV'];
       break ;
      case 2 ;  //cats 
        $flv16 = $flv16  + $row_go_a14['PTV'];
       break ;
      } 
   break ;
 case 1 ;   //pvacount is 1
    switch ($pet) {
      case 1 ;  // dogs
        $k9v12 = $k9v12 + $row_go_a14['PTV'];
       break ;
      case 2 ;  //cats 
        $flv12 = $flv12  + $row_go_a14['PTV'];
       break ;
      } 
    break ;
  }
 
}

$a15 = "SELECT COUNT(PETID) AS PTV, PETTYPE, PVACOUNT FROM TEMPET WHERE PDOB < DATE_SUB(NOW(), INTERVAL 20 WEEK)  
      AND PDOB >=  DATE_SUB(NOW(), INTERVAL 24 WEEK) GROUP BY PETTYPE" ;
$go_a15 = mysql_query($a15, $tryconnection) or die(mysql_error()) ;
//
$xm = 0 ;

while ($row_go_a15 = mysql_fetch_assoc($go_a15)) {

// here

$sw = $row_go_a15['PVACOUNT'];
$pet = $row_go_a15['PETTYPE'] ;

switch ($sw) {
  case null ;    // pvacount not registering
    switch ($pet) {
      case 1 ;  // dogs
        $k9vnun = $k9vnun + $row_go_a15['PTV'];
       break ;
      case 2 ;  //cats 
        $flvnun = $flvnun  + $row_go_a15['PTV'];
       break ;
      } 
   break ;

 case 3 ;   //pvacount is 3
    switch ($pet) {
      case 1 ;  // dogs
        $k9v28 = $k9v28 + $row_go_a15['PTV'];
       break ;
      case 2 ;  //cats 
        $flv28 = $flv28  + $row_go_a15['PTV'];
       break ;
      } 
   break ;

 case 2 ;   //pvacount is 2
    switch ($pet) {
      case 1 ;  // dogs
        $k9v16 = $k9v16 + $row_go_a15['PTV'];
       break ;
      case 2 ;  //cats 
        $flv16 = $flv16  + $row_go_a15['PTV'];
       break ;
      } 
   break ;
 case 1 ;   //pvacount is 1
    switch ($pet) {
      case 1 ;  // dogs
        $k9v12 = $k9v12 + $row_go_a14['PTV'];
       break ;
      case 2 ;  //cats 
        $flv12 = $flv12  + $row_go_a14['PTV'];
       break ;
      } 
    break ;
  }
 
 
}
*/
//// Section specific to each clinic vvv

$t1 = "SELECT COUNT(DISTINCT(INVPET)) AS DOG1 FROM ARYDVMI WHERE INVDATETIME < DATE_SUB(NOW(), INTERVAL 1 YEAR) AND INVMAJ = 5 AND INVLGSM = 1 AND INVMIN < 16 " ;
$go_t1 = mysql_query($t1, $tryconnection) or die(mysql_error()) ;
$row_t1 = mysqli_fetch_assoc($go_t1) ;

$t2 = "SELECT COUNT(DISTINCT(INVPET)) AS DOG2 FROM DVMINV WHERE  INVMAJ = 6 AND INVLGSM = 1 AND (INSTR(INVDESCR,'SPAY') <> 0  OR INSTR(INVDESCR,'NEUTER') <> 0)" ;
$go_t2 = mysql_query($t2, $tryconnection) or die(mysql_error()) ;
$row_t2 = mysqli_fetch_assoc($go_t2) ;

$t3 =  $row_t1['DOG1'] + $row_t2['DOG2'] ;

$t4 = "SELECT COUNT(DISTINCT(INVPET)) AS CAT1 FROM ARYDVMI WHERE INVDATETIME >= DATE_SUB(NOW(), INTERVAL 1 YEAR) AND INVMAJ = 6 AND INVLGSM = 2 AND (INSTR(INVDESCR,'SPAY') <> 0  OR INSTR(INVDESCR,'NEUTER') <> 0)";
$go_t4 = mysql_query($t4, $tryconnection) or die(mysql_error()) ;
$row_t4 = mysqli_fetch_assoc($go_t4) ;

$t5 = "SELECT COUNT(DISTINCT(INVPET)) AS CAT2 FROM DVMINV WHERE INVMAJ = 6 AND INVLGSM = 2 AND (INSTR(INVDESCR,'SPAY') <> 0  OR INSTR(INVDESCR,'NEUTER') <> 0)" ;
$go_t5 = mysql_query($t5, $tryconnection) or die(mysql_error()) ;
$row_t5 = mysqli_fetch_assoc($go_t5) ;

$t6 =  $row_t4['CAT1'] + $row_t5['CAT2'] ;

echo 'Retrieving accounting data... ' . '</br>' ;

$dol1 = "DROP TABLE IF EXISTS TEMACC;" ;
$do_d1 = mysql_query($dol1, $tryconnection) or die(mysql_error()) ;

$dol2 = "CREATE TABLE TEMACC (INVNO INT(6),INVPET INT(8) UNSIGNED, INVDATE DATE, INVMAJ CHAR(3), INVTOT FLOAT(10,2), INVLGSM CHAR(1), INVDESCR CHAR(30) ) " ;
$do_d2 = mysql_query($dol2, $tryconnection) or die(mysql_error()) ;

$dol3 = "INSERT INTO TEMACC SELECT INVNO, INVPET, INVDATETIME, INVMAJ, INVTOT, INVLGSM,INVDESCR FROM DVMINV WHERE INVDECLINE <> 1 AND INVMAJ < 90 AND INVLGSM <> 0  AND INVNO > 0" ;
$do_d3 = mysql_query($dol3, $tryconnection) or die(mysql_error()) ;

$dol4 = "INSERT INTO TEMACC SELECT INVNO, INVPET,INVDATETIME, INVMAJ, INVTOT, INVLGSM,INVDESCR FROM ARYDVMI  WHERE INVDATETIME >= DATE_SUB(NOW(), INTERVAL 1 YEAR)  AND INVDECLINE <> 1 AND INVMAJ < 90  AND INVLGSM <> 0  AND INVNO > 0 " ;
$do_d4 = mysql_query($dol4, $tryconnection) or die(mysql_error()) ;

//// Section specific to each clinic ^^^

$dol5 = "SELECT SUM(INVTOT) AS ALLDOL, INVLGSM FROM TEMACC GROUP BY INVLGSM WITH ROLLUP" ;
$do_d5 = mysql_query($dol5, $tryconnection) or die(mysql_error()) ;

$xd = 0 ;
while ($row_d5 = mysqli_fetch_assoc($do_d5)) {
  if ($xd == 2) {
    $dollar[$xd] = 0 ;
    $xd++;
  }
  $dollar[$xd] = round($row_d5['ALLDOL'],0) ;
  $xd++ ;
 }
  
// Look for the routine surgeries for dogs and cats.


//// Section specific to each clinic vvv

$t1 = "SELECT COUNT(DISTINCT(INVPET)) AS DOG1 FROM ARYDVMI WHERE INVDATETIME > DATE_SUB(NOW(), INTERVAL 1 YEAR) AND INVMAJ = 4 AND INVLGSM = 1 AND (INVMIN > 11 AND INVMIN <  20) " ;
$go_t1 = mysql_query($t1, $tryconnection) or die(mysql_error()) ;
$row_t1 = mysqli_fetch_assoc($go_t1) ;

$t2 = "SELECT COUNT(DISTINCT(INVPET)) AS DOG2 FROM DVMINV WHERE  INVMAJ = 4 AND INVLGSM = 1 AND (INVMIN > 11 AND INVMIN <  20)" ;
$go_t2 = mysql_query($t2, $tryconnection) or die(mysql_error()) ;
$row_t2 = mysqli_fetch_assoc($go_t2) ;


//// Section specific to each clinic ^^^

$t3 =  $row_t1['DOG1'] + $row_t2['DOG2'] ;

//// Section specific to each clinic vvv

$t4 = "SELECT COUNT(DISTINCT(INVPET)) AS CAT1 FROM ARYDVMI WHERE INVDATETIME > DATE_SUB(NOW(), INTERVAL 1 YEAR) AND INVMAJ = 4 AND INVLGSM = 2 AND (INVMIN = 10 OR INVMAJ = 11 OR INVMAJ = 16 OR INVMAJ = 17) ";
$go_t4 = mysql_query($t4, $tryconnection) or die(mysql_error()) ;
$row_t4 = mysqli_fetch_assoc($go_t4) ;

$t5 = "SELECT COUNT(DISTINCT(INVPET)) AS CAT2 FROM DVMINV WHERE INVMAJ = 4 AND INVLGSM = 2 AND (INVMIN = 10 OR INVMAJ = 11 OR INVMAJ = 16 OR INVMAJ = 17)" ;
$go_t5 = mysql_query($t5, $tryconnection) or die(mysql_error()) ;
$row_t5 = mysqli_fetch_assoc($go_t5) ;

//// Section specific to each clinic ^^^

$t6 =  $row_t4['CAT1'] + $row_t5['CAT2'] ;


 $inclinic[0] = $t3 ;
 $inclinic[1] = $t6 ;
 $inclinic[2] = $t3 + $t6 ;
 
 // This last section analyses the T&F file for size, then builds a "sieve" matrix through which
 // the TEMACC file is poured to accumulate totals, by species, of the Out-patient, In-patient,
 // Drugs, Food, Diagnostics, Food and Other Cateogories.
 
 // The "sieve" matrix is $sieve. It has to be hand coded for each clinic to reflect their T&F file.
 //  
 // It contains the appropriate INVMAJ's for each category, by species.
 
 // The resulting data is accumulated in a matrix $splits which has 
 // 6 rows (Out, In, Diags, Drugs, Food, Other) and 8 columns (species)
 //


//// Section specific to each clinic vvv

$sieve = array($dog=array(1=>1,
2=>1,
3=>2,
4=>2,
5=>3,
6=>1,
7=>2,
8=>3,
9=>3,
10=>4,
11=>4,
12=>2,
13=>2,
14=>5,
15=>6,
16=>6,
17=>6, 
18=>6,
19=>6,
),
$cat = array(1=>1,
2=>1,
3=>2,
4=>2,
5=>3,
6=>1,
7=>2,
8=>3,
9=>3,
10=>4,
11=>4,
12=>2,
13=>2,
14=>5,
15=>6,
16=>6,
17=>6, 
18=>6,
19=>6,
),
$equ = array(1=>1,
2=>1,
3=>1,
4=>1,
5=>1,
6=>1,
7=>1,
8=>1,
9=>1,
10=>1,
11=>1,
12=>1,
13=>1,
14=>1,
15=>1,
16=>1,
),
$bov = array(1=>1,
2=>1,
3=>2,
4=>1,
5=>3,
6=>1,
7=>2,
8=>2,
9=>3,
10=>4,
11=>4,
12=>2,
13=>2,
14=>5,
15=>6,
),
$cap = array(1=>1,
2=>1,
3=>2,
4=>1,
5=>3,
6=>1,
7=>2,
8=>2,
9=>3,
10=>4,
11=>4,
12=>2,
13=>2,
14=>5,
15=>6,
),
$por = array(1=>1,
2=>1,
3=>2,
4=>1,
5=>3,
6=>1,
7=>2,
8=>2,
9=>3,
10=>4,
11=>4,
12=>2,
13=>2,
14=>5,
15=>6,
),
$av = array(1=>1,
2=>1,
3=>2,
4=>1,
5=>3,
6=>1,
7=>2,
8=>2,
9=>3,
10=>4,
11=>4,
12=>2,
13=>2,
14=>5,
15=>6,
),
$oth = array(1=>1,
2=>1,
3=>2,
4=>2,
5=>3,
6=>1,
7=>2,
8=>3,
9=>3,
10=>4,
11=>4,
12=>2,
13=>2,
14=>5,
15=>6,
16=>6,
17=>6, 
18=>6,
19=>6,
),
) ;

$splits  = array($sp1 = array(1=>0,
2=>0,
3=>0,
4=>0,
5=>0,
6=>0,
),
$sp2=array(1=>0,
2=>0,
3=>0,
4=>0,
5=>0,
6=>0,
),
$sp3=array(1=>0,
2=>0,
3=>0,
4=>0,
5=>0,
6=>0,
),
$sp4=array(1=>0,
2=>0,
3=>0,
4=>0,
5=>0,
6=>0,
),
$sp5=array(1=>0,
2=>0,
3=>0,
4=>0,
5=>0,
6=>0,
),
$sp6=array(1=>0,
2=>0,
3=>0,
4=>0,
5=>0,
6=>0,
),
) ;

//// Section specific to each clinic ^^^

// Now fill in the array from TEMACC.


$dig = "SELECT INVMAJ, INVLGSM, INVTOT FROM TEMACC" ;
$go_dig = mysql_query($dig, $tryconnection) or die(mysql_error()) ;
while ($row_dig = mysqli_fetch_assoc($go_dig)) {

 $spc = $row_dig['INVLGSM'] -1 ;
//if ($spc == 8) {$spc = 3 ;} 
 $cat = $row_dig['INVMAJ'] ;
 $to = $row_dig['INVTOT'] ;
 
 // now dig out the summary category from the sieve
 
 $sumcat = $sieve[$spc][$cat] ;
 
 $splits[$spc][$sumcat] = $splits[$spc][$sumcat] + $to ;
}   

echo ' end mysql' ;

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/DVMBasicTemplate.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, maximum-scale=2" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>ABOUT DVMANAGER</title>
<!-- InstanceEndEditable -->

<link rel="stylesheet" type="text/css" href="../ASSETS/styles.css" />
<script type="text/javascript" src="../ASSETS/scripts.js"></script>

<!-- InstanceBeginEditable name="head" -->
<script type="text/javascript">
function bodyonload(){
	
	document.getElementById('inuse').innerText=localStorage.xdatabase;

document.line.item.company.focus();
document.line.item.company.select();
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
</script>


<style type="text/css">
<!--
#shadow {	background-color: #556453;
	width: 441px;
	height: auto;
}
#shadowedtable {	position: relative;
	width: 440px;
	height: 227;
	left: -4px;
	top: -4px;
	background-color:#FFFFFF;
	border: solid #556453 thin;
}
-->
</style>
<!-- InstanceEndEditable -->
<script type="text/javascript" src="../ASSETS/navigation.js"></script>
</head>

<body onload="bodyonload()" onunload="bodyonunload()">
<!-- InstanceBeginEditable name="EditRegion4" -->
<table class="ds_box" cellpadding="0" cellspacing="0" id="ds_conclass" style="display: none;" >
<tr><td id="ds_calclass"></td></tr>
</table>
<script type="text/javascript" src="../ASSETS/calendar.js"></script>
<!-- InstanceEndEditable -->

<!-- InstanceBeginEditable name="HOME" -->
<div id="LogoHead" onclick="window.open('/'+localStorage.xdatabase+'/INDEX.php','_self');" onmouseover="CursorToPointer(this.id)" title="Home">DVM</div>
<!-- InstanceEndEditable -->

<div id="MenuBar">

	<ul id="navlist">
                
<!--FILE-->                
                
		<li><a href="#" id="current">File</a> 
			<ul id="subnavlist">
                <li><a href="#"><span class="">About DV Manager</span></a></li>
                <li><a onclick="utilities();">Utilities</a></li>
			</ul>
		</li>
                
<!--INVOICE-->                
                
		<li><a href="#" id="current">Invoice</a> 
			<ul id="subnavlist">
                <li><a href="#" onclick="window.open('','_self'/'+localStorage.xdatabase+'/INVOICE/CASUAL_SALE_INVOICING/STAFF.php?refID=SCI)"><span class="">Casual Sale Invoicing</span></a></li>
                <li><!-- InstanceBeginEditable name="reg_nav" --><a href="#" onclick="nav0();">Regular Invoicing</a><!-- InstanceEndEditable --></li>
                <li><a href="#" onclick="nav11();">Estimate</a></li>
                <li><a href="#" onclick=""><span class="">Barn/Group Invoicing</span></a></li>
                <li><a href="#" onclick="suminvoices()"><span class="">Summary Invoices</span></a></li>
                <li><a href="#" onclick="cashreceipts()"><span class="">Cash Receipts</span></a></li>
                <li><a href="#" onclick="window.open('','_self')"><span class="">Cancel Invoices</span></a></li>
                <li><a href="#" onclick="window.open('/'+localStorage.xdatabase+'/INVOICE/COMMENTS/COMMENTS_LIST.php?path=DIRECTORY','_blank','width=733,height=553,toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no')">Comments</a></li>
                <li><a href="#" onclick="tffdirectory()">Treatment and Fee File</a></li>
                <li><a href="#" onclick="window.open('','_self')"><span class="">Worksheet File</span></a></li>
                <li><a href="#" onclick="window.open('','_self')"><span class="">Procedure Invoicing File</span></a></li>
                <li><a href="#" onclick="invreports();"><span class="">Invoicing Reports</span></a></li>
			</ul>
		</li>
                
<!--RECEPTION-->                
                
		<li><a href="#" id="current">Reception</a> 
			<ul id="subnavlist">
                <li><a href="#" onclick="window.open('','_self')"><span class="">Appointment Scheduling</span></a></li>
                <li><a href="#" onclick="reception();">Patient Registration</a></li>
                <li><a href="#" onclick="window.open('/'+localStorage.xdatabase+'/RECEPTION/USING_REG_FILE.php','_blank','width=550,height=535')">Using Reception File</a></li>
                <li><a href="#" onclick="nav2();"><span class="hidden"></span>Examination Sheets</a></li>
                <li><a href="#" onclick="gexamsheets()"><span class="">Generic Examination Sheets</span></a></li>
                <li><a href="#" onclick="nav3();">Duty Log</a></li>
                <li><a href="#" onclick="staffsiso()">Staff Sign In &amp; Out</a></li>
                <li><a href="#" onclick="window.open('','_self')"><span class="">End of Day Accounting Reports</span></a></li>
                    </ul>
                </li>
                
<!--PATIENT-->                
                
                <li><a href="#" id="current">Patient</a> 
			<ul id="subnavlist">
                <li><a href="#" onclick="nav4();">Processing Menu</a> </li>
                <li><a href="#" onclick="nav5();">Review Patient Medical History</a></li>
                <li><a href="#" onclick="nav6();">Enter New Medical History</a></li>
                <li><a href="#" onclick="nav7();">Enter Patient Lab Results</a></li>
                <li><a href="#" onclick=""window.open('/'+localStorage.xdatabase+'/CLIENT/CLIENT_SEARCH_SCREEN.php?refID=ENTER SURG. TEMPLATES','_self')><span class="">Enter Surgical Templates</span></a></li>
                <li><a href="#" onclick="window.open('/'+localStorage.xdatabase+'/CLIENT/CLIENT_SEARCH_SCREEN.php?refID=CREATE NEW CLIENT','_self','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no');">Create New Client</a></li>
                <li><a href="#" onclick="movepatient();">Move Patient to a New Client</a></li>
                <li><a href="#" onclick="searchpatient()">Rabies Tags</a></li>
                <li><a href="#" onclick="searchpatient()">Tattoo Numbers</a></li>
                <li><a href="#" onclick="nav8();"><span class="">Certificates</span></a></li>
                <li><a href="#" onclick="nav9();"><span class="">Clinical Logs</span></a></li>
                <li><a href="#" onclick="nav10();"><span class="">Patient Categorization</span></a></li>
                <li><a href="#" onclick="">Laboratory Templates</a></li>
                <li><a href="#" onclick="nav1();"><span class="">Quick Weight</span></a></li>
<!--                <li><a href="#" onclick="window.open('','_self')"><span class="">All Treatments Due</span></a></li>
-->			</ul>
		</li>
        
<!--ACCOUNTING-->        
		
        <li><a href="#" id="current">Accounting</a> 
			<ul id="subnavlist">
                <li><a href="#" onclick=""accreports()>Accounting Reports</a></li>
                <li><a href="#" onclick="inventorydir();" id="inventory" name="inventory">Inventory</a></li>
                <li><a href="#" onclick="" id="busstatreport" name="busstatreport"><span class="">Business Status Report</span></a></li>
                <li><a href="#" onclick="" id="hospstatistics" name="hospstatistics"><span class="">Hospital Statistics</span></a></li>
                <li><a href="#" onclick="" id="monthend" name="monthend"><span class="">Month End Closing</span></a></li>
			</ul>
		</li>
        
<!--MAILING-->        
		
        <li><a href="#" id="current">Mailing</a> 
			<ul id="subnavlist">
                <li><a href="#" onclick="window.open('','_self')" ><span class="">Recalls and Searches</span></a></li>
                <li><a href="#" onclick="window.open('','_self')"><span class="">Handouts</span></a></li>
                <li><a href="#" onclick="window.open('','_self')MAILING/MAILING_LOG/MAILING_LOG.php?refID=">Mailing Log</a></li>
                <li><a href="#" onclick="window.open('','_self')"><span class="">Vaccine Efficiency Report</span></a></li>
                <li><a href="#" onclick="window.open('/'+localStorage.xdatabase+'/MAILING/REFERRALS/REFERRALS_SEARCH_SCREEN.php?refID=1','_blank','width=567,height=473')">Referring Clinics and Doctors</a></li>
                <li><a href="#" onclick="window.open('','_self')"><span class="">Referral Adjustments</span></a></li>
                <li><a href="#" onclick="window.open('','_self')"><span class="">Labels</span></a></li>
			</ul>
		</li>
	</ul>
</div>
<div id="inuse" title="File in memory"><!-- InstanceBeginEditable name="fileinuse" -->
<!-- InstanceEndEditable --></div>



<div id="WindowBody">
<!-- InstanceBeginEditable name="DVMBasicTemplate"  -->
<form name="about_dvm" method="get" action="" >

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr id="prthospname">
    <td colspan="16" height="30" align="center" class="Verdana14B"><?php echo $hospname ; ?>
    </td>
    </tr>
    <tr id="prtpurpose">
    <td colspan="16" height="15" align="center" class="Verdana14B">Current Practice Status<br />&nbsp;</td>
    </tr>
  <tr height="20" bgcolor="#333333" class="Verdana11Bwhite">
    <td width="60">&nbsp;</td>
    <td width="60" align="center">&nbsp;Patients</td>
    <td width="60">&nbsp;</td>
    <td width="90">&nbsp;</td>
    <td width="60">&nbsp;</td>
    <td width="35">&nbsp;</td>
    <td width="35">&nbsp;</td>
    <td width="35">&nbsp;</td>
    <td width="35">&nbsp;</td>
    <td width="35">&nbsp;</td>
    <td width="35">&nbsp;</td>
    <td width="30">&nbsp;</td>
    <td width="40">&nbsp;</td>
    <td width="30"&nbsp;</td>
    <td width="50" align="center">Clients&nbsp;</td>
    <td width="50" align="left">Patients per client</td>
  </tr>
  <tr height="1" >
   <td colspan="16" class="Verdana2">&nbsp;</td>
    </tr>
  <tr height="20" bgcolor="#666666" class="Verdana11Bwhite">
    <td align="left">&nbsp;Species</td>
    <td align="left">&nbsp;</td>
    <td align="left">Number</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td colspan="6"align="right">&nbsp;&nbsp;Revenue Source (%)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td align="right">App</td>
    <td align="left">ts</td>
    <td align="center">&nbsp;Number</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr height="1" >
   <td colspan="16" class="Verdana2">&nbsp;</td>
    </tr>
  <tr height="20" bgcolor="#999999" class="Verdana11B">
    <td align="right">&nbsp;</td>
    <td align="center">Live&nbsp;</br>5 yrs.</td>
    <td align="left">Current</td>
    <td align="left">&nbsp;Seen</br>12 Mos</td> 
    <td align="left" >$$</td>
    <td align="right" >$/per</td>
    <td align="right" colspan="6"">Out&nbsp;&nbsp;&nbsp;In&nbsp;&nbsp;Diag Drug&nbsp;Food Oth</td>
    <td align="center"><= 4</br>wks</td>
    <td align="center">> 4&nbsp;</br>wks&nbsp;&nbsp;</td>
    <td align="left">&nbsp;&nbsp;Total</td>
    <td align="left">&nbsp;&nbsp;&nbsp;Avge</br>(Treated)</td>
  </tr>
    
    <table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="#CCCCCC" frame="below" rules="rows">

   <?php 
   $totout = $splits[0][1] + $splits[1][1] +$splits[2][1] +$splits[3][1] + $splits[4][1] +$splits[5][1] +$splits[6][1] +$splits[7][1] ;
   $totin = $splits[0][2] + $splits[1][2] +$splits[2][2] +$splits[3][2] + $splits[4][2] +$splits[5][2] +$splits[6][2] +$splits[7][2] ;
   $totdia = $splits[0][3] + $splits[1][3] +$splits[2][3] +$splits[3][3] + $splits[4][3] +$splits[5][3] +$splits[6][3] +$splits[7][3] ;
   $totdru = $splits[0][4] + $splits[1][4] +$splits[2][4] +$splits[3][4] + $splits[4][4] +$splits[5][4] +$splits[6][4] +$splits[7][4] ;
   $totfoo = $splits[0][5] + $splits[1][5] +$splits[2][5] +$splits[3][5] + $splits[4][5] +$splits[5][5] +$splits[6][5] +$splits[7][5] ;
   $tototh = $splits[0][6] + $splits[1][6] +$splits[2][6] +$splits[3][6] + $splits[4][6] +$splits[5][6] +$splits[6][6] +$splits[7][6] ;
   $GTotal  =  $totout +  $totin +$totdia + $totdru + $totfoo + $tototh ;

   for ($xn = 0; $xn < 9; $xn++) {
 //    if ($xn < 3) {$truth = $notdead[$xn]; } else {$truth = ' ' ;}
     $truth = $notdead[$xn] ;
     $dolper = round($dollar[$xn] / $patients[$xn],0) ;
     if ($xn < 8) {
       $out = round($splits[$xn][1] / $dollar[$xn]* 100,0) ; 
       $in  = round($splits[$xn][2] / $dollar[$xn]* 100,0) ; 
       $dia = round($splits[$xn][3] / $dollar[$xn]* 100,0) ; 
       $dru = round($splits[$xn][4] / $dollar[$xn]* 100,0) ; 
       $foo = round($splits[$xn][5] / $dollar[$xn]* 100,0) ; 
       $oth = round($splits[$xn][6] / $dollar[$xn]* 100,0) ; 
       }
     else {
       $out = round($totout / $GTotal * 100,0) ; 
       $in  = round($totin / $GTotal * 100,0) ; 
       $dia = round($totdia / $GTotal * 100,0) ; 
       $dru = round($totdru / $GTotal * 100,0) ; 
       $foo = round($totfoo / $GTotal * 100,0) ; 
       $oth = round($tototh / $GTotal * 100,0) ; 
    }
    if($appts[$xn]== 0) {$appts[$xn] = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ;} 
    if($apptl[$xn]== 0) {$apptl[$xn] = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ;}
    
    echo '<tr height="22" colspan="16"  class="Verdana12B"';   if($xn > 4) {echo 'style="display: none;"';}  echo '>';//if ($species[$xn] === ''){echo 'style="display: none;"' ;} echo '>';
    echo '<td align="left" >'; if ($xn == 4) {echo 'Total';} else {echo $animal[$xn] ; } 
    echo '</td> <td align="left"  class="Verdana11Grey">' . $around[$xn] . '</td><td align="left"  class="Verdana12">' . $truth . '</td> <td align="left" class="Verdana12Red" >' . $patients[$xn] . 
     '</td> <td  class="Verdana12Red" align="left">'.number_format($dollar[$xn]). '</td><td  class="Verdana12Red" align="left">'.$dolper. '</td>
     <td class="Verdana12Brown">&nbsp;' .$out . '</td>
     <td class="Verdana12Brown">&nbsp;' .$in  . '</td>
     <td class="Verdana12Brown">&nbsp;' .$dia . '</td>
     <td class="Verdana12Brown">&nbsp;' .$dru . '</td>
     <td class="Verdana12Brown">&nbsp;' .$foo . '</td>
     <td class="Verdana12Brown">&nbsp;' .$oth . '</td>
     </td> <td  class="Verdana12Blue" align="center">'.$appts[$xn]. '</td><td  class="Verdana12Blue" align="left">'.$apptl[$xn]. '</td> <td align="left">' . 
     $clients[$xn] . '</td><td  class="Verdana12" align="center">' . $average[$xn]. '</td> </tr>' ;
   }
  ?>
 </table>
 
    
    <table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="#CCCCCC" frame="below" rules="rows">

  <tr height="1" >
   <td colspan="7" class="Verdana2">&nbsp;</td>
    </tr>
  <tr height="20" bgcolor="#666666" class="Verdana11Bwhite">
    <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Species</td>
    <td align="left">&nbsp;Examined 12 mos</td>
    <td align="center">Neutered total</td>
    <td align="center">Neutered 12 mos</td>
    <td align="center"  bgcolor="#66a3ff" class="Verdana11B"><7m Intact M</td>
    <td align="center" bgcolor="#ff99c2" class="Verdana11B">&nbsp;<7m Intact F</td>
    <td align="left">&nbsp;<7m Total</td>
  </tr>
  <tr height="1" >
   <td colspan="7" class="Verdana2">&nbsp;</td>
    </tr>
       <?php 
   
   for ($xn = 0; $xn < 3; $xn++) {
        
      echo '<tr height="22" colspan="7"  class="Verdana12B"';   if ($patients[$xn] === ''){echo 'style="display: none;"' ;} echo '>';
      echo '<td width="81">'; if ($xn == 2) {echo 'Total';} else {echo $animal[$xn] ;
      } 
      echo '</td> <td align="left" width="81"  class="Verdana12Purp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $examn[$xn] . 
      '</td> <td width="81" align="center" class="Verdana11Grey">'.$neut[$xn]. '</td></td> <td width="81" class="Verdana12Purp" align="center">'.$inclinic[$xn]. '</td>
      <td width="81" align="center">'.
      $intm[$xn]. '</td> <td width="81" align="center">' . $intf[$xn] . '</td><td width="81">' . $intt[$xn]  . '</td> </tr>' ;
   }
  ?>
  
  </table>
  <tr height="20" >
   <td colspan="6" class="Verdana2">&nbsp;</td>
    </tr>
       
    <table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="#CCCCCC" frame="below" rules="rows">

  <tr height="20" bgcolor="#666666" class="Verdana11Bwhite">
    <td colspan="2" align="left">Canine Pediatric Vaccs last 12 mos</td>
    <!--<td align="center">&nbsp;</td> -->
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;.</td>
    <td align="left"
  </tr>
  <tr height="20" bgcolor="#999999" class="Verdana11B">
    <td align="center">1st Seriess</td>
    <td align="center">2nd Series</td>
    <td align="center">3rd Series</td>
    <td align="center">Total</td>
    <td align="center">No Vacc.</td>
    <td align="left">% coverage</td>
  </tr> 
   <tr height="1" >
   <td colspan="6" class="Verdana2">&nbsp;</td>
    </tr>
       <?php 
     
// was here 
 //  for ($xn = 0; $xn < 2; $xn++) {
        $k9all = $k9v12+$k9v16+$k9v28 ;
        $percent = round(($k9all) / ($k9all + $k9vnun) * 100.0,1) ;
        echo '<tr height="22" colspan="6"  class="Verdana12B">';
        // was here
     echo '<td width="95" align="center">'. $k9v12 . 
     '</td> <td align="center">' .$k9v16 .
      '</td> <td width="95" align="center">'.$k9v28. '</td><td width="95" align="center">'.
      $k9all . '</td > <td width="95" align="center">' . $k9vnun . '</td><td width="95">' . $percent  . '</td> ' ; //  to here
      echo '</tr>' ;
    
//   }
//to here

  ?>
  </table>

 <table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="#CCCCCC" frame="below" rules="rows">
    <tr height="20" >
   <td colspan="6" class="Verdana2">&nbsp;</td>
    </tr>
       
   

  <tr height="20" bgcolor="#666666" class="Verdana11Bwhite">
    <td colspan="2" align="left">Feline Pediatric Vaccs last 12 mos</td>
    <!--<td align="left">&nbsp;</td> -->
    <td align="center">&nbsp;</td>
    <td align="center"><Total/td>
    <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr height="20" bgcolor="#999999" class="Verdana11B">
    <td align="center">1st Series</td>
    <td align="center">2nd Series</td>
    <td align="center">3rd Series</td>
    <td align="center">Total</td>
    <td align="center">No Vacc.</td>
    <td align="left">% coverage</td>
  </tr>
   <tr height="1" >
   <td colspan="6" class="Verdana2">&nbsp;</td>
    </tr>
       <?php 

 //  for ($xn = 0; $xn < 4; $xn++) {
        $flall = $flv12 + $flv16 + $flv28 ;
        $percent = round($flall  / ($flall + $flvnun) * 100.0,0) ;
        echo '<tr height="22" colspan="6"  class="Verdana12B">';
        // was here
     //   
     echo '<td width="95" align="center">'. $flv12 . 
     '</td> <td align="center">' .$flv16 .
      '</td> <td width="95" align="center">'.$flv28. '</td><td width="95" align="center">'.
      $flall. '</td> <td width="95" align="center">' . $flvnun . '</td><td width="95">' . $percent  . '</td> ' ; 
      //  to here
      echo '</tr>' ;
  // to here  
  //
//   }
   
  ?>
  </table>
  

    <tr height="20" >
   <td colspan="6" class="Verdana2">&nbsp;</td>
    </tr>
  <tr height="1" >
   <td colspan="6" class="Verdana2">&nbsp;</td>
    </tr>

<!--</table>  -->
    <!-- </div> -->
    

    <table width="60%" align="center" border="1" cellspacing="0" cellpadding="0">

  <tr id="buttons">
    <td align="center" class="ButtonsTable" colspan="6  ">
    <input name="button2" type="button" class="button" id="button2" value="FINISHED" onclick="history.go(-1)" />
    <input name="button3" type="button" class="button" id="button3" value="PRINT" onclick="window.print();" />
    <input name="button" type="button" class="button" id="button" value="CANCEL" onclick="history.go(-1)"/>
    </td>
  </tr>

</table>
<!-- InstanceEndEditable -->
</div>
</form>
</body>
<!-- InstanceEnd --></html>
