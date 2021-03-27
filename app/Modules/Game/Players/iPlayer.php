<?php

namespace App\Modules\Game\Players;

use App\Modules\Game\Gestures\iGesture;

interface iPlayer
{
    public function __construct(string $name);
    public function setMove(iGesture $gesture): void;
    public function move(): iGesture;
    public function name(): string;
}