
        @extends('layout.master')
        @section('content')

        <!-- Products Start -->
        <div id="products">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="product-single">
                            @foreach ($errors->all() as $error )
                                <h2>{{$error}}</h2>
                            @endforeach
                            <div class="product-img">
                                <img src="{{asset('img/'.$products->image)}}" alt="Product Image">
                            </div>
                                <div class="product-content">
                                    <h2>
                                        <a href="{{route('single_product',$products->id)}}">{{$products->name}}</a>

                                    </h2>
                                    @if ($products->sellprice!=null)
                                    <h3>${{$products->sellprice}}</h3>
                                    <h3 style="text-decoration: line-through">RS {{$products->price}} </h3>
                                    @else
                                    <h3>RS{{$products->price}}</h3>
                                    @endif
                                    <form action="{{route('add_to_cart')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$products->id}}">
                                        <input type="hidden" name="name" value="{{$products->name}}">
                                        <input type="hidden" name="price" value="{{$products->price}}">
                                        <input type="hidden" name="sell_price" value="{{$products->sellprice}}">
                                        <input type="hidden" name="image" value="{{$products->image}}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                                    </form>
                                </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- Products End -->
        @endsection






