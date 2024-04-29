<?php 

class Transaction {
    private string $id = '234920KDjfsl';
    public float $amount;
    public string $description;

    public function __construct($amount=0.0, $description='no info')
    {
        $this->amount = $amount;
        $this->description = $description;
    }
}
