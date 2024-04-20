<?php

class User
{
    public function move($steps)
    {
        echo "Available moves: \n";
        foreach ($steps as $k => $step) {
            echo $k+1 . " - $step\n";
        }
        echo "0 - exit\n? - help\n";
        return $this->getMove($steps);
    }

    private function getMove($steps) {
        $move = readline("Enter your move: ");
        if ($move === '0') {
            exit();
        } elseif($move === '?') {
            Table::printHelp();
            $this->move($steps);
        }
        elseif (array_key_exists((int)$move-1, $steps)) {
            return (int)$move-1;
        } else {
            $this->move($steps);
        }
    }
}