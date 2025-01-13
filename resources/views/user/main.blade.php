<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link rel="icon" type="image/png" href="{{ url('/asset/images/logo_small.png') }}">
    <title>Napluon</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #fff;
            border-bottom: 1px solid #ddd;
        }

        .navbar-brand img {
            height: 40px;
        }

        .banner img {
            width: 100%;
            height: auto;
        }

        .provider img {
            height: 40px;
        }

        .card-value {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            cursor: pointer;
        }

        .provider2.active {
            border-color: #277de4;
            color: #fff;
            background-image: linear-gradient(90deg, #01b49b, #277de4) !important;
        }

        .provider.active {
            border: 4px solid #277de4;
            /* border-color: #277de4; */
        }

        .payment-method img {
            height: 40px;
        }

        .footer {
            background-color: #efefef;
            padding: 20px 0;
        }

        .card {
            border-radius: 3px;
            border: 0;
            background-color: #eee;
            font-weight: 600;
            font-size: larger;
        }

        .provider {
            cursor: pointer;
            width: 150px;
            height: 80px;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .provider2 {
            cursor: pointer;
            width: 150px;
            height: 80px;
            border: 1px solid #ddd;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .provider2 small {
            border-top: 1px dotted #333;
            padding-top: 8px;
        }

        .provider2 p {
            margin-top: 8px;
            font-weight: 600;
            font-size: larger;
        }

        .provider img {
            width: 100px;
            height: auto;
        }

        .footer img {
            height: 40px;
        }

        .footer p {
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }

        .nav-link {
            color: #1976d2 !important;
        }

        .nav-item .nav-link.active {
            background-color: #c7e3ff;
            color: #fff;
            border-radius: 0.25rem;
        }

        .nav-item .nav-link {
            transition: background-color 0.3s, color 0.3s;
            /* Hiệu ứng mượt */
        }

        .nav-item {
            border-right: 1px solid #1976d2;
        }
    </style>
</head>

<body>

    @include('user.layout.header')
    @yield('templateContent')
    @include('user.layout.footer')
    {{-- 
    <link rel="stylesheet" href="{{ asset('templates/css/all.min.css') }}">
    <script type="module" crossorigin src="{{ asset('templates/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('templates/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('templates/js/index.js') }}"></script>
    <script src="{{ asset('templates/js/sweetalert.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // active Menu
        document.addEventListener("DOMContentLoaded", function() {
            const navLinks = document.querySelectorAll(".nav-item .nav-link");

            navLinks.forEach((link) => {
                link.addEventListener("click", function(event) {
                    navLinks.forEach((nav) => nav.classList.remove("active"));
                    this.classList.add("active");
                });
            });
        });

        // active Chọn nhà cung cấp
        document.addEventListener("DOMContentLoaded", () => {
            const providers = document.querySelectorAll(".provider");

            providers.forEach((provider) => {
                provider.addEventListener("click", () => {
                    providers.forEach((el) => el.classList.remove("active"));
                    provider.classList.add("active");
                });
            });
        });
    </script>
</body>

</html>
