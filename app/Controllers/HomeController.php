<?php

namespace App\Controllers;

use App\Modules\Game\Game;
use App\Modules\Game\Gestures\GesturesCollection;

class HomeController
{
    public function index()
    {
        $collection = new GesturesCollection();

        $game = new Game();

        require_once "app/Views/HomeView.php";
    }
}