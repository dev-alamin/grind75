<?php
/**
 * This function checks if a given string of parentheses is valid.
 * It uses a stack to keep track of the opening parentheses and
 * checks if they are properly closed in the correct order.
 *
 * @param string $s The input string containing parentheses.
 * 
 * @return bool Returns true if the parentheses are valid, false otherwise.
 */
function isValidParenthesis( $s ) {
    $stack = [];
    $map = [
        ')' => '(',
        '}' => '{',
        ']' => '['
    ];

    foreach( str_split( $s ) as $char ) {
        if( isset( $map[$char] ) ) {
            if( empty( $stack ) || array_pop( $stack ) != $map[$char] ) {
                return false;
            }
        } else {
            $stack[] = $char;
        }
    }

    return empty( $stack );
}
$s = "{[()]}";
echo '<pre>';
print_r( isValidParenthesis( $s ) ); // true
echo '</pre>';