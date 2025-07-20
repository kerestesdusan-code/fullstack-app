<?php

namespace App\Component;

class LeafItem implements ComponentInterface
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function performAction(): string
    {
        return sprintf("Leaf '%s' executed.", $this->name);
    }
}
