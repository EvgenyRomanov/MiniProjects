<?php

namespace app\src;

/**
 * Definition for a singly-linked list
 */
class ListNode
{
    /** @var int  */
    public $val = 0;

    /** @var \src\ListNode|null  */
    public $next = null;

    public function __construct(int $val)
    {
        $this->val = $val;
    }
}
