<?php 
$your_email ='dkservice@blueyonder.co.uk';// <<=== update to your email address

session_start();
$errors = '';
$contactname = '';
$femail = '';
$enquiry = '';
$fphone = '';

	  $product = $_POST['product'];
      $appqty = $_POST['appqty'];
      $postcode = $_POST['postcode'];
      $f2email = $_POST['f2email'];
	  $howheard = $_POST['howheard'];
	  $heardother = $_POST['heardother'];
	  
	  $address = $_POST['address'];
      $scity = $_POST['scity'];
      $compname = $_POST['compname'];
      $bustype = $_POST['bustype'];	  
      $sapt = $_POST['sapt'];
      $sstate = $_POST['sstate'];
      $scountry = $_POST['scountry'];
      $fphone2 = $_POST['fphone2'];
      $fphone3 = $_POST['fphone3'];
      
      $secretinfo = $_POST['info'];

if(isset($_POST['submit']))
{
	
	$contactname = $_POST['contactname'];
	$femail = $_POST['femail'];
	$fphone = $_POST['fphone'];
	$enquiry = $_POST['enquiry'];
	///------------Do Validations-------------
	if(empty($contactname)||empty($femail)||empty($fphone))
	{
		$errors .= "\n Contact Name, Email and Phone No: are required fields. ";	
	}
	if(IsInjected($femail))
	{
		$errors .= "\n Bad email value!";
	}
//	if(empty($_SESSION['6_letters_code'] ) ||
//	  strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
//	{
//	//Note: the captcha code is compared case insensitively.
//	//if you want case sensitive match, update the check above to
//	// strcmp()
//		$errors .= "\n The captcha code does not match!";
//	}
    if (!array_key_exists('foobarbaz', $_POST)) {
        $errors .= "\n Please confirm that you are human";
    }
	
	if(empty($errors))
	{
		//send the email
		$to = $your_email;
		$subject="ASN website contact form request";
		$from = "website@asbestossurveyingnationwide.co.uk";
		$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
		
		$body = "A user  $contactname submitted the contact form:\n".
		"Company Name: $compname\n".
	    "Contact Name: $contactname\n".
        "Address: $address\n".
	    "Email: $femail\n".
        "Telephone: $fphone\n".
	    "Enquiry: $enquiry\n".
	    "How They Heard: $howheard\n".
        "Heard Other: $heardother\n".
        "IP: $ip\n";
		
		$headers = "From: $from \r\n";
		$headers .= "Reply-To: $femail \r\n";
		
		$message=mail($to, $subject, $body,$headers);
		header('Location: thanks2.html');
	}
}

// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
/*
switch (@$_GET['do'])
 {

 case "send":
      

    if (!preg_match("/\S+/",$contactname))
    {
      unset($_GET['do']);
      $message = "Contact Name required. Please try again.";
      break;
    }

    if (!preg_match("/\S+/",$fphone))
    {
      unset($_GET['do']);
      $message = "A contact telephone number is required. Please try again.";
      break;
    }

    if (!preg_match("/^\S+@[A-Za-z0-9_.-]+\.[A-Za-z]{2,6}$/",$femail))
    {
      unset($_GET['do']);
      $message = "Please enter a contact email address.";
      break;
    }

	
    if ($secretinfo == "")
    {
       $myemail = "dkservice@blueyonder.co.uk, ddavies@hazard.co.uk";
       $ehead = "From: ".$femail."\r\n";
       $subj = "Asbestos Contact Form from ".$contactname."!";
       $mailsend=mail("$myemail","$subj","$emess","$ehead");
       $message = "Email was sent.";
    }
 
       unset($_GET['do']);
       header("Location: thanks2.html");
     break;
 
 default: break;
 }
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/900px-template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="Asbestos Survey, Asbestos Surveying, Asbestos Report, Asbestos Management Plan, Asbestos Management Report, Asbestos Sample, Asbestos Sampling, Asbestos Quotations, Asbestos Survey Report, Asbestos Type 1 Report, Asbestos Type 2 Report, Asbestos Type 3 Report, Profession asbestos surveying, Qualified asbestos surveyors, Ukas Accredited laboratories, Asbestos survey quick response, Asbestos, surveying nationwide, Asbestos surveying uk, Asbestos health and safety, Asbestos survey is now law, Asbestos Law, Asbestos compliance" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Asbestos Surveys Direct : Contact Form</title>
<meta name="Description" content="Asbestos Surveys - Inspection, Detection and Testing Services with Asbestos Risk Assessment &amp; Management" />
<link href="css/new-globalstyles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.5.2.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/additional-methods.min.js"></script>
 
<style type="text/css">
label {
    float: left;
    padding-right:10px;
}
label.error {
    float: none;
    color: red;
    padding-left: .5em;
    vertical-align: top;
}
p {
    clear: both;
}
.gray {
    /*color: gray;*/
    display: none;
}
#newsletter_topics label.error {
    display: none;
    padding-left: 0px;
}

.botMessage {
    width: 180px;
    position: relative;
    float: right;
    top: 10px;
    font-size: 10px;
    font-family: verdana;
}
.botMessage strong {
    color: #500;
}
.dropper {
    position: relative;
    width: 49px;
    height: 49px;
    top: 34px;
    margin-right: 11px;
    clear: right;
    float: right;
}
.captcha {
    float: left;
    padding-right: 10px;
}
.captcha img {
    background: #fff;
    border: 1px solid #000;
    padding: 1px;
    margin-top: 8px
}
</style>
 
<script type="text/javascript">
$(document).ready(function(){
    // validate signup form on keyup and submit
    $("#mainform").validate({
        rules: {
            Contact_name: "required",
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                phoneUK: true
            },
        },
        messages: {
            Company_name: "Please enter your Company name.",
            Contact_name: "Please enter your name.",
            email: "Please enter a valid email address.",
            phone: "Phone number including the std code.",
            agree: "Please accept our policy."
        }
    });
 
    //code to hide topic selection, disable for demo
    var newsletter = $("#newsletter");
 
    // newsletter topics are optional, hide at first
    var inital = newsletter.is(":checked");
    var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
    var topicInputs = topics.find("input").attr("disabled", !inital);
 
    // show when newsletter is checked
    newsletter.click(function() {
        topics[this.checked ? "removeClass" : "addClass"]("gray");
        topicInputs.attr("disabled", !this.checked);
    });
});
</script>




<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-21557745-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script language="JavaScript" src="scripts/gen_validatorv31.js" type="text/javascript"></script>
</head>

<body topmargin="0" marginheight="0">
<div id="container">
  <div id="masthead">
  <div id="BreakingNews">BREAKING NEWS : SEE WHAT'S NEW - <a href="news.html" target="_blank">click here for details</a></div>
  <div id="LiveChat1">  
</div>

    <div id="navbar"><a href="index.html">Home</a>&nbsp;| <a href="get-a-quote.php">Get a Quote</a> |&nbsp;<strong><a href="faqs.html"><font color="#FFFF00">FAQs</font></a></strong> |&nbsp;<a href="sample-report.html">Your Report</a> | <a href="asbestos-surveys.html">Types of Survey</a> |&nbsp;<a href="useful-links.html">Links</a> |&nbsp;<a href="fire-surveys.html">Fire Surveys </a> | <a href="asbestos-facts.html">Facts</a> | <a href="vacancies.html">Vacancies</a>&nbsp;|&nbsp;<a href="New regulations for asbestos surveys 2010.pdf">Regulations</a> |<a href="contact-form.php"> Contact Us</a></div>
  </div>
  <div id="timebar">
    <script type="text/javascript">
	 document.write(Date()) 
	</script>
    &nbsp;&nbsp;&nbsp;&nbsp;</div>
  <div id="TitleGraphic"><img src="images/title-images/buildings1-blue.gif" alt="Collection of buildings" width="880" height="94" hspace="10" /></div>
  <div class="colOneHeaderThree">&nbsp;&nbsp;CONTACT US</div>
  <div id="TwoColWrapper">
    <div id="TwoColSpanned">
      <p><br />
        Please contact us if you would like further details about our services, to request an information pack, or if you need some advice or help regarding asbestos.<br />
        <br />
      <strong>Our Head Office address:</strong> Calthorpe House | 55-57 Bristol Road | Edgbaston | Birmingham | B5 7TU <br />
      <br />
      <strong>Regional offices: </strong><a href="mailto:aberdeen@asbestossurveyingnationwide.co.uk">Aberdeen</a>, <a href="mailto:belfast@asbestossurveyingnationwide.co.uk">Belfast</a>, <a href="mailto:bristol@asbestossurveyingnationwide.co.uk">Bristol</a>, <a href="mailto:cambridge@asbestossurveyingnationwide.co.uk">Cambridge</a>, <a href="mailto:cardiff@asbestossurveyingnationwide.co.uk">Cardiff</a>, <a href="mailto:cork@asbestossurveyingnationwide.co.uk">Cork</a>, <a href="mailto:derry@asbestossurveyingnationwide.co.uk">Derry</a>,  <a href="mailto:edinburgh@asbestossurveyingnationwide.co.uk">Edinburgh</a>, <a href="mailto:exeter@asbestossurveyingnationwide.co.uk">Exeter</a>, <a href="mailto:glasgow@asbestossurveyingnationwide.co.uk">Glasgow</a>, <a href="mailto:liverpool@asbestossurveyingnationwide.co.uk">Liverpool</a>, <a href="mailto:london@asbestossurveyingnationwide.co.uk">London</a>, <a href="mailto:maidstone@asbestossurveyingnationwide.co.uk">Maidstone</a>, <a href="mailto:manchester@asbestossurveyingnationwide.co.uk">Manchester</a>, <a href="mailto:newcastle@asbestossurveyingnationwide.co.uk">Newcastle  upon Tyne</a>, <a href="mailto:norwich@asbestossurveyingnationwide.co.uk">Norwich</a>, <a href="mailto:nottingham@asbestossurveyingnationwide.co.uk">Nottingham</a>, <a href="mailto:plymouth@asbestossurveyingnationwide.co.uk">Plymouth</a>, <a href="mailto:southampton@asbestossurveyingnationwide.co.uk">Southampton</a>, <a href="mailto:truro@asbestossurveyingnationwide.co.uk">Truro</a> and <a href="mailto:york@asbestossurveyingnationwide.co.uk">York</a>.</p>


	  <form method="POST" name="contact_form" 
action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
<!--      <form action="contact-form.php?do=send" method="post">
-->
<input name="humanclient" id="humanclient" type="hidden" value="" placeholder="you'll see " />
        <table width="800" height="439" border="0" cellpadding="1" cellspacing="0" class="bodytext">
          <tr class="bodytxt1">
            <td colspan="2"><strong class="bodytxtOrange style5">Please provide us with the following details</strong></td>
          </tr>
          <tr class="bodytxt1">
            <td width="116" class="bodytxt1">Company Name:</td>
            <td width="317"><input name="compname" type="text"  size="30" value='<?php echo htmlentities($compname) ?>'></td>
          </tr>

          <tr class="bodytxt1">
            <td class="bodytxt1">*Contact Name:</td>
            <td><input name="contactname" type="text"  size="30" value='<?php echo htmlentities($contactname) ?>'></td>
          </tr>
                  <tr><td class="bodyBoldGreen"></td><td class="bodyBoldGreen">
<?php
if(!empty($errors)){
echo "<p class='err'>".nl2br($errors)."</p>";
}
?>
					</td></tr>
		  
          <tr class="bodytxt1">
            <td class="bodytxt1">Address:</td>
            <td valign="top"><textarea name="address" cols="30" rows="4" value="<?php echo @$address ?>"></textarea></td>
          </tr>
          <tr class="bodytxt1">
            <td class="bodyBoldGreen">*Email:</td>
            <td><input name="femail" type="text" id="femail"  size="30" value='<?php echo htmlentities($femail) ?>'></td>
          </tr>
          <tr class="bodytxt1">
            <td class="bodyBoldGreen">*Phone No: </td>
<!--
            <td><input name="Phone_number" type="text" size="30" /></td>
-->
            <td><input name="fphone" type="text" size="30" value="<?php echo @$fphone ?>"></td>
          </tr>
          <tr class="bodytxt1">
            <td class="bodyBoldGreen">Nature of enquiry:</td>
            <td><textarea name="enquiry" cols="30" rows="4" value="<?php echo @$enquiry ?>" ></textarea></td>
          </tr>
          <tr class="bodytxt1">
            <td class="bodyBoldGreen">How did you hear about us?</td>
            <td><label>
              <select name="howheard" value="<?php echo @$howheard ?>">
                <option value="search engine">Search Engine</option>
                <option value="referral">Referral</option>
                <option value="newsletter">Newsletter</option>
                <option value="other">Other</option>
              </select>
            </label></td>
          </tr>
          <tr class="bodytxt1">
            <td class="bodyBoldGreen">If other, please specify:</td>
            <td><input name="heardother" type="text" size="30" value="<?php echo @$heardother ?>"><br/></td>
          </tr>
                  <tr><td class="bodyBoldGreen">&nbsp;</td><td class="bodyBoldGreen">&nbsp;</td></tr>
		  <tr>
            <td class="bodyBoldGreen">&nbsp;&nbsp;&nbsp;<div></div></td>
		    <td>
            <div id="hoomans"></div>
			</td>
          </tr>
		  		  <tr><td class="bodyBoldGreen">&nbsp;</td><td class="bodyBoldGreen">&nbsp;</td></tr>

          <tr valign="top" class="bodytxt1">
            <td class="bodyBoldGreen">&nbsp;</td>
            <td><input type="submit" name="submit" value="Submit" /></td>
          </tr>
        </table>
        <br />
        <br />
        <input type="hidden" name="hdwemail" id="hdwemail" value="blue.gnu+btinternet.com" />
        <input type="hidden" name="hdwok" id="hdwok" value="http://www.asbestossurveyingnationwide.co.uk/thanks.html" />
        <input type="hidden" name="hdwnook" id="hdwnook" value="http://www.asbestossurveyingnationwide.co.uk" />
      </form>
      </p>
    </div>
    
  </div>
  <!-- InstanceEndEditable -->
  <div id="footer"><a href="index.html">Home</a> &nbsp;|&nbsp;&nbsp;<a href="get-a-quote.php">Get a Quote</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="faqs.html">FAQs</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="sample-report.html">Your Report</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="asbestos-surveys.html">Types of Survey</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="fire-surveys.html">Fire Survey Info</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="asbestos-facts.html">Facts</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="useful-links.html">Useful Links</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="contact-form.php">Contact Us</a> &nbsp;|&nbsp;&nbsp;<a href="sitemap.xml">Site Map</a></div>
  
  <div class="legal">©2014 Asbestos Surveys Nationwide. All rights reserved.</div>
</div>
<script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>

<script language="JavaScript">
// Code for validating the form
// Visit http://www.javascript-coder.com/html-form/javascript-form-validation.phtml
// for details
var frmvalidator  = new Validator("contact_form");
//remove the following two lines if you like error message box popups

//frmvalidator.EnableOnPageErrorDisplaySingleBox();
//frmvalidator.EnableMsgsTogether();

frmvalidator.addValidation("contactname","req","Please provide your name"); 
frmvalidator.addValidation("femail","req","Please provide your email"); 
frmvalidator.addValidation("femail","email","Please enter a valid email address");
frmvalidator.addValidation("fphone","req","Please enter a valid contact telephone number");
frmvalidator.addValidation("humanclient","req","Please confirm that you are human using the tool on the page");
//frmvalidator.addValidation("6_letters_code","req","Please enter the captcha code");
</script>
        <script type="text/javascript" src="scripts/mootools-core-1.4.5-full-compat.js"></script>
        <script type="text/javascript" src="scripts/mootools-more-1.4.0.1.js"></script>
        <script type="text/javascript" src="scripts/hoomantestclass.js"></script>
        <script type="text/javascript" src="scripts/hoomantest.js"></script>

</body>
<!-- InstanceEnd --></html>
