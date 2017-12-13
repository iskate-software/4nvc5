<?php 
require_once('../tryconnection.php'); 
mysqli_select_db($tryconnection, $database_tryconnection);

if (isset($_POST['ok'])){
 
   $query_repair1 = "REPAIR TABLE INVHOLD" ;
   $query_repair2 = "REPAIR TABLE ARARECV" ;
   $query_repair3 = "REPAIR TABLE ARINVOI" ;
   $query_repair4 = "REPAIR TABLE ARCASHR" ;
   $query_repair5 = "REPAIR TABLE SALESCAT" ;
   $query_repair6 = "REPAIR TABLE CASHDEP" ;
   $query_repair7 = "REPAIR TABLE ARCUSTO" ;
   $query_repair8 = "REPAIR TABLE PETMAST" ;
   $query_repair9 = "REPAIR TABLE CRITDATA" ;
   $query_repair10 = "REPAIR TABLE ESTHOLD" ;
   $query_repair11 = "REPAIR TABLE INVHOLD" ;
   $query_repair12 = "REPAIR TABLE PETHOLD" ;
   $query_repair13 = "REPAIR TABLE APPTDOCS" ;
   $query_repair14 = "REPAIR TABLE HRSDOC" ;
   
   $result=mysqli_query($tryconnection, $query_repair1) or die(mysqli_error($mysqli_link)) ;
   $result=mysqli_query($tryconnection, $query_repair2) or die(mysqli_error($mysqli_link)) ;
   $result=mysqli_query($tryconnection, $query_repair3) or die(mysqli_error($mysqli_link)) ;
   $result=mysqli_query($tryconnection, $query_repair4) or die(mysqli_error($mysqli_link)) ;
   $result=mysqli_query($tryconnection, $query_repair5) or die(mysqli_error($mysqli_link)) ;
   $result=mysqli_query($tryconnection, $query_repair6) or die(mysqli_error($mysqli_link)) ;
   $result=mysqli_query($tryconnection, $query_repair7) or die(mysqli_error($mysqli_link)) ;
   $result=mysqli_query($tryconnection, $query_repair8) or die(mysqli_error($mysqli_link)) ;
   $result=mysqli_query($tryconnection, $query_repair9) or die(mysqli_error($mysqli_link)) ;
   $result=mysqli_query($tryconnection, $query_repair10) or die(mysqli_error($mysqli_link)) ;
   $result=mysqli_query($tryconnection, $query_repair11) or die(mysqli_error($mysqli_link)) ;
   $result=mysqli_query($tryconnection, $query_repair12) or die(mysqli_error($mysqli_link)) ;
   $result=mysqli_query($tryconnection, $query_repair13) or die(mysqli_error($mysqli_link)) ;
   $result=mysqli_query($tryconnection, $query_repair14) or die(mysqli_error($mysqli_link)) ;
   
   
   $query_opti1 = "OPTIMIZE TABLE INVHOLD" ;
   $query_opti2 = "OPTIMIZE TABLE ARARECV" ;
   $query_opti3 = "OPTIMIZE TABLE ARINVOI" ;
   $query_opti4 = "OPTIMIZE TABLE ARCASHR" ;
   $query_opti5 = "OPTIMIZE TABLE SALESCAT" ;
   $query_opti6 = "OPTIMIZE TABLE CASHDEP" ;
   $query_opti7 = "OPTIMIZE TABLE ARCUSTO" ;
   $query_opti8 = "OPTIMIZE TABLE PETMAST" ;
   $query_opti9 = "OPTIMIZE TABLE CRITDATA" ;
   $query_opti10 = "OPTIMIZE TABLE ESTHOLD" ;
   $query_opti11 = "OPTIMIZE TABLE INVHOLD" ;
   $query_opti12 = "OPTIMIZE TABLE PETHOLD" ;
   $query_opti13 = "OPTIMIZE TABLE APPTDOCS" ;
   $query_opti14 = "OPTIMIZE TABLE HRSDOC" ;
   
   $result=mysqli_query($tryconnection, $query_opti1) or die(mysqli_error($mysqli_link)) ;
   $result=mysqli_query($tryconnection, $query_opti2) or die(mysqli_error($mysqli_link)) ;
   $result=mysqli_query($tryconnection, $query_opti3) or die(mysqli_error($mysqli_link)) ;
   $result=mysqli_query($tryconnection, $query_opti4) or die(mysqli_error($mysqli_link)) ;
   $result=mysqli_query($tryconnection, $query_opti5) or die(mysqli_error($mysqli_link)) ;
   $result=mysqli_query($tryconnection, $query_opti6) or die(mysqli_error($mysqli_link)) ;
   $result=mysqli_query($tryconnection, $query_opti7) or die(mysqli_error($mysqli_link)) ;
   $result=mysqli_query($tryconnection, $query_opti8) or die(mysqli_error($mysqli_link)) ;
   $result=mysqli_query($tryconnection, $query_opti9) or die(mysqli_error($mysqli_link)) ;
   $result=mysqli_query($tryconnection, $query_opti10) or die(mysqli_error($mysqli_link)) ;
   $result=mysqli_query($tryconnection, $query_opti11) or die(mysqli_error($mysqli_link)) ;
   $result=mysqli_query($tryconnection, $query_opti12) or die(mysqli_error($mysqli_link)) ;
   $result=mysqli_query($tryconnection, $query_opti13) or die(mysqli_error($mysqli_link)) ;
   $result=mysqli_query($tryconnection, $query_opti14) or die(mysqli_error($mysqli_link)) ;
   
	if (!empty($_POST['client'])) {
	$query_index="DROP INDEX ARNAME ON ARCUSTO";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	
	
	$query_index="DROP INDEX ARCUSTN ON ARCUSTO";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	
	
	$query_index="DROP INDEX ARSECNM ON ARCUSTO";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	
	
	$query_index="DROP INDEX ARPHONE ON ARCUSTO";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	
	
	$query_index="CREATE INDEX ARNAME ON ARCUSTO(COMPANY(15), CONTACT(5), CUSTNO)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="CREATE INDEX ARCUSTN ON ARCUSTO(CUSTNO)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="CREATE INDEX ARSECNM ON ARCUSTO(COMPANY(15), CONTACT(5), CUSTNO)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	
	
	$query_index="CREATE INDEX ARPHONE ON ARCUSTO(PHONE)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));
	
//	$query_unlock = "INSERT INTO LOCKED ARCUSTO " ;
	}
	
	if (!empty($_POST['patient'])) {
	$query_index="DROP INDEX OWNER ON PETMAST";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="DROP INDEX OWNERMD ON PETMAST";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="DROP INDEX RABTAG ON PETMAST";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="DROP INDEX RABLAST ON PETMAST";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="DROP INDEX REGNAME ON PETMAST";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="DROP INDEX PFILENO ON PETMAST";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="DROP INDEX TATTOO ON PETMAST";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="DROP INDEX  BREED ON PETBREED ";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="DROP INDEX COLOUR ON PETCOLOR";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="CREATE INDEX OWNER ON PETMAST(CUSTNO)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	
	
	$query_index="CREATE INDEX OWNERMD ON PETMAST (CUSTNO,PDEAD,PMOVED)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	
	
	$query_index="CREATE INDEX RABTAG ON PETMAST (PRABTAG)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="CREATE INDEX RABLAST ON PETMAST (PRABLAST)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="CREATE INDEX REGNAME ON PETMAST (PETNAME(10))";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="CREATE INDEX PFILENO ON PETMAST (PFILENO)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="CREATE INDEX TATTOO ON PETMAST (PTATNO)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

//	$query_index="CREATE INDEX STABLE ON PETMAST (STAB)";
//	$result=mysql_query($query_index, $tryconnection) or die(mysql_error());	

	$query_index="CREATE INDEX BREED ON PETBREED (BSPECIES, BREED)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="CREATE INDEX COLOUR ON PETCOLOR (CSPECIES, COLOUR(20))";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	
	}

	if (!empty($_POST['history'])) {
		$query_PREFER="SELECT TRTMCOUNT FROM PREFER LIMIT 1";
		$PREFER= mysqli_query($tryconnection, $query_PREFER) or die(mysqli_error($mysqli_link));
		$row_PREFER = mysqli_fetch_assoc($PREFER);

		$query_CRITDATA="SELECT LASTCUST FROM CRITDATA LIMIT 1";
		$CRITDATA=mysqli_query($tryconnection, $query_CRITDATA) or die(mysqli_error($mysqli_link));
		$row_CRITDATA=mysqli_fetch_assoc($CRITDATA);
		
		$lasttreatm=floor($row_CRITDATA['LASTCUST']/$row_PREFER['TRTMCOUNT']);
		
		for ($i=0; $i < $lasttreatm; $i++){
		$treatmxx='TREATM'.$i;
		$query_index="DROP INDEX PETID ON $treatmxx";
		$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	
	
		$query_index="DROP INDEX TREATDATE ON $treatmxx";
		$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	
	
		$query_index="CREATE INDEX PETID ON $treatmxx (PETID)";
		$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	
	
		$query_index="CREATE INDEX TREATDATE ON $treatmxx (TREATDATE)";
		$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	
		}
	}
	
	if (!empty($_POST['reception'])) {
	$query_index="DROP INDEX CLIENT ON RECEP";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="DROP INDEX CLIENTC ON RECEP";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="CREATE INDEX CLIENT ON RECEP (NAME(15), FNAME(8))";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="CREATE INDEX CLIENTC ON RECEP (DATEIN)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	
	}
	
//	if (!empty($_POST['worksheet'])) {}
	
	if (!empty($_POST['inventory'])) {
	$query_index="DROP INDEX ARVPC ON ARINVT";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="DROP INDEX ARIVIT ON ARINVT";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="DROP INDEX ARSEQ ON ARINVT";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="DROP INDEX ARBCODE ON ARINVT";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="CREATE INDEX ARVPC ON ARINVT (VPARTNO(7))";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="CREATE INDEX ARIVIT ON ARINVT (ITEM, DESCRIP(15))";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="CREATE INDEX ARSEQ ON ARINVT (SEQ, ITEM)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="CREATE INDEX ARBCODE ON ARINVT (BARCODE)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	
	}
	
	if (!empty($_POST['comment'])) {
	}

	if (!empty($_POST['appointment'])) {
	
	$query_index="DROP INDEX APPTDOCS ON APPTDOCS";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));
	
	$query_index="DROP INDEX HRSDOC ON HRSDOC";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));

	$query_index="CREATE INDEX APPTDOCS ON APPTDOCS (DATEIS, SEQ)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="CREATE INDEX HRSDOC ON HRSDOC (DOCTOR, DAYINWEEK)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	
}
	
	if (!empty($_POST['receivable'])) {
	$query_index="DROP INDEX ARCINVO ON ARARECV";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="DROP INDEX ARRECHS ON ARARECV";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="CREATE INDEX ARCINVO ON ARARECV (CUSTNO, INVDTE, INVNO)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="CREATE INDEX ARRECHS ON ARARECV (CUSTNO, INVDTE, INVNO)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	
	}
	
	if (!empty($_POST['invoicing'])) {
	$query_index="DROP INDEX ARINVOI ON ARINVOI";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="DROP INDEX CLINIC ON ARINVOI";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="DROP INDEX ARGST ON ARGST";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="DROP INDEX DVMINV ON DVMINV";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="DROP INDEX DVMINVP ON DVMINV";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="DROP INDEX SCAT ON SALESCAT";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="DROP INDEX INVHOLD ON INVHOLD";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="DROP INDEX ESTHOLD ON ESTHOLD ";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="CREATE INDEX ARINVOI ON ARINVOI (INVNO)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="CREATE INDEX CLINIC ON ARINVOI (REFCLIN)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="CREATE INDEX ARGST ON ARGST (CUSTNO, INVNO)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="CREATE INDEX DVMINV ON DVMINV (INVCUST, INVNO)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="CREATE INDEX DVMINVP ON DVMINV (INVVPC)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="CREATE INDEX SCAT ON SALESCAT (INVNO)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="CREATE INDEX INVHOLD ON INVHOLD (INVCUST)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="CREATE INDEX ESTHOLD ON ESTHOLD (INVCUST, INVPET)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	
	}
	
	if (!empty($_POST['historical'])) {
	
 	$query_index="DROP INDEX ARYIN ON ARYINVO";
 	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));
	
	$query_index="CREATE INDEX ARYIN ON ARYINVO (CUSTNO)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));
	
 	$query_index="DROP INDEX ARYCA ON ARYCASH";
 	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));
	
	$query_index="CREATE INDEX ARYCA ON ARYCASH (CUSTNO)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));
	
 	$query_index="DROP INDEX ARYGST ON ARYGST";
 	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));
	
	$query_index="CREATE INDEX ARYGST ON ARYGST (CUSTNO)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));
	
 	$query_index="DROP INDEX ARYDVMI ON ARYDVMI";
 	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));
	
	$query_index="CREATE INDEX ARYDVMI ON ARYDVMI (INVCUST, INVPET)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));				

 	$query_index="DROP INDEX DVMILAST ON DVMILAST";
 	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));
	
	$query_index="CREATE INDEX DVMILAST ON DVMILAST (INVCUST, INVPET)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));
	
 	$query_index="DROP INDEX DVMILASTP ON DVMILAST";
 	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));
	
	$query_index="CREATE INDEX DVMILASTP ON DVMILAST (INVVPC)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));				

 	$query_index="DROP INDEX PETID ON PROBLEMS";
 	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));
	
	$query_index="CREATE INDEX PETID ON PROBLEMS (PETID)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));				
}
	
	if (!empty($_POST['duty'])) {
	$query_index="DROP INDEX TICKDATE ON TICKLER";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="CREATE INDEX TICKDATE ON TICKLER (TDATE, CUSTNO, PETNO)";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	
	}
//	if (!empty($_POST['clinical'])) {}
//	if (!empty($_POST['mailing'])) {}
	
	if (!empty($_POST['referral'])) {
	$query_index="DROP INDEX REFVET ON REFER";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="DROP INDEX REVCLIN ON REFER";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	

	$query_index="CREATE INDEX REFVET ON REFER (REFVET(15))";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));
	
	$query_index="CREATE INDEX REVCLIN ON REFER (REFCLIN(20))";
	$result=mysqli_query($tryconnection, $query_index) or die(mysqli_error($mysqli_link));	
	}
//	if (!empty($_POST['stable'])) {}
header("Location:UTILITIES.php");

}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/DVMBasicTemplate.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>REINDEXING FILES</title>
<!-- InstanceEndEditable -->

<link rel="stylesheet" type="text/css" href="../ASSETS/styles.css" />
<script type="text/javascript" src="../ASSETS/scripts.js"></script>

<!-- InstanceBeginEditable name="head" -->
<script type="text/javascript">
function bodyonload()
{
document.getElementById('inuse').innerText=localStorage.xdatabase;

alert('This procedure will reindex data files and the files to be indexed will be used EXCLUSIVELY by you and lock out any other users.                                                         Please make sure all other users are off the system before continuing with this procedure.');

}

function selectall(){
var i;
if (document.forms[0].selall.value!="Select All"){
	for (i=0; i<document.forms[0].checkbox.length; i++){
	document.forms[0].checkbox[i].checked=false;
	document.forms[0].selall.value="Select All";	
	}
}
else if (document.forms[0].selall.value="Select All"){
	for (i=0; i<document.forms[0].checkbox.length; i++){
	document.forms[0].checkbox[i].checked=true;
	document.forms[0].selall.value="Unselect All";	
	}
}
}



function waiting(){
document.getElementById('reindex_files').style.display='none';
document.getElementById('smileys').style.display='';
}



function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
</script>

<!-- InstanceEndEditable -->
<script type="text/javascript" src="../ASSETS/navigation.js"></script>
</head>

<body onload="bodyonload()" onunload="bodyonunload()">
<!-- InstanceBeginEditable name="EditRegion4" -->
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
<div id="inuse" title="File in memory"><!-- InstanceBeginEditable name="fileinuse" --><!-- InstanceEndEditable --></div>



<div id="WindowBody">
<!-- InstanceBeginEditable name="DVMBasicTemplate" -->
<div id="smileys" style="display:none; position:absolute; top:200px; left:140px; text-align:center; width:500px;">
<img src="../IMAGES/113.gif" alt="smiley" /><br  /><br  />
<span class="Verdana13B">Please wait while I reindex the files.</span>
</div>

<form id="reindex_files" name="reindex_files" method="post" action="">

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="88" align="center" class="Verdana13B">Please select the files to reindex.</td>
  </tr>
  <tr>
    <td height="430" align="center" valign="top">
    <table width="586" border="3" cellpadding="0" cellspacing="0" bordercolor="#3300FF" rules="none" frame="box">
      <tr>
        <td height="47" colspan="3" align="center" class="Verdana12"><span class="Verdana11">
          <input type="button" name="selall" id="selall" value="Select All" onclick="selectall();" />
        </span></td>
        </tr>
      <tr>
        <td width="32" height="35" valign="top" class="Verdana12">&nbsp;</td>
        <td width="262" height="35" valign="top" class="Verdana12"><label>
          <input type="checkbox" name="client" id="checkbox" />
          Client File</label></td>
        <td width="292" height="35" valign="top" class="Verdana12"><label>
          <input type="checkbox" name="receivable" id="checkbox" />
          Receivable Files</label></td>
      </tr>
      <tr>
        <td height="35" valign="top" class="Verdana12">&nbsp;</td>
        <td height="35" valign="top" class="Verdana12"><label>
          <input type="checkbox" name="patient" id="checkbox" />
          Patient File</label></td>
        <td height="35" valign="top" class="Verdana12"><label>
          <input type="checkbox" name="invoicing" id="checkbox" />
          Invoicing Files</label></td>
      </tr>
      <tr>
        <td height="35" valign="top" class="Verdana12">&nbsp;</td>
        <td height="35" valign="top" class="Verdana12"><label>
          <input type="checkbox" name="history" id="checkbox" />
          History Files</label></td>
        <td height="35" valign="top" class="Verdana12"><label>
          <input type="checkbox" name="historical" id="checkbox" />
          Historical Invoice Files</label></td>
      </tr>
      <tr>
        <td height="35" valign="top" class="Verdana12">&nbsp;</td>
        <td height="35" valign="top" class="Verdana12"><label>
          <input type="checkbox" name="reception" id="checkbox" />
          Reception Files</label></td>
        <td height="35" valign="top" class="Verdana12"><label>
          <input type="checkbox" name="duty" id="checkbox" />
          Duty Log File</label></td>
      </tr>
      <tr>
        <td height="35" valign="top" class="Verdana12">&nbsp;</td>
        <td height="35" valign="top" class="Verdana12"><label>
          <input type="checkbox" name="worksheet" id="checkbox" />
          Worksheet Files</label></td>
        <td height="35" valign="top" class="Verdana12"><label>
          <input type="checkbox" name="clinical" id="checkbox" />
          Clinical Log File</label></td>
      </tr>
      <tr>
        <td height="35" valign="top" class="Verdana12">&nbsp;</td>
        <td height="35" valign="top" class="Verdana12"><label>
          <input type="checkbox" name="inventory" id="checkbox" />
          Inventory Files</label></td>
        <td height="35" valign="top" class="Verdana12"><label>
          <input type="checkbox" name="mailing" id="checkbox" />
          Mailing Log File</label></td>
      </tr>
      <tr>
        <td height="35" valign="top" class="Verdana12">&nbsp;</td>
        <td height="35" valign="top" class="Verdana12"><label>
          <input type="checkbox" name="comment" id="checkbox" />
          Comment Files</label></td>
        <td height="35" valign="top" class="Verdana12"><label>
          <input type="checkbox" name="referral" id="checkbox" />
          Referral Files</label></td>
      </tr>
      <tr>
        <td height="35" valign="top" class="Verdana12">&nbsp;</td>
        <td height="35" valign="top" class="Verdana12"><label>
          <input type="checkbox" name="appointment" id="checkbox" />
          Appointment Files</label></td>
        <td height="35" valign="top" class="Verdana12"><label>
          <input type="checkbox" name="stable" id="checkbox" />
          Stable Files</label></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="middle" class="ButtonsTable">
    <input name="ok" type="submit" class="button" id="ok" value="OK" onclick="waiting();" />
    <input name="cancel" type="button" class="button" value="CANCEL" onclick="document.location='/'+localStorage.xdatabase+'/INDEX.php'" />
	</td>
  </tr>
</table>

</form>
<!-- InstanceEndEditable --></div>
</body>
<!-- InstanceEnd --></html>
