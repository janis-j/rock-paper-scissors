<?php

namespace App\Modules\Game\Gestures;

class GesturesCollection
{
    private array $collection;

    public function __construct()
    {
        $this->addFew(
            [
                new Gesture("rock", ["scissors"]),
                new Gesture("paper", ["rock"]),
                new Gesture("scissors", ["paper"])
            ]
        );
    }

    private function addElement(iGesture $element): void
    {
        $this->collection[] = $element;
    }

    private function addFew(array $elements): void
    {
        foreach ($elements as $element) {
            $this->addElement($element);
        }
    }

    public function collection(): array
    {
        return $this->collection;
    }
}