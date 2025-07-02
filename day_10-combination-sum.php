<?php
// 39. Combination Sum

/**Given an array of distinct integers candidates and a target integer target, 
 * return a list of all unique combinations of candidates where the chosen numbers sum to target. 
 * You may return the combinations in any order. 
 * 
 * The same number may be chosen from candidates an unlimited number of times. 
 * Two combinations are unique if the frequency of at least one of the chosen numbers is different. 
 * The test cases are generated such that the number of unique combinations 
 * that sum up to target is less than 150 combinations for the given input.
/**
 * @param array $candidates
 * @param int $target
 * @return array
 * This function finds all unique combinations of candidates that sum to the target.
 * It uses backtracking to explore all possible combinations.
 * The function starts with an empty combination and iteratively adds candidates to it.
 * If the sum of the combination exceeds the target, it backtracks.
 * If the sum equals the target, it adds the combination to the result.
 * The function continues until all candidates have been considered.
 * The time complexity is O(2^n) in the worst case, where n is the number of candidates.
 * The space complexity is O(n) for the recursion stack.
 */
function combinationSum( $candidate, $target ) {
    $result = [];
    $combination = [];
    backtrack( $candidate, $target, $combination, 0, $result );
    return $result;
}

/**
 * Backtracking function to find combinations
 * @param array $candidates
 * @param int $target
 * @param array $combination
 * @param int $start
 * @param array $result
 */
function backtrack( $candidates, $target, &$combination, $start, &$result ) :void {
    if( $target === 0 ) {
        $result[] = $combination;
        return;
    }
    
    for( $i = $start; $i < count( $candidates ); $i++ ) {
        if( $candidates[$i] > $target ) {
            continue;
        }
        
        $combination[] = $candidates[$i];
        backtrack( $candidates, $target - $candidates[$i], $combination, $i, $result );
        array_pop( $combination );
    }
}

// Example usage
$candidates = [2, 3, 6, 7];
$target = 7;
$result = combinationSum($candidates, $target);
echo '<pre>';
print_r($result); // Output: [[2, 2, 3], [7]]
echo '</pre>';