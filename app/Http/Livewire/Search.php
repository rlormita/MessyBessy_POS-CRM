<?php
 
namespace App\Http\Livewire;
 
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\ProductCategory;
 
class Search extends Component
{
    use WithPagination;
    public $searchText;
    public $category;
 
    public function render()
    {
        $searchText = '%'.$this->searchText.'%';
        return view('livewire.search',[
            'products' => Product::where('name','like', $searchText)->paginate(10)
        ]);

        $category = '%'.$this->category.'%';
        return view('livewire.search', [
        	'categories' => ProductCategory::where('name','like', $category)->paginate(10)
        ]);



    }
}
?>