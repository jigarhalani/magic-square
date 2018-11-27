<?php

class Square
{
    private $size;
    private $square;
    private $row;
    private $col;

    public function __construct($size)
    {
        $this->size = $size;

        $this->initSquare();
        $this->moveTo(0, 0);
    }

    private function initSquare()
    {
        $this->square = [];
        for ($i = 0; $i < $this->size; $i++) {
            $row = [];
            for ($j = 0; $j < $this->size; $j++) {
                $row[] = null;
            }

            $this->square[] = $row;
        }
    }

    public function display()
    {
        foreach ($this->square as $row) {
            foreach ($row as $col) {
                printf("%3d ", $col);
            }
            printf("\n");
        }
    }

    public function moveTo($row, $col)
    {
        $this->row = $row;
        $this->col = $col;
    }

    public function moveLeft()
    {
        $this->col--;

        if ($this->col < 0) {
            $this->col = $this->size - 1;
        }
    }

    public function moveRight()
    {
        $this->col++;

        if ($this->col >= $this->size) {
            $this->col = 0;
        }
    }

    public function moveUp()
    {
        $this->row--;

        if ($this->row < 0) {
            $this->row = $this->size - 1;
        }
    }

    public function moveDown()
    {
        $this->row++;

        if ($this->row >= $this->size) {
            $this->row = 0;
        }
    }

    public function store($num)
    {
        $this->square[$this->row][$this->col] = $num;
    }

    public function isFilled()
    {
        return $this->square[$this->row][$this->col] !== null;
    }
}