<?php
// 75. Sort Colors
/**
 * Given an array nums with n objects colored red, white, or blue, sort them in-place so that objects of the same color are adjacent,
 * with the colors in the order red, white, and blue.
 * This function uses the Dutch National Flag algorithm to sort the colors in a single pass.
 * The time complexity is O(n) and the space complexity is O(1).
 * 
 * This is called the Dutch National Flag problem, which is a classic problem in computer science.
 * The algorithm uses three pointers: low, mid, and high.
 * - low points to the next position to place a red (0).
 * - mid points to the current element being examined.
 * - high points to the next position to place a blue (2).
 * The algorithm iterates through the array and swaps elements as needed:
 * - If the current element is 0 (red), swap it with the element at low and increment both low and mid.
 * - If the current element is 1 (white), just increment mid.
 * - If the current element is 2 (blue), swap it with the element at high and decrement high.
 * The process continues until mid exceeds high.
 * This algorithm is efficient and works in a single pass, making it suitable for sorting colors in an array.
 * The function modifies the input array in place and does not return anything.
 */
function sortColors(&$nums) {
    $low = 0;
    $mid = 0;
    $high = count( $nums ) - 1;
    
    while( $mid <= $high ) {
        if( $nums[$mid] == 0 ) {
            $temp = $nums[$low];
            $nums[$low] = $nums[$mid];
            $nums[$mid] = $temp;
            
            $low++;
            $mid++;
        }elseif( $nums[$mid] == 1 ) {
            $mid++;
        }else{
            $temp = $nums[$mid];
            $nums[$mid] = $nums[$high];
            $nums[$high] = $temp;
            
            $high--;
        }
    }

    // Another good and simple solution || This is good for limited number of colors
    // 
    // $k = 0;
    // $pushes = 0;
    // while($k < 3){
    //     for($i = 0; $i < count($nums); $i++){
    //         if($nums[$i] == $k){
    //             $nums[$i] = $nums[$pushes];
    //             $nums[$pushes] = $k;
    //             $pushes++;
    //         }
    //     }
    //     $k++;
    // }

    // return $nums;
}

$nums = [1,2,0,1,2,2,0];
sortColors( $nums );
print_r( $nums );