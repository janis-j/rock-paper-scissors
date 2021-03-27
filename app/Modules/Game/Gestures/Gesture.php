<?php

namespace App\Modules\Game\Gestures;

Class Gesture implements iGesture
{
    private string $name;

    private array $winningGestures;

    public function __construct(string $name, array $winningGestures)
    {
        $this->name = $name;
        $this->addFewWinningGestures($winningGestures);
    }

    private function addWinningGesture(iGesture $gesture): void
    {
        $this->winningGestures[] = $gesture->name();
    }

    private function addFewWinningGestures(array $gestures): void
    {
        foreach($gestures as $gesture)
        {
            $this->winningGestures[] = $gesture;
        }
    }

    public function name(): string
    {
        return $this->name;
    }

    public function winning(string $name): bool
    {
        return in_array($name, $this->winningGestures);
    }
}