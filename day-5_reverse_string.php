<?php
/**
 * @param String[] $s
 * @return NULL
 * This function reverses the input string array in place.
 * The function uses two pointers, one starting from the beginning of the array
 * and the other from the end. It swaps the characters at these pointers and moves
 * towards the center until the two pointers meet.
 * The time complexity of this function is O(n), where n is the length of the string.
 * The space complexity is O(1) since we are using only a constant amount of extra space.
 * The function does not return anything, it modifies the input array in place.
 */
function reverseString(&$s) {
    $left = 0; 
    $right = count( $s ) - 1;
    
    while( $left < $right ) {
        $temp = $s[$left];
        $s[$left] = $s[$right];
        $s[$right] = $temp;
        
        $left++;
        $right--;
    }
    
}

// Example usage
$s = ["h","e","l","l","o"];
reverseString( $s );
print_r( $s );