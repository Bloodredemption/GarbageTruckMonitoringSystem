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
                                <h1><strong>Collection Schedule Records</strong></h1>
                                <p>Contains collection schedule details.</p>
                            </div>
                            {{-- <div>
                                <a href="" class="btn btn-link btn-soft-light">
                                    <img src="data:image/svg+xml,%3Csvg width='20' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Crect width='30' height='30' fill='url(%23pattern0_135_433)'/%3E%3Cdefs%3E%3Cpattern id='pattern0_135_433' patternContentUnits='objectBoundingBox' width='1' height='1'%3E%3Cuse xlink:href='%23image0_135_433' transform='scale(0.0333333)'/%3E%3C/pattern%3E%3Cimage id='image0_135_433' width='30' height='30' xlink:href='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAaklEQVR4nO3UUQqAIAyA4R0v6djRRax7/FHPC8JNabXvVeWHoYqk3wJW7JaWsIs44e8DZmCnnw0oWvhc6K1q4SEkw7xt1NL+SjJ8yVHL3c/lfLmqtrFoccdwBabHB63hcQfDh63ihJM4OwBPnU7F1RVbMAAAAABJRU5ErkJggg=='/%3E%3C/defs%3E%3C/svg%3E%0A" alt="img">
                                    Print
                                </a>
                            </div> --}}
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
                                    <h4 class="card-title">Waste Composition List</h4>
                                    {{-- <p class="mb-0">Sub Title Here</p>           --}}
                                </div>
                                
                            </div>
                            <div class="card-body px-0">
                                <div class="table-responsive">
                                    <table id="user-list-table" class="table table-striped" role="grid" data-bs-toggle="data-table">
                                        <thead>
                                            <tr class="ligth" style="background-color: #01A94D; color: white;">
                                                <th>Sample</th>
                                                <th>Sample</th>
                                                <th>Sample</th>
                                                <th>Sample</th>
                                                <th>Sample</th>
                                                <th>Sample</th>
                                                <th>Join Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Sample</td>
                                                <td>Sample</td>
                                                <td>Sample</td>
                                                <td>Sample</td>
                                                <td><span class="badge bg-primary">active</span></td>
                                                <td>Sample</td>
                                                <td>2019/12/01</td>
                                            </tr>
                                        </tbody>
                                    </table>
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