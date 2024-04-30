<?php

require '../../vendor/autoload.php';

require_once('../basics/utils.php');
use App\OOP\Transaction;

$transaction = new Transaction(15.0, 'for uber');
$transaction2 = new Transaction(65.43, 'Hairstylest');
$transaction3 = new Transaction(223.20, 'Movies');

pprint($transaction);
pprint($transaction2);

pprint(['ids' => [$transaction->getId(), $transaction2->getId()]]);

// mehtod chaining
$transaction->setAmount(30.5)->addTax();

pprint($transaction);

pprint(Transaction::objCount());

// destroying obj
unset($transaction3);

echo "end of program<br />";
