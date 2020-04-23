<?php

abstract class PrintAbstract
{
    public abstract function printWeak(): void;
    public abstract function printStrong(): void;
}

class Banner
{
    private $string;
    
    public function __construct(String $string)
    {
        $this->string = $string;
    }

    public function showWithParen(): void
    {
        echo "(".$this->string.")\n";
    }

    public function showWithAsert(): void
    {
        echo "*".$this->string."*\n";
    }
}

class PrintBanner extends Banner implements IPrint
{
    public function __construct(String $string)
    {
        parent::__construct($string);
    }

    public function printWeak(): void
    {
        $this->showWithParen();
    }

    public function printStrong(): void
    {
        $this->showWithAsert();
    }
}

$p = new PrintBanner("Hello");
$p->printWeak();
$p->printStrong();

