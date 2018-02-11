<?php

namespace App\Models;
use Illuminate\Http\Request;

class Cart 
{
    public $items;
    public $totalQty = 0;
    public $totalPrice = 0;
    public $totalShip = 0;
    public $total = 0;

    public function __construct($oldCart)
    {
    	if($oldCart) {
    		$this->items = $oldCart->items;
    		$this->totalQty = $oldCart->totalQty;
    		$this->totalPrice = $oldCart->totalPrice;
            $this->totalShip = $oldCart->totalShip;
            $this->total = $oldCart->total;
    	}
    }

    public function add($item, $id) {
    	$storedItem = ['qty' =>0, 'delivery' => $item->delivery, 'price' => $item->price, 'item' => $item];
    	if ($this->items) {
    		if (array_key_exists($id, $this->items)) {
    			$storedItem = $this->items[$id];
    		}
        }

    	$storedItem['qty']++;
    	$storedItem['delivery'] = $item->delivery * $storedItem['qty'];
    	$storedItem['price'] = $item->price * $storedItem['qty'];
    	$this->items[$id] = $storedItem;
    	$this->totalQty++;
    	$this->totalShip += $item->delivery;
    	$this->totalPrice += $item->price;
        $this->total = $this->totalShip + $this->totalPrice;
    }

    public function reduceByOne($id) {
        $this->items[$id]['qty']--;
        $this->items[$id]['delivery'] -= $this->items[$id]['item']['delivery'];
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalShip -= $this->items[$id]['item']['delivery'];
        $this->totalPrice -= $this->items[$id]['item']['price'];
        $this->total = $this->totalShip + $this->totalPrice;                        

        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }

    public function reduceAddByOne($id) {
        $this->items[$id]['qty']++;
        $this->items[$id]['delivery'] += $this->items[$id]['item']['delivery'];
        $this->items[$id]['price'] += $this->items[$id]['item']['price'];
        $this->totalQty++;
        $this->totalShip += $this->items[$id]['item']['delivery'];
        $this->totalPrice += $this->items[$id]['item']['price'];
        $this->total = $this->totalShip + $this->totalPrice;                

        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }

    public function changeQty($id, $qty) {
        $this->items[$id]['delivery'] = $this->items[$id]['delivery'] - ($this->items[$id]['item']['delivery'] * $this->items[$id]['qty']);
        $this->items[$id]['price'] = $this->items[$id]['price'] - ($this->items[$id]['item']['price'] * $this->items[$id]['qty']);
        $this->totalQty =  $this->totalQty - $this->items[$id]['qty'];
        $this->totalShip = $this->totalShip - ($this->items[$id]['item']['delivery'] * $this->items[$id]['qty']);
        $this->totalPrice = $this->totalPrice - ($this->items[$id]['item']['price'] * $this->items[$id]['qty']);

        $this->items[$id]['qty'] = $qty;
        $this->items[$id]['delivery'] = $this->items[$id]['item']['delivery'] * $this->items[$id]['qty'];
        $this->items[$id]['price'] = $this->items[$id]['item']['price'] * $this->items[$id]['qty'];
        $this->totalQty += $this->items[$id]['qty'];
        $this->totalShip += $this->items[$id]['delivery'];
        $this->totalPrice += $this->items[$id]['price'];
        $this->total = $this->totalShip + $this->totalPrice;

        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);    
            // unset($this->items);
            // $this->totalQty = 0;
    		// $this->totalPrice = 0;
            // $this->totalShip = 0;
            // $this->total = 0;
        }
    }

    public function removeItem($id)
    {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalShip -= $this->items[$id]['delivery'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);    
    }
}