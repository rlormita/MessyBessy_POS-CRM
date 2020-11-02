<div class="transaction-content">
    <div class="transaction-container">
        <div class="transaction-shop">
<<<<<<< HEAD
            <div class="shop-header">
                <!-- Shop Header -->
                <div class="header-actions header-top">
                    <a href="/home" type="a" class="btn search-btn" exact>
                        <i class="far fa-home"></i>
                        <span>Home</span>
                    </a>
                </div>
                <div class="header-title">
                    <h3>Messy Products</h3>
                    <h5>Store ID: <span id="branch-location">Messy-MOA</span></h5>
                </div>
                <div class="header-actions header-right">
                    <input type="text" class="form-control" placeholder="Search" wire:model="searchText" /></i>
                    <button type="button" class="btn barcode-btn">
                        <i class="far fa-barcode"></i>
                        <span>Scan</span>
                    </button>
                </div>
            </div>
            <div class="header-actions">
                <label for="">Category</label>
                <select class="form-control" wire:model="category">
                    <option value="">Choose One</option>
                </select>
            </div>
            <div class="shop-body">
                @foreach($products as $product)
                <div class="product-items row">
                    <div class="product-item col-4">
                        <div class="item-info">
                            <div class="item-main-info">
                                <h4 class="item-name">
                                    {{ $product->name }}
                                </h4>
                                <span class="item-weight">
                                    240ml
                                </span>
                            </div>
                            <span class="item-price">
                                Php {{ $product->price }}
                            </span>
                            <img src="{{ url('img/products/') }}/{{ $product->image }}" />
                        </div>
                    </div>
=======
                <div class="shop-header">
                        <!-- Shop Header -->
                        <div class="header-actions header-top">
                            <a href="/home" type="a" class="btn search-btn" exact>
                                <i class="far fa-home"></i>
                                <span>Home</span>
                            </a>
                        </div>
                        <div class="header-title">
                            <h3>Messy Products</h3>
                            <h5>Store ID: <span id="branch-location">Messy-MOA</span></h5>
                        </div>
                        <div class="header-actions header-right">
                                <input type="text"  class="form-control" placeholder="Search" wire:model="searchText"/>
                            <button type="button" class="btn barcode-btn">
                                <i class="far fa-barcode"></i>
                                <span>Scan</span>
                            </button>
                            <label for = "categories">Select Category</label>
                            <select wire:model="categories" class="form-select form-control">
                                @foreach ($categories as $category)
                                     <option value="{{$category['id']}}">{{$category['name']}}</option>
                                @endforeach
                            </select>

                        </div>
                </div>
                
                <div class="shop-body">
                    @foreach($products as $product)
                    <div class="product-items row">
                        <div class="product-item col-4">
                            <div class="item-info">
                                <div class="item-main-info">
                                    <h4 class="item-name">
                                        {{ $product->name }}
                                    </h4>
                                    <span class="item-weight">
                                        240ml
                                    </span>
                                </div>
                                <span class="item-price">
                                    Php {{ $product->price }}
                                </span>
                                <img src="{{ url('img/products/') }}/{{ $product->image }}"/>
                            </div>
                        </div>
                    </div>
                    @endforeach
                {{ $products->links() }}
>>>>>>> 54669d1ff30b4f01aecec0590c90b75b94c8f026
                </div>
                @endforeach
                {{ $products->links() }}
            </div>

        </div>
        <div class="transaction-cart">hwh
        </div>
    </div>
</div>