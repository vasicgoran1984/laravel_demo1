<?php

namespace App\Lib\SortedLinkedList;

use App\Lib\SortedLinkedList\Exceptions\EmptyListException;
use App\Lib\SortedLinkedList\Exceptions\InvalidTypeException;

/**
 * Interface for sorted linked list
 */
interface SortedLinkedListInterface
{
    public function insert($value): void;
    public function remove($value): void;
    public function contains($value): bool;
    public function getFirst(): Node;
    public function getLast(): Node;
    public function toArray(): array;
    public function count(): int;
    public function isEmpty(): bool;
    public function clear(): void;
    public function getType(): string;
}

/**
 * Node class for linked list elements
 */
class Node
{
    public $value;
    public ?Node $next;

    public function __construct($value, ?Node $next = null)
    {
        $this->value = $value;
        $this->next = $next;
    }
}

/**
 * Main sorted linked list implementation
 */
class SortedLinkedList implements SortedLinkedListInterface
{
    private ?Node $head = null;
    private string $type;
    private int $size = 0;

    public function __construct()
    {
        $this->head = null;
        $this->type = '';
    }

    /**
     * Insert a value while maintaining sort order
     */
    public function insert($value): void
    {
        $this->validateType($value);

        $newNode = new Node($value);

        if ($this->isEmpty() || $value <= $this->head->value) {
            $newNode->next = $this->head;
            $this->head = $newNode;
        } else {
            $current = $this->head;
            while ($current->next !== null && $current->next->value < $value) {
                $current = $current->next;
            }
            $newNode->next = $current->next;
            $current->next = $newNode;
        }

        $this->size++;
    }

    /**
     * Remove a value from the list
     */
    public function remove($value): void
    {
        if ($this->isEmpty()) {
            throw new EmptyListException("Cannot remove from an empty list.");
        }

        $this->validateType($value);

        if ($this->head->value === $value) {
            $this->head = $this->head->next;
            $this->size--;
            return;
        }

        $current = $this->head;
        while ($current->next !== null && $current->next->value !== $value) {
            $current = $current->next;
        }

        if ($current->next !== null) {
            $current->next = $current->next->next;
            $this->size--;
        }
    }

    /**
     * Check if value exists in the list
     */
    public function contains($value): bool
    {
        if ($this->isEmpty()) {
            return false;
        }

        $this->validateType($value);

        $current = $this->head;
        while ($current !== null) {
            if ($current->value === $value) {
                return true;
            }
            if ($current->value > $value) {
                break; // Early exit since list is sorted
            }
            $current = $current->next;
        }

        return false;
    }

    public function getFirst(): Node
    {
        if ($this->isEmpty()) {
            throw new EmptyListException("List is empty.");
        }
        return $this->head;
    }

    public function getLast(): Node
    {
        if ($this->isEmpty()) {
            throw new EmptyListException("List is empty.");
        }

        $current = $this->head;
        while ($current->next !== null) {
            $current = $current->next;
        }

        return $current;
    }

    public function toArray(): array
    {
        $result = [];
        $current = $this->head;

        while ($current !== null) {
            $result[] = $current->value;
            $current = $current->next;
        }

        return $result;
    }

    public function count(): int
    {
        return $this->size;
    }

    public function isEmpty(): bool
    {
        return $this->head === null;
    }

    public function clear(): void
    {
        $this->head = null;
        $this->type = '';
        $this->size = 0;
    }

    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Validate type consistency for the list
     */
    private function validateType($value): void
    {
        if ($this->isEmpty()) {
            $this->type = gettype($value);
            if ($this->type !== 'integer' && $this->type !== 'string') {
                throw new InvalidTypeException("Only integers and strings are supported.");
            }
            return;
        }

        $newType = gettype($value);
        if ($newType !== $this->type) {
            throw new InvalidTypeException("Cannot add value of type {$newType} to a list of type {$this->type}.");
        }
    }
}
