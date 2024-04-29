<?php

use function Utils\pprint;
require_once('../procedural_basics/utils.php');
require_once('./classesObjects.php');

$transaction = new Transaction(15.0, 'for uber');
$transaction2 = new Transaction(65.43, 'Hairstylest');

pprint($transaction);
pprint($transaction2);

pprint(['ids' => [$transaction->getId(), $transaction2->getId()]]);

// mehtod chaining
$transaction->setAmount(30.5)->addTax();

pprint($transaction);
