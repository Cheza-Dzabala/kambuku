<div class="tab-pane fade" id="morefrom" >
    @foreach($more as $key => $value)
        <div class="col-sm-3">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{ asset($image_path->value.$value['image_path']) }}" height="150px" width="50px" alt="" />
                        <h2>{{ number_format($value['price'], 2) }}</h2>
                        <p>{{ $value['title'] }}</p>
                        <a href="{{ route('classifieds.show', [$value['id']]) }}" type="button" class="btn btn-default add-to-cart">View Item</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>