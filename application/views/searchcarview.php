<?php
function search_page($array,$search_form_status) {
echo "
<!-- Container for search menu -->
<div class='left'>
<form name='form' action='/searchcar' method='get'>
<br><br><br>
<fieldset>
<legend>Find new & used cars</legend>
<br>
<label class='field' for 'Make'>Make:</label>
<input id='Make' name='Make' class='textbox-menu'>
<br><br>
<label class='field' for 'BodyType'>BodyType:</label>
<select id='BodyType' name= 'BodyType' class='selectbox-menu'>
<option value='%'>Any BodyType</option>
<option value='Sedan'>Sedan</option>
<option value='Station'>Station</option>
<option value='Hatchback'>Hatchback</option>
<option value='Coupe'>Coupe</option>
<option value='MPV'>MPV</option>
<option value='SUV'>SUV</option>
</select>
<br><br>
<label class='field' for 'Fuel'>Fuel:</label>
<select id='Fuel' name='Fuel' class='selectbox-menu'>
<option value='%'>Any Fuel</option>
<option value='Petrol'>Petrol</option>
<option value='Diesel'>Diesel</option>
<option value='LPG'>LPG</option>
</select>
<br><br>
</fieldset>
<br><br>
<input name='Submit' value='Search' type='submit'>
</form>
</div>
";
echo "
<!-- Container for search results -->
<div class='right'>
<br><br><br>";
$Count=0;
// Show search results
foreach ($array as $row) {
echo "<fieldset><legend>";
echo $row['Make'],'&nbsp;',$row['Model'],'&nbsp;',$row['BodyType'];
echo "</legend><ul id='results'>";
echo '
<li>' , $row['Color'] , '</li><li>&#124;</li>
<li>' , $row['Year'] , '</li><li>&#124;</li>
<li>' , $row['Fuel'] , '</li><li>&#124;</li>
<li>&euro; ' , $row['Price'] , '</li><br><br>';
echo "<img style=' width: 320px; height: 240px;' src='/carimages/".$row['Pic'] ."'><br>"; 
$pid = $row['ID'];
echo "<a href=/buycar?item=$pid>Buy this car</a></br></p>";
echo "</fieldset></br></br>";
$Count=$Count + 1;
}
// Show "no results" message in case no search results were found and the search form was filled in 
if (($Count < 1) AND $search_form_status==1) {
echo "Your search didn't get any results, please try again !";
}
echo "
</div>
</body>
</html>";
}
?>
