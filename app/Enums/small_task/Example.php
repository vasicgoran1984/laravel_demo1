<?php

// Example 1: Integer list
use App\Lib\SortedLinkedList\Exceptions\InvalidTypeException;
use App\Lib\SortedLinkedList\SortedLinkedList;

$intList = new SortedLinkedList();
$intList->insert(4);
$intList->insert(2);
$intList->insert(9);
$intList->insert(1);
$intList->insert(8);

print_r($intList->toArray()); // [1, 2, 4, 8, 9]

// Example 2: String list
$strList = new SortedLinkedList();
$strList->insert('orange');
$strList->insert('apple');
$strList->insert('cherry');

print_r($strList->toArray()); // ['apple', 'orange', 'cherry']

// Example 3: Type safety
try {
    $intList->insert('string value'); // Throws InvalidTypeException
} catch (InvalidTypeException $e) {
    echo $e->getMessage();
}

