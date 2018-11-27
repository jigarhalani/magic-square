<?php

// Magic Square Program
require './square.php';

// Get Inputs
printf("Enter size: ");
fscanf(STDIN, "%d", $size);

if ($size < 3 || $size % 2 == 0) {
    printf("Invalid size entered\n");
    exit();
}

printf("Enter starting number: ");
fscanf(STDIN, "%d", $start);

printf("Enter increment amount: ");
fscanf(STDIN, "%d", $step);

printf("Enter starting row and column: ");
fscanf(STDIN, "%d%d", $row, $col);

// Initialization
$square = new Square($size);
$number = $start;
$limit  = $size * $size;

// Logic
$square->moveTo($row, $col);

for ($i = 0; $i < $limit; $i++) {
    $square->store($number);

    $square->moveUp();
    $square->moveRight();
    if ($square->isFilled()) {
        $square->moveLeft();
        $square->moveDown();
        $square->moveLeft();
    }

    $number += $step;
}

// Output
$square->display();