<?php

namespace App\OOP;
require_once('../basics/utils.php');

class Receipt extends Transaction {

    private int $id;

    public function __construct(
        private float $amount=0.0,
        private string $description='no info',
    )
    {
        parent::__construct($amount, $description);
        self::$cid++;
        $this->id = self::$cid;
    }

    public function transcript(): void {
        pprint(<<<Text
        amount:\t$this->amount
        \t$this->description
        transaction id:$this->id
        Text);
    }
}
