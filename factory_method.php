<?php
// Factory Method パターン

// 骨組み（フレームワーク）
abstract class ProductAbstract
{
    abstract public function useCard(): void;
}

abstract class FactoryAbstract
{
    public final function create(String $owner): ProductAbstract
    {
        $p = $this->createProduct($owner);
        $this->registerProduct($p);

        return $p;
    }
    abstract protected function createProduct(String $owner): ProductAbstract;
    abstract protected function registerProduct(ProductAbstract $product): void;
}

// 肉付け（実装）

class IDCard extends ProductAbstract
{
    private $owner;
    public function __construct(String $owner)
    {
        echo $owner."のカードを作ります。\n";
        $this->owner = $owner;
    }
    public function useCard(): void
    {
        echo $this->owner."のカードを使います。\n";
    }

    public function getOwner()
    {
        return $this->owner;
    }
}

class IDCardFactory extends FactoryAbstract
{
    private $owners = array();
    protected function createProduct(String $owner): ProductAbstract
    {
        return new IDCard($owner);
    }

    protected function registerProduct(ProductAbstract $product): void
    {
        $owner[] = $product->getOwner();
    }

    public function getOwners()
    {
        return $this->owners;
    }
    
}

$factory = new IDCardFactory();
$card1 = $factory->create("結城浩");
$card2 = $factory->create("とむら");
$card3 = $factory->create("佐藤花子");
$card1->useCard();
$card2->useCard();
$card3->useCard();