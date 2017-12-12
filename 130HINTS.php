<?php 
session_start();
require_once('../tryconnection.php'); 
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/POP UP WINDOWS TEMPLATE.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>HINTS</title>
<!-- InstanceEndEditable -->

<link rel="stylesheet" type="text/css" href="../ASSETS/styles.css" />
<script type="text/javascript" src="../ASSETS/scripts.js"></script>
<script type="text/javascript" src="../ASSETS/navigation.js"></script>

<!-- InstanceBeginEditable name="head" -->

<script type="text/javascript">
//window.moveBy(70,30);

function bodyonload(){
var leftpos = opener.window.screenX;
var toppos = opener.window.screenY;
moveTo(leftpos+80,toppos+0);
document.getElementById('textfield').focus();
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


</script>
<!-- InstanceEndEditable -->



</head>

<body onload="bodyonload();" onunload="bodyonunload()">
<!-- InstanceBeginEditable name="EditRegion3" -->
<form method="post" action="" name="patientdetail" id="patientdetail" style="position:absolute; top:0px; left:0px; background-color:#FFFFFF;">
<div style="height:700px; width:620px; overflow:auto;">
  <table width="600" border="0" cellpadding="0" cellspacing="0">
    
    <tr>
      <td width="50" height="0"></td>
      <td></td>
      <td width="35"></td>
    </tr>
    <tr>
      <td height="25" colspan="3" align="center" class="Verdana13BBlue">***** DO's *****</td>
    </tr>
    <tr>
      <td width="50" align="right" valign="top" class="Georgia14BBlue">!&nbsp;</td>
      <td class="Verdana12">Please make sure to <strong>exit a client's or patient's file</strong> as soon as you are finished with your work to avoid loss of data.<span class="Verdana11Grey"><br />
        (If you leave it idling, you may lose some data or block other users from working with the file.)</span><br />
        <br /></td>
      <td class="Verdana12">&nbsp;</td>
    </tr>
    <tr>
      <td width="50" align="right" valign="top" class="Georgia14BBlue">!&nbsp;</td>
      <td class="Verdana12">Use the <strong>CANCEL</strong> buttons to go back or HOME (DVM in top left corner) to return to the front screen.<br />
        <span class="Verdana11Grey">(The cancels are mostly set up to take you one step back. In certain cases, they will bring you to the FAMILY screen or PROCESSING menu - with time, you will figure it out ;) )<br />
        <br />
        </span></td>
      <td class="Verdana12">&nbsp;</td>
    </tr>
    <tr>
      <td width="50" align="right" valign="top" class="Georgia14BBlue">!&nbsp;</td>
      <td class="Verdana12">If the program gives you a <strong>warning</strong>, please read it and make sure you are certain that you want to continue.<br />
          <span class="Verdana11Grey">(Most DELETEs will update the database without an option to revert your changes.</span><span class="Verdana11Grey">)</span>  <br />
          <br /></td>
      <td class="Verdana12">&nbsp;</td>
    </tr>
    <tr>
      <td width="50" align="right" valign="top" class="Georgia14BBlue">!&nbsp;</td>
      <td class="Verdana12">Think before you use the <strong>CANCEL ENTIRE INVOICE button in INVOICING</strong>.<br />
        <span class="Verdana11Grey">(This button will delete the invoice without an option to retrieve it and also sign a patient out from the RECEPTION SCREEN</span><span class="Verdana11Grey">)<br />
        <br />
        </span></td>
      <td class="Verdana12">&nbsp;</td>
    </tr>
    <tr>
      <td height="28" colspan="3" align="center" class="Verdana13BRed">**** DON'Ts ****</td>
    </tr>
    <tr>
      <td width="50" align="right" valign="top" class="Georgia14BRed">!&nbsp;</td>
      <td class="Verdana12">Do not use the '<strong>Back' &amp; 'Forward</strong>' buttons in the browser like you are used to from browsing the Internet to avoid miscommunication with the database.<br />        
        <span class="Verdana11Grey">(The program needs to communicate with the database via forms that do not react on Back and Forward button. By using these buttons, the program does not communicate with the database correctly.)<br />
        <br />
        </span></td>
      <td width="35" class="Verdana12">&nbsp;</td>
    </tr>
    <tr>
      <td width="50" align="right" valign="top" class="Georgia14BRed">!&nbsp;</td>
      <td class="Verdana12">Do not use the '<strong>Red Close</strong>' button in the browser like you are used to from browsing the Internet to avoid losing your data.<br />
        <span class="Verdana11Grey">(If you do that, anything that you are currently working on will not be saved.)<br />
        <br />
      </span></td>
      <td class="Verdana12">&nbsp;</td>
    </tr>
    <tr>
      <td width="50" align="right" valign="top" class="Georgia14BRed">!&nbsp;</td>
      <td class="Verdana12">Do not open a <strong>new window</strong>  like you are used to from browsing the Internet unless the program does it for you to avoid losing your data.<br />
        <span class="Verdana11Grey">(The program uses so called sessions to identify and whatever you are doing to a client or patient. By opening new window you are risking overwriting or destroying the sessions.)</span></td>
      <td class="Verdana12">&nbsp;</td>
    </tr>
 	<tr>
       <td height="28" colspan="3" align="center" class="Verdana13B">***** TIPS &amp; HINTS *****</td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Verdana13B">&bull;&nbsp;&nbsp;</td>
      <td class="Verdana12">The <strong>TAB</strong> key on your keyboard will move your cursor to the next input field<br />
        <strong>SHIFT + TAB </strong>keys will move your cursor back to the previous input field<br />
        <span class="Verdana11Grey">(The Cursor is your mouse pointer &bull; The Input field is the black  (or blue) box that will highlight green (or shows a blueish frame around it) when you place the cursor into it</span><span class="Verdana11Grey">   &bull; To create a combination of keys, press and hold the first one, then press the second one while holding the first one)<br />
        </span></td>
      <td class="Verdana12">&nbsp;</td>
    </tr>
    <tr>
      <td height="52" align="right" valign="top" class="Verdana11"></td>
      <td align="center" valign="middle" class="Verdana11">
        <label><span class="Verdana11Blue">Try me:</span>&nbsp;&nbsp;
        <input name="textfield" type="text" class="Input" id="textfield" size="10" maxlength="10" onfocus="InputOnFocus(this.id)" onblur="InputOnBlur(this.id)"/>
         </label>
         <input name="textfield2" type="text" class="Input" id="textfield2" size="10" maxlength="10" onfocus="InputOnFocus(this.id)" onblur="InputOnBlur(this.id)"/>
        <textarea name="textfield3" cols="10" rows="2" class="commentarea" id="textfield3" style="margin-bottom:-15px;"></textarea>      </td>
      <td class="Verdana12">&nbsp;</td>
    </tr>
    <tr>
      <td height="52" align="right" valign="top" class="Verdana11"><span class="Verdana13B">&bull;&nbsp;&nbsp;</span></td>
      <td align="left" valign="top" class="Verdana12">Other handy key combinations:<br />
        <br />
        <strong>COMMAND + F</strong> - This will show a tab on the top of the screen, where you can enter a word to <strong>search</strong> for on that particular screen and see how it highlights.<br />
        <br />
        <strong>COMMAND + A</strong> - If you use this combination on a paragraph or in a black or blue box, the program will <strong>select  the entire text</strong>. Then you can either copy and paste the selected text somewhere else or you can start typing to enter new information.<br />
        <br />
        <strong>COMMAND + C</strong> - This will <strong>copy</strong> a selected text into clipboard <br />
        <span class="Verdana11Grey">(Clipboard is an invisible place in the computer where the copied text is stored.)</span><br />
        <br />
        <strong>COMMAND + V</strong> - This will <strong>paste</strong> a copied text into a black or blue box.<br />
        <br /></td>
      <td class="Verdana12">&nbsp;</td>
    </tr>
    <tr>
      <td height="52" align="right" valign="top" class="Verdana11">&nbsp;</td>
      <td align="center" valign="middle" class="Verdana11"><span class="Verdana11Blue">Try me:</span> Type something into the blue box  and <br />
        use the key combinations on the black one.<br />
          <br /></td>
      <td class="Verdana12">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Verdana13B">&bull;&nbsp;&nbsp;</td>
      <td class="Verdana12">If you are not sure what an element on the screen means, try putting your mouse over it and wait about 2 seconds for a so called <strong>'TOOLTIP'</strong> to show up with a description or explanation.<br />
        <span class="Verdana11Grey">(Element is anything on the screen - heading, text, button, box, picture etc...</span><span class="Verdana11Grey"> &bull; Tooltip is the tiny little yellow box that will show up just at your mouse)<br />
        <br />
        </span></td>
      <td class="Verdana12">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Verdana11"></td>
      <td align="center" valign="middle" class="Verdana11"><span class="Verdana11Blue">Try me:</span>&nbsp;&nbsp;&nbsp;&nbsp;Place your mouse <span class="Verdana11BBlue" title="This is a tooltip">here</span> and wait :)<br />
        <br /></td>
      <td class="Verdana12">&nbsp;</td>
      </tr>
    <tr>
      <td align="right" valign="top" class="Verdana13B">&bull;&nbsp;&nbsp;</td>
      <td class="Verdana12">What are the "e", "v" and "h" bubbles?<br  />      </td>
      <td class="Verdana12">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" valign="top" class="Verdana13B">&nbsp;&nbsp;</td>
      <td class="Verdana12">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../IMAGES/e3 copy.jpg" alt="e" id="e" width="30" height="30" style="margin-bottom:-10px;"/><span> -  will take you to Edit screen where you can modify the record</span><br  />
        <br  />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../IMAGES/v copy.jpg" alt="v" id="v" width="30" height="30" style="margin-bottom:-10px;"/><span> -  will open View pop up window to show you more details</span><br  />
        <br  />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../IMAGES/h copy.jpg" alt="h" id="h" width="30" height="30" style="margin-bottom:-10px;"/><span> -  will take you to Medical History to review patient's record<br />
        <br />
        </span></td>
      <td class="Verdana12">&nbsp;</td>
    </tr>
    <tr align="center" class="Verdana13B">
      <td colspan="3" class="hidden">INVOICING </td>
    </tr>
    <tr>
      <td colspan="3" class="hidden">-cancels, reserving, split payments, locking files, editing description or units, invoicing another patient, writing comments</td>
    </tr>
    <tr>
      <td class="hidden">&nbsp;</td>
      <td class="hidden">&nbsp;</td>
      <td class="hidden">&nbsp;</td>
    </tr>
    <tr align="center" class="Verdana13B">
      <td colspan="3" class="hidden">HISTORY</td>
    </tr>
    <tr>
      <td colspan="3" class="hidden">-headings, filters, filtering</td>
    </tr>
    <tr>
      <td class="hidden">&nbsp;</td>
      <td class="hidden">&nbsp;</td>
      <td class="hidden">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" class="hidden">&nbsp;</td>
    </tr>
    <tr align="center" class="Verdana13B">
      <td colspan="3" class="hidden">CLIENT/PATIENT MAINTENANCE</td>
    </tr>
    <tr>
      <td colspan="3" class="hidden">-insert new patient, new client (comments, sticky notes, emails, second index, second address, referrals, view patient, patient id, )</td>
    </tr>
    <tr>
      <td colspan="3" class="hidden">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" class="hidden">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" class="hidden">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" class="hidden">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">
        <!-- BUTTONS -->
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="30" align="center" bgcolor="#B1B4FF" style="display:">
            <input name="ok" type="button" class="button" id="ok" value="CLOSE" onclick="self.close()" />              &nbsp;&nbsp;&nbsp;</td>
          </tr>
          </table>        </td>
      </tr>
  </table>
</div>
</form>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
