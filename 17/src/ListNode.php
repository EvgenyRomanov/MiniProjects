<?php

namespace src;

class ListNode
{
    /** @var int  */
    public $val = 0;

    /** @var null|\src\ListNode  */
    public $next = null;

    public function __construct(int $val)
    {
        $this->val = $val;
    }
}
