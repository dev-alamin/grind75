<?php
// Given a string s, determine if it is a palindrome, considering only alphanumeric characters and ignoring cases.
// A palindrome is a string that reads the same backward as forward.
function isPalindrome( $s ) {
    $s = trim( $s );
    $s = preg_replace( '/[^a-zA-Z0-9]/', '', $s ); // remove all non-alphanumeric characters
    $s = strtolower( $s );
    $n = str_split( $s );
    
    $start = 0; 
    $end = count( $n ) - 1;
    
    while( $start < $end ) {
        if( $n[$start] == $n[$end] ) {
            $start++;
            $end--;   
        }else{
            return false;
        }
    }
    
    return true;
}

// $s = "A man, a plan, a canal: Panama";
$s = 'Race a Car';

var_dump( isPalindrome( $s ) );