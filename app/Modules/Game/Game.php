<?php

namespace App\Modules\Game;

use App\Modules\Game\Gestures\GesturesCollection;
use App\Modules\Game\Players\Player;

class Game
{
    private array $playerCollection = [];

    public function __construct()
    {
        $this->playerCollection[] = new Player("HUMAN");
        $this->playerCollection[] = new Player("PC");
    }

    public function playerCollection(): array
    {
        return $this->playerCollection;
    }

    public function getUsersChoice(GesturesCollection $gestureCollection): string
    {
        if (key($_POST) === null) {
            return "../../Storage/rock_human_big.jpg";
        } else {
            $findGesture = null;
            foreach($gestureCollection->collection() as $gesture)
            {
                if($gesture->name() === $_POST['action'])
                {
                    $findGesture = $gesture;
                }
            }
            foreach ($this->playerCollection as $player) {
                if ($player->name() === "HUMAN") {
                    $player->setMove($findGesture);
                }
            }
            return "../../Storage/{$_POST['action']}_human_big.jpg";
        }
    }

    public function getPcChoice(GesturesCollection $gestureCollection): string
    {
        if (key($_POST) === null) {
            return "rock";
        } else {
            $pcChoice = $gestureCollection->collection()
            [rand(0, count($gestureCollection->collection()) - 1)];
            foreach ($this->playerCollection as $player) {
                if ($player->name() === "PC") {
                    $player->setMove($pcChoice);
                }
            }
            return $pcChoice->name();
        }
    }

    public function checkWinner(): string
    {
        if (key($_POST) === null){
            return "Let's go!!!";
        }else if($this->playerCollection[0]->move() === $this->playerCollection[1]->move()){
            return "It's a tie!!!";
        }else if($this->playerCollection[0]->move()->winning($this->playerCollection[1]->move()->name())){
            $this->playerCollection[0]->addScore();
            return "{$this->playerCollection[0]->name()} won!!";
        }else{
            $this->playerCollection[1]->addScore();
            return "{$this->playerCollection[1]->name()} won!!";
        }
    }
}