<?php

class Game
{
    private array $steps;

    private int $stepCount;

    private $table;

    private $pc;

    private $user;

    private $pcMove;
    private mixed $userMove;

    public function __construct()
    {
        global $argv;
        $this->steps = array_splice($argv, 1);

        $this->stepCount = count($this->steps);

        if ($this->stepCount <= 1 || !($this->stepCount % 2) || $this->has_dupes($this->steps)) {
            echo "Enter odd number ≥ 3 non-repeating strings." . "\n";
            exit();
        }

        $this->table = (new Table($this->steps))->getTable();
        $this->pc = new Pc();
        $this->user = new User();

    }

    public function start()
    {
        $this->pcMove = $this->pc->move($this->steps);
        $this->userMove = $this->user->move($this->steps);
        $this->showMoves();
        $this->checkwin();
        echo "HMAC key: " . $this->pc->getKey() . "\n";
    }

    private function has_dupes($array) {

        if (count($array) !== count(array_unique($array))){
            return true;
        }

        return false;
    }

    private function showMoves()
    {
        echo "Your move:  ".$this->steps[$this->userMove]."\n";
        echo "Computer move: ".$this->steps[$this->pcMove]."\n";
    }

    private function checkwin()
    {
        $win = $this->table[(int)$this->pcMove][(int)$this->userMove];
        if ($win > 0) {
            echo "You win!\n";
        } elseif ($win < 0) {
            echo "Computer win!\n";
        } else {
            echo "Draw!\n";
        }
    }
}