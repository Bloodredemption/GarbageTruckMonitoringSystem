<div class="row grid-view">
    @forelse ($wasteCompositions as $wc)
        <div class="col-6 card-container" data-waste-type="{{ $wc->waste_type }}">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="fs-4 fw-bold" style="color: #01A94D;">{{ $wc->brgy->area_name }}</span>
                            <div class="dropdown">
                                <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-dots-vertical">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                        <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                        <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                    </svg>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item update-btn" data-id="{{ $wc->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                                <path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path>
                                                <path d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z"></path>
                                            </svg>
                                            Edit
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <div class="col-12">
                            <p class="text-muted mb-1">Type</p>
                            <p class="fw-bold mb-0">{{ $wc->waste_type }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    Weight: <span class="fw-bold">{{ $wc->metrics }} kg/s</span>
                </div>
            </div>
        </div>
    @empty
        <div class="container text-center">
            <div class="d-flex flex-column align-items-center justify-content-center" style="height: 50vh;">
                <img src="/assets/images/no-waste.svg" class="img-fluid mb-4" width="75%" alt="No Data Found">
                <h3 class="fw-bold">No waste collected today</h3>
                <p style="color: #525356; font-size: 15px;">All waste collected will be displayed here</p>
            </div>
        </div>
    @endforelse
</div>

{{-- List View --}}
<div class="row list-view d-none">
    @forelse ($wasteCompositions as $wc)
        <div class="col-12 card-container" data-waste-type="{{ $wc->waste_type }}">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fs-4 fw-bold" style="color: #01A94D;">{{ $wc->brgy->area_name }}</span>
                            <div class="dropdown">
                                <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-dots-vertical">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                        <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                        <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                    </svg>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item update-btn" data-id="{{ $wc->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                                <path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path>
                                                <path d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z"></path>
                                            </svg>
                                            Edit
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="col-12">
                            <span class="fw-semibold text-muted mb-0">{{ $wc->waste_type }} | {{ $wc->metrics }} kg/s</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="container text-center">
            <div class="d-flex flex-column align-items-center justify-content-center" style="height: 50vh;">
                <img src="/assets/images/no-waste.svg" class="img-fluid mb-4" width="75%" alt="No Data Found">
                <h3 class="fw-bold">No waste collected today</h3>
                <p style="color: #525356; font-size: 15px;">All waste collected will be displayed here</p>
            </div>
        </div>
    @endforelse
</div>