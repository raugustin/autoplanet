<?php
function create_sellmycarpage($Sellername,$sellmycarformstatus,$warning,$Make,$Model,$BodyType,$Color,$Year,$Fuel,$Price,$Pic) {
echo "
<!-- Container for sell my car menu -->
<div class='left'>
<form name='form' action='/sellmycar' method='post' enctype='multipart/form-data'>
<br><br><br>
<fieldset>
<legend>Enter your car details below to post an ad</legend>
<br>
<label class='field' for 'Name'>Name:</label>
$Sellername
<br><br>
<label class='field' for 'Make'>Make:</label>
<input id='Make' name='Make' class='textbox-menu'>
<br><br>
<label class='field' for 'BodyType'>BodyType:</label>
<select id='BodyType' name= 'BodyType' class='selectbox-menu'>
<option value=''>Choose BodyType</option>
<option value='Sedan'>Sedan</option>
<option value='Station'>Station</option>
<option value='Hatchback'>Hatchback</option>
<option value='Coupe'>Coupe</option>
<option value='MPV'>MPV</option>
<option value='SUV'>SUV</option>
</select>
<br><br>
<label class='field' for 'Model'>Model:</label>
<input id='Model' name='Model' class='textbox-menu'>
<br><br>
<label class='field' for 'Fuel'>Fuel:</label>
<select id='Fuel' name='Fuel' class='selectbox-menu'>
<option value=''>Choose Fuel</option>
<option value='Petrol'>Petrol</option>
<option value='Diesel'>Diesel</option>
<option value='LPG'>LPG</option>
</select>
<br><br>
<label class='field' for 'Color'>Color:</label>
<input id='Color' name='Color' class='textbox-menu'>
<br><br>
<label class='field' for 'Year'>Year:</label>
<input id='Year' name='Year' class='textbox-menu'>
<br><br>
<label class='field' for 'Sales Price'>Sales Price (Euro):</label>
<input id='Price' name='Price' class='textbox-menu'>
<br><br>
<label class='field' for 'Picture'>Upload Picture:</label>
<input type='file' name='carpic' id='carpic'>
<br><br>
</fieldset>
<br>
<input name='submit' value='submit' type='submit'>
</form>
</div>
";
if (($sellmycarformstatus == 1) AND $warning == "") {
echo "
<!-- Container for search results -->
<div class='right'>
<br><br><br>";
echo "<fieldset><legend>";
echo $Make,'&nbsp;',$Model,'&nbsp;',$BodyType;
echo "</legend><ul id='results'>";
echo '
<li>' , $Color, '</li><li>&#124;</li>
<li>' , $Year, '</li><li>&#124;</li>
<li>' , $Fuel , '</li><li>&#124;</li>
<li>&euro; ' , $Price, '</li><br><br>';
echo "<img style=' width: 320px; height: 240px;' src='/carimages/".$Pic ."'><br>";
echo "<p class='blue'>Your car advert has been placed</p>";
echo "</fieldset></br></br>
</div>
</body>
</html>";
} else {
echo "
<!-- Container for search results -->
<div class='right'>
<br><br><br>
$warning
</div>
</body>
</html>";
}}
?>
