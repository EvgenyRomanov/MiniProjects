<?php

/**
 * https://leetcode.com/problems/intersection-of-two-linked-lists/
 */

namespace src;

class SolutionTask1
{
    /**
     * @param \app\src\ListNode $headA
     * @param \app\src\ListNode $headB
     * @return \app\src\ListNode|null
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
