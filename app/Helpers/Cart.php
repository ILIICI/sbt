<?php
namespace App\Helpers;

class Cart
{

    public $items = null;
    public $calcTotal = 0;

    public function __construct($oldcart)
    {
        if ($oldcart)
        {
            $this->items = $oldcart->items;
            $this->calcTotal = $oldcart->calcTotal;
        }
    }
    public function calcTotalPrice()
    {
        if (!is_null($this->items))
        {
            $suma = 0;
            foreach ($this->items as $item)
            {
                $suma += ($item['item']['product_price'] * $item['qty']) / 100;
            }
            $this->calcTotal = $suma;
        }
    }

    public function add($item, $id, int $qty)
    {

        $price = $item->product_price / 100;
        $storedItem = ['qty' => 0, 'price' => $price, 'item' => $item];
        if ($this->items)
        {
            if (array_key_exists($id, $this->items))
            {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty'] = $storedItem['qty'] + $qty;
        $storedItem['price'] = $price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->calcTotalPrice();

    }

    public function increaseByOne($id)
    {
        $this->items[$id]['qty']++;
        $this->items[$id]['price'] += ($this->items[$id]['item']['product_price'] / 100);
        $this->calcTotalPrice();
    }

    public function reduceByOne($id)
    {
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= ($this->items[$id]['item']['product_price'] / 100);
        if ($this->items[$id]['qty'] <= 0)
        {
            unset($this->items[$id]);
        }
        $this->calcTotalPrice();
    }

    public function delete($id)
    {
        flash()->warning($this->items[$id]['item']['product_title'] . " is delete");
        unset($this->items[$id]);
        $this->calcTotalPrice();
    }
}

