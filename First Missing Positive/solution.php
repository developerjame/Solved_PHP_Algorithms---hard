<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function firstMissingPositive($nums) {
        $n = count($nums);

        for($i=0;$i<$n;$i++){
            if($nums[$i]<=0){
                $nums[$i] = $n+1;
            }
        }

        for($i=0;$i<$n;$i++){
            $num = abs($nums[$i]);
            if($num < $n){
                $nums[$num-1] = -abs($nums[$num-1]);
            }
        }

        for($i=0;$i<$n;$i++){
            if($nums[$i] > 0){
                return $i+1;
            }
        }
        return $n;
    }
}
$nums = [1,2,2,4];

$solution = new Solution();
echo $solution->firstMissingPositive($nums);
?>