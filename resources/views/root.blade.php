<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    @include('backend.layouts.partials.styles')
    @yield('styles')
    <title>Banking</title>

</head>

<body>

    <!-- ******** Home Banner ********* -->

    <div class="container">
        <section id="home_banner" style="background-image: url({{ asset('backend/assets/images/home_banner.webp') }});">


            <div class="row">

                <div class="col-lg-3">
                    <div class="home_form">
                        <form action="">
                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="User ID">
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" id="password" placeholder="Password">
                            </div>

                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Save User ID
                                </label>
                            </div>

                            <button type="submit">Log In</button>
                            <p><a href="#">Forgot ID/Password?</a></p>
                            <h4><a href="#">Security & Help</a> <a href="#">Enroll</a></h4>

                            <h5><a href="#">Open an Account</a></h5>

                        </form>
                    </div>

                    <div class="atm_add">
                        <a href="#" class="btn"><i class="bi bi-geo-alt-fill"></i>Find your closest financial center or
                            ATM</a>
                        <a href="#" class="btn sec"><i class="bi bi-calendar-date"></i>Schedule an Appointment</a>
                    </div>

                </div>

                <div class="col-lg-9">
                    <div class="heading">
                        <h2>Go where your financial goals meet one-on-one guidance</h2>
                        <p>Visit us right here at one of our locations in the greater Cincinnati area to talk to a local
                            expert about buying a home, planning for the future and more.</p>

                        <a href="#" class="btn">Talk us</a>
                    </div>
                </div>

            </div>

        </section>
    </div>

    <!-- ******** Comment Section ********* -->

    <section id="comment">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pe-0">
                    <div class="comment_box" style="background-image: url({{ asset('backend/assets/images/b1.webp') }});">
                        <div class="set">
                            <h2>Committed to your financial wellness</h2>
                            <p>For a second year, we've been certified by J.D. Power for providing outstanding client
                                satisfaction for financial wellness support.</p>
                            <a href="#">Learn more <i class="bi bi-chevron-right"></i></a>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6 ps-0">
                    <div class="comment_box" style="background-image: url({{ asset('backend/assets/images/b2.webp') }});">
                        <div class="set">
                            <h2>Meet the next generation of change‑makers</h2>
                            <p>Bank of America's Student Leaders<sup>®</sup> program connects students to their
                                communities.</p>
                            <a href="#">Learn more <i class="bi bi-chevron-right"></i></a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ******** Card Section ********* -->

    <div class="container">
        <section id="save_card">

            <div class="row">

                <div class="col-lg-3">
                    <div class="box">
                        <img src="{{ asset('backend/assets/images/c1.svg') }}" alt="">
                        <h2>Save on interest</h2>
                        <p>Stop paying higher interest rates and save with the <strong>BankAmericard®</strong> credit
                            card. </p>
                        <a href="#">Apply now <i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="box">
                        <img src="{{ asset('backend/assets/images/c2.svg') }}" alt="">
                        <h2>$200 checking <br>cash offer</h2>
                        <p><strong>Earn a $200</strong> bonus when you open a new personal checking account and make
                            qualifying direct deposits. </p>
                        <a href="#">See offer details <i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="box">
                        <img src="{{ asset('backend/assets/images/c3.svg') }}" alt="">
                        <h2>Custom mobile alerts</h2>
                        <p>With our Mobile Banking app, prioritize what you see based on what matters most to you.</p>
                        <a href="#">Get the app<i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="box">
                        <img src="{{ asset('backend/assets/images/c4.svg') }}" alt="">
                        <h2 style="color: #012169">Investment solutions for you</h2>
                        <p>We offer a range of solutions to help you pursue your goals. Find the approach that fits your
                            needs. </p>
                        <a href="#">Get started <i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>

            </div>

        </section>
    </div>

    <!-- ******** Footer Section ********* -->
    <div class="container">
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
                    <li><a href="#"><img src="{{ asset('backend/assets/images/facebook.png') }}" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('backend/assets/images/instagram.png') }}" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('backend/assets/images/linkin.png') }}" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('backend/assets/images/printrest.png') }}" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('backend/assets/images/twitter.png') }}" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('backend/assets/images/youtube.png') }" alt=""></a></li>
                </ul>
                <p>Bank of America, N.A. Member FDIC. <a href="#"> Equal Housing Lender</a></p>
                <p>© 2023 Bank of America Corporation. All rights reserved.</p>
                <h3><a href="#">Patent: patents.bankofamerica.com</a></h3>
            </div>


        </section>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    @include('backend.layouts.partials.scripts')
    @yield('scripts')

</body>

</html>