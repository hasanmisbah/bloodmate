<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Blood Mate')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <header class="mb-2">
        <nav class="navbar navbar-expand-lg navbar-dark bg-info">
            <div class="container">
                <a class="navbar-brand" href="#">Blood Mate</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="ml-auto">
                        <a href="#" class="btn card bg-info text-white" data-toggle="modal" data-target="#donormodal">Add Donor</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="container-fluid">
        @yield('content')
    </div>
    <footer>
        <div class="footer bg-info mt-5">
            <p class="card-footer text-white text-center tex-white">Made with <strong class="h5 text-danger">&hearts;</strong> by Hasan Misbah</p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>