<?php
/**
 * This function finds two indices in the array such that their values add up to the target.
 * It uses a hashmap to store the indices of the numbers as they are processed.
 * 
 * @param array $nums The input array of integers.
 * @param int $target The target sum to find.
 * 
 * @return array An array containing the indices of the two numbers that add up to the target.
 */
function twoSum($nums, $target) {
    $hashMap = [];

    foreach ($nums as $index => $number) {
        $complement = $target - $number;

        // If complement is found in hashmap, return the indices
        if (isset($hashMap[$complement])) {
            return [$hashMap[$complement], $index];
        }

        // Store the number and its index
        $hashMap[$number] = $index;
    }

    return [];
}
$nums = [2, 7, 11, 15];
$target = 9;
$result = twoSum($nums, $target);
echo '<pre>';
print_r($result); // Output: [0, 1]
echo '</pre>';