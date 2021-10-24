<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Helpers\Cart as CartClass;

class Cart extends Component
{
    private $oldcart;
    private $cart;
    protected $listeners = [
        'cart_updated' => 'render', 
        'added' => 'messageAdded'];

    public function boot()
    {
        $this->oldcart = Session::has('shopingCart') ? Session::get('shopingCart') : null;
        $this->cart = new CartClass($this->oldcart);
    }

    public function render()
    {
        $oldcart = Session::get('shopingCart');
        $cart = new CartClass($oldcart);

        return view('livewire.cart', [
            'products' => $cart->items, 
            'totalPrice' => $cart->calcTotal, ]);
    }
    public function increment($id)
    {
        $this
            ->cart
            ->increaseByOne($id);
        Session::put('shopingCart', $this->cart);
    }

    public function decrement($id)
    {
        $this
            ->cart
            ->reduceByOne($id);
        $this->sessionOperator($this->cart);
    }

    public function remove($id)
    {
        $this
            ->cart
            ->delete($id);
        $this->sessionOperator($this->cart);
    }

    private function sessionOperator(CartClass $cart)
    {
        if (count($cart->items) > 0)
        {
            Session::put('shopingCart', $cart);
        }
        else
        {
            Session::forget('shopingCart');
        }
    }
    
    public function messageAdded($product_title)
    {
        flash()->success($product_title . " is added");
    }

}

