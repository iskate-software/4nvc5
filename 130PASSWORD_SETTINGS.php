<?php
session_start();
require_once('../tryconnection.php'); 

mysqli_select_db($tryconnection, $database_tryconnection);
$query_SESME = "SELECT PASSWORD, SESME, PASSWORD2, SESME2 FROM SESME LIMIT 1";
$SESME = mysqli_query($tryconnection, $query_SESME) or die(mysqli_error($mysqli_link));
$row_SESME = mysqli_fetch_assoc($SESME);

//SESME = LEVEL 1
//SESME2 = LEVEL 2

if (isset($_POST['save'])){
$sesme1=($_POST['sesme1']=='H') ? "Y" : "N";
$sesme2=($_POST['sesme2']=='H') ? "Y" : "N";
$sesme3=($_POST['sesme3']=='H') ? "Y" : "N";
$sesme4=($_POST['sesme4']=='H') ? "Y" : "N";
$sesme5=($_POST['sesme5']=='H') ? "Y" : "N";
$sesme6=($_POST['sesme6']=='H') ? "Y" : "N";
$sesme7=($_POST['sesme7']=='H') ? "Y" : "N";
$sesme8=($_POST['sesme8']=='H') ? "Y" : "N";
$sesme9=($_POST['sesme9']=='H') ? "Y" : "N";
$sesme10=($_POST['sesme10']=='H') ? "Y" : "N";
$sesme11=($_POST['sesme11']=='H') ? "Y" : "N";
$sesme12=($_POST['sesme12']=='H') ? "Y" : "N";
$sesme13=($_POST['sesme13']=='H') ? "Y" : "N";
$sesme14=($_POST['sesme14']=='H') ? "Y" : "N";
$sesme15=($_POST['sesme15']=='H') ? "Y" : "N";
$sesme16=($_POST['sesme16']=='H') ? "Y" : "N";
$sesme17=($_POST['sesme17']=='H') ? "Y" : "N";
$sesme18=($_POST['sesme18']=='H') ? "Y" : "N";
$sesme19=($_POST['sesme19']=='H') ? "Y" : "N";
$sesme20=($_POST['sesme20']=='H') ? "Y" : "N";
$sesme21=($_POST['sesme21']=='H') ? "Y" : "N";
$sesme22=($_POST['sesme22']=='H') ? "Y" : "N";
$sesme23=($_POST['sesme23']=='H') ? "Y" : "N";

$xsesme=$sesme1.$sesme2.$sesme3.$sesme4.$sesme5.$sesme6.$sesme7.$sesme8.$sesme9.$sesme10.$sesme11.$sesme12.$sesme13.$sesme14.$sesme15.$sesme16.$sesme17.$sesme18.$sesme19.$sesme20.$sesme21.$sesme22.$sesme23;

$sesme1=($_POST['sesme1']=='L') ? "Y" : "N";
$sesme2=($_POST['sesme2']=='L') ? "Y" : "N";
$sesme3=($_POST['sesme3']=='L') ? "Y" : "N";
$sesme4=($_POST['sesme4']=='L') ? "Y" : "N";
$sesme5=($_POST['sesme5']=='L') ? "Y" : "N";
$sesme6=($_POST['sesme6']=='L') ? "Y" : "N";
$sesme7=($_POST['sesme7']=='L') ? "Y" : "N";
$sesme8=($_POST['sesme8']=='L') ? "Y" : "N";
$sesme9=($_POST['sesme9']=='L') ? "Y" : "N";
$sesme10=($_POST['sesme10']=='L') ? "Y" : "N";
$sesme11=($_POST['sesme11']=='L') ? "Y" : "N";
$sesme12=($_POST['sesme12']=='L') ? "Y" : "N";
$sesme13=($_POST['sesme13']=='L') ? "Y" : "N";
$sesme14=($_POST['sesme14']=='L') ? "Y" : "N";
$sesme15=($_POST['sesme15']=='L') ? "Y" : "N";
$sesme16=($_POST['sesme16']=='L') ? "Y" : "N";
$sesme17=($_POST['sesme17']=='L') ? "Y" : "N";
$sesme18=($_POST['sesme18']=='L') ? "Y" : "N";
$sesme19=($_POST['sesme19']=='L') ? "Y" : "N";
$sesme20=($_POST['sesme20']=='L') ? "Y" : "N";
$sesme21=($_POST['sesme21']=='L') ? "Y" : "N";
$sesme22=($_POST['sesme22']=='L') ? "Y" : "N";
$sesme23=($_POST['sesme23']=='L') ? "Y" : "N";

$xsesme2=$sesme1.$sesme2.$sesme3.$sesme4.$sesme5.$sesme6.$sesme7.$sesme8.$sesme9.$sesme10.$sesme11.$sesme12.$sesme13.$sesme14.$sesme15.$sesme16.$sesme17.$sesme18.$sesme19.$sesme20.$sesme21.$sesme22.$sesme23;

$updateSQL = "UPDATE SESME SET SESME='$xsesme', SESME2='$xsesme2', PASSWORD='$_POST[password]', PASSWORD2='$_POST[password2]' LIMIT 1";
$Result1 = mysqli_query($tryconnection, $updateSQL) or die(mysqli_error($mysqli_link));

$close=1;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/POP UP WINDOWS TEMPLATE.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>PASSWORD SETTINGS</title>
<!-- InstanceEndEditable -->

<link rel="stylesheet" type="text/css" href="../ASSETS/styles.css" />
<script type="text/javascript" src="../ASSETS/scripts.js"></script>
<script type="text/javascript" src="../ASSETS/navigation.js"></script>

<!-- InstanceBeginEditable name="head" -->

<script type="text/javascript">

function bodyonload()
{
<?php
if ($close==1){
echo "localStorage.setItem('sesme','".$sesme."');";
echo "self.close();";
}
?>

var leftpos = opener.window.screenX;
var toppos = opener.window.screenY;
moveTo(leftpos+70,toppos+20);

document.pass_set.password.focus();

//for (i=0;i<=10;i++)
//	{
//	if (localStorage.sesme.substr(i,1)=="Y"){
//	document.getElementById(i).checked="checked";}
//	}
}

function OnClose()
{
self.close();
}

function bodyonunload()
{
opener.document.location.reload();
}


function checkpasswords()
{
valid = true;

	if (document.pass_set.password.value!==document.pass_set.password11.value){
		alert ('The doublecheck on HIGH level password does not match.');
		valid = false;
	}
	else if (document.pass_set.password2.value!==document.pass_set.password22.value){
		alert ('The doublecheck on LOW level password does not match.');
		valid = false;
	}
return valid;
}

function InputOnBlur(x) 
{
document.getElementById(x).style.background="black";
document.getElementById(x).style.color="white";
}


</script>

<style type="text/css">
.table {
	border-color: #CCCCCC;
	border-collapse: separate;
	border-spacing: 1px;
}
</style>

<!-- InstanceEndEditable -->



</head>

<body onload="bodyonload()" onunload="bodyonunload()">
<!-- InstanceBeginEditable name="EditRegion3" -->
<form method="post" action="" name="pass_set" id="pass_set" style="position:absolute; top:0px; left:0px;" onsubmit="return checkpasswords();">
<table width="700" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
  <tr>
    <td height="50" align="center" class="Verdana13B">Please select the program(s) to protect by password</td>
  </tr>
  <tr>
    <td height="140" align="center" valign="top">
    <table width="90%" border="1" cellspacing="0" cellpadding="0" class="table">
      <tr>
        <td align="center">
        <table width="" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="40" align="center" class="Verdana11BPink">High</td>
            <td width="40" align="center" class="Verdana11BBlue">Low</td>
            <td width="40" align="center" class="Verdana11B">None</td>
            <td height="25" class="Verdana12">&nbsp;</td>
            <td width="40" align="center" class="Verdana11BPink">High</td>
            <td width="40" align="center" class="Verdana11BBlue">Low</td>
            <td width="40" align="center" class="Verdana11B">None</td>
            <td height="25" class="Verdana12">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" class="Verdana11"><input name="sesme1" type="radio" id="22" value="H" <?php if (substr($row_SESME['SESME'],0,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme1" id="23" value="L" <?php if (substr($row_SESME['SESME2'],0,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme1" id="2" value="N" onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td width="200" height="25" class="Verdana12"> Utilities</td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme11" id="2229" value="H" <?php if (substr($row_SESME['SESME'],10,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme11" id="2231" value="L" <?php if (substr($row_SESME['SESME2'],10,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme11" id="2230" value="N" onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td width="200" height="25" class="Verdana12"><label>
            Client Ledger Listing</label></td>
          </tr>
          <tr>
            <td align="center" class="Verdana11"><input type="radio" name="sesme2" id="222" value="H" <?php if (substr($row_SESME['SESME'],1,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme2" id="223" value="L" <?php if (substr($row_SESME['SESME2'],1,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme2" id="224" value="N" onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td height="25" class="Verdana12"><label>
 Cancel Invoices </label></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme12" id="2232" value="H" <?php if (substr($row_SESME['SESME'],11,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme12" id="2233" value="L" <?php if (substr($row_SESME['SESME2'],11,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme12" id="2234" value="N" onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td height="25" class="Verdana12"><label>
              Accounts Receivable Reports
            </label></td>
          </tr>
          <tr>
            <td align="center" class="Verdana11"><input type="radio" name="sesme3" id="225" value="H" <?php if (substr($row_SESME['SESME'],2,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme3" id="226" value="L" <?php if (substr($row_SESME['SESME2'],2,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme3" id="227" value="N" onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td height="25" class="Verdana12"><label>
 Treatment Fee File</label></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme13" id="2235" value="H" <?php if (substr($row_SESME['SESME'],12,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme13" id="2236" value="L" <?php if (substr($row_SESME['SESME2'],12,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme13" id="2237" value="N" onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td height="25" class="Verdana12"><label>
              Client Ranking by Expenditures
            </label></td>
          </tr>
          <tr>
            <td align="center" class="Verdana11"><input type="radio" name="sesme4" id="228" value="H" <?php if (substr($row_SESME['SESME'],3,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme4" id="2210" value="L" <?php if (substr($row_SESME['SESME2'],3,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme4" id="229" value="N" onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td height="25" class="Verdana12"><label>
              Procedure Invoicing File
</label></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme14" id="2238" value="H" <?php if (substr($row_SESME['SESME'],13,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme14" id="2239" value="L" <?php if (substr($row_SESME['SESME2'],13,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme14" id="2240" value="N" onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td height="25" class="Verdana12"><label>
              Revenue Breakdown Analysis
            </label></td>
          </tr>
          <tr>
            <td align="center" class="Verdana11"><input type="radio" name="sesme5" id="2212" value="H" <?php if (substr($row_SESME['SESME'],4,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme5" id="2213" value="L" <?php if (substr($row_SESME['SESME2'],4,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme5" id="2211" value="N" onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td height="25" class="Verdana12"><label>
            Invoice Register</label></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme15" id="2241" value="H" <?php if (substr($row_SESME['SESME'],14,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme15" id="2242" value="L" <?php if (substr($row_SESME['SESME2'],14,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme15" id="2243" value="N" onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td height="25" class="Verdana12"><label>
              Tax Reports
            </label></td>
          </tr>
          <tr>
            <td align="center" class="Verdana11"><input type="radio" name="sesme6" id="2214" value="H" <?php if (substr($row_SESME['SESME'],5,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme6" id="2215" value="L" <?php if (substr($row_SESME['SESME2'],5,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme6" id="2216" value="N" onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td height="25" class="Verdana12"><label>
            Cash Receipts Register
            </label></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme16" id="2244" value="H" <?php if (substr($row_SESME['SESME'],15,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme16" id="2245" value="L" <?php if (substr($row_SESME['SESME2'],15,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme16" id="2246" value="N" onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td height="25" class="Verdana12">              Business Status Report</td>
          </tr>
          <tr>
            <td align="center" class="Verdana11"><input type="radio" name="sesme7" id="2217" value="H" <?php if (substr($row_SESME['SESME'],6,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme7" id="2218" value="L" <?php if (substr($row_SESME['SESME2'],6,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme7" id="2219" value="N" onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td height="25" class="Verdana12">              Activity Register</td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme17" id="2247" value="H" <?php if (substr($row_SESME['SESME'],16,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme17" id="2248" value="L" <?php if (substr($row_SESME['SESME2'],16,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme17" id="2249" value="N" onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td height="25" class="Verdana12">              Hospital Statistics</td>
          </tr>
          <tr>
            <td align="center" class="Verdana11"><input type="radio" name="sesme8" id="2220" value="H" <?php if (substr($row_SESME['SESME'],7,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme8" id="2221" value="L" <?php if (substr($row_SESME['SESME2'],7,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme8" id="2222" value="N" onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td height="25" class="Verdana12">              Search Invoice Line Items</td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme18" id="2250" value="H" <?php if (substr($row_SESME['SESME'],17,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme18" id="2251" value="L" <?php if (substr($row_SESME['SESME2'],17,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme18" id="2252" value="N" onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td height="25" class="Verdana12"> Month End Closing </td>
          </tr>
          <tr>
            <td align="center" class="Verdana11"><input type="radio" name="sesme9" id="2223" value="H" <?php if (substr($row_SESME['SESME'],8,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme9" id="2224" value="L" <?php if (substr($row_SESME['SESME2'],8,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme9" id="2225" value="N" onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td height="25" class="Verdana12"> Bank Reconcilliation</td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme19" id="2253" value="H" <?php if (substr($row_SESME['SESME'],18,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme19" id="2254" value="L" <?php if (substr($row_SESME['SESME2'],18,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme19" id="2255" value="N" onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <!--not set up yet!!!-->
            <td height="25" class="Verdana12">Referring Clinics and Doctors</td>
          </tr>
          <tr>
            <td align="center" class="Verdana11"><input type="radio" name="sesme10" id="2226" value="H" <?php if (substr($row_SESME['SESME'],9,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme10" id="2227" value="L" <?php if (substr($row_SESME['SESME2'],9,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme10" id="2228" value="N" onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td height="25" class="Verdana12"> Bank Deposit</td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme20" id="2256" value="H" <?php if (substr($row_SESME['SESME'],19,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme20" id="2257" value="L" <?php if (substr($row_SESME['SESME2'],19,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme20" id="2258" value="N" onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td height="25" class="Verdana12">Inventory Ordering</td>
          </tr>
          <tr>
            <td align="center" class="Verdana11"><input type="radio" name="sesme21" id="2226" value="H" <?php if (substr($row_SESME['SESME'],20,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme21" id="2227" value="L" <?php if (substr($row_SESME['SESME2'],20,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme21" id="2228" value="N" onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td height="25" class="Verdana12"> About DVM</td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme22" id="2256" value="H" <?php if (substr($row_SESME['SESME'],21,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme22" id="2257" value="L" <?php if (substr($row_SESME['SESME2'],21,1) == 'Y') {echo "checked";} ?> onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td align="center" class="Verdana11"><input type="radio" name="sesme22" id="2258" value="N" onmouseover="document.getElementById(this.id).style.cursor='pointer'"/></td>
            <td height="25" class="Verdana12"> Inventory Markups</td>
          </tr>
          <tr>
            <td height="5"></td>
            <td height="5"></td>
            <td height="5"></td>
            <td height="5"></td>
            <td height="5"></td>
            <td height="5"></td>
            <td height="5"></td>
            <td height="5"></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="50" align="center" class="Verdana13B">Reset Password</td>
  </tr>
  <tr>
    <td height="119" align="center" valign="top"><table width="90%" border="1" cellspacing="0" cellpadding="0" class="table">
      <tr>
        <td width="50%" height="100" align="right" class="Verdana12">
        <span class="Verdana12BPink">High</span> Level Password
          <input type="password" name="password" id="password" class="Input" onfocus="InputOnFocus(this.id)" onblur="InputOnBlur(this.id)"value="<?php echo $row_SESME['PASSWORD']; ?>" />&nbsp;&nbsp;&nbsp;<br />
          Doublecheck
          <input type="password" name="password11" id="password11" class="Input" onfocus="InputOnFocus(this.id)" onblur="InputOnBlur(this.id)"value="<?php echo $row_SESME['PASSWORD']; ?>" />&nbsp;&nbsp;&nbsp;
          </td>
        <td width="50%" align="right" class="Verdana12"><span class="Verdana12BBlue">Low</span>&nbsp;Level Password
          <input type="password" name="password2" id="password2" class="Input" onfocus="InputOnFocus(this.id)" onblur="InputOnBlur(this.id)"value="<?php echo $row_SESME['PASSWORD2']; ?>" />&nbsp;&nbsp;&nbsp;<br />
          Doublecheck
          <input type="password" name="password22" id="password22" class="Input" onfocus="InputOnFocus(this.id)" onblur="InputOnBlur(this.id)"value="<?php echo $row_SESME['PASSWORD2']; ?>" />&nbsp;&nbsp;&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="20" align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" class="ButtonsTable">
    <input name="save" type="submit" class="button" id="button" value="SAVE" />
    <input name="cancel" type="reset" class="button" id="button2" value="CANCEL" onclick="self.close();" /></td>
  </tr>
</table>

</form>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
