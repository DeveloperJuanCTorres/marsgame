@extends('layouts.app')

@section('content')

    
      <section class="py-0">
        <!-- <div class="bg-holder" style="background-image:url(assets/img/illustrations/bg.png);background-position:left center;background-size:auto 816px;">
        </div> -->
        <!--/.bg-holder-->
        
        @include('layouts.carrousel')

        <div class="container">
          <div class="row align-items-center min-vh-100">
            <div class="col-md-7 col-xl-7 pt-9 text-md-start text-center">
              <h1 class="display-2 text-light fw-thin">Obtendras grandes <br class="d-none d-xl-block" />beneficios <strong class="fw-bolder">MarsGame </strong></h1>
              <p class="fs-2 text-400">Simple Steps You Can Take to Improve Your <br class="d-none d-xxl-block" />Financial Well-Being for the rest of Your Life </p><a class="btn btn-primary btn-ensurance mt-5" href="#!"><span class="fas fa-chevron-right fa-xs btn-icon"></span><span class="btn-text">Learn more</span></a>
            </div>
            <div class="col-md-5 col-xl-5 pe-xxl-0">
              <div class="card card-bg shadow hero-header-form">
                <div class="card-body p-4 p-xl-6">
                  <h2 class="text-100 text-center">¡Obtén tus beneficios aquí!</h2>
                  <form class="mb-3">
                    <div class="form-floating mb-3">
                      <input class="form-control input-box form-ensurance-header-control" id="floatingName" type="text" placeholder="name" />
                      <label for="floatingName">Your name</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input class="form-control input-box form-ensurance-header-control" id="floatingPhone" type="number" placeholder="name@example.com" />
                      <label for="floatingPhone">Phone</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input class="form-control input-box form-ensurance-header-control" id="floatingEmail" type="email" placeholder="name@example.com" />
                      <label for="floatingEmail">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input class="form-control input-box form-ensurance-header-control" id="floatingCatrgory" type="text" placeholder="Insurance Category" />
                      <label for="floatingCatrgory">Insurance Category</label>
                    </div>
                    <div class="form-floating mb-3">
                      <textarea class="form-control input-box form-ensurance-header-control" id="floatingTextarea" placeholder="Leave a comment here"></textarea>
                      <label for="floatingTextarea">Comments</label>
                    </div>
                    <div class="col-12 d-grid">
                      <button class="btn btn-primary rounded-pill" type="submit">Quiero ser suscriptor</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="products">
        <div class="bg-holder d-none d-md-block" style="background-image:url(assets/img/illustrations/bg-car-insurance.png);background-position:0 200px;background-size:100% 45%;">
        </div>
        <!--/.bg-holder-->

        <div class="bg-holder d-none d-md-block" style="background-image:url(assets/img/illustrations/bg-left1.png);background-position:left;background-size:15% 100%;">
        </div>
        <!--/.bg-holder-->

        <div class="bg-holder d-none d-xl-block  mt-11" style="background-image:url(assets/img/illustrations/circle.png);background-position:18% 49%;;background-size:auto;">
        </div>
        <!--/.bg-holder-->

        <div class="container-lg">
          <div class="row flex-center py-8 py-md-10">
            <div class="col-12 mt-6">
              <div class="d-flex align-items-start">
                <div class="nav flex-column nav-tab" id="nav-tab" role="tablist" aria-orientation="vertical"><a class="circle-hover-wrapper nav-link mb-lg-4 active" id="nav-car-tab" href="#!" data-bs-toggle="tab" data-bs-target="#nav-car" role="tab" aria-controls="nav-car" aria-selected="true">
                    <div class="icon-box"><img class="car-insurance-icon" src="assets/img/icons/car.png" alt="..." /><img class="car-insurance-icon car-insurance-icon-hover" src="assets/img/icons/car-hover.png" alt="..." /></div>
                  </a><a class="circle-hover-wrapper nav-link mb-lg-4" id="nav-home-tab" href="#!" data-bs-toggle="tab" data-bs-target="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false">
                    <div class="icon-box"><img class="car-insurance-icon" src="assets/img/icons/home.png" alt="..." /><img class="car-insurance-icon car-insurance-icon-hover" src="assets/img/icons/home-hover.png" alt="..." /></div>
                  </a><a class="circle-hover-wrapper nav-link mb-lg-4" id="nav-paw-tab" href="#!" data-bs-toggle="tab" data-bs-target="#nav-paw" role="tab" aria-controls="nav-paw" aria-selected="false">
                    <div class="icon-box"><img class="car-insurance-icon" src="assets/img/icons/paw.png" alt="..." /><img class="car-insurance-icon car-insurance-icon-hover" src="assets/img/icons/paw-hover.png" alt="..." /></div>
                  </a><a class="circle-hover-wrapper nav-link mb-lg-4" id="nav-plane-tab" href="#!" data-bs-toggle="tab" data-bs-target="#nav-plane" role="tab" aria-controls="nav-plane" aria-selected="false">
                    <div class="icon-box"><img class="car-insurance-icon" src="assets/img/icons/plane.png" alt="..." /><img class="car-insurance-icon car-insurance-icon-hover" src="assets/img/icons/plane-hover.png" alt="..." /></div>
                  </a></div>
                <div class="tab-content w-100" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-car" role="tabpanel" aria-labelledby="nav-car-tab">
                    <div class="row align-items-center offset-sm-1 g-3">
                      <div class="col-md-6 col-xl-4 order-1 order-md-0">
                        <h2 class="text-light mb-md-5">Participar</h2>
                        <p class="text-400">Make a plan for the emergence of life. We protect your most precious assets, allowing you to devote your time and energy to more essential things in life.</p>
                        <p class="text-400 mt-3">Discover the most appropriate fit for you and your Family.</p><a class="btn btn-primary btn-ensurance mt-5" href="#!"><span class="fas fa-chevron-right fa-xs btn-icon"></span><span class="btn-text">Learn more</span></a>
                      </div>
                      <div class="col-md-6 col-xl-8 text-end">
                        <div class="img-shape"><img class="feature-img" src="assets/img/gallery/defaultgame.png" alt="..." /></div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row align-items-center offset-sm-1 g-3">
                      <div class="col-md-6 col-xl-4 order-1 order-md-0">
                        <h2 class="text-light mb-md-5">Próximo sorteo</h2>
                        <p class="text-400">Make a plan for the emergence of life. We protect your most precious assets, allowing you to devote your time and energy to more essential things in life.</p>
                        <p class="text-400 mt-3">Discover the most appropriate fit for you and your Family.</p><a class="btn btn-primary btn-ensurance mt-5" href="#!"><span class="fas fa-chevron-right fa-xs btn-icon"></span><span class="btn-text">Learn more</span></a>
                      </div>
                      <div class="col-md-6 col-xl-8 text-end">
                        <div class="img-shape"><img class="feature-img" src="assets/img/gallery/defaultgame.png" alt="..." /></div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="nav-paw" role="tabpanel" aria-labelledby="nav-paw-tab">
                    <div class="row align-items-center offset-sm-1 g-3">
                      <div class="col-md-6 col-xl-4 order-1 order-md-0">
                        <h2 class="text-light mb-md-5">Último sorteo</h2>
                        <p class="text-400">Make a plan for the emergence of life. We protect your most precious assets, allowing you to devote your time and energy to more essential things in life.</p>
                        <p class="text-400 mt-3">Discover the most appropriate fit for you and your Family.</p><a class="btn btn-primary btn-ensurance mt-5" href="#!"><span class="fas fa-chevron-right fa-xs btn-icon"></span><span class="btn-text">Learn more</span></a>
                      </div>
                      <div class="col-md-6 col-xl-8 text-end">
                        <div class="img-shape"><img class="feature-img" src="assets/img/gallery/defaultgame.png" alt="..." /></div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="nav-plane" role="tabpanel" aria-labelledby="nav-plane-tab">
                    <div class="row align-items-center offset-sm-1 g-3">
                      <div class="col-md-6 col-xl-4 order-1 order-md-0">
                        <h2 class="text-light mb-md-5">Travel Insurance</h2>
                        <p class="text-400">Make a plan for the emergence of life. We protect your most precious assets, allowing you to devote your time and energy to more essential things in life.</p>
                        <p class="text-400 mt-3">Discover the most appropriate fit for you and your Family.</p><a class="btn btn-primary btn-ensurance mt-5" href="#!"><span class="fas fa-chevron-right fa-xs btn-icon"></span><span class="btn-text">Learn more</span></a>
                      </div>
                      <div class="col-md-6 col-xl-8 text-end">
                        <div class="img-shape"><img class="feature-img" src="assets/img/gallery/defaultgame.png" alt="..." /></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row offset-xl-2">
            <div class="col-12">
              <div class="mb-3 mb-md-5">
                <h2 class="text-light mb-7 text-center text-sm-start">Nuestros servicios</h2>
              </div>
              <div class="row">
                <div class="col-sm-6 col-lg-3 mb-6 text-center text-sm-start"><img class="shadow-icon" src="assets/img/icons/support.png" height="60" alt="..." />
                  <h4 class="mt-4 fw-normal text-light">24x7 Support</h4>
                  <p class="text-400 mb-md-0">Client is our most <br> important priority</p>
                </div>
                <div class="col-sm-6 col-lg-3 mb-6 text-center text-sm-start"><img class="shadow-icon" src="assets/img/icons/edit.png" height="60" alt="..." />
                  <h4 class="mt-4 fw-normal text-light">Easy Claim System</h4>
                  <p class="text-400 mb-md-0">Express your desires <br>and needs to us</p>
                </div>
                <div class="col-sm-6 col-lg-3 mb-6 text-center text-sm-start"><img class="shadow-icon" src="assets/img/icons/money.png" height="60" alt="..." />
                  <h4 class="mt-4 fw-normal text-light">Easy installments</h4>
                  <p class="text-400 mb-md-0">It's quick, safe, and simple. Select several methods of payment</p>
                </div>
                <div class="col-sm-6 col-lg-3 mb-6 text-center text-sm-start"><img class="shadow-icon" src="assets/img/icons/security.png" height="60" alt="..." />
                  <h4 class="mt-4 fw-normal text-light">Strongly Secured</h4>
                  <p class="text-400 mb-md-0">Food is made and delivered directly to your home.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section id="clientes" class="py-8">

        <div class="container-fluid px-0">
          <div class="row g-0">
            <div class="col-12 col-xxl-11 offset-xxl-1">
              <h2 class="text-light text-center">Nuestros Ganadores</h2>
              <div class="carousel slide" id="carouselExampleIndicators" data-bs-ride="carouse">
                <div class="carousel-inner ps-md-5 ps-lg-11 py-4 py-md-5 py-lg-4 pb-lg-9">
                  <div class="carousel-item active">
                    <div class="row h-100">
                      <div class="col-12">
                        <div class="card testimonial-bg card-span text-white mt-10 mt-md-7 mt-lg-8 mx-4 mx-md-0">
                          <div class="card-body pt-0 p-md-0">
                            <div class="d-flex flex-column flex-md-row align-items-center">
                              <div class="card-span-img">
                                <div class="circle-wrapper"><img class="rounded-circle w-100" src="assets/img/team/teamdefault.jpg" alt="" /></div>
                              </div>
                              <div class="mt-n6 mt-md-0 text-center text-md-start px-md-6 px-xl-8 px-xxl-10">
                                <h4 class="mb-0 fw-medium text-white">Charlize Theron</h4>
                                <p class="fw-normal mb-0 text-primary">Founder Circle</p>
                                <p class="card-text text-200 mt-3">“Our dedicated patient engagement app and web portal allow you to access information instantaneously (no tedeous form, long calls, or administrative hassle) and securely”</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="row h-100">
                      <div class="col-12">
                        <div class="card testimonial-bg card-span text-white mt-10 mt-md-7 mt-lg-8 mx-4 mx-md-0">
                          <div class="card-body pt-0 p-md-0">
                            <div class="d-flex flex-column flex-md-row align-items-center">
                              <div class="card-span-img">
                                <div class="circle-wrapper"><img class="rounded-circle w-100" src="assets/img/team/teamdefault.jpg" alt="" /></div>
                              </div>
                              <div class="mt-n6 mt-md-0 text-center text-md-start px-md-6 px-xl-8 px-xxl-10">
                                <h4 class="mb-0 fw-medium text-white">Edward Newgate</h4>
                                <p class="fw-normal mb-0 text-primary">Founder Circle</p>
                                <p class="card-text text-200 mt-3">“Our dedicated patient engagement app and web portal allow you to access information instantaneously (no tedeous form, long calls, or administrative hassle) and securely”</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="row h-100">
                      <div class="col-12">
                        <div class="card testimonial-bg card-span text-white mt-10 mt-md-7 mt-lg-8 mx-4 mx-md-0">
                          <div class="card-body pt-0 p-md-0">
                            <div class="d-flex flex-column flex-md-row align-items-center">
                              <div class="card-span-img">
                                <div class="circle-wrapper"><img class="rounded-circle w-100" src="assets/img/team/teamdefault.jpg" alt="" /></div>
                              </div>
                              <div class="mt-n6 mt-md-0 text-center text-md-start px-md-6 px-xl-8 px-xxl-10">
                                <h4 class="mb-0 fw-medium text-white">Charlize Theron</h4>
                                <p class="fw-normal mb-0 text-primary">Founder Circle</p>
                                <p class="card-text text-200 mt-3">“Our dedicated patient engagement app and web portal allow you to access information instantaneously (no tedeous form, long calls, or administrative hassle) and securely”</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center justify-content-xl-end me-auto mt-xl-n7 pe-xl-8">
                  <div class="col-2 text-end position-relative z-index-2">
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span></button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next</span></button>
                    <div class="carousel-indicators">
                      <button class="active" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"> </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section id="promociones" style="padding-top: 0;">

        <div class="container">
          <div class="row">
            <h2 class="text-light text-center my-5">Promociones</h2>
          </div>
          <div class="row flex-center h-100 circle-blend circle-blend-left circle-primary">
            <div class="col-12">
              <div class="row align-items-center circle-blend circle-blend-right circle-warning">
                <div class="col-md-6 col-lg-4 mb-4">
                  <div class="card p-3 h-100 card-soft-primary">
                    <div class="card-body">
                      <div class="d-flex flex-between-center">
                        <p class="fw-normal mb-0 text-400">24 July, 2021</p>
                        <h6><span class="badge rounded-pill text-primary" style="background:#224E8F;">Thoughts</span></h6>
                      </div>
                      <h5 class="fw-bold fs-2 text-200 my-3">A pandemic may cause life insurance coverage</h5>
                      <p class="text-400">In the aftermath of the Covid epidemic, life insurance firms have been more cautious and have tightened underwriting standards for policies with large cash values.......</p><a class="link-primary" href="#!">
                        <svg class="bi bi-arrow-right text-primary" xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                        </svg></a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                  <div class="card p-3 h-100 card-soft-primary">
                    <div class="card-body">
                      <div class="d-flex flex-between-center">
                        <p class="fw-normal mb-0 text-400">29 July, 2021</p>
                        <h6><span class="badge rounded-pill text-primary" style="background:#224E8F;">Health</span></h6>
                      </div>
                      <h5 class="fw-bold fs-2 text-200 my-3">Top 10 health insurance companies in the Germany</h5>
                      <p class="text-400">There are numerous private healthcare insurance experts in Germany. Insurance protects against financial loss and reduces uncertainty. It ensures safety and security.......</p><a class="link-primary" href="#!">
                        <svg class="bi bi-arrow-right text-primary" xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                        </svg></a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                  <div class="card p-3 h-100 card-soft-primary">
                    <div class="card-body">
                      <div class="d-flex flex-between-center">
                        <p class="fw-normal mb-0 text-400">15 August, 2021</p>
                        <h6><span class="badge rounded-pill text-primary" style="background:#224E8F;">Life</span></h6>
                      </div>
                      <h5 class="fw-bold fs-2 text-200 my-3">Why do you need several life insurance policies?</h5>
                      <p class="text-400">In the event of the insured's death, life insurance protects the nominees financially. It is possible to have several life insurance policies with various insurance providers.......</p><a class="link-primary" href="#!">
                        <svg class="bi bi-arrow-right text-primary" xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                        </svg></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="my-5 text-center text-sm-end"><a class="link-primary" href="#!">View all
                  <svg class="bi bi-arrow-right" xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"> </path>
                  </svg></a></div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <!-- <section class="py-0">

        <div class="container">
          <div class="row align-items-center justify-content-xl-between">
            <h2 class="text-light text-center my-5">Partners</h2>
            <div class="col-auto col-md-4 col-lg-auto my-3 text-xl-start"><img src="assets/img/gallery/partner-1.png" height="40" alt="Partner" /></div>
            <div class="col-auto col-md-4 col-lg-auto my-3 text-xl-start"><img src="assets/img/gallery/partner-2.png" height="40" alt="Partner" /></div>
            <div class="col-auto col-md-4 col-lg-auto my-3 text-xl-start"><img src="assets/img/gallery/partner-3.png" height="40" alt="Partner" /></div>
            <div class="col-auto col-md-4 col-lg-auto my-3 text-xl-start"><img src="assets/img/gallery/partner-4.png" height="40" alt="Partner" /></div>
            <div class="col-auto col-md-4 col-lg-auto my-3 text-xl-start"><img src="assets/img/gallery/partner-5.png" height="40" alt="Partner" /></div>
          </div>
        </div>


      </section> -->
      <!-- <section> close ============================-->
      <!-- ============================================-->
     
  @include('layouts.offcanvas')

@endsection


