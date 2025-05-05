<?php
// 17. Letter Combinations of a Phone Number
// Given a string containing digits from 2-9 inclusive, return all possible letter combinations that the number could represent.
// A mapping of digit to letters (just like on the telephone buttons) is given below. Note that 1 does not map to any letters.
// 2 -> abc
// 3 -> def
// 4 -> ghi
// 5 -> jkl
// 6 -> mno
// 7 -> pqrs
// 8 -> tuv
// 9 -> wxyz
// Example:
// Input: digits = "23"
// Output: ["ad","ae","af","bd","be","bf","cd","ce","cf"]
class Solution {
    private $mapping = [
        '2' => 'abc',
        '3' => 'def',
        '4' => 'hij',
        '5' => 'klm',
        '6' => 'nop',
        '7' => 'pqrs',
        '8' => 'tuv',
        '9' => 'wxyz',
        ];
        
        public function letterCobminations( $digits ) {
            $result = [];
            if( empty( $digits ) ) return $result;
            
            $this->backtrack( 0, '', $digits, $result );
            return $result;
        }
        
        private function backtrack( $index, $currentCombination, $digit, &$result ) {
            // Base case: if the current combination is complete
            // (i.e., the length of the current combination is equal to the length of the input digits)
            // then add it to the result
            if( strlen( $digit ) == $index ) {
                $result[] = $currentCombination;
                return;
            }
            
            $letters = $this->mapping[$digit[$index]];
            
            // Loop through each letter corresponding to the current digit
            // and recursively build the combinations
            // by calling backtrack with the next index and the current combination
            // (current combination + current letter)
            // For example, if the current digit is 2 and the current combination is "a",
            // the next call will be backtrack( 1, "a", "23", $result )
            // which will then loop through the letters corresponding to digit 3
            // and add them to the current combination
            for( $i = 0; $i < strlen( $letters ); $i++ ) {
                $this->backtrack( $index + 1, $currentCombination . $letters[$i], $digit, $result);
            }
        }
}

// Example usage:
$sol = new Solution();
print_r($sol->letterCobminations("2345"));