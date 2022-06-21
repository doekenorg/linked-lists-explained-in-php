<?php

// This was less hassle than adding composer.
require_once "src/LinkedList.php";
require_once "src/Node.php";

$list = new App\LinkedList();

$a = $list->prepend('A');
$list->print(); // A

$b = $list->prepend('B');
$list->print(); // B -> A

$c = $list->insertAfter('C', $b);
$list->print(); // B -> C -> A

$d = $list->append('D');
$list->print(); // B -> C -> A -> D

$node = $list->shift(); // $node->value = B
$list->print(); // C -> A -> D

echo $list->get(2) . "\n"; // D

$list->remove($a);
$list->print(); // C -> D
