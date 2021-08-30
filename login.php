<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/sticky-footer.css">

    <title>Photo Gallery | Login</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a href="index.html" class="navbar-brand">
            <img src="images/logo.png" height="28" alt="CoolBrand" />
            Photo Gallery
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="index.html" class="nav-item nav-link">Home</a>
                
            </div>
            <div class="navbar-nav ml-auto">
                <a href="#" class="nav-item nav-link active">Login</a>
            </div>
            <div class="navbar-nav ml-auto">
                <a href="signup.php" class="nav-item nav-link">Sign Up</a>
            </div>
        </div>
    </nav>

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-3 row align-items-center">
                <img src="images/login_pic.png" width="100%" />
            </div>
            <div class="col-md-9">
                <h1  class="pb-3">Login</h1>
                <form method="POST" action="include/login.inc.php">
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" placeholder="Email ID" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" placeholder="Password" class="form-control" name="password">
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
                    <a href="signup.php" class="btn btn-success">Register Now</a>
                </form>
                <?php
                require_once ('include/functions.inc.php');
                    showerror('invalidlogin','Please provide a valid Login details');
                ?>
            </div>
        </div>
    </main>
    <footer class="footer">
        <div class="container">
            <span class="text-muted">Place sticky footer content here.</span>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
</body>

</html>