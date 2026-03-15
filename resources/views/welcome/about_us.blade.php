@extends('welcome.layouts.app')

@section('title', 'About Us - PT Gracia Pharmindo')

@section('content')
    <section class="inner-header divider parallax layer-overlay overlay-white-8"
        data-bg-img="{{ asset('image_gracia/paralak_about.jpg') }}">
        <div class="container pt-60 pb-60">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 xs-text-center">
                        <h3 class="title">PT Gracia Pharmindo</h3>
                        <ol class="breadcrumb mt-10">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li class="active text-theme-colored">PT Gracia Pharmindo</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row mtli-row-clearfix">

                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="section-title text-center">
                        <h2 class="text-uppercase mt-0 line-height-1">COMPANY PROFILE</h2>
                        <div class="title-icon">
                            <img class="mb-10" src="{{ asset('assets/images/title-icon.png') }}" alt="Title Icon">
                        </div>
                    </div>

                    <div class="event-details">
                        <div class="container pb-0">
                            <div class="row mt-20">
                                <div class="col-md-4 text-center">
                                    <img src="{{ asset('image_gracia/front1.png') }}" alt="Gracia Pharmindo Factory"
                                        class="img-responsive center-block">
                                </div>
                                <div class="col-md-8">
                                    <p>
                                        PT GRACIA PHARMINDO is a Pharmaceutical Company founded in 2003 to improve the
                                        quality of social life by producing high quality products with fast and appropriate
                                        therapeutic effectiveness with guaranteed safety.
                                    </p>
                                    <p>
                                        The manufacturer PT Gracia Pharmindo is located at Industrial Zone Dwipapuri, Jl.
                                        Raya Rancaekek KM 24.5 Blok M-29, M-30, M-36, M-37 Bandung, West Java, Indonesia.
                                    </p>
                                    <p>
                                        Founded in 2001 and got GMP certification in 2004 so that in the same year began the
                                        production of finished products beginning with 2 products are: Grafix caplet and
                                        Mesol 8 tablets.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-12 mt-40">
                    <div class="section-title text-center">
                        <h2 class="text-uppercase mt-0 line-height-1">VISION & MISSION</h2>
                        <div class="title-icon">
                            <img class="mb-10" src="{{ asset('assets/images/title-icon.png') }}" alt="Title Icon">
                        </div>
                    </div>

                    <div class="container pb-0">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list theme-colored angle-double-right">
                                    <li>To become the National Pharmaceutical Company which dedicates to innovation and
                                        technology as well as a management based on professionalism.</li>
                                    <li>PT Gracia Pharmindo commits to produce high-quality products, as well as to focus on
                                        customer satisfaction.</li>
                                    <li>To become the Indonesian Pharmaceutical Company that continuously grows both
                                        nationally and internationally.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-12 mt-40">
                    <div class="section-title text-center">
                        <h2 class="text-uppercase mt-0 line-height-1">KEY FACTS</h2>
                        <div class="title-icon">
                            <img class="mb-10" src="{{ asset('assets/images/title-icon.png') }}" alt="Title Icon">
                        </div>
                    </div>

                    <div class="container pb-0">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td style="width: 30px;"><i class="fa fa-arrow-right text-theme-colored"></i>
                                            </td>
                                            <td>Being an innovative pharmaceutical company.</td>
                                        </tr>
                                        <tr>
                                            <td><i class="fa fa-arrow-right text-theme-colored"></i></td>
                                            <td>Implementing product distribution through number of distributors and
                                                sub-distributors spread widely all over Indonesia.</td>
                                        </tr>
                                        <tr>
                                            <td><i class="fa fa-arrow-right text-theme-colored"></i></td>
                                            <td>Marketing team consists of professional, reliable, sociable and
                                                consumer-oriented people.</td>
                                        </tr>
                                        <tr>
                                            <td><i class="fa fa-arrow-right text-theme-colored"></i></td>
                                            <td>Participating in scientific events, conduct presentation and round table
                                                discussion as a product socialization.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
