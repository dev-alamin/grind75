<?php
// 169. Majority Element
// Given an array nums of size n, return the majority element.
// The majority element is the element that appears more than n / 2 times. You may assume that the majority element always exists in the array.
// Boyer-Moore Voting Algorithm
// Time Complexity: O(n)
// Space Complexity: O(1)

function majorityElement($nums) {
    $count = 0;
    $candidate = null;

    foreach ($nums as $num) {
        if ($count == 0) {
            $candidate = $num;
        }
        $count += ($num == $candidate) ? 1 : -1;
    }

    return $candidate;
}