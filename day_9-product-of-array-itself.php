<?php
// 238. Product of Array Except Self
/**
 * Given an integer array nums, return an array answer such that answer[i] is equal to the product of all the elements of nums except nums[i].
 * The problem can be solved in O(n) time complexity and O(1) space complexity (excluding the output array).
 * The approach involves calculating the product of all elements to the left and right of each index.
 *
 * Approach:
 * 1. Initialize an array result of the same length as nums, filled with 1.
 * 2. Calculate the left product for each index and store it in result.
 * 3. Calculate the right product for each index and multiply it with the corresponding value in result.
 * 4. Return the result array.
 * 
 * Real life usecase example:
 * - In a manufacturing process, you want to calculate the contribution of each machine to the total output.
 * - This can help in identifying the impact of each machine on the overall production.
 */
function productExceptSelf($nums) {
    $n = count($nums);
    
    // Initialize the result array
    $result = array_fill(0, $n, 1);
    $left = $right = 1;

    // Step 1: Compute the left product for each element
    for ($i = 0; $i < $n; $i++ ) {
        $result[$i] = $left;
        $left *= $nums[$i];
    }
    // Now the result array like : [1, 1, 2, 6] for nums = [1, 2, 3, 4]
    
    // Step 2: Compute the right product and update the result array
    for ($i = $n - 1; $i >= 0; $i--) {
        $result[$i] *= $right;
        $right *= $nums[$i];
    }
    // Now the result array like : [24, 12, 8, 6] for nums = [1, 2, 3, 4]
    // The final result is the product of all elements except the current one
    // Example: For nums = [1, 2, 3, 4], the result will be [24, 12, 8, 6]
    
    return $result;
}

// Example usage:
$nums = [1, 2, 3, 4];
$result = productExceptSelf($nums);
print_r($result); // Output: [24, 12, 8, 6]