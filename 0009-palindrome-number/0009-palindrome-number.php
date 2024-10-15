class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x) {
        $x = (string)$x;
        
        if ($x[0] === '-') {
            return false;
        }
        
        $reversed = strrev($x);
        return $x === $reversed;

    }
}