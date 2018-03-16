<?php

namespace Codium\TennisRefactoring;

class TennisGame
{
    private $player1PointsWonOnGame = 0;
    private $player2PointsWonOnGame = 0;
    private $player1Name = '';
    private $player2Name = '';

    public function __construct($player1Name, $player2Name)
    {
        $this->player1Name = $player1Name;
        $this->player2Name = $player2Name;
    }

    public function wonPoint(string $playerName)
    {
        if ('player1' == $playerName) {
            $this->player1PointsWonOnGame++;
        } else {
            $this->player2PointsWonOnGame++;
        }
    }

    public function getScore()
    {
        if ($this->player1PointsWonOnGame == $this->player2PointsWonOnGame) {
            return $this->samePointsScore();
        } elseif ($this->player1PointsWonOnGame >= 4 || $this->player2PointsWonOnGame >= 4) {
            return $this->lotsOfPointsScore();
        } else {
            return $this->firstPointsScore();
        }
    }

    private function samePointsScore(): string
    {
        $scores = ['Love-All', 'Fifteen-All', 'Thirty-All'];
        return $scores[$this->player1PointsWonOnGame] ?? 'Deuce';
    }

    private function firstPointsScore(): string
    {
        $scores = ['Love', 'Fifteen', 'Thirty', 'Forty'];
        return $scores[$this->player1PointsWonOnGame] . "-" . $scores[$this->player2PointsWonOnGame];
    }

    private function lotsOfPointsScore(): string
    {
        $winner = $this->player1PointsWonOnGame > $this->player2PointsWonOnGame ? 'player1': 'player2';
        $hasFinished = abs($this->player1PointsWonOnGame - $this->player2PointsWonOnGame) >= 2;
        return $hasFinished ? "Win for $winner" : "Advantage $winner";
    }
}