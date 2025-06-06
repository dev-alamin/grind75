<?php
class ListNode {
    public $val = 0;
    public $next = null;

    public function __construct( $val = 0, $next = null ) {
        $this->val = $val;
        $this->next = $next;
    }
}

function mergeTwoLists( $list1, $list2 ) {
    $dummy = new ListNode();
    $current = $dummy; // Pointer to the last node in the merged list

    while( $list1 != null && $list2 != null ) {
        
        if( $list1->val < $list2->val ) {
            $current->next = $list1;
            $list1 = $list1->next;
        }else{
            $current->next = $list2;
            $list2 = $list2->next;
        }

        $current = $current->next;
    }

    // Add remaining
    if( $list1 != null ) {
        $current->next = $list1;
    }else{
        $current->next = $list2;
    }

    return $dummy->next;
}