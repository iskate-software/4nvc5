<?php 
session_start();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/DVMBasicTemplate.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>SYSTEM DEFAULTS</title>
<!-- InstanceEndEditable -->

<link rel="stylesheet" type="text/css" href="../ASSETS/styles.css" />
<script type="text/javascript" src="../ASSETS/scripts.js"></script>

<!-- InstanceBeginEditable name="head" -->
<script type="text/javascript">

function bodyonload(){
	if (sessionStorage.filetype!='0'){
	document.getElementById('inuse').innerText=sessionStorage.fileused;
	}
	else {
	document.getElementById('inuse').innerHTML="&nbsp;";
	}
}

function bgp(){
history.back();
}

</script>

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
<div id="inuse" title="File in memory"><!-- InstanceBeginEditable name="fileinuse" --><?php // if (empty($_SESSION['fileused'])){echo"&nbsp;"; } else {echo substr($_SESSION['fileused'],0,25);}  ?>
<!-- InstanceEndEditable --></div>



<div id="WindowBody">
<!-- InstanceBeginEditable name="DVMBasicTemplate" -->
<form id="form1" name="form1" method="post" action="">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="518" valign="top">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="hidden">
      <tr>
        <td height="51" colspan="6" align="center" class="Verdana12B">Please select the background picture for the HOME page</td>
        </tr>
      <tr>
        <td width="60" height="25" class="Verdana11">&nbsp;</td>
        <td width="153" height="25" class="Verdana11"><label>
          <input type="radio" name="bground" id="radio" value="citruses" onchange="localStorage.setItem('bgp','citruses');" />Citruses
        </label></td>
        <td width="60" height="25" class="Verdana11">&nbsp;</td>
        <td width="125" height="25" class="Verdana11"><label>
        <input type="radio" name="bground" id="radio6" value="flowers2" onchange="localStorage.setItem('bgp','flowers2');" />
        Flowers2 </label></td>
        <td width="60" height="25" class="Verdana11">&nbsp;</td>
        <td width="118" height="25" class="Verdana11"><label>
        <input type="radio" name="bground" id="radio11" value="hair" onchange="localStorage.setItem('bgp','hair');" />
        Hair </label></td>
      </tr>
      <tr>
        <td width="60" height="25" class="Verdana11">&nbsp;</td>
        <td height="25" class="Verdana11"><label>
        <input type="radio" name="bground" id="radio2" value="leaf" onchange="localStorage.setItem('bgp','leaf');" />
        Leaf </label></td>
        <td width="60" height="25" class="Verdana11">&nbsp;</td>
        <td height="25" class="Verdana11"><label>
        <input type="radio" name="bground" id="radio7" value="flowers3" onchange="localStorage.setItem('bgp','flowers3');" />
        Flowers3 </label></td>
        <td width="60" height="25" class="Verdana11">&nbsp;</td>
        <td height="25" class="Verdana11"><label>
        <input type="radio" name="bground" id="radio12" value="zest" onchange="localStorage.setItem('bgp','zest');" />
        Zest </label></td>
      </tr>
      <tr>
        <td width="60" height="25" class="Verdana11">&nbsp;</td>
        <td height="25" class="Verdana11"><label>
        <input type="radio" name="bground" id="radio3" value="ravine" onchange="localStorage.setItem('bgp','ravine');" />
        Ravine
        </label></td>
        <td width="60" height="25" class="Verdana11">&nbsp;</td>
        <td height="25" class="Verdana11"><label>
        <input type="radio" name="bground" id="radio8" value="tree" onchange="localStorage.setItem('bgp','tree');" />
        Tree
        </label></td>
        <td width="60" height="25" class="Verdana11">&nbsp;</td>
        <td height="25" class="Verdana11"><label>
        <input type="radio" name="bground" id="radio13" value="colour" onchange="localStorage.setItem('bgp','colour');" />
        Colour
        </label></td>
      </tr>
      <tr>
        <td width="60" height="25" class="Verdana11">&nbsp;</td>
        <td height="25" class="Verdana11"><label>
        <input type="radio" name="bground" id="radio4" value="flowers1" onchange="localStorage.setItem('bgp','flowers1');" />
        Flowers1 </label></td>
        <td width="60" height="25" class="Verdana11">&nbsp;</td>
        <td height="25" class="Verdana11"><label>
        <input type="radio" name="bground" id="radio9" value="grey" onchange="localStorage.setItem('bgp','grey');" />
        Grey </label></td>
        <td width="60" height="25" class="Verdana11">&nbsp;</td>
        <td height="25" class="Verdana11"><label>
        <input type="radio" name="bground" id="radio14" value="" onchange="localStorage.setItem('bgp','citruses');" />
        Citruses </label></td>
      </tr>
      <tr>
        <td width="60" height="25" class="Verdana11">&nbsp;</td>
        <td height="25" class="Verdana11"><label>
        <input type="radio" name="bground" id="radio5" value="bubbles" onchange="localStorage.setItem('bgp','bubbles');" />
        Bubbles </label></td>
        <td width="60" height="25" class="Verdana11">&nbsp;</td>
        <td height="25" class="Verdana11"><label>
        <input type="radio" name="bground" id="radio10" value="fogg" onchange="localStorage.setItem('bgp','fogg');" />
        Fogg
        </label></td>
        <td width="60" height="25" class="Verdana11">&nbsp;</td>
        <td height="25" class="Verdana11"><label>
        <input type="radio" name="bground" id="radio15" value="" onchange="localStorage.setItem('bgp','citruses');" />
        Citruses </label></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="middle" class="ButtonsTable">
    <input name="save" type="button" class="button" id="save" value="SAVE" onclick="bgp()" />
    <input name="cancel" type="reset" class="button" id="cancel" value="CANCEL" onclick="history.back();" /></td>
  </tr>
</table>
</form>
<!-- InstanceEndEditable --></div>
</body>
<!-- InstanceEnd --></html>
