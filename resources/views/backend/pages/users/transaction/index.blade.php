<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    @include('backend.layouts.partials.styles')
    @yield('styles')
    <title>Banking</title>

</head>

<body>
    <!-- header -->

    <header class="header second_head">
        <div class="container-fluid">
            <div class="row">

                <div style="background-image: url({{ asset('backend/assets/images/header_bg.svg')}})" class="col-12 accout_logo">

                    <div class="row">
                        <div class="col-lg-4">
                            <a class="logo" href="#"><img src="{{ asset('backend/assets/images/logo.svg')}}" alt="logo"></a>
                        </div>

                        <div class="col-lg-8">
                            <div class="hed second_header">
                                <nav class="navbar navbar-expand-lg bg-body-tertiary mt-0">

                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#navbarSupportedContentf" aria-controls="navbarSupportedContentf"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                       <img src="images/menu.png" alt="">
                                    </button>

                                    <div class="collapse navbar-collapse" id="navbarSupportedContentf">

                                        <div class="Wealth w-100">
                                            <ul>
                                                <li><a class="active" href="#">Monica P Brady</a></li>
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Profile & Settings
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                                        <li><a class="dropdown-item" href="#">Another action</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Saved Items <img src="images/shopping-cart.png" alt=""></a></li>
                                                <li><a href="{{ route('admin.logout.submit') }}"
        onclick="event.preventDefault();
                      document.getElementById('admin-logout-form').submit();"><img class="me-1" src="images/lock.png" alt="">Log Out </a></li>

                                            </ul>
                                            <form id="admin-logout-form" action="{{ route('admin.logout.submit') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>


                    <button class="search float-end d-lg-block d-none">Search <i
                            class="fa-solid fa-magnifying-glass"></i></button>
                    <a href="#" class="login d-lg-none d-block">Login</a>
                </div>

                <div class="col-12 head accout_bg ">
                    <div class="hed account_head">
                        <nav class="navbar navbar-expand-lg bg-body-tertiary mt-0">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fa-solid fa-bars"></i>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div class="mainsearch d-lg-none d-bloc">
                                    <form>
                                        <input type="text" placeholder="search">
                                        <button>Search</button>
                                    </form>
                                </div>
                                <div class="Wealth w-100">
                                    <div class="row w-100">
                                        <div class="col-lg-12">
                                            <ul>
                                                <li><a class="active" href="#">Accounts</a></li>
                                                <li><a href="#">Pay & Transfer</a></li>
                                                <li><a href="#">Rewards & Deals</a></li>
                                                <li><a href="#">Tools & Investing</a></li>
                                                <li><a href="#">Security Center</a></li>
                                                <li><a href="#">Open an Account</a></li>
                                                <li><a href="#">Help & Support</a></li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>

            </div>


        </div>
    </header>



    <!-- ******** Account Section ********* -->

    <section id="tab_sec">
        <div class="container-fluid">

            <div class="accounts_tab">
                <h1>Money Market Savings-9729 <i class="bi bi-pencil"></i> <a href="#">Account & routing
                        numbers</a></h1>

                <div class="row bg">

                    <div class="col-lg-4">
                        <div class="set">
                            <h2>${{ $total_balance }}</h2>
                            <p> <a href="#"> Available balance (as of today) </a></p>
                        </div>
                    </div>

                    <div class="col-lg-5 spacing">
                        <div class="set">
                            <h3>Features</h3>
                            <h4>Balance Connect for overdraft protection <a href="#">Linked</a></h4>
                            <h4>Beneficiaries <a href="#">Manage</a></h4>
                            <h4>Paperless statements <a href="#">On Manage</a></h4>

                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="set">
                            <h3>Services</h3>
                            <h5>Set up Direct Deposit</h5>
                            <h5>Order checks/deposit slips</h5>
                            <h5>Oeder a Statements Copy</h5>


                        </div>
                    </div>

                    <div class="col-12">

                        <div class="tab_bg_color">

                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                        aria-selected="true">Activity</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">Statements &
                                        Documents</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact" type="button" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">Infoemation &
                                        Services</button>
                                </li>

                            </ul>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">

                                    <!-- **** Transition Tab ****** -->

                                    <div class="transition_tab">
                                        <div class="row">

                                            <div class="col-lg-9">
                                                <h2>Transitions</h2>
                                                <div class="row">

                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label">Currently viewing</label>
                                                            <select class="form-select"
                                                                aria-label="Default select example">
                                                                <option selected>Transition history</option>
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-5 col-md-10 col-9">
                                                        <div class="form-group">
                                                            <label class="form-label">Search</label>
                                                            <input type="email" class="form-control"
                                                                placeholder="Enter Keyword amount">
                                                            <button type="submit"><i class="bi bi-search"></i></button>
                                                        </div>

                                                    </div>

                                                    <div class="col-lg-2 col-md-2 col-3">
                                                        <div class="fiter_btn">
                                                            <p>Filter <i class="bi bi-filter"></i></p>
                                                        </div>
                                                    </div>

                                                    <ul>
                                                        <li><a href="#">Hide reconile</a></li>
                                                        <li><a href="#">Download</a></li>
                                                        <li><a href="#">Print current view</a></li>
                                                    </ul>

                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Posting data <i class="bi bi-arrow-down"></i>
                                                                    </th>
                                                                    <th>Description <i class="bi bi-arrow-down"></i>
                                                                    </th>
                                                                    <th>Type</th>
                                                                    <th>Amount <i class="bi bi-arrow-down"></i></th>
                                                                    <th>Available balance</th>
                                                                    <th>Reconile</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($history as $admin)
                                                            <tr>
                                                                    <td>{{ $admin->date }}</td>
                                                                    <td>
                                                                    {{ $admin->description }}
                                                                    </td>
                                                                    <td>{{ $admin->transaction_type }}</td>
                                                                    <td>
                                                                    {{ $admin->amount }}
                                                                    </td>
                                                                    <td>
                                                                    {{ $admin->available_balance }}
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input"
                                                                                type="checkbox">
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach    

                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="add_coupon">
                                                    <span>Hello</span>
                                                    <h3>Better Money Habits*</h3>
                                                    <p>Improve your Financial knowledge with our tips and tools.</p>
                                                    <img src="images/icon8.png" alt="">
                                                    <a href="#" class="btn">Discover more</a>
                                                </div>

                                                <div class="goal_box">
                                                    <i class="bi bi-arrow-repeat"></i>
                                                    <h3> <a href="#">Create or view a goal</a> </h3>
                                                </div>


                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    ...</div>

                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">
                                    ...</div>

                            </div>

                        </div>

                    </div>

                </div>



            </div>




        </div>
    </section>





    <!-- ******** Footer Section ********* -->

    <!-- <div class="container">
        <section id="footer">

            <ul class="foot_link">
                <li><a href="#">Locations</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Help & Support</a></li>
                <li><a href="#">Browse with Specialist</a></li>
                <li><a href="#">Accessible Banking</a></li>
                <li><a href="#">Privacy</a></li>
                <li><a href="#">Security</a></li>
                <li><a href="#">Online Banking Service Agreement</a></li>
                <li><a href="#">Advertising Practices layer</a></li>
                <li><a href="#">CA Opt-Out Preference Signals Honored</a></li>
                <li><a href="#">Site Map</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Share Your Feedback</a></li>
                <li><a href="#">View Full Online Banking Site</a></li>

            </ul>

            <div class="socail">
                <h2>Connect with us</h2>
                <ul>
                    <li><a href="#"><img src="images/facebook.png" alt=""></a></li>
                    <li><a href="#"><img src="images/instagram.png" alt=""></a></li>
                    <li><a href="#"><img src="images/linkin.png" alt=""></a></li>
                    <li><a href="#"><img src="images/printrest.png" alt=""></a></li>
                    <li><a href="#"><img src="images/twitter.png" alt=""></a></li>
                    <li><a href="#"><img src="images/youtube.png" alt=""></a></li>
                </ul>
                <p>Bank of America, N.A. Member FDIC. <a href="#"> Equal Housing Lender</a></p>
                <p>© 2023 Bank of America Corporation. All rights reserved.</p>
                <h3><a href="#">Patent: patents.bankofamerica.com</a></h3>
            </div>


        </section>
    </div> -->


    <!-- Option 1: Bootstrap Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>