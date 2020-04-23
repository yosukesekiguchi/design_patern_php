<?php

abstract class DisplayAbstract
{
    abstract public function open(): void;
    abstract public function print(): void;
    abstract public function close(): void;

    public final function display()
    {
        $this->open();

        for ($i=0; $i < 5; $i++) { 
            $this->print();
        }

        $this->close();
    }
}

class CharDisplay extends DisplayAbstract
{
    private $ch;

    public function __construct(string $ch)
    {
        $this->ch = $ch;
    }

    public function open(): void
    {
        echo "<<";
    }

    public function print(): void
    {
        echo $this->ch;
    }

    public function close(): void
    {
        echo ">>\n";
    }
}

class StringDisplay extends DisplayAbstract
{
    private $string;
    private $width;

    public function __construct(String $string)
    {
        $this->string = $string;
        $this->width = mb_strlen($this->string);
    }

    public function open(): void
    {
        $this->printLine();
    }

    public function print(): void
    {
        echo "|".$this->string."|\n";
    }

    public function close(): void
    {
        $this->printLine();
    }

    private function printLine(): void
    {
        echo "+";
        for ($i=0; $i < $this->width; $i++) { 
            echo "-";
        }
        echo "+\n";
    }
}

$d1 = new CharDisplay("H");
$d1->display();

$d2 = new StringDisplay("Hello World");
$d2->display();

$d3 = new StringDisplay("こんにちは。");
$d3->display();