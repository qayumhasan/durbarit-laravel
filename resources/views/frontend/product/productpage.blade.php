@extends('layouts.website')
@section('title', 'Product | '.$seo->meta_title)
@section('content')

<!--- product part start -->
<section id="product">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="product_header">
                    <h3>Product</h3>
                    <span class="triangle_product"></span>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="product_post">
    <div class="container wow animate__animated animate__fadeIn animate__delay-0.7s">
        <div class="row">

            @foreach($product as $pro)
            <div class="col-sm-4">
                <div class="product_single_box">
                    <div class="product_image">
                        <a href="{{url('/product/details/'.$pro->id)}}">
                            <img src="{{asset('public/uploads/product/'.$pro->image)}}" style="height: 220px;" class="w-100" alt="image">
                        </a>
                    </div>

                    <div class="product_price">
                        <div class="product_cont">
                            <h5><a href="{{url('/product/details/'.$pro->id)}}">{{ Str::limit($pro->product_name,'32','..')}}</a></h5>
                            <span> by {{$pro->owner}}</span>
                        </div>
                        <div class="product_price_left">
                            <ul>
                                <li><span><b>{{$pro->reqular_price}}</b></span></li>
                                <li><span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </li>
                                <li><span style="font-size: 12px;">{{$pro->number_of_sale}} Sales</span></li>
                            </ul>
                        </div>
                        <form id="option-choice-form{{$pro->id}}">
                            
                        <input type="hidden" name="product_id" value="{{$pro->id}}"/>
                                    <input type="hidden" name="product_type" value="1"/>
                                    <input type="hidden" id="package_id" name="package_id" value="1"/>
                        <div class="product_price_right">
                            <span><a href="{{url('/product/details/'.$pro->id)}}">Preview</a></span>
                            <span onclick="addtocart({{$pro->id}})"><a href="#"><i class="fas fa-cart-plus"></i></a></span>
                        </div>
                        </form>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>

</section>
<!--- product part end-->

<script>
    function addtocart(id) {
        
        $.ajax({
            type: 'GET',
            url: "{{ route('product.add.cart') }}",
            data: $('#option-choice-form'+id).serializeArray(),

            success: function(data) {

                toastr.success(data.data);
                const cart = document.querySelector('#cart');
                cart.dataset.totalitems = data.count;
                document.getElementById('cartdatacount').innerHTML = data.count;
            }
        });
    }
</script>

@endsection