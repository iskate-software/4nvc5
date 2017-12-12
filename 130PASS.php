<?php 
session_start();
require_once('../tryconnection.php'); 

mysql_select_db($database_tryconnection, $tryconnection);
$query_SESME = "SELECT PASSWORD FROM SESME LIMIT 1";
$SESME = mysql_query($query_SESME, $tryconnection) or die(mysql_error());
$row_SESME = mysql_fetch_assoc($SESME);

if (isset($_POST['submit'])){
	if ($_POST['password']==$row_SESME['PASSWORD']){
	$good2go =1;
	}
	else {
	$good2go = 0;
	}
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/POP UP WINDOWS TEMPLATE.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>PASSWORD CHECK</title>
<!-- InstanceEndEditable -->

<link rel="stylesheet" type="text/css" href="../ASSETS/styles.css" />
<script type="text/javascript" src="../ASSETS/scripts.js"></script>
<script type="text/javascript" src="../ASSETS/navigation.js"></script>

<!-- InstanceBeginEditable name="head" -->

<script type="text/javascript">
//window.moveBy(70,30);

function bodyonload(){

window.resizeTo(450,350) ;
var toc='/'+localStorage.xdatabase+'/CLIENT/CLIENT_PATIENT_FILE.php';
var good2go = '<?php echo $good2go; ?>';
if (good2go == '1'){

	if (sessionStorage.good2go == 'A'){
	window.open('PASSWORD_SETTINGS.php','_blank','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=700,height=560');
	self.close();
	}
	//UTILITIES
	else if (sessionStorage.good2go == '1'){
	opener.document.location='/'+localStorage.xdatabase+'/UTILITIES/UTILITIES.php?path=2close';
	self.close();
	}
	//CANCEL INVOICES
	else if (sessionStorage.good2go == '2'){
			var dvmopen=(sessionStorage.goto) ? "_self" : "_self";
			if (filetype=='C' || filetype=='P'){
			opener.document.location=toc;
			}
			else {
			opener.document.location='/'+localStorage.xdatabase+'/CLIENT/CLIENT_SEARCH_SCREEN.php';
			}
	self.close();
	}
	//TREATMENT FEE FILE
	else if (sessionStorage.good2go == '3'){
	opener.document.location='/'+localStorage.xdatabase+'/INVOICE/TFF/TFF_DIRECTORY.php?species=i';
	self.close();
	}
	//PROCEDURE FILE
	else if (sessionStorage.good2go == '4'){
	opener.document.location='/'+localStorage.xdatabase+'/INVOICE/PROCEDURES/PROCEDURES_DIRECTORY.php?species=i';
	self.close();
	}	
	//INVOICE REGISTER
	else if (sessionStorage.good2go == '5'){
	opener.document.location='/'+localStorage.xdatabase+'/INVOICE/INVOICING_REPORTS/INVOICE_REGISTER.php';
	self.close();
	}
	//CASH REGISTER
	else if (sessionStorage.good2go == '6'){
	opener.document.location='/'+localStorage.xdatabase+'/INVOICE/INVOICING_REPORTS/CASH_REGISTER.php';
	self.close();
	}
	//ACTIVITY REGISTER
	else if (sessionStorage.good2go == '7'){
	opener.document.location='/'+localStorage.xdatabase+'/INVOICE/INVOICING_REPORTS/ACTIVITY_REGISTER.php';
	self.close();
	}
	//SEARCH INVOICE LINE ITEMS
	else if (sessionStorage.good2go == '8'){
	self.close();
	}
	//BANK RECONCILLIATION
	else if (sessionStorage.good2go == '9'){
	opener.document.location='/'+localStorage.xdatabase+'/ACCOUNTING/ACCOUNTING_REPORTS/BANK_REC_DEFINE.php','_self';
	self.close();
	}
	//BANK DEPOSIT
	else if (sessionStorage.good2go == '10'){
	opener.document.location='/'+localStorage.xdatabase+'/INVOICE/INVOICING_REPORTS/BANK_DEPOSIT_RESULTS.php';
	self.close();
	}
	//CLIENT LEDGER LISTING
	else if (sessionStorage.good2go == '11'){
			if (filetype=='C' || filetype=='P'){
			parent.opener.document.location=toc;
			}
			else {
			parent.opener.document.location='/'+localStorage.xdatabase+'/CLIENT/CLIENT_SEARCH_SCREEN.php';
			}
	self.close();
	}
	//ACCOUNTS RECEIVABLE REPORTS
	else if (sessionStorage.good2go == '12'){
	opener.document.location='/'+localStorage.xdatabase+'/ACCOUNTING/ACCOUNTING_REPORTS/RECEIVABLES_DIRECTORY.php';
	self.close();
	}
	//CLIENT EXPENDITURES
	else if (sessionStorage.good2go == '13'){
	 opener.document.location='/'+localStorage.xdatabase+'/ACCOUNTING/ACCOUNTING_REPORTS/RANK_CLIENTS.php';
	self.close();
	}
	//REVENUE BREAKDOWN ANALYSIS
	else if (sessionStorage.good2go == '14'){
	self.close();
	}
	//TAX REPORT
	else if (sessionStorage.good2go == '15'){
	self.close();
	}
	//BUSINESS STATUS REPORT
	else if (sessionStorage.good2go == '16'){
	opener.document.location='/'+localStorage.xdatabase+'/ACCOUNTING/ACCOUNTING_REPORTS/BUS_STAT.php';
	self.close();
	}
	//HOSPITAL STATISTICS
	else if (sessionStorage.good2go == '22'){
	opener.document.location='/'+localStorage.xdatabase+'/ACCOUNTING/ACCOUNTING_REPORTS/PRACTICE_PROFILE.php';
	self.close();
	}
	//MONTH END
	else if (sessionStorage.good2go == '18'){
	opener.document.location="/"+localStorage.xdatabase+"/ACCOUNTING/MONTH_END/MONTH_END_DIRECTORY.php";
	self.close();
	}
	//INVENTORY
	else if (sessionStorage.good2go == '20'){
	opener.document.location='/'+localStorage.xdatabase+'/INVENTORY/COMMON/INVENTORY_DIRECTORY.php';
	self.close();
	}
	//PRACTICE PROFILE
	else if (sessionStorage.good2go == '21'){
	opener.document.location='/'+localStorage.xdatabase+'/ACCOUNTING/ACCOUNTING_REPORTS/PRACTICE_PROFILE.php';
	self.close();
	}
	//ABOUT
	else if (sessionStorage.good2go == '23'){
	opener.document.location='/'+localStorage.xdatabase+'/UTILITIES/ABOUT.php';
	self.close();
	}
	
}
else if (good2go == '0') {
document.getElementById('enterpswd').style.display='none';
document.getElementById('tryagain').style.display='';
document.getElementById('submit').style.display='none';
document.getElementById('tryagain2').style.display='';
}

var leftpos = opener.window.screenX;
var toppos = opener.window.screenY;
moveTo(leftpos+190,toppos+150);
resizeTo(400,255) ;

document.pass_screen.password.focus();
//
//var browser=navigator.userAgent;
//if (browser.match(/Firefox/i)){
//document.getElementById('reason').cols=45;
//document.getElementById('reason').rows=3;
//}
//else {
//document.getElementById('reason').cols=40;
//document.getElementById('reason').rows=4;
//}							

}

function InputOnBlur(x) 
{
document.getElementById(x).style.background="black";
document.getElementById(x).style.color="white";
}

</script>
<!-- InstanceEndEditable -->



</head>

<body onload="bodyonload();" onunload="bodyonunload()">
<!-- InstanceBeginEditable name="EditRegion3" -->
<form method="post" action="" name="pass_screen" id="pass_screen" style="position:absolute; top:0px; left:0px; background-color:#FFFFFF;">
<table width="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="63" colspan="2">&nbsp;</td>
    </tr>
  <tr id="enterpswd">
    <td width="42" height="101" class="Verdana12">&nbsp;</td>
    <td width="358" valign="top" class="Verdana12">Enter Password 
      <input type="password" name="password" id="password" class="Input" onfocus="InputOnFocus(this.id)" onblur="InputOnBlur(this.id)"/></td>
  </tr>
  <tr id="tryagain" style="display:none;">
    <td height="101" colspan="2" align="center" valign="top" class="Verdana13BRed">You have entered an invalid password.<br />
This transaction will be reported.</td>
    </tr>
  <tr>
    <td colspan="2" align="center" class="ButtonsTable">
    <input name="tryagain2" id="tryagain2" type="button" class="button" value="TRY AGAIN" style="width:85px; display:none;" onclick="document.location='PASS.php'"/>
    <input name="submit" id="submit" type="submit" class="button" value="SUBMIT"/>
    <input name="button" type="button" class="button" value="CANCEL" onclick="self.close();"/>    </td>
  </tr>
</table>
</form>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
