@extends('front.master')
@section('content')
<!-- Start About Page  -->
<div class="about-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="noo-sh-title">We are <span>ThewayShop</span></h2>
                    <p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam
                        voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,
                        sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?
                        Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                </div>
                <div class="col-lg-6">
                    <div class="banner-frame"> <img class="img-thumbnail img-fluid" src="{{ asset('front_files/images/about-img.jpg')}}" alt="" />
                    </div>
                </div>
            </div>
             <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">


                            <ul>
                            @foreach ($items as $item )


                                <li><a href= "{{@ $item->facebook }}" target="_blank"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="{{@ $item->twitter }}" target="_blan"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="{{@ $item->linkedin }}" target="_blan"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                 <li><a href="{{@ $item->whatsapp }}" target="_blan"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            @endforeach

                            </ul>
                        </div>
                    </div>


        </div>
    </div>
    <!-- End About Page -->
@endsection
