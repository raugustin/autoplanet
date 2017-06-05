<?php
// Generate html for buy car form
// Usage: create_buycarview()
function create_buycarpage($array,$buycarformstatus,$Index,$warning) {
echo "
<!-- Container for buy car form -->
<div class='left'>
<form name='form' action='/buycar' method='post'>
<input type='hidden' name='item' value='$Index'>
<br><br><br>
<fieldset>
<legend>Please enter your details below to contact the seller</legend>
<br>
<label class='field' for 'Name'>Name:</label>
<input type='text' required placeholder='Enter first and last name' name='Buyername' class='textbox-menu'  required>
<br><br>
<label class='field' for 'Email'>Email:</label>
<input type='email' required placeholder='Enter a valid email address' name='Buyeremail' class='textbox-menu' required>
<br><br>
<label class='field' for 'Buyermessage'>Include a message:</label><br>
<textarea name='Buyermessage' cols='46' rows='6' placeholder='Max: 200 characters' maxlength='200'></textarea>
<br><br>
<p><img src='/images/captcha.php' width='120' height='30' border='1' alt='CAPTCHA'></p>
<small>Copy the digits from above image into the box:</small></p>
<p><input type='text' size='6' maxlength='5' name='captcha' value=''><br>
</fieldset>
<br><br>
<input value='Email Seller' type='submit'><br>
<br>
</form>
</div>
<!-- Container for car details -->
<div class='right'>
<br><br><br>";
if (($buycarformstatus==0) AND ($warning=="")) {
echo "<fieldset><legend>";
echo "Enquiry For:  ";
echo $array['Make'],'&nbsp;',$array['Model'],'&nbsp;',$array['BodyType'];
echo "</legend><ul id='results'>";
echo '
<li>' , $array['Color'] , '</li><li>&#124;</li>
<li>' , $array['Year'] , '</li><li>&#124;</li>
<li>' , $array['Fuel'] , '</li><li>&#124;</li>
<li>&euro; ' , $array['Price'] , '</li><br><br>';
echo "<img style=' width: 320px; height: 240px;' src='/carimages/".$array['Pic'] ."'><br>";
echo "</fieldset></br></br>";
} else {
echo $warning;
}
echo "
</div>
</body>
</html>";
}
?>
