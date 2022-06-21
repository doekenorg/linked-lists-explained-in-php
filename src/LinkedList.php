<?php

namespace App;

final class LinkedList
{
    public function __construct(public ?Node $head = null, public ?Node $tail = null)
    {
    }

    public function prepend($value): Node
    {
        $this->head = $node = new Node($value, $this->head);
        $this->tail ??= $node;

        return $node;
    }

    public function insertAfter($value, Node $after): Node
    {
        $after->next = $node = new Node($value, $after->next);

        if ($after === $this->tail) {
            $this->tail = $node;
        }

        return $node;
    }

    public function append($value): Node
    {
        if (!$this->head) {
            return $this->prepend($value);
        }

        return $this->insertAfter($value, $this->tail);
    }

    public function shift(): ?Node
    {
        if (!$node = $this->head) {
            return null;
        }

        if (!$this->head = $node->next) {
            $this->tail = null;
        }

        $node->next = null;

        return $node;
    }

    public function get(int $index)
    {
        $node = $this->head;

        for ($i = 0; $i < $index; $i++) {
            if (!$node) {
                break;
            }

            $node = $node->next;
        }

        if (!$node) {
            throw new \RuntimeException(sprintf('A value with index "%d" does not exist in the list.', $index));
        }

        return $node->value;
    }

    public function remove(Node $remove): Node
    {
        $node = $this->head;
        while ($node && $node->next !== $remove) {
            $node = $node->next;
        }

        $node->next = $remove->next;
        $remove->next = null;

        return $remove;
    }

    public function print()
    {
        $node = $this->head;

        while ($node) {
            echo $node->value;
            if ($node = $node->next) {
                echo ' -> ';
            }
        }

        echo "\n";
    }
}
