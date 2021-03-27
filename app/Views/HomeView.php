<?php namespace App\Views;?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="app/Views/styles.css"/>
      <title>Home</title>
  </head>
  <body>
  <section class="frame"></section>
  <section class="grid">
      <div class="grid-container">
          <div class="box1">
              <div class="desc"><h3>HUMAN SCORE: <?PHP echo $game->playerCollection()[0]->score() ?></h3></div>
                  <img class="grid-container" src="<?PHP echo $game->getUsersChoice($collection) ?>" alt="paperHuman" >
          </div>
          <div class="box2"> <div class="desc"><h3>PC SCORE: <?PHP echo $game->playerCollection()[1]->score() ?></h3></div>
              <img class="grid-container" src="../../Storage/<?PHP echo $game->getPcChoice($collection) ?>_robo_big.jpg" alt="roboRock">
          </div>
      </div>
      <div class="grid-container2">
          <?PHP
          foreach($collection->collection() as $gesture){
             echo "<form method='POST'>
                  <input class='grid-container2' type='image' src='../../Storage/{$gesture->name()}_human.jpg' alt=''/>
                  <input type='hidden' name='action' value='{$gesture->name()}'>
              </form>";
         }?>
      </div>
      <h2><?PHP echo $game->checkWinner() ?></h2>

  </section>
</html>
