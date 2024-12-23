<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>WATCH - Store</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Product Landing Page" name="keywords">
        <meta content="Product Landing Page" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400|Quicksand:500,600,700&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Nav Start -->
        @include('layout.navbar')
        <!-- Nav End -->




    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="container">



    <section class="cart container mt-2 my-3 py-5">
        <div class="container mt-2">
            <h4>Your Cart</h4>
            @foreach ($errors->all() as $error)
                <h3>{{ $error }}</h3>
            @endforeach
        </div>

        <table class="pt-5">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
                @php
                    $total = 0;
                    $subtotal=0;
                @endphp


                        @if (Session::has('cart'))
                            @foreach (Session::get('cart') as $product)
                            <tr>
                                <td>
                                    <div class="product-info">
                                        <img src="{{asset('img/'.$product['image']);}}">
                                        <div>
                                            <p>{{$product['name']}}</p>
                                            <small><span>RS</span>{{$product['price']}}</small>
                                            <br>
                                            <form action="{{route('remove_from_cart')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$product['id']}}">
                                                <input type="submit" name="remove_btn" class="remove-btn" value="remove">
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                @php
                                    $subtotal = $product['price'] * $product['quantity'];
                                @endphp
                                <td>
                                    <form action="{{route('add_quantity')}}"  method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$product['id']}}">
                                        <input type="number" name="quantity" value="{{$product['quantity']}}">
                                        <input type="submit" value="edit" class="edit-btn" name="edit_product_quantity_btn">
                                    </form>
                                </td>
                                <td>
                                    <span class="product-price">{{$subtotal}}</span>
                                </td>
                            </tr>
                            @php
                                $total=$total+$product['quantity']*$product['price'];
                                $subtotal=0;
                            @endphp
                            @endforeach
                        @endif





        </table>


        <div class="cart-total">
            <table>

                <tr>
                    <td>Total</td>
                    <td>RS {{$total}}</td>
                </tr>

            </table>
        </div>


        <div class="checkout-container">

            <form >
                <input type="submit" class="btn checkout-btn" value="Checkout" name="">
            </form>


        </div>





    </section>



        </div>
    </div>
    <!-- Cart End -->

    @include('layout.footer')







        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/menuspy/menuspy.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
