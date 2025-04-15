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
    $current = $dummy;

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

// 704 binary search
function search( $nums, $target ) {
    $left = 0;
    $right = count( $nums ) - 1;

    while( $left <= $right ) {
        $mid = (int)( ( $left + $right ) / 2 );

        // Check if the target is present at mid
        // If it is, return the index
        if( $nums[$mid] == $target ) {
            return $mid;
        }
        // If the target is greater, ignore the left half
        // If the target is smaller, ignore the right half
        if( $nums[$mid] < $target ) {
            $left = $mid + 1;
        } else {
            $right = $mid - 1;
        }
    }

    return -1;
}