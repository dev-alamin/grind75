<?php
// 704 binary search
// This function performs a binary search on a sorted array to find the index of a target value.
// If the target is not found, it returns -1.
// The function uses a while loop to repeatedly divide the search interval in half.
// It calculates the middle index and compares the target value with the value at that index.
// If the target is equal to the middle value, it returns the index.
// If the target is greater, it narrows the search to the right half.
// If the target is smaller, it narrows the search to the left half.
// The process continues until the target is found or the search interval is empty.
function search($nums, $target) {
    $left = 0;
    $right = count( $nums ) - 1;

    while( $left <= $right ) {
        $mid = floor( $left + $right ) / 2;
        // Check if the target is present at mid
        // If it is, return the index
        if( $nums[$mid] == $target ) {
            return $mid;
        }
        
        // If the target is greater, ignore the left half
        // If the target is smaller, ignore the right half
        if( $nums[$mid] < $nums[$target] ) {
            $mid++;
        }else{
            $mid--;
        }
    }

    return -1;
}

echo search( [1], 3 );