<?php

/**
 * https://leetcode.com/problems/intersection-of-two-linked-lists/
 */

namespace src;

class SolutionTask1
{
    /**
     * @param App\ListNode $headA
     * @param App\ListNode $headB
     * @return App\ListNode|null
     */
    public function getIntersectionNode(ListNode $headA, ListNode $headB): ?ListNode
    {
        $pointA = $headA;
        $pointB = $headB;

        while ($pointA !== $pointB) {
            $pointA = $pointA === null ? $headB : $pointA->next;
            $pointB = $pointB === null ? $headA : $pointB->next;
        }

        return $pointA;
    }
}
