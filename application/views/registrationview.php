<?php
// Generate html for registration page
// Usage: create_registrationpage()
function create_registrationpage($registrationresult) {
echo "
<!-- Container for registration form -->
<div class='left'>
<form name='form' action='/registration' method='post'>
<br><br><br>
<fieldset>
<legend>Registration - Create here an account to sell your car</legend>
<br>
<label class='field' for 'Name'>Full Name:</label>
<input type='text' required placeholder='Please enter your first and last name' name='Name' class='textbox-menu' required>
<br><br>
<label class='field' for 'Username'>Username (Your email):</label>
<input type='email' required placeholder='Enter a valid email address' name='Username' class='textbox-menu' required>
<br><br>
<label class='field' for 'First'>Password (min 8 chars):</label>
<input type='PASSWORD' required placeholder='Min 8 chars, must contain letters and numbers' name='First' class='textbox-menu'' autocomplete='off' minlength=8 required>
<br><br>
<label class='field' for 'Second'>Retype Password (min 8 chars):</label>
<input type='PASSWORD' required placeholder='Min 8 chars, must contain letters and numbers' name='Second' class='textbox-menu' autocomplete='off' minlength=8 required>
<br><br>
</fieldset>
<br><br>
<input value='Submit' type='submit'><br>
<br>
</form>
</div>
<!-- Container for login result -->
<div class='right'>
<br><br><br>
<br>$registrationresult<br>
</div>
</body>
</html>";
}
?>
