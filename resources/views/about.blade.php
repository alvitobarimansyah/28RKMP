@extends('layouts.index3')
@section('content')
    <div class="card">
        <div class="card-header">
            About Us
        </div>
        <div class="card-body">
            <p>
                &nbsp; Kami adalah satu team project. Kami mempunyai visi yaitu memberikan informasi sesuai pengalaman. Visi yang membuat kami terus 
                bersemangat membuat informasi yang lebih banyak dan bermanfaat untuk orang banyak. Misi kami yaitu memberikan informasi yang lebih 
                banyak dan sudah diuji dalam pembuatan nya, menjadikan hasil lebih maksimal. Kami akan terus berusaha membuat informasi yang ada didalam 
                lebih banyak lagi. Tujuan kami adalah membuat informasi yang berisi resep - resep yang hasilnya sudah kami uji sebelumnya. Alasan kami membuat 
                website ini adalah untuk membuat website yang kami harapkan bisa membantu banyak orang untuk mengetahui informasi terkait judul website kami.
            </p>
            <p>
                &nbsp; Pembuatan web ini adalah sebuah tugas akhir dari pelatihan kami di TechMuda Batch 4 Selama 1,5 bulan. Ide pembuatan web ini terinspirasi 
                dari salah satu anggota kelompok kami yang suka membuat kue. Dengan pembuatan web ini kami berharap kami bisa memberikan informasi yang 
                bermanfaat untuk orang banyak.
            </p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    About Me
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body bg-dark">
                                    <img src="{{ asset('img/alvito.jpg') }}" class="image">
                                    <br><br>
                                    <h4 align="center"> Alvito Barimansyah </h4>
                                    <p align="center"> Full Stack Web Developer </p>
                                    <p align="center"> Skill : Html, Css, Javascript, Mysql, Php, Bootstrap 4, Laravel 7 </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body bg-dark">
                                    <img src="{{ asset('img/sarlin.png') }}" class="image">
                                    <br><br>
                                    <h4 align="center"> Sarlin Theresia </h4>
                                    <p align="center"> Front End Web Developer </p>
                                    <p align="center"> Skill : Html, Css </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection