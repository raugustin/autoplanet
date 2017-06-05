<?php
// The sanitize digits function chops a string to 10 chars and strips everything except digits
// Takes variable number of strings as argument
// Usage: list($X, $Y, $Z)=san_digits($A, $B, $C);
function san_digits()
{
//Count the number of input strings
    $numargs = func_num_args();
//Put the input strings in an array
	$rawchars = func_get_args();
	for ($x = 0; $x < $numargs; $x++) {
//Limit the number of chars of the input strings to 10
		$limchars[$x] = substr($rawchars[$x],0,10);
//Sanitize the input strings from all characters except digits 0-9
        $sandigits = (preg_replace("/[^\d]/", "", $limchars));
}
//Put the sanitized strings in an array
   return $sandigits;
}
?>