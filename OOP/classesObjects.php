<?php 

class Transaction {
    private static int $cid = 0;
    private int $id;
    private float $amount;
    private string $description;

    public function __construct($amount=0.0, $description='no info')
    {
        Transaction::$cid++;
        $this->id = Transaction::$cid;
        $this->amount = $amount;
        $this->description = $description;
    }

    public function getId(): int {
        return $this->id;
    }
}
