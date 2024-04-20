<?php

use dekor\ArrayToTextTable;

class Table
{
    /**
     * @var array
     */
    private static array $help;

    /**
     * @var array
     */
    private static array $table;


    /**
     * @param $steps
     */
    public function __construct($steps)
    {
        $n = count($steps);

        $p = ($n-1)/2;

        for ($a = 0; $a<$n; $a++) {
            for ($b = 0; $b<$n; $b++) {
                self::$help[$a]['v PC/User >'] = $steps[$a];
                self::$help[$a][$steps[$b]]=$this->isWin(($a-$b+$p+$n)%$n-$p);
                self::$table[$a][$b]=$this->sign(($a-$b+$p+$n)%$n-$p);
            }
        }
    }

    /**
     * @return array
     */
    public function getTable(): array
    {
        return self::$table;
    }

    /**
     * @return void
     */
    public static function printHelp()
    {
        echo (new ArrayToTextTable(self::$help))->render()."\n";
    }

    /**
     * @param $n
     * @return string
     */
    private function isWin($n): string
    {
        $bool = $this->sign($n);
        if($bool>0)return 'Win';
        elseif($bool<0)return 'Lose';
        else return 'Draw';
    }

    /**
     * @param $n
     * @return int
     */
    private function sign($n): int {
        return ($n < 0) - ($n > 0);
    }
}