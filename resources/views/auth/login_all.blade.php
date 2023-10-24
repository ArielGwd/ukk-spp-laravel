<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SPP Administration | Halaman Login</title>
    <link href="{{ asset('assets/template/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/login_all.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('assets/template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"
        type="text/css">
</head>

<body>

    <div class="wrapper">
        <div class="title">
            <h1 class="text-dark fw-bolder"><i class="fa-solid fa-book rotate-n-15"></i> SPP Administration</h1>
            <h6 class="text-dark fw-bolder">Silahkan login sesuai jabatan </h6>
        </div>

        <div class="container">
            <label class="option_item">
                <a href="{{ url('/login/petugas') }}">
                    <input type="checkbox" name="service[]" value="logo" class="checkbox">

                    <div class="option_inner whatsapp">
                        <div class="tickmark"></div>
                        <div class="icon">
                            <i class="fa-solid fa-chalkboard-user"></i>
                        </div>
                        <div class="name">Petugas</div>
                    </div>
                </a>
            </label>

            <label class="option_item">
                <a href="{{ url('/login/siswa') }}">
                    <input type="checkbox" name="service[]" value="logo" class="checkbox">

                    <div class="option_inner siswa whatsapp">
                        <div class="tickmark"></div>
                        <div class="icon">
                            <i class="fa-solid fa-users-between-lines"></i>
                        </div>
                        <div class="name">Siswa</div>
                    </div>
                </a>
            </label>
        </div>
    </div>

    <footer>
        <div class="mt-5">
            <h6 class="pt-5 text-center">Copyright &copy;2023 SPP Administration - Ariel Gema Wardana</h6>
        </div>
    </footer>

    @include('sweetalert::alert')

</body>

</html>
