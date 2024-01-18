<x-frontend.frontend-master>

    @section('content')
<div class="welcome_docmed_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="welcome_thumb">
                    <div class="thumb_1">
                        <img src="{{ asset('frontend/img/about/x1.png.pagespeed.ic.gmBngJH7-K.png') }}"
                            alt="" />
                    </div>
                    <div class="thumb_2">
                        <img src="{{ asset('frontend/img/about/x2.png.pagespeed.ic.jYbHUnUZMB.png') }}"
                            alt="" />
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="welcome_docmed_info">
                    <h2>HOSPITAL CONTACT INFORMATION</h2>
                    <h3>
                    THE BEST CHOICE FOR <br/>
                    YOUR HEALTH
                    </h3>
                    <p>Create Reputation with International Professional Quality.</p>
                    <ul>
                        <li><i class="flaticon-right"></i>590 CMT8 Dist.3, HCMC </li>
                        <li><i class="flaticon-right"></i>Tel +10 367 467 8934</li>
                        <li><i class="flaticon-right"></i>Email <a href="">medicalife@gmail.com.vn.com</a> </li>
                    </ul>
                    <a href="{{ route('ui.contact') }}" class="boxed-btn3-white-2">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

</x-frontend.frontend-master>
