<?php

use function Utils\pprint;
require_once('../procedural_basics/utils.php');
require_once('./classesObjects.php');

$transaction = new Transaction(15.0, 'for uber');

pprint($transaction);
