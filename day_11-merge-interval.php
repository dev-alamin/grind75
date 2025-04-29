<?php
// 56. Merge Intervals
// Given an array of intervals where intervals[i] = [starti, endi], merge all overlapping intervals, and return an array of the non-overlapping intervals that cover all the intervals in the input.
// Example 1:
// Input: intervals = [[1,3],[2,6],[8,10],[15,18],[17,20]]
// Output: [[1,6],[8,10],[15,20]]
// Explanation: Since intervals [1,3] and [2,6] overlap, merge them into [1,6].
// Example 2:
// Input: intervals = [[1,4],[4,5]]
// Output: [[1,5]]
// Explanation: Intervals [1,4] and [4,5] are considered overlapping.
// Constraints:
// 1 <= intervals.length <= 104
// 0 <= starti <= endi <= 104
// Follow up: If you want to solve this problem in O(n log n) time complexity, you can use a sorting algorithm to sort the intervals based on their start times. Then, you can iterate through the sorted intervals and merge them as needed. This approach will give you a more efficient solution than the brute force method.
// Approach:
// 1. Sort the intervals based on their start times.
// 2. Initialize an empty array to store the merged intervals.
// 3. Iterate through the sorted intervals and compare the current interval with the last merged interval.
// 4. If the current interval overlaps with the last merged interval, merge them by updating the end time of the last merged interval.
// 5. If the current interval does not overlap, add it to the merged intervals.
// 6. Return the merged intervals.
// Time Complexity: O(n log n) for sorting the intervals, O(n) for merging them, so overall O(n log n).
// Space Complexity: O(n) for storing the merged intervals.
function mergeIntervals( $intervals ) {
    if( empty( $intervals ) ) return [];
    $n = count( $intervals );

    usort( $intervals, function( $a, $b){
        return $a[0] <=> $b[0];
    });

    $merged = [];
    $merged[] = $intervals[0];

    for( $i = 0; $i < $n; $i++ ) {
        $current = $intervals[$i];
        $lastMerged = &$merged[count( $merged) - 1 ];

        if( $current[0] <= $lastMerged[1] ) {
            $lastMerged[1] = max( $lastMerged[1], $current[1] );
        }else{
            $merged[] = $current;
        }
    }

    return $merged;
}

// Example usage
$intervals = [[1,3],[2,6],[8,10],[15,18],[17,20]];
$result = mergeIntervals($intervals);
echo '<pre>';
print_r($result);
echo '</pre>';