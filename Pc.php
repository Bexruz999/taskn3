<?php

class Pc
{

    /**
     * @var string
     */
    private string $key;

    /**
     * @throws \Random\RandomException
     */
    public function __construct()
    {
        $this->key = hash('sha256', uniqid(mt_rand(), true));
    }

    /**
     * @param $n
     * @return int
     * @throws \Random\RandomException
     */
    public function move($steps) {
        $r = random_int(0, count($steps)-1);
        $hmac = hash_hmac('sha256', $r, $this->key);
        echo "HMAC: $hmac\n";
        return $r;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

}