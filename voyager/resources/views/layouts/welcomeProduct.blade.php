<div class="item">
    <div class="box">
        <a href="product/{{ $product->name }}">
        <img src="{{ asset('storage/'.$product->image) }}" alt="">
        </a>
        <div class="box-val">
            <div class="box-name"><a href="product/{{ $product->name }}">{{ $product->name }}</a></div>
            <div class="add-box">
                <button class="btn btn-fc">
                    {{ $product->priceCurrency() }}
                </button>
                @if ($product->pricee() > 0)
                <button type="button" class="btn" onclick="add_to_cart({{ $product->id }});"><i class="fas fa-shopping-cart"></i></button>
                @endif
                
            </div>
        </div>
    </div>
</div>