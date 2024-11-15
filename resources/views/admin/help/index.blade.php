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
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
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
                                                    How to add collection schedule?
                                                </button>
                                            </h4>
                                            <div id="collapseZero" class="accordion-collapse collapse" aria-labelledby="headingZero" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div>
                                                        <h5 class="mb-3">Step 1. Click on Collection Schedule</h5>
                                                        <img src="https://images.tango.us/workflows/59bba407-3dcd-49c7-89f2-4bd3ccdacc08/steps/1a0781a9-bdce-48d7-a20f-f68a8fcb297a/b218318e-d477-41b4-a5bc-e104bb83e7d2.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.1161&fp-y=0.4519&fp-z=1.9497&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=23&mark-y=307&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz00OTgmaD05MSZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="Click on Collection Schedule" />
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-3">Step 2. Click on Create</h5>
                                                        <img src="https://images.tango.us/workflows/59bba407-3dcd-49c7-89f2-4bd3ccdacc08/steps/db641522-07f9-4f8b-9529-c62e59cc0ff3/40c35e5a-5cf7-462a-83d6-f82086fd71d2.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.8891&fp-y=0.2473&fp-z=2.7744&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=690&mark-y=293&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz0yODImaD0xMTgmZml0PWNyb3AmY29ybmVyLXJhZGl1cz0xMA%3D%3D" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="Click on Create" />
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-3">Step 3. Fill out the form</h5>
                                                        <img src="https://images.tango.us/workflows/59bba407-3dcd-49c7-89f2-4bd3ccdacc08/steps/1d53bdaa-6e66-443d-936c-b163d6b276b1/2c4d04c1-1535-4b3e-ba61-0a18126cad75.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.5000&fp-y=0.4973&fp-z=1.2683&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=289&mark-y=97&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz02MjEmaD01MTEmZml0PWNyb3AmY29ybmVyLXJhZGl1cz0xMA%3D%3D" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="Fill up form" />
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-3">Step 4. Click on Save changes</h5>
                                                        <img src="https://images.tango.us/workflows/59bba407-3dcd-49c7-89f2-4bd3ccdacc08/steps/48e0eac1-229f-4940-a8fa-6a240f2387d1/a2390331-146a-4a34-9ac6-49fbbd5cf5da.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.6282&fp-y=0.8242&fp-z=2.3134&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=416&mark-y=362&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz0zNjcmaD0xMTImZml0PWNyb3AmY29ybmVyLXJhZGl1cz0xMA%3D%3D" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="Click on Save changes" />
                                                    </div>
                                                    <br/>
                                                    <hr/>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="accordion-item">
                                            <h4 class="accordion-header" id="headingTwo">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    How to monitor garbage truck?
                                                </button>
                                            </h4>
                                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div>
                                                        <h5 class="mb-3">Step 1. Click on Live Tracking</h5>
                                                        <img src="https://images.tango.us/workflows/5063b818-e80a-49a6-87ca-fe4ced6b6d21/steps/80903b41-28b0-4192-bc4a-3c6cd0ee5c06/ca7fd30f-b385-4373-a8f2-64da4e4842b7.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.1161&fp-y=0.3942&fp-z=1.9497&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=23&mark-y=307&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz00OTgmaD05MSZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="Click on Live Tracking" />
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-3">Step 2. Garbage truck location will be displayed on this map.</h5>
                                                        <img src="https://images.tango.us/workflows/5063b818-e80a-49a6-87ca-fe4ced6b6d21/steps/f0e7599d-c3f0-4bf4-be1e-56a98813384f/376b4d93-61ab-4f32-8215-8ec595521617.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.4956&fp-y=0.5920&fp-z=1.3212&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=254&mark-y=27&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz02OTImaD02NTAmZml0PWNyb3AmY29ybmVyLXJhZGl1cz0xMA%3D%3D" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="Garbage truck location will be displayed on this map." />
                                                    </div>
                                                    <br/>
                                                    <hr/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h4 class="accordion-header" id="headingThree">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    How to add Barangay?
                                                </button>
                                            </h4>
                                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div>
                                                        <h5 class="mb-3">Step 1. Click on Barangay</h5>
                                                        <img src="https://images.tango.us/workflows/d787311a-7251-4a8d-8974-b6a3a3a1cc1d/steps/2521921e-3075-4295-ac5e-771a6f0d5d49/cb00b4e1-f516-429d-89ac-742029f77a22.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.0934&fp-y=0.5161&fp-z=2.1217&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=20&mark-y=335&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz00MzYmaD03OSZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="Click on Barangay" />
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-3">Step 2. Click on Create</h5>
                                                        <img src="https://images.tango.us/workflows/d787311a-7251-4a8d-8974-b6a3a3a1cc1d/steps/4efb7fa5-83e7-495e-87b3-2ac636c8cf21/94770fd3-ae9c-434d-a5c5-3e7f3a512492.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.9186&fp-y=0.2908&fp-z=2.8928&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=799&mark-y=325&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz0yMzcmaD05OSZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="Click on Create" />
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-3">Step 3. Fill out the form</h5>
                                                        <img src="https://images.tango.us/workflows/d787311a-7251-4a8d-8974-b6a3a3a1cc1d/steps/f7c35a51-1415-4566-b1c0-5f6121e70569/5737d073-f11e-47a2-a49d-0e6a34b3515c.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.5003&fp-y=0.4984&fp-z=1.5914&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=286&mark-y=183&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz02MjcmaD0zODQmZml0PWNyb3AmY29ybmVyLXJhZGl1cz0xMA%3D%3D" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="Fill out the form" />
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-3">Step 4. Click on Save changes</h5>
                                                        <img src="https://images.tango.us/workflows/d787311a-7251-4a8d-8974-b6a3a3a1cc1d/steps/91e6159f-020f-4e36-8d65-c08607cc9954/ddc5a784-46dd-4397-917a-e8a62faba53b.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.6029&fp-y=0.6906&fp-z=2.4605&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=443&mark-y=327&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz0zMTQmaD05NiZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="Click on Save changes" />
                                                    </div>
                                                    <br/>
                                                    <hr/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h4 class="accordion-header" id="headingFour">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                    How to add Notification?
                                                </button>
                                            </h4>
                                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div>
                                                        <h5 class="mb-3">Step 1. Click on Notifications</h5>
                                                        <img src="https://images.tango.us/workflows/1076497f-3f3e-4359-a884-2ec8c5ad4b4a/steps/1b24df7a-db5a-469b-aad5-06768d995795/6a47c31b-cf5e-4290-8573-dbc986b9bc5f.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.0934&fp-y=0.5597&fp-z=2.1217&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=20&mark-y=335&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz00MzYmaD03OSZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="Click on Notifications" />
                                                    </div>

                                                    <div>
                                                        <h5 class="mb-3">Step 2. Click on Create</h5>
                                                        <img src="https://images.tango.us/workflows/1076497f-3f3e-4359-a884-2ec8c5ad4b4a/steps/d731ecfa-b57d-4a73-8825-d75c61c6d75b/2583fdc6-5a00-44ec-9427-ab013497f948.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.9186&fp-y=0.2908&fp-z=2.8928&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=799&mark-y=325&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz0yMzcmaD05OSZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="Click on Create" />
                                                    </div>

                                                    <div>
                                                        <h5 class="mb-3">Step 3. Fill out the form</h5>
                                                        <img src="https://images.tango.us/workflows/1076497f-3f3e-4359-a884-2ec8c5ad4b4a/steps/c9676346-061d-4e76-842c-93fa3cfdee0f/e9d9035d-58c3-4b3a-80d3-17e3884beb72.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.5003&fp-y=0.4984&fp-z=1.5914&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=286&mark-y=194&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz02MjcmaD0zNjImZml0PWNyb3AmY29ybmVyLXJhZGl1cz0xMA%3D%3D" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="Fill out the form" />
                                                    </div>

                                                    <div>
                                                        <h5 class="mb-3">Step 4. Click on Save changes</h5>
                                                        <img src="https://images.tango.us/workflows/1076497f-3f3e-4359-a884-2ec8c5ad4b4a/steps/e50b9003-d248-492a-a269-145c6afb680e/50ca591c-e6e6-4442-9b65-24d26184bf7e.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.6029&fp-y=0.6812&fp-z=2.4605&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=443&mark-y=327&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz0zMTQmaD05NiZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="Click on Save changes" />
                                                    </div>
                                                    <br/>
                                                    <hr/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h4 class="accordion-header" id="headingFive">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                    Where to check the residents concerns?
                                                </button>
                                            </h4>
                                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div>
                                                        <h5 class="mb-3">Step 1. Click on Residents Concerns</h5>
                                                        <img src="https://images.tango.us/workflows/43e404fa-8cd9-497b-99bb-b392dcb758d8/steps/0e6bab86-7366-4d9e-ae2d-c33f491e4eeb/0fc859c1-4c51-44ad-88bd-6a9cf3de1aa1.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.0934&fp-y=0.6033&fp-z=2.1217&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=20&mark-y=335&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz00MzYmaD03OSZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="Click on Residents Concerns" />
                                                    </div>

                                                    <div>
                                                        <h5 class="mb-3">Step 2. You will be able to view the concerns sent by the residents.</h5>
                                                        <img src="https://images.tango.us/workflows/43e404fa-8cd9-497b-99bb-b392dcb758d8/steps/1871de52-a3e4-4905-ac59-60ec92cc1a33/d8b36478-ee3d-42d9-8dbb-c65d057c7bb8.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.5879&fp-y=0.4138&fp-z=1.2458&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=16&mark-y=211&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz0xMTY4Jmg9MzI5JmZpdD1jcm9wJmNvcm5lci1yYWRpdXM9MTA%3D" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="You will be able to view the concerns sent by the residents." />
                                                    </div>
                                                    <br/>
                                                    <hr/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h4 class="accordion-header" id="headingSix">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                    How to add new user?
                                                </button>
                                            </h4>
                                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div>
                                                        <h5 class="mb-3">Step 1. Click on Users</h5>
                                                        <img src="https://images.tango.us/workflows/3b9ad8f8-cde4-4df6-953e-edce67bb5352/steps/1e848675-65ff-4c9e-8c1d-f3adcbcdc1f5/48e4a8a6-2602-4d5a-912f-5d8e55d2933a.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.0934&fp-y=0.6469&fp-z=2.1217&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=20&mark-y=335&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz00MzYmaD03OSZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="Click on Users" />
                                                    </div>

                                                    <div>
                                                        <h5 class="mb-3">Step 2. Click on Create</h5>
                                                        <img src="https://images.tango.us/workflows/3b9ad8f8-cde4-4df6-953e-edce67bb5352/steps/7aba630b-1314-4322-b4c0-6dfa96a39d79/94ba9187-812f-4409-a334-11e43eb80c20.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.9186&fp-y=0.2908&fp-z=2.8928&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=799&mark-y=325&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz0yMzcmaD05OSZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="Click on Create" />
                                                    </div>

                                                    <div>
                                                        <h5 class="mb-3">Step 3. Fill out the form</h5>
                                                        <img src="https://images.tango.us/workflows/3b9ad8f8-cde4-4df6-953e-edce67bb5352/steps/4363c11f-969b-4203-8d73-d9c768fadd3f/4b01fbd2-fa83-4e5f-a223-9a4296be7759.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.5003&fp-y=0.4984&fp-z=1.2394&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=356&mark-y=91&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz00ODgmaD01NjcmZml0PWNyb3AmY29ybmVyLXJhZGl1cz0xMA%3D%3D" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="Fill out the form" />
                                                    </div>

                                                    <div>
                                                        <h5 class="mb-3">Step 4. Click on Save changes</h5>
                                                        <img src="https://images.tango.us/workflows/3b9ad8f8-cde4-4df6-953e-edce67bb5352/steps/b4166dbd-6c1f-4c24-a9a2-781b06273cb0/d0a17252-266c-4b1b-ba63-ba57e58ed5ae.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.6029&fp-y=0.8349&fp-z=2.4605&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=443&mark-y=397&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz0zMTQmaD05NiZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="Click on Save changes" />
                                                    </div>

                                                    <br/>
                                                    <hr/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h4 class="accordion-header" id="headingSeven">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                    How to export files?
                                                </button>
                                            </h4>
                                            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div>
                                                        <h5 class="mb-3">Step 1. Click on Export Options</h5>
                                                        <img src="https://images.tango.us/workflows/8988b354-9459-4cfe-a6fd-639c6b84018d/steps/31cd1e16-50c4-4aba-8ebd-27dfd66917e5/04eaaf73-1f4a-4a6e-95ad-ce087b48294e.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.8855&fp-y=0.1641&fp-z=2.8249&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=575&mark-y=290&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz00NzMmaD0xMTQmZml0PWNyb3AmY29ybmVyLXJhZGl1cz0xMA%3D%3D" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="Click on Export Options" />
                                                    </div>

                                                    <div>
                                                        <h5 class="mb-3">Step 2. Select export methods and your good to go!</h5>
                                                        <img src="https://images.tango.us/workflows/8988b354-9459-4cfe-a6fd-639c6b84018d/steps/b3daf55d-1d50-4b9d-880d-a8eb8a0fa30c/2a8e989e-9953-4669-b78a-68638bc85149.png?fm=png&crop=focalpoint&fit=crop&fp-x=0.8702&fp-y=0.2648&fp-z=2.1743&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=719&mark-y=245&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTQlMkNGRjc0NDImdz0yODQmaD0yNjEmZml0PWNyb3AmY29ybmVyLXJhZGl1cz0xMA%3D%3D" style="border-radius: 8px; border: 1px solid #F4F2F7;" width="600" alt="Select export methods and your good to go!" />
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