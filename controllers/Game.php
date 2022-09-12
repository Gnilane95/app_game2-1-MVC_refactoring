<?php
namespace Controllers ;
require_once("models/Game.php");
class Game
{
    public function index()
    {
        $model = new \Models\Game();
        $games = $model->getAll("name");
        /**
         * Show view
         */
        require("view/homePage.php");
    }

    public function show()
    {
        $model = new \Models\Game();
        $game= $model->get();
        $title = $game['name'];
        require("view/showPage.php");
    }
}