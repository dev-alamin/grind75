<?php
/** 57. Insert Interval
 * Given a set of non-overlapping intervals, insert a new interval into the intervals (merge if necessary).
 * You may assume that the intervals were initially sorted according to their start times.
 * =============================
 * Time Complexity: O(n)
 * Space Complexity: O(n)
 * Example: intervals = [[1,3],[6,9]], newInterval = [2,5]
 * Output: [[1,5],[6,9]]
 * =============================
 * Approach:
 * ==================================================================================
 *  Let's say this is a meeting schedule and we want to add a new meeting.
 *  So we need to check if the new meeting overlaps with any of the existing meetings.
 * ===================================================================================
 * 1. Initialize an empty result array.
 * 2. Add all intervals that come before the new interval.
 * 3. Merge overlapping intervals.
 * 4. Add the merged interval.
 * 5. Add remaining intervals.
 * 6. Return the result array.
 */ 

 function insert($intervals, $newInterval) {
    $result = [];
    $i = 0;
    $n = count($intervals);

    // Add all intervals that come before the new interval
    while ($i < $n && $intervals[$i][1] < $newInterval[0]) {
        $result[] = $intervals[$i];
        $i++;
    }

    // Merge overlapping intervals
    while ($i < $n && $intervals[$i][0] <= $newInterval[1]) {
        $newInterval[0] = min($newInterval[0], $intervals[$i][0]);
        $newInterval[1] = max($newInterval[1], $intervals[$i][1]);
        $i++;
    }
    
    // Add the merged interval
    $result[] = $newInterval;

    // Add remaining intervals
    while ($i < $n) {
        $result[] = $intervals[$i];
        $i++;
    }

    return $result;
}

// Example usage
$intervals = [[1, 3], [6, 9]];
$newInterval = [2, 5];
$result = insert($intervals, $newInterval);
echo '<pre>';
print_r($result);
echo '</pre>';