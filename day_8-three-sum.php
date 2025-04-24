<?php
// 15. 3Sum
// Given an integer array nums, return all the triplets [nums[i], nums[j], nums[k]] such that i != j, i != k, and j != k,
// nums[i] + nums[j] + nums[k] == 0.
// Notice that the solution set must not contain duplicate triplets.
// Approach:
// 1. Sort the array.
// 2. Iterate through the array and use two pointers to find pairs that sum to the negative of the current element.
// 3. Skip duplicates to avoid repeated triplets.
// 4. Return the result.
// Time Complexity: O(n^2)
// Space Complexity: O(1)

function threeSum($nums) {
    sort($nums);
    $result = [];

    for ($i = 0; $i < count($nums) - 2; $i++) {
        if ($i > 0 && $nums[$i] == $nums[$i - 1]) continue; // Skip duplicates

        $left = $i + 1;
        $right = count($nums) - 1;

        while ($left < $right) {
            $sum = $nums[$i] + $nums[$left] + $nums[$right];

            if ($sum == 0) {
                $result[] = [$nums[$i], $nums[$left], $nums[$right]];
                while ($left < $right && $nums[$left] == $nums[$left + 1]) $left++; // Skip duplicates
                while ($left < $right && $nums[$right] == $nums[$right - 1]) $right--; // Skip duplicates
                $left++;
                $right--;
            } elseif ($sum < 0) {
                $left++;
            } else {
                $right--;
            }
        }
    }

    return $result;
}
// Example usage
$nums = [-1, 0, 1, 2, -1, -4];
$result = threeSum($nums);
echo '<pre>';
print_r($result);
echo '</pre>';