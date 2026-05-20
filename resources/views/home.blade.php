@extends('layouts.app')

@section('content')
<div class="container-xxl">
    <!-- Welcome Section -->
    <div class="row justify-content-center mb-4">
        <div class="col-12">
            <div class="card bg-primary text-white">
                <div class="card-body text-center py-5">
                    <h1 class="display-4 fw-bold">Welcome to Build Bright University</h1>
                    <p class="lead fs-4">Your gateway to academic excellence and personal growth</p>
                    <p class="mb-0">Explore our campus, connect with faculty, and discover opportunities that shape your future.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- School Statistics -->
    <div class="row justify-content-center mb-4">
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                        <div class="col-9">
                            <p class="text-dark mb-0 fw-semibold fs-14">Total Students</p>
                            <h3 class="mt-2 mb-0 fw-bold text-primary">2,847</h3>
                        </div>
                        <div class="col-3 align-self-center">
                            <div class="d-flex justify-content-center align-items-center thumb-xl bg-primary bg-opacity-10 rounded-circle mx-auto">
                                <i class="iconoir-graduation-cap h1 align-self-center mb-0 text-primary"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mb-0 text-truncate text-muted mt-3"><span class="text-success">12%</span> Increase this year</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                        <div class="col-9">
                            <p class="text-dark mb-0 fw-semibold fs-14">Faculty Members</p>
                            <h3 class="mt-2 mb-0 fw-bold text-success">156</h3>
                        </div>
                        <div class="col-3 align-self-center">
                            <div class="d-flex justify-content-center align-items-center thumb-xl bg-success bg-opacity-10 rounded-circle mx-auto">
                                <i class="iconoir-teacher h1 align-self-center mb-0 text-success"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mb-0 text-truncate text-muted mt-3"><span class="text-success">5%</span> New faculty joined</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                        <div class="col-9">
                            <p class="text-dark mb-0 fw-semibold fs-14">Programs Offered</p>
                            <h3 class="mt-2 mb-0 fw-bold text-info">48</h3>
                        </div>
                        <div class="col-3 align-self-center">
                            <div class="d-flex justify-content-center align-items-center thumb-xl bg-info bg-opacity-10 rounded-circle mx-auto">
                                <i class="iconoir-book h1 align-self-center mb-0 text-info"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mb-0 text-truncate text-muted mt-3"><span class="text-success">3</span> New programs added</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                        <div class="col-9">
                            <p class="text-dark mb-0 fw-semibold fs-14">Campus Facilities</p>
                            <h3 class="mt-2 mb-0 fw-bold text-warning">24</h3>
                        </div>
                        <div class="col-3 align-self-center">
                            <div class="d-flex justify-content-center align-items-center thumb-xl bg-warning bg-opacity-10 rounded-circle mx-auto">
                                <i class="iconoir-building h1 align-self-center mb-0 text-warning"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mb-0 text-truncate text-muted mt-3"><span class="text-success">2</span> New facilities built</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row">
        <!-- Announcements -->
        <div class="col-lg-8 mb-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Latest Announcements</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=100&q=80" alt="Announcement" class="rounded me-3" width="80" height="80">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">New Academic Year Begins</h6>
                                    <p class="text-muted mb-2">Welcome back students! The 2026-2027 academic year starts with exciting new programs and facilities.</p>
                                    <small class="text-muted">Posted 2 days ago</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=100&q=80" alt="Announcement" class="rounded me-3" width="80" height="80">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Research Symposium</h6>
                                    <p class="text-muted mb-2">Join us for the annual research symposium featuring student and faculty presentations.</p>
                                    <small class="text-muted">Posted 1 week ago</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <img src="https://images.unsplash.com/photo-1517649763962-0c623066013b?auto=format&fit=crop&w=100&q=80" alt="Announcement" class="rounded me-3" width="80" height="80">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Campus Wellness Fair</h6>
                                    <p class="text-muted mb-2">Free health screenings, fitness classes, and wellness resources available this weekend.</p>
                                    <small class="text-muted">Posted 3 days ago</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <img src="https://images.unsplash.com/photo-1513161455079-7dc1de15ef3e?auto=format&fit=crop&w=100&q=80" alt="Announcement" class="rounded me-3" width="80" height="80">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Arts Showcase Opening</h6>
                                    <p class="text-muted mb-2">Celebrate student creativity with our annual arts and culture showcase event.</p>
                                    <small class="text-muted">Posted 5 days ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Links & Info -->
        <div class="col-lg-4">
            <!-- Quick Links -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Quick Links</h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="iconoir-graduation-cap me-2 text-primary"></i>
                            Academic Calendar
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="iconoir-book me-2 text-success"></i>
                            Course Catalog
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="iconoir-teacher me-2 text-info"></i>
                            Faculty Directory
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="iconoir-building me-2 text-warning"></i>
                            Campus Map
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="iconoir-users me-2 text-danger"></i>
                            Student Portal
                        </a>
                    </div>
                </div>
            </div>

            <!-- Upcoming Events -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Upcoming Events</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h6 class="mb-1">Orientation Week</h6>
                        <p class="text-muted small mb-1">September 1-7, 2026</p>
                        <small class="text-primary">Campus-wide event</small>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <h6 class="mb-1">Career Fair</h6>
                        <p class="text-muted small mb-1">October 14, 2026</p>
                        <small class="text-primary">Student Center</small>
                    </div>
                    <hr>
                    <div class="mb-0">
                        <h6 class="mb-1">Homecoming Weekend</h6>
                        <p class="text-muted small mb-1">November 8-10, 2026</p>
                        <small class="text-primary">Various locations</small>
                    </div>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Contact Information</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <i class="iconoir-phone me-3 text-primary"></i>
                        <div>
                            <p class="mb-0 fw-semibold">Phone</p>
                            <p class="text-muted small mb-0">(555) 123-4567</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="iconoir-mail me-3 text-success"></i>
                        <div>
                            <p class="mb-0 fw-semibold">Email</p>
                            <p class="text-muted small mb-0">info@brightfielduniversity.edu</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="iconoir-map-pin me-3 text-info"></i>
                        <div>
                            <p class="mb-0 fw-semibold">Address</p>
                            <p class="text-muted small mb-0">123 Elm Street, Springfield</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
