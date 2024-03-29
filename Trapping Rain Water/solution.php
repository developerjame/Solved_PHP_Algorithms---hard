<?php
class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap($height) {
       $n = count($height);
       if($n == 0) return 0;
       
       $left = 0;
       $right = $n-1;
       $left_max = 0;
       $right_max = 0;
       $water = 0;

       while($left<$right){
        $left_max = max($left_max, $height[$left]);
        $right_max = max($right_max, $height[$right]);

        if($left_max<$right_max){
            $water+=$left_max-$height[$left];
            $left++;
           }else{
            $water+=$right_max-$height[$right];
            $right--;
           }
       }
       return $water;
    }
}
$height = [0,1,0,2,1,0,1,3,2,1,2,1];
$height1 = [4,2,0,3,2,5];
$solution = new Solution();
echo $solution->trap($height)."<br>";
echo $solution->trap($height1);
?>