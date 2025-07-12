<?php
// LeetCode Problem 3: Longest Substring Without Repeating Characters
// Given a string s, find the length of the longest substring without repeating characters.
// Example 1:
// Input: s = "abcabcbb"
// Output: 3
// Explanation: The answer is "abc", with the length of 3.
/**
 * @param String $s
 * @return Integer
 */
function lengthOfLongestSubstring($s) {
    $maxLen = 0;
    $start  = 0;
    $seen   = [];

    for( $end = 0; $end < strlen( $s ); $end++ ) {
        $char = $s[$end];

        /**
        * If the character is already seen and is within the current window
        * ---Update the start index to the next position after the last occurrence
        * ---This ensures that we only keep unique characters in the current window
        * The condition $seen[$char] >= $start ensures that we only update start
        * ---if the last occurrence of the character is within the current window
        * ---This is important to avoid moving the start index backward
        * ---which would break the uniqueness of characters in the current window
        *
        * This is a common technique to maintain a sliding window of unique characters
        * The $seen array keeps track of the last index where each character was seen
        * This allows us to efficiently update the start index when we encounter a duplicate character
        * The $start index is updated to the next position after the last occurrence of the character
        */
        if( isset( $seen[$char] ) && $seen[$char] >= $start ) {
            $start = $seen[$char] + 1;
        }

        $seen[$char] = $end; // Update the last seen index of the character

        $maxLen = max( $maxLen, $end - $start + 1 );

    }

    return $maxLen;
}
// Test cases
echo lengthOfLongestSubstring("abcabcbb") . "\n"; // Output: 3
echo lengthOfLongestSubstring("bbbbb") . "\n"; // Output: 1
echo lengthOfLongestSubstring("pwwkew") . "\n"; // Output: 3
echo lengthOfLongestSubstring("") . "\n"; // Output: 0
echo lengthOfLongestSubstring("a") . "\n"; // Output: 1

// 16. 3Sum Closest
// Level: Medium, Topic: Array, Sorting, Two Pointer

/**
 * @param array $nums
 * @param Integer $target
 * @return Integer
 */
function threeSumClosest($nums, $target) {
    sort($nums);
    $n = count($nums);
    $closestSum = $nums[0] + $nums[1] + $nums[2];
    
    for ($i = 0; $i < $n - 2; $i++) {
        $left = $i + 1;
        $right = $n - 1;
        
        while ($left < $right) {
            $currentSum = $nums[$i] + $nums[$left] + $nums[$right];
            
            // If we found exact match, return immediately
            if ($currentSum == $target) {
                return $currentSum;
            }
            
            // Update closest sum if current is closer to target
            if (abs($currentSum - $target) < abs($closestSum - $target)) {
                $closestSum = $currentSum;
            }
            
            // Move pointers based on comparison with target
            if ($currentSum < $target) {
                $left++;
            } else {
                $right--;
            }
        }
    }
    
    return $closestSum;
}