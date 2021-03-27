<?php

namespace Tests;

use App\Modules\Game\Game;
use App\Modules\Game\Gestures\GesturesCollection;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function testUserInput():void
    {
        $game = new Game();
        $gesturesCollection = new GesturesCollection();
        $_POST = ['action'=>'rock'];
        $this->assertEquals("../../Storage/rock_human_big.jpg", $game->getUsersChoice($gesturesCollection));
    }

    public function testTie():void
    {
        $game = new Game();
        $gesturesCollection = new GesturesCollection();
        foreach($game->playerCollection() as $player){
            $player->setMove($gesturesCollection->collection()[1]);
        }
        $_POST = ['action' => 'rock'];
        $this->assertEquals("It's a tie!!!", $game->checkWinner());
    }

    public function testRockPaper():void
    {
        $game = new Game();
        $gesturesCollection = new GesturesCollection();

        $game->playerCollection()[0]->setMove($gesturesCollection->collection()[0]);
        $game->playerCollection()[1]->setMove($gesturesCollection->collection()[1]);

        $_POST = ['action' => 'rock'];
        $this->assertEquals("PC won!!", $game->checkWinner());
    }

    public function testPaperScissor():void
    {
        $game = new Game();
        $gesturesCollection = new GesturesCollection();

        $game->playerCollection()[0]->setMove($gesturesCollection->collection()[1]);
        $game->playerCollection()[1]->setMove($gesturesCollection->collection()[2]);

        $_POST = ['action' => 'paper'];
        $this->assertEquals("PC won!!", $game->checkWinner());
    }
    public function testScissorRock():void
    {
        $game = new Game();
        $gesturesCollection = new GesturesCollection();

        $game->playerCollection()[0]->setMove($gesturesCollection->collection()[2]);
        $game->playerCollection()[1]->setMove($gesturesCollection->collection()[0]);

        $_POST = ['action' => 'scissor'];
        $this->assertEquals("PC won!!", $game->checkWinner());
    }
    public function testScissorPaper():void
    {
        $game = new Game();
        $gesturesCollection = new GesturesCollection();

        $game->playerCollection()[0]->setMove($gesturesCollection->collection()[2]);
        $game->playerCollection()[1]->setMove($gesturesCollection->collection()[1]);

        $_POST = ['action' => 'scissor'];
        $this->assertEquals("HUMAN won!!", $game->checkWinner());
    }
}