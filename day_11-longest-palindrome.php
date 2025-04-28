<?php
//409. Longest Palindrome
/**
 * Given a string s which consists of lowercase or uppercase letters, return the length of the longest palindromic 
 * substring in s.
 * A palindrome is a string that reads the same backward as forward.
 * The function uses a hash map to count the occurrences of each character in the string.
 * It then calculates the length of the longest palindrome that can be formed using these characters.
 * The time complexity is O(n), where n is the length of the string.
 * The space complexity is O(1) since we are using a fixed-size hash map for character counts.
 */
function longestPalindrome($s) {
    $charCount = [];
    $length = 0;
    $hasOdd = false;

    // Count the occurrences of each character
    foreach( str_split( $s ) as $char ) {
        if( ! isset( $charCount[$char] ) ) {
            $charCount[$char] = 0;
        }
        $charCount[$char]++;
    }

    // Calculate the length
    foreach ($charCount as $count) {
        if ($count % 2 == 0) {
            $length += $count;
        } else {
            $length += $count - 1;
            $hasOdd = true;
        }
    }

    // If there was any odd count, we can put one odd character in the center
    if ($hasOdd) {
        $length += 1;
    }

    return $length;
}

// Example usage
$s = "abccccdd";
$result = longestPalindrome($s);
echo '<pre>';
print_r($result);
echo '</pre>';