<?php

namespace App\Modules\Game\Gestures;

interface iGesture
{
    public function name(): string ;
    public function winning(string $name): bool;
}