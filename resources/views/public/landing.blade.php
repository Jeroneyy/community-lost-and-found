<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Community Lost-and-Found, Missing Pet, and Property Recovery Management System. Report lost items, found property, missing pets, and help your community recover what matters.">
    <title>Community Recovery System — Lost & Found, Missing Pets</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    {{-- Public Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary d-flex align-items-center" href="{{ route('home') }}">
                <span class="d-inline-flex align-items-center justify-content-center bg-primary text-white rounded-3 me-2" style="width: 32px; height: 32px; box-shadow: 0 2px 8px rgba(37,99,235,0.3);">
                    <i class="bi bi-shield-check"></i>
                </span>
                <span>Community Recovery</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#publicNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="publicNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="#how-it-works">How It Works</a></li>
                    <li class="nav-item"><a class="nav-link" href="#report-types">Report Types</a></li>
                </ul>
                <div class="d-flex gap-2">
                    @auth
                        @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">
                            <i class="bi bi-speedometer2 me-1"></i> Dashboard
                        </a>
                        @else
                        <a href="{{ route('resident.dashboard') }}" class="btn btn-primary">
                            <i class="bi bi-speedometer2 me-1"></i> Dashboard
                        </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-primary">Sign In</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    {{-- Hero Section --}}
    <section class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 fw-bold mb-3">Community Lost & Found<br>Recovery System</h1>
            <p class="lead mb-4 mx-auto" style="max-width: 700px;">
                Help your community recover lost belongings and reunite missing pets.
                Report, search, match, and recover — all in one secure platform.
            </p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="{{ route('register') }}" class="btn btn-light btn-lg px-4">
                    <i class="bi bi-person-plus me-2"></i>Get Started
                </a>
                <a href="#how-it-works" class="btn btn-outline-light btn-lg px-4">
                    <i class="bi bi-info-circle me-2"></i>Learn More
                </a>
            </div>

            {{-- Quick Stats --}}
            @php
                $totalReports = \App\Models\Report::count();
                $recovered = \App\Models\Report::whereIn('status', ['recovered', 'reunited'])->count();
                $totalUsers = \App\Models\User::where('status', 'active')->count();
            @endphp
            <div class="row g-4 mt-5 justify-content-center">
                <div class="col-md-3 col-6">
                    <div class="bg-white bg-opacity-10 rounded-3 p-3">
                        <div class="fs-2 fw-bold">{{ $totalReports }}</div>
                        <div class="small opacity-75">Total Reports</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="bg-white bg-opacity-10 rounded-3 p-3">
                        <div class="fs-2 fw-bold">{{ $recovered }}</div>
                        <div class="small opacity-75">Items Recovered</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="bg-white bg-opacity-10 rounded-3 p-3">
                        <div class="fs-2 fw-bold">{{ $totalUsers }}</div>
                        <div class="small opacity-75">Active Members</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Report Types Section --}}
    <section id="report-types" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center fw-bold mb-2">Report Types</h2>
            <p class="text-center text-muted mb-5">Four categories to help organize and match reports efficiently.</p>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 text-center border-0 shadow-sm">
                        <div class="card-body py-4">
                            <div class="rounded-circle bg-danger bg-opacity-10 text-danger d-inline-flex align-items-center justify-content-center mb-3" style="width:64px;height:64px;">
                                <i class="bi bi-exclamation-triangle fs-3"></i>
                            </div>
                            <h5 class="fw-bold">Lost Property</h5>
                            <p class="text-muted small">Report items you have lost — phones, wallets, IDs, keys, documents, and more.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 text-center border-0 shadow-sm">
                        <div class="card-body py-4">
                            <div class="rounded-circle bg-success bg-opacity-10 text-success d-inline-flex align-items-center justify-content-center mb-3" style="width:64px;height:64px;">
                                <i class="bi bi-box-seam fs-3"></i>
                            </div>
                            <h5 class="fw-bold">Found Property</h5>
                            <p class="text-muted small">Register items you have found so the rightful owner can be located and notified.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 text-center border-0 shadow-sm">
                        <div class="card-body py-4">
                            <div class="rounded-circle bg-warning bg-opacity-10 text-warning d-inline-flex align-items-center justify-content-center mb-3" style="width:64px;height:64px;">
                                <i class="bi bi-search-heart fs-3"></i>
                            </div>
                            <h5 class="fw-bold">Missing Pets</h5>
                            <p class="text-muted small">Report a missing pet with photos and details so the community can help.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 text-center border-0 shadow-sm">
                        <div class="card-body py-4">
                            <div class="rounded-circle bg-info bg-opacity-10 text-info d-inline-flex align-items-center justify-content-center mb-3" style="width:64px;height:64px;">
                                <i class="bi bi-heart fs-3"></i>
                            </div>
                            <h5 class="fw-bold">Found Pets</h5>
                            <p class="text-muted small">Report a found or sheltered animal so it can be safely reunited with its owner.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- How It Works --}}
    <section id="how-it-works" class="py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-2">How It Works</h2>
            <p class="text-center text-muted mb-5">A simple process to help recover what matters.</p>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center mb-3" style="width:56px;height:56px;">
                            <span class="fw-bold fs-5">1</span>
                        </div>
                        <h5 class="fw-bold">Submit a Report</h5>
                        <p class="text-muted">Create a detailed report with photos, location, and description of the lost or found item or pet.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center mb-3" style="width:56px;height:56px;">
                            <span class="fw-bold fs-5">2</span>
                        </div>
                        <h5 class="fw-bold">Smart Matching</h5>
                        <p class="text-muted">Our system automatically identifies possible matches based on category, description, location, and date.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center mb-3" style="width:56px;height:56px;">
                            <span class="fw-bold fs-5">3</span>
                        </div>
                        <h5 class="fw-bold">Recover & Reunite</h5>
                        <p class="text-muted">Verify ownership through secure claims, arrange a safe handover, and confirm the recovery.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Features --}}
    <section id="features" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Key Features</h2>
            <div class="row g-4">
                @php
                $features = [
                    ['icon' => 'bi-search', 'title' => 'Advanced Search', 'desc' => 'Filter by category, location, date, and status to find matching reports.'],
                    ['icon' => 'bi-link-45deg', 'title' => 'Smart Matching', 'desc' => 'Automated scoring compares reports and notifies you of potential matches.'],
                    ['icon' => 'bi-shield-lock', 'title' => 'Secure Claims', 'desc' => 'Structured ownership verification protects against fraudulent claims.'],
                    ['icon' => 'bi-map', 'title' => 'Community Map', 'desc' => 'Interactive map shows approximate incident locations across barangays.'],
                    ['icon' => 'bi-bell', 'title' => 'Notifications', 'desc' => 'Real-time alerts for matches, claims, and status changes.'],
                    ['icon' => 'bi-bar-chart', 'title' => 'Analytics', 'desc' => 'Community recovery statistics and trend reports for administrators.'],
                ];
                @endphp
                @foreach($features as $feature)
                <div class="col-md-6 col-lg-4">
                    <div class="d-flex gap-3">
                        <div class="text-primary fs-3"><i class="bi {{ $feature['icon'] }}"></i></div>
                        <div>
                            <h6 class="fw-bold">{{ $feature['title'] }}</h6>
                            <p class="text-muted small mb-0">{{ $feature['desc'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0 small">
                        <i class="bi bi-shield-check me-1"></i>
                        Community Recovery System &copy; {{ date('Y') }}
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0 small text-muted">
                        BSIT Capstone Project — Lost & Found Management
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
