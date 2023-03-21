<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    {{-- my css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
</head>

<body>
    <section>
        <div class="container">

            <div class="row">
                <div class="col-5">
                    <div class="text-landing">
                        <h1>Website <span>Pengaduan Masyarakat</span></h1>
                        <p>Penyampaian keluhan oleh masyarakat kepada kami yang bisa membantu atas fasilitas atau pelayanan yang tidak sesuai standar.</p>
                        {{-- <h5>Copyright @ Mazer | SMK Wikrama Bogor</h5> --}}
                        <a href="{{route('register')}}">
                            <button class="solid-btn">Get Started</button>
                        </a>
                    </div>
                </div>
                {{-- image --}}
                <div class="col-6">
                    <div class="image-landing">
                        <img src="{{ asset('img/ilustrasi2.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#6777EF" fill-opacity="1" d="M0,192L40,202.7C80,213,160,235,240,208C320,181,400,107,480,96C560,85,640,139,720,176C800,213,880,235,960,224C1040,213,1120,171,1200,149.3C1280,128,1360,128,1400,128L1440,128L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path></svg>
        </div>
    </section>
</body>

</html>


