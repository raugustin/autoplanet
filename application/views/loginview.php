<?php
// Generate html for login form
// Usage: create_loginform()
function create_loginpage($login_result) {
echo "
<!-- Container for login form -->
<div class='left'>
<form name='form' action='/login' method='post'>
<br><br><br>
<fieldset>
<legend>Welcome back, enter your details below</legend>
<br>
<label class='field' for 'Email'>Email:</label>
<input type='email' required placeholder='Enter a valid email address' name='Username' size='40' autocomplete='off' class='textbox-menu' required>
<br><br>
<label class='field' for 'Password'>Password:</label>
<input type='PASSWORD' required placeholder='Min 8 chars, letters and numbers' name='Password' size='40' autocomplete='off' minlength=8  class='textbox-menu' required>
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
<br>$login_result<br>
</div>
</body>
</html>";
}
?>
