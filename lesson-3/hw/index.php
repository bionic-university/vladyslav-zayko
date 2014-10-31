<?php

spl_autoload_register(function ($class) {
    include 'src/' . $class . '.php';
});

$mike = new Xaker($argv[1]);

if($mike->crack()) {
    echo "Holy shit! You did it!";
} else {
    echo "Well, try next time";
}

echo PHP_EOL;