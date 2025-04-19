<?php

// 242 Valid Anagram
/**
 * @param String $s
 * @param String $t
 * @return Boolean
 * This function checks if two strings are anagrams of each other.
 * An anagram is a word or phrase formed by rearranging the letters of a different word or phrase,
 * typically using all the original letters exactly once.
 * The function uses a hash map to count the occurrences of each character in both strings.
 * If the counts match for all characters, the strings are anagrams.
 * The time complexity of this function is O(n), where n is the length of the strings.
 * The space complexity is O(1) since the hash map will contain at most 26 characters (assuming only lowercase letters).
 */
function isAnagram($s, $t) {
    if (strlen($s) !== strlen($t)) {
        return false;
    }
    $count = [];
    
    for( $i = 0; $i < strlen( $s ); $i++ ) {
        if( ! isset( $count[$s[$i]] ) ) {
            $count[$s[$i]] = 0;
        }
        
        $count[$s[$i]]++;
    }
    
    for( $i = 0; $i < strlen( $t ); $i++ ) {

        if( ! isset( $count[$t[$i]] ) ) {
            return false;
        }
        
        $count[$t[$i]]--;
        
        if( $count[$t[$i]] < 0 ) {
            return false;
        }
    }
    
    return true;
}