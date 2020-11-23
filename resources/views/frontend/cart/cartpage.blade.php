@extends('layouts.website')
@section('title', 'Cart | '.$seo->meta_title)
@section('content')
<section id="shop_cart">
        <div class="container">
            <div class="row">

                <div class="col-sm-12">
                    <div class="shopping_header">
                        <h3 class="text-center">Shopping Cart</h3>
                        <div class="card">
                            <div class="card-header card-header-cart">
                                <div class="row">
                                    <div class="col-sm-6 text-left">
                                        <div class="cart_count">
                                            <h5>You have 1 item in your cart</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <div class="cart_em">
                                            <a href="#">empty cart</a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="cart_name">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Image</th>
                                                        <th scope="col">Product Name</th>
                                                        <th scope="col">Quantity</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Trash</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>

                                                        <td>
                                                            <div class="pro_img">
                                                                <img src="images/Mobile-Marketing.png" alt="image">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="pro_name">
                                                                <h5>Lorem ipsum dolor sit amet.</h5>
                                                            </div>
                                                        </td>
                                                        <td>2</td>
                                                        <td><span class="price_bold"><b>58$</b></span></td>
                                                        <td><span><a href="#"><i
                                                                        class="fas fa-trash-alt"></i></a></span></td>
                                                    </tr>
                                                    <tr>

                                                        <td>
                                                            <div class="pro_img">
                                                                <img src="images/Mobile-Marketing.png" alt="image">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="pro_name">
                                                                <h5>Lorem ipsum dolor sit amet.</h5>
                                                            </div>
                                                        </td>
                                                        <td>2</td>
                                                        <td><span class="price_bold"><b>59$</b></span></td>
                                                        <td><span><a href="#"><i
                                                                        class="fas fa-trash-alt"></i></a></span></td>
                                                    </tr>
                                                    <tr>

                                                        <td>
                                                            <div class="pro_img">
                                                                <img src="images/Mobile-Marketing.png" alt="image">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="pro_name">
                                                                <h5>Lorem ipsum dolor sit amet.</h5>
                                                            </div>
                                                        </td>
                                                        <td>2</td>
                                                        <td><span class="price_bold"><b>78$</b></span></td>
                                                        <td><span><a href="#"><i
                                                                        class="fas fa-trash-alt"></i></a></span></td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="left_cont">
                                            <p>Lorem ipsum dolor sit amet?
                                                <br>
                                                <a href="#">Click Here to Add It</a>
                                            </p>
                                            <form>
                                                <div class="form-row align-items-center">
                                                    <div class="col-auto">

                                                        <input type="text" class="form-control mb-2"
                                                            id="inlineFormInput" placeholder="Coupon Code">
                                                    </div>
                                                    <div class="col-auto">
                                                        <button type="submit" class="btn_cart">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <div class="right-content">
                                            <div class="total without-coupon" style="font-size: 18px;">
                                                <span class="title"><b>Total Amount</b></span>
                                                <span class="total-price"><b>US$59</b></span>
                                            </div>
                                            <div class="mt-3">
                                                <p class="text-info">You have to login before purchase!</p>
                                            </div>
                                            <a href="auth_page.html"
                                                class="btn btn-info float-right">Login</a>
                                            <a href="auth_page.html" class="btn btn-dark"
                                                style="margin-right:10px;">Register</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
