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
                        <form method="POST" action="{{ route('admin.login.submit') }}">
                            @csrf
                            @include('backend.layouts.partials.messages')
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="User ID" name="email">
                                    <div class="text-danger"></div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                <div class="text-danger"></div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Save User ID
                                </label>
                            </div>

                            <button id="form_submit" type="submit">Sign In <i class="ti-arrow-right"></i></button>
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

    <!-- ******** Financial Section ********* -->

   <section id="financial">
      <div class="container">
         <h1>Financial guidance for every stage of life.</h1>
         <h2>Better Money Habits® is here to help with your decisions along the way.</h2>

         <div class="home">

            <div class="owl-carousel financial owl-theme">

            <div class="item">
                <div class="set" style="background-image: url('{{ asset('backend/assets/images/card1.jpg') }}')">
                    <div class="set_box">
                        <a href="#"><img src="{{ asset('backend/assets/images/f1.svg') }}" alt="">Pay off credit card debt faster</a>
                    </div>
                </div>
                </div>

                <div class="item">
                    <div class="set" style="background-image: url('{{ asset('backend/assets/images/card2.jpg') }}')">
                        <div class="set_box">
                            <a href="#"><img src="{{ asset('backend/assets/images/f2.svg') }}" alt="">6 simple steps to jump-start your emergency fund</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="set" style="background-image: url('{{ asset('backend/assets/images/card3.jpg') }}')">
                        <div class="set_box">
                            <a href="#"><img src="{{ asset('backend/assets/images/f3.svg') }}" alt="">What is a CD and how do they work?</a>
                        </div>
                    </div>
                </div>

                <div class="item">
                <div class="set" style="background-image: url('{{ asset('backend/assets/images/card4.jpg') }}')">
                    <div class="set_box">
                        <a href="#"><img src="{{ asset('backend/assets/images/f4.svg') }}" alt="">Buying a home within your comfort zone</a>
                    </div>
                </div>
                </div>


            </div>
         </div>

         <h3>Explore more topics and build your financial know-how.</h3>
         <div class="text-center">
            <a href="#" class="btn">Visit Better Money Habits®</a>
         </div>

      </div>
   </section>

   <!-- ******** Your news and information ********* -->
   <div class="container">
      <section id="information">

         <h1>Your news and information</h1>
         <div class="row">
            <div class="col-lg-6">
               <div class="phone_box">
                  <h3>Level up your account security</h3>
                  <p>Watch your security meter rise as you take action against fraud. See it in the Security
                     Center in Mobile and Online Banking.</p>
                  <a href="#" class="btn">Check your level</a>
               </div>

            </div>

            <div class="col-lg-6">
               <div class="phone_img" style="background-image: url('{{ asset('backend/assets/images/phone1.webp') }}')">

               </div>
            </div>

         </div>

         <div class="information_sec" style="background-image:url('{{ asset('backend/assets/images/phone_bg.jpg') }}')">

            <div class="row">
               <div class="col-lg-6">
                  <div class="phone_box">
                     <h3>Secure, convenient banking with our Mobile app</h3>
                     <a href="#" class="btn">Explore our app</a>
                  </div>

               </div>

               <div class="col-lg-6">
                  <div class="phone_img" style="background-image: url(images/phone2.png);">

                  </div>
               </div>

            </div>
         </div>

      </section>
   </div>

   <!-- ******** Online Banking ********* -->

   <div class="container">
      <section id="online_bank">

         <h5><a href="#">Online Banking Service Agreement</a></h5>
         <p>Investing in securities involves risks, and there is always the potential of losing money when you invest
            in securities. You should review any planned financial transactions that may have tax or legal
            implications with your personal tax or legal advisor.</p>

         <p>Securities products are provided by Merrill Lynch, Pierce, Fenner & Smith Incorporated (also referred to
            as "MLPF&S", or "Merrill"), a registered broker-dealer, registered investment adviser, Member SIPC
            layer, and a wholly-owned subsidiary of Bank of America Corporation. MLPF&S makes available certain
            investment products sponsored, managed, distributed or provided by companies that are affiliates of Bank
            of America Corporation.</p>

         <p>Bank of America Private Bank is a division of Bank of America, N.A., Member FDIC and a wholly owned
            subsidiary of Bank of America Corporation. Trust and fiduciary services are provided by Bank of America,
            N.A. and U.S. Trust Company of Delaware. Both are indirect subsidiaries of Bank of America Corporation.
         </p>

         <p>Insurance Products are offered through Merrill Lynch Life Agency Inc. (MLLA) and/or Banc of America
            Insurance Services, Inc., both of which are licensed insurance agencies and wholly-owned subsidiaries of
            Bank of America Corporation.</p>

         <p>Banking, credit card, automobile loans, mortgage and home equity products are provided by Bank of
            America, N.A. and affiliated banks, Members FDIC and wholly owned subsidiaries of Bank of America
            Corporation. Credit and collateral are subject to approval. Terms and conditions apply. This is not a
            commitment to lend. Programs, rates, terms and conditions are subject to change without notice.</p>

         <h2>Investment and insurance products:</h2>

         <table class="legal-invest-table">
            <tbody>
               <tr>
                  <td class="cell">Are Not FDIC Insured</td>
                  <td class="cell">Are Not Bank Guaranteed</td>
                  <td class="cell">May Lose Value</td>
               </tr>
               <tr>
                  <td class="cell">Are Not Deposits</td>
                  <td class="cell">Are Not Insured by Any Federal Government Agency</td>
                  <td class="cell">Are Not a Condition to Any Banking Service or Activity</td>
               </tr>
            </tbody>
         </table>

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