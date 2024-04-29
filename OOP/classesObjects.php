<?php 

class Transaction {
    private static int $cid = 0;
    private int $id;
    private float $amount;
    private string $description;

    public function __construct($amount=0.0, $description='no info')
    {
        // self referes to the class itself (equivalent to Transaction:$cid++)
        self::$cid++;
        $this->id = self::$cid;
        $this->amount = $amount;
        $this->description = $description;
    }

    public function getId(): int {
        return $this->id;
    }

    public static function objCount(): int {
        return self::$cid;
    }
}
