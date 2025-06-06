<?php
// 151. Reverse Words in a String
/**
 * Level : Medium
 * Given an input string s, reverse the string word by word.
 * A word is defined as a sequence of non-space characters.
 * The input string does not contain leading or trailing spaces and the words are always separated by a single space.
 * The function returns the reversed string.
 * Time Complexity: O(n)
 * Space Complexity: O(n)
 * 
 * Strategy:
 * 1. Use preg_replace to replace multiple spaces with a single space.
 * 2. Initialize two empty strings: $revWords and $words.
 * 3. Loop through the string from the end to the beginning.
 * 4. If the character is not a space, prepend it to $words.
 * 5. If the character is a space, append $words to $revWords and reset $words.
 * 6. After the loop, append any remaining $words to $revWords.
 * 7. Return the trimmed $revWords.
 */
function reverseWords( $s ) {
    $word = '';
    $sentence = [];

    for( $i = 0; $i < strlen( $s ); $i++ ) {
        if( $s[$i] !== ' ' ) {
            $word .= $s[$i];
        }else{
            if( $word != '' ) {
                $sentence[] = $word;
                $word = '';
            }
        }
    }

    // If any remaining, at the end
    // Because the last word may not be followed by a space
    // So we need to check if $word is not empty
    // and add it to the sentence array
    if( $word !== '' ) {
        $sentence[] = $word;
    }

    $revWords = '';
    for( $i = count( $sentence ) - 1; $i >= 0; $i-- ) {
        $revWords .= $sentence[$i];
        
        // Add a space between words, but not after the last word
        if( $i > 0 ) {
            $revWords .= ' ';
        }
    }

    return $revWords;
}

$s = "  hello    world    ";
print_r( reverseWords( $s ) );