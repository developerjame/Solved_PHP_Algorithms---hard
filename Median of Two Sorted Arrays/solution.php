<?php
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
        $m = count($nums1);
        $n = count($nums2);

        $merged = $this->mergeSortedArrays($nums1, $nums2, $m, $n);

        $totallength = $m+$n;

        if($totallength % 2 == 0){
            $mid = $totallength / 2;
            return ($merged[$mid-1]+$merged[$mid]) / 2;
        }else{
            return $merged[intval($totallength / 2)];
        }
    }

    function mergeSortedArrays($nums1, $nums2, $m, $n){
        $merged = [];
        $i = 0;
        $j = 0;

        while($i<$m && $j<$n){
            if($nums1[$i] < $nums2[$j]){
                $merged[] = $nums1[$i];
                $i++;
            }else{
                $merged[] = $nums2[$j];
                $j++;
            }
        }
        while($i<$m){
            $merged[] = $nums1[$i];
            $i++;
        }
        while($j<$n){
            $merged[] = $nums2[$j];
            $j++;
        }
        return $merged;
    }
}
$solution = new Solution();
echo $solution->findMedianSortedArrays([1,1], [7]);
?>