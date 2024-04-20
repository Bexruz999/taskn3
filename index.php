<?php

require __DIR__.'/vendor/autoload.php';
require_once 'Table.php';
require_once 'Pc.php';
require_once 'Game.php';
require_once 'User.php';

$game = new Game();

$game->start();
