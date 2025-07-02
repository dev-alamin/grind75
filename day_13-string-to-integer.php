<?php
// 8. String to Integer (atoi)
// Topic: String Manipulation, Level: Medium
// Implement the myAtoi(string s) function, which converts a string to a 32-bit signed integer (similar to C/C++'s atoi function).
// The algorithm for converting a string to an integer is as follows:
// 1. Read in and ignore any leading whitespace.
// 2. Check if the next character (if not already at the end of the string) is '-' or '+'. Read this character if it is either.
// 3. Convert the characters following the '-' or '+' to integers until the next non-digit character or the end of the input is reached.
// 4. The sign determines whether the final integer is negative or positive.
// 5. If no digits were read, then the integer is 0. If the integer is out of the 32-bit signed integer range [-231, 231 - 1], then clamp the integer so that it remains in the range.
// 6. Return the integer as the final result.
// Note:
// - Only the space character ' ' is considered a whitespace character.
// - Do not ignore any characters other than the leading whitespace or the '-'/'+' sign.
// - Assume the environment does not allow you to store 64-bit integers (signed or unsigned).
// - The solution should be implemented in PHP.
// Example 1:
// Input: s = "   -42"
// Output: -42
function myAtoi($s) {
    $n = strlen($s);
    $i = 0;
    $sign = 1;
    $result = 0;
    $INT_MAX = 2147483647;
    $INT_MIN = -2147483648;

    // Skip leading whitespaces
    while ($i < $n && $s[$i] === ' ') {
        $i++;
    }

    // Check for sign
    if ($i < $n && ($s[$i] == '+' || $s[$i] == '-')) {
        $sign = ($s[$i] == '-') ? -1 : 1;
        $i++;
    }

    // Convert digits to integer
    while ($i < $n && ctype_digit($s[$i])) {
        $digit = ord($s[$i]) - ord('0');
        if ($result > ($INT_MAX - $digit) / 10) {
            return ($sign == 1) ? $INT_MAX : $INT_MIN;
        }
        $result = $result * 10 + $digit;
        $i++;
    }

    return $result * $sign;
}
// Example usage
$s = "   -42";
$result = myAtoi($s);
echo '<pre>';
print_r($result);
echo '</pre>';