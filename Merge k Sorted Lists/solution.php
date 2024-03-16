<?php

  class ListNode {
      public $val = 0;
      public $next = null;
      function __construct($val = 0, $next = null) {
          $this->val = $val;
          $this->next = $next;
      }
  }
 
class Solution {

    /**
     * @param ListNode[] $lists
     * @return ListNode
     */
    function mergeKLists($lists) {
        $dummy = new ListNode();
        $current = $dummy;

        $pq = new SplPriorityQueue();
        $pq->setExtractFlags(SplPriorityQueue::EXTR_DATA);

        foreach($lists as $list){
            if($list){
                $pq->insert($list, -$list->val);
            }
        }
        while(!$pq->isEmpty()){
           $minNode = $pq->extract();
           $current->next = $minNode;
           $current=$current->next;

           if($current->next){
            $pq->insert($current->next, -$current->next->val);
           }
        }
        return $dummy->next;
    }
}
$solution = new Solution();
$list1 = new ListNode(1, new ListNode(4, new ListNode(5)));
$list2 = new ListNode(1, new ListNode(3, new ListNode(4)));
$list3 = new ListNode(2, new ListNode(6));
$lists = [$list1, $list2, $list3];
$result = $solution->mergeKLists($lists);
printList($result);

function printList($head) {
    $result = [];
    while ($head) {
        $result[] = $head->val;
        $head = $head->next;
    }
    echo "[" . implode(",", $result) . "]\n";
}
?>