@extends('layouts.front.index')
@section('title','Home - Surya Advertising')
@section('content')
<!-- Start Slider Area -->
<div id="home" class="slider-area">
    <div class="bend niceties preview-2">
        <div id="ensign-nivoslider" class="slides">
            @foreach (\App\Slider::all() as $slider)
            <img src="{{asset($slider->image)}}" alt="" />
            @endforeach
        </div>
    </div>
</div>
<!-- End Slider Area -->

<!-- Start About area -->
{{-- <div id="about" class="about-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <h2>About eBusiness</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- single-well start-->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="well-left">
                    <div class="single-well">
                        <a href="#">
                            <img src="{{ asset('front/img/about/1.jpg') }}" alt="">
</a>
</div>
</div>
</div>
<!-- single-well end-->
<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="well-middle">
        <div class="single-well">
            <a href="#">
                <h4 class="sec-head">project Maintenance</h4>
            </a>
            <p>
                Redug Lagre dolor sit amet, consectetur adipisicing elit. Itaque quas officiis iure
                aspernatur sit adipisci quaerat unde at nequeRedug Lagre dolor sit amet, consectetur
                adipisicing elit. Itaque quas officiis iure
            </p>
            <ul>
                <li>
                    <i class="fa fa-check"></i> Interior design Package
                </li>
                <li>
                    <i class="fa fa-check"></i> Building House
                </li>
                <li>
                    <i class="fa fa-check"></i> Reparing of Residentail Roof
                </li>
                <li>
                    <i class="fa fa-check"></i> Renovaion of Commercial Office
                </li>
                <li>
                    <i class="fa fa-check"></i> Make Quality Products
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End col-->
</div>
</div>
</div> --}}
<!-- End About area -->
<style>
    #services::after {
        content: "";
        background: url('https://img.pngio.com/color-splash-clipart-transparent-color-splash-png-transparent-color-splash-clipart-920_729.png');
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
        opacity: 0.2;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        position: absolute;
        z-index: -1;
    }
</style>
<!-- Start Service area -->
<div id="services" class="services-area area-padding" style="position:relative;">

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline services-head text-center">
                    <h2>Our Services</h2>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="services-contents">
                @foreach (\App\Services::all() as $item)
                <!-- Start Left services -->
                <div class="col-md-4 col-sm-4 col-xs-12 ">
                    <div class="about-move">
                        <div class="services-details">
                            <div class="single-services">
                                <a class="services-icon text-center" href="#">
                                    <img src="{{asset($item->image)}}" style="width:70%" />
                                </a>
                                <h4>{{$item->title}}</h4>
                                <p>
                                    {{$item->description}}
                                </p>
                            </div>
                        </div>
                        <!-- end about-details -->
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
<!-- End Service area -->




<!-- Start reviews Area -->
<div class="reviews-area hidden-xs">
    <div class="work-us">
        <div class="work-left-text">
            <a href="#">
                <img src="https://vinylxpress.com/wp-content/uploads/2016/11/digital-printing-press.jpg" alt="">
            </a>
        </div>
        <div class="work-right-text text-center">
            <h2>working with us</h2>
            <h5>
                {{\App\Services::string()}}.
            </h5>
            <a href="#contact" class="ready-btn">Contact us</a>
        </div>
    </div>
</div>
<!-- End reviews Area -->

<!-- Start portfolio Area -->
<div id="portfolio" class="portfolio-area area-padding fix">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <h2>Our Portfolio</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Start Portfolio -page -->
            <div class="awesome-project-1 fix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="awesome-menu ">
                        <ul class="project-menu">
                            <li>
                                <a href="#" class="active" data-filter="*">All</a>
                            </li>
                            @foreach (\App\Gallery::select('category')->distinct()->get() as $item)

                            <li>
                                <a href="#" data-filter=".{{$item->category}}">{{$item->category}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="awesome-project-content">
                @foreach (\App\Gallery::all() as $item)
                <!-- single-awesome-project start -->
                <div class="col-md-4 col-sm-4 col-xs-12 {{$item->category}}">
                    <div class="single-awesome-project">
                        <div class="awesome-img">
                            <a href="#"><img src="{{asset($item->image)}}" alt="" /></a>
                            <div class="add-actions text-center">
                                <div class="project-dec">
                                    <a class="venobox" data-gall="myGallery" href="{{asset($item->image)}}">
                                        <h4>Business City</h4>
                                        <span>Web Development</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single-awesome-project end -->
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- awesome-portfolio end -->

<!-- Start Testimonials -->
<div class="testimonials-area">
    <div class="testi-inner area-padding">
        <div class="testi-overly"></div>
        <div class="container ">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <!-- Start testimonials Start -->
                    <div class="testimonial-content text-center">
                        <a class="quate" href="#"><i class="fa fa-quote-right"></i></a>
                        <!-- start testimonial carousel -->
                        <div class="testimonial-carousel">
                            @foreach (\App\Testimonial::all() as $item)

                            <div class="single-testi">
                                <div class="testi-text">
                                    <p>
                                        {!! $item->description !!}
                                    </p>
                                    <h6>{{$item->name}}</h6>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- End testimonials end -->
                </div>
                <!-- End Right Feature -->
            </div>
        </div>
    </div>
</div>
<!-- End Testimonials -->
<!-- Start contact Area -->
<div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
        <div class="container ">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Contact us</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Start contact icon column -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="contact-icon text-center">
                        <div class="single-icon">
                            <i class="fa fa-mobile"></i>
                            <p>
                                Call: +1 5589 55488 55<br>
                                <span>Monday-Friday (9am-5pm)</span>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Start contact icon column -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="contact-icon text-center">
                        <div class="single-icon">
                            <i class="fa fa-envelope-o"></i>
                            <p>
                                Email: info@example.com<br>
                                <span>Web: suryaadvertising.com.np</span>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Start contact icon column -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="contact-icon text-center">
                        <div class="single-icon">
                            <i class="fa fa-map-marker"></i>
                            <p>
                                Location: A108 Adam Street<br>
                                <span>NY 535022, USA</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <!-- Start Google Map -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <!-- Start Map -->
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452"
                        width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
                    <!-- End Map -->
                </div>
                <!-- End Google Map -->

                <!-- Start  contact -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form contact-form">
                        <div id="sendmessage">Your message has been sent. Thank you!</div>
                        <div id="errormessage"></div>
                        <form action="" method="post" role="form" class="contactForm">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                    data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" data-rule="minlen:4"
                                    data-msg="Please enter at least 8 chars of subject" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required"
                                    data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validation"></div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>
                </div>
                <!-- End Left contact -->
            </div>
        </div>
    </div>
</div>
<!-- End Contact Area -->

<!-- Start Wellcome Area -->
<div class="wellcome-area">
    <div class="well-bg">
        <div class="test-overly"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="wellcome-text">
                        <div class="well-text text-center">
                            <h2>Keep in touch with us</h2>
                            <p>

                            </p>
                            <div class="subs-feilds">
                                <div class="suscribe-input">
                                    <input type="email" class="email form-control width-80" id="sus_email"
                                        placeholder="Email">
                                    <button type="submit" id="sus_submit" class="add-btn width-20">Subscribe</button>
                                    <div id="msg_Submit" class="h3 text-center hidden"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Wellcome Area -->
@endsection
