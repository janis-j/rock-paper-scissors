<?php

namespace App\Modules\Game\Players;

use App\Modules\Game\Gestures\iGesture;

class Player implements iPlayer
{
    private iGesture $move;

    private string $name;

    private int $score = 0;

    public function score(): int
    {
        return $this->score;
    }

    public function addScore(): void
    {
        $this->score++;
    }

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function setMove(iGesture $gesture): void
    {
        $this->move = $gesture;
    }

    public function move(): iGesture
    {
        return $this->move;
    }

    public function name(): string
    {
        return $this->name;
    }
}