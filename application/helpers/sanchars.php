<?php
// The sanitize character function chops a string to 30 chars and escapes the special chars
// Takes variable number of strings as argument
// Usage: list($X, $Y, $Z)=san_chars($A, $B, $C);
function san_chars()
{
//Count the number of input strings
    $numargs = func_num_args();
//Put the input strings in an array
	$rawchars = func_get_args();
	for ($x = 0; $x < $numargs; $x++) {
//Limit the number of chars of the input strings to 30
		$limchars[$x] = substr($rawchars[$x],0,30);
//Sanitize the input strings from special chars
        $sanchars[$x] = filter_var($limchars[$x], FILTER_SANITIZE_SPECIAL_CHARS);
   }
//Put the sanitized strings in an array
   return $sanchars;
}
?>