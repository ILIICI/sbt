<?php
namespace App\Http\Livewire;

use App\Helpers\Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\ProductTag;
use Livewire\WithPagination;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Session;

class Dashboard extends Component
{
    use WithPagination;

    public $search;
    public $checkbox;
    public array $quantity = [];

    protected $rules = [
        'quantity' => 'required', 
        'quantity.*' => 'gt:0|integer', ];

    protected $messages = ['quantity.*.gt' => 'Must be greater than 0', 
                            'quantity.*.integer' => 'Quantity should be a whole number',];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.dashboard', [
            'tags' => $this->showTags() , 
            'groupedProducts' => $this->filter($this->checkbox, $this->search) , ]);
    }
    public function addToCart($product_id)
    {
        $this->validate();

        $product = Product::findOrFail($product_id);
        $oldcart = Session::has('shopingCart') ? Session::get('shopingCart') : null;
        $cart = new Cart($oldcart);

        $cart->add($product, $product->id, $this->quantity[$product_id]);

        Session::put('shopingCart', $cart);
        $this->emit('cart_updated');
        $this->emit('added', $product->product_title);
        unset($this->quantity);
    }

    public function showTags()
    {
        return TagController::getAllTags();
    }

    public function filter($tag = null, $search = null)
    {

        if (!is_null($tag) && !($tag == 0) && !is_null($search))
        {
            return $this->search_Tag_Filter($tag, $search);
        }
        if (!is_null($tag) && !($tag == 0))
        {
            return $this->tagFilter($tag);
        }
        if (!is_null($search) && ($tag == 0))
        {
            return $this->searchFilter($search);
        }
        if (!is_null($search))
        {
            return $this->searchFilter($search);
        }

        return Product::with('attributes', 'tags')->simplePaginate(12);
    }

    private function searchFilter($word)
    {
        return Product::where('product_title', 'LIKE', "%$word%")->simplePaginate(12);
    }

    private function tagFilter($id)
    {
        $product_id = ProductTag::where('tag_id', $id)->get('product_id');

        return Product::whereIn('id', $product_id)->simplePaginate(12);
    }

    private function search_Tag_Filter($tagid, $searchword)
    {
        $product_id = ProductTag::where('tag_id', $tagid)->get('product_id');

        return Product::whereIn('id', $product_id)->where(function ($query) use ($searchword)
        {
            $query->where('product_title', 'LIKE', "%$searchword%");
        })->simplePaginate(12);
    }
}

