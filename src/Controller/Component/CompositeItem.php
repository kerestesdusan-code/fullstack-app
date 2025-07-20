<?php

namespace App\Component;

class CompositeItem implements ComponentInterface
{
    /** @var ComponentInterface[] */
    private array $children = [];

    public function addChild(ComponentInterface $child): self
    {
        $this->children[] = $child;
        return $this;
    }

    public function removeChild(ComponentInterface $child): void
    {
        $this->children = array_filter(
            $this->children,
            fn (ComponentInterface $existing) => $existing !== $child
        );
    }

    public function performAction(): string
    {
        $result = '';
        foreach ($this->children as $child) {
            $result .= $child->performAction();
        }
        return $result;
    }
}
