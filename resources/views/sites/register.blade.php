@extends('frontend.master')
@section('content')
<section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Form Register
                    </h1>
                    <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about.html"> Register</a></p>
                </div>
            </div>
        </div>
    </section>
<section class="search-course-area relative" style="background:unset;">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-3 col-md-6 search-course-left">
                    <h1>
                        Pendaftaran Online <br>
                        Bergabunglah dengan kami sekarang!!
                    </h1>
                    <p>
                        Dengan Kurikulum terupdate dan guru Professional lulusan kami banyak yang diterima di PT Ternama diseluruh Indonesia
                    </p>
                </div>
                <div class="col-lg-8 col-md-6 search-course-right section-gap">
                    {!! Form::open(['url' => '/postregister','class'=> 'form-wrap']) !!}
                        <h4 class="pb-20 text-center mb-30">Register Now!!</h4>
                        {!! Form::number('nis', '', ['class'=> 'form-control','placeholder' => 'Nis']) !!}
                        {!! Form::text('nama', '', ['class' => 'form-control','placeholder' => 'Nama']) !!}
                        {!! Form::date('tanggal_lahir', '', ['class'=>'form-control']) !!}
                        <div class="form-select" id="service-select">
                            {!! Form::select('agama',['islam' => 'Islam','kristen' => 'Kristen' ,'hindu' => 'Hindu' ,'budha' => 'Budha'],null,['placeholder' => 'Agama']) !!}
                        </div>
                        <div class="form-select" id="service-select">
                        {!! Form::label('jenis_kelamin', 'Jenis Kelamin', ['class'=> 'control-label']) !!}
                        </div>
                        <label>
                            {!! Form::radio('jenis_kelamin', 'L',['class' => 'form-control']) !!}
                            Laki-Laki
                        </label>
                        <label>
                            {!! Form::radio('jenis_kelamin', 'P', ['class'=> 'form-control']) !!}
                            Prempuan
                        </label>

                        {!! Form::textarea('alamat', '', ['class' => 'form-control']) !!}
                        {!! Form::email('email', '', ['class' => 'form-control','placeholder'=>'Email']) !!}
                        {!! Form::password('password', ['class' => 'form-control','placeholder'=> 'password']) !!}

                        {!! Form::submit('Daftar', ['class' => 'primary-btn text-uppercase']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
