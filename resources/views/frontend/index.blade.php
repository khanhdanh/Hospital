<x-frontend.frontend-master>

@section('content')

	<x-frontend.frontend-slider></x-frontend.frontend-slider>

    @include('frontend.layouts.service')

    <x-frontend.frontend-docmed_area></x-frontend.frontend-docmed_area>

    @include('frontend.layouts.department')

    <!-- <x-frontend.frontend-testmonial></x-frontend.frontend-testmonial> -->
    <!-- <x-frontend.frontend-business_expert></x-frontend.frontend-business_expert> -->

    @include('frontend.layouts.doctor')

    <x-frontend.frontend-emergency_contact></x-frontend.frontend-emergency_contact>


@endsection

</x-frontend.frontend-master>
