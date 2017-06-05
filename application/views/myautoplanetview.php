<?php
function create_myautoplanetpage($array,$Name) {
echo "
<!-- Container for search menu -->
<div class='left'>
<br><br>
<p>Car ads of $Name";
echo ":</p>
</div>
";
echo "
<!-- Container for displaying car ads -->
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
echo "<a href=/deletemyad/?item=$pid>Delete this car ad</a></br></p>";
echo "</fieldset></br></br>";
$Count=$Count + 1;
}
// Show "no results" message in case no search results were found and the search form was filled in 
if ($Count < 1)  {
echo "There are no car ads to show !";
}
echo "
</div>
</body>
</html>";
}
?>
