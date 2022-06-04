@extends('front.master')
@section('content')

<div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1> Products</h1>
                        <p> </p>
                    </div>
                </div>
            </div>


            <div class="row special-list">
              @foreach ( $products as $product )
                    <div class="col-lg-3 col-md-6 special-grid best-seller">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <div class="type-lb">
                                    <p class="sale">Sale</p>
                                </div>
                                <img src= "{{ $product->image_path  }}" class="img-fluid" alt="Image">
                                <div class="mask-icon">
                                    <ul>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                    </ul>

                                </div>
                            </div>
                            <div class="why-text">
                                <h4>{{ $product->description }} </h4>
                                <h5> ${{ $product->price }}</h5>
                            </div>
                        </div>
                    </div>
              @endforeach



            </div>
        </div>
    </div>

@endsection
