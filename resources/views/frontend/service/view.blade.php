<x-frontend.frontend-master>

    @section('content')
        <div class="bradcam_area breadcam_bg bradcam_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="bradcam_text">
                            <h3>Services</h3>
                            <p><a href="{{ route('home.index') }}">Home /</a> Services</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="our_department_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section_title text-center mb-55">
                            <h3>Our services</h3>
                            <p>To Provide World-Class Medical Expertise People Trust</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($services as $service)
                        <div class="col-xl-4 col-md-6 col-lg-4">
                            <div class="single_department">
                                <div class="department_thumb">
                                    <img src="{{ $service->photo }}" alt="">
                                </div>
                                <div class="service_content">
                                    <h3 style="font-weight: bold"><a href="#">{{ $service->name }}</a></h3>
                                    <h3>Description:</h3>{{ $service->description }}
                                    <h3>Cost:</h3>{{ $service->service_cost }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection

</x-frontend.frontend-master>
