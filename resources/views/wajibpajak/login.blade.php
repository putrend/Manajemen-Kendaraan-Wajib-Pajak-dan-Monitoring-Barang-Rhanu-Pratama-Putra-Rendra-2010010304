<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Login</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            max-width: 330px;
            padding: 15px;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="text"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="sign-in.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="container form-signin w-50 mt-50">

        <form action="/login/wajib-pajak" method="post">
            @csrf
            <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Silahkan login</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="masukkan nomor telepon"
                    name="no_telp">
                <label for="floatingInput">No Telepon</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="masukkan nomor KTP"
                    name="no_ktp">
                <label for="floatingPassword">No KTP</label>
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
            <a href="/login" class="btn btn-danger w-100 py-2 mt-2">Kembali</a>
            <p class="mt-5 mb-3 text-body-secondary">&copy; 2010010304 Rhanu Pratama Putra Rendra 2024</p>
        </form>
    </main>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>