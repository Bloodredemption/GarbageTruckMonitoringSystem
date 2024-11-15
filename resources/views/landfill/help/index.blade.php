@extends('layout')

@section('main-content')

<main class="main-content">
    <div class="position-relative iq-banner">
        <!--Nav Start-->
        @include('partials.header')
        <!-- Nav Header Component Start -->
        <div class="iq-navbar-header" style="height: 215px;">
            <div class="container-fluid iq-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flex-wrap d-flex justify-content-between align-items-center">
                            <div>
                                <h1><strong>Help Page</strong></h1>
                                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('lf.dashboard')}}">Dashboard</a></li>
                                        <li class="breadcrumb-item active text-white" aria-current="page">Help</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="iq-header-img" style="background-color: #01A94D;">
                
            </div>
        </div>          
        <!-- Nav Header Component End -->
        <!--Nav End-->
    </div>
    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div class="row">
            
            <div class="col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" data-aos="fade-up" data-aos-delay="800">
                            <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                                <div class="header-title">
                                    <h4 class="card-title">Got a question about waste management?</h4>
                                    <p class="mb-0">Check out our FAQs.</p>          
                                </div>
                                
                            </div>
                            <div class="card-body">
                                <div class="bd-example">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <h4 class="accordion-header" id="headingZero">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseZero" aria-expanded="false" aria-controls="collapseZero">
                                                    How to add waste composition?
                                                </button>
                                            </h4>
                                            <div id="collapseZero" class="accordion-collapse collapse" aria-labelledby="headingZero" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div>
                                                        <h5 class="mb-3">Step 1. Click on Waste Composition</h5>
                                                        <img src="https://images.tango.us/workflows/5e92f430-5eeb-4459-901f-2bd3f42ea935/steps/9425801b-915d-4029-acdd-816f294803fe/6feb9b07-3f38-4639-9a33-cb6c644fd472.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.0934&fp-y=0.2980&fp-z=2.1217&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=20&mark-y=335&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz00MzYmaD03OSZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="Click on Waste Composition" />
                                                    </div>

                                                    <div>
                                                        <h5 class="mb-3">Step 2. Click on Create</h5>
                                                        <img src="https://images.tango.us/workflows/5e92f430-5eeb-4459-901f-2bd3f42ea935/steps/af306fde-0bc6-4426-bb7d-048e4ed46ca2/ccf4adef-e8d2-4c68-94dd-ed8ae015ff88.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.9186&fp-y=0.2856&fp-z=2.8928&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=799&mark-y=325&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz0yMzcmaD05OSZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="Click on Create" />
                                                    </div>

                                                    <div>
                                                        <h5 class="mb-3">Step 3. Fill out the form</h5>
                                                        <img src="https://images.tango.us/workflows/5e92f430-5eeb-4459-901f-2bd3f42ea935/steps/622120ef-eb16-44a7-a83e-46ff56fd38a7/fef9fc22-bbe9-4ec3-829e-dfef393a4c29.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.5003&fp-y=0.4984&fp-z=1.5914&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=286&mark-y=183&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz02MjcmaD0zODQmZml0PWNyb3AmY29ybmVyLXJhZGl1cz0xMA%3D%3D" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="Fill out the form" />
                                                    </div>

                                                    <div>
                                                        <h5 class="mb-3">Step 4. Click on Save changes</h5>
                                                        <img src="https://images.tango.us/workflows/5e92f430-5eeb-4459-901f-2bd3f42ea935/steps/f6151fdc-3a06-42b2-ab60-6f4bd11b9894/34ce70b8-f9e3-4f50-ae8a-6263242361a5.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.6029&fp-y=0.6906&fp-z=2.4605&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=443&mark-y=327&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz0zMTQmaD05NiZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="Click on Save changes" />
                                                    </div>

                                                    <br/>
                                                    <hr/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h4 class="accordion-header" id="headingTwo">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    How to add waste conversion record?
                                                </button>
                                            </h4>
                                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div>
                                                        <h5 class="mb-3">Step 1. Click on Waste Conversions</h5>
                                                        <img src="https://images.tango.us/workflows/371204ef-1042-4653-b466-21c3387b1fe3/steps/193b6466-22a3-436a-aef9-85fab3965ade/d14c6e4a-3688-4f3c-80d9-d1f5ea954c53.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.0934&fp-y=0.3416&fp-z=2.1217&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=20&mark-y=335&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz00MzYmaD03OSZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="Click on Waste Conversions" />
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-3">Step 2. Click on Create</h5>
                                                        <img src="https://images.tango.us/workflows/371204ef-1042-4653-b466-21c3387b1fe3/steps/0b032c1d-8378-4feb-a661-2c5ac38eceec/8f364a71-eda8-42c4-8608-3aace197c797.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.9186&fp-y=0.2908&fp-z=2.8928&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=799&mark-y=325&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz0yMzcmaD05OSZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="Click on Create" />
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-3">Step 3. Fill out the form</h5>
                                                        <img src="https://images.tango.us/workflows/371204ef-1042-4653-b466-21c3387b1fe3/steps/89318bfd-b6fb-4cb2-a8ac-f986694b1593/52ee8cf6-31df-4833-b073-ae30b4dbcbd6.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.5003&fp-y=0.4984&fp-z=1.5026&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=304&mark-y=169&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz01OTImaD00MTImZml0PWNyb3AmY29ybmVyLXJhZGl1cz0xMA%3D%3D" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="Fill out the form" />
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-3">Step 4. Click on Save changes</h5>
                                                        <img src="https://images.tango.us/workflows/371204ef-1042-4653-b466-21c3387b1fe3/steps/769d0482-eb6e-4920-ab7b-fd282821d5e1/f4296bb7-8b4e-41be-8a0a-ef3f6693de69.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.6029&fp-y=0.7124&fp-z=2.4605&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=443&mark-y=327&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz0zMTQmaD05NiZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="Click on Save changes" />
                                                    </div>
                                                    <br/>
                                                    <hr/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
    <!-- Footer Section Start -->
    @include('partials.footer')
    <!-- Footer Section End -->    
</main>

@endsection