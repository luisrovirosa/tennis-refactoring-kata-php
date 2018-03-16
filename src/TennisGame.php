<?php

namespace Codium\TennisRefactoring;

class TennisGame
{
    private $m_score1 = 0;
    private $m_score2 = 0;
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
            $this->m_score1++;
        } else {
            $this->m_score2++;
        }
    }

    public function getScore()
    {
        if ($this->m_score1 == $this->m_score2) {
            $score = $this->samePointsScore();
        } elseif ($this->m_score1 >= 4 || $this->m_score2 >= 4) {
            $score = $this->lotsOfPointsScore();
        } else {
            $score = $this->firstPointsScore();
        }
        return $score;
    }

    private function samePointsScore(): string
    {
        $scores = ['Love-All', 'Fifteen-All', 'Thirty-All'];
        return $scores[$this->m_score1] ?? 'Deuce';
    }

    private function firstPointsScore(): string
    {
        $scores = ['Love', 'Fifteen', 'Thirty', 'Forty'];
        return $scores[$this->m_score1] . "-" . $scores[$this->m_score2];
    }

    private function lotsOfPointsScore(): string
    {
        if (($this->m_score1 - $this->m_score2) == 1) {
            $score = "Advantage player1";
        } elseif (($this->m_score1 - $this->m_score2) == -1) {
            $score = "Advantage player2";
        } elseif (($this->m_score1 - $this->m_score2) >= 2) {
            $score = "Win for player1";
        } else {
            $score = "Win for player2";
        }
        return $score;
    }
}