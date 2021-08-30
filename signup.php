<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/sticky-footer.css">

    <title>Photo Gallery | Signup</title>
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
                <a href="profile.php" class="nav-item nav-link">Profile</a>
            </div>
            <div class="navbar-nav ml-auto">
                <a href="login.php" class="nav-item nav-link">Login</a>
            </div>
            <div class="navbar-nav ml-auto">
                <a href="signup.php" class="nav-item nav-link active">Sign Up</a>
            </div>
        </div>
    </nav>
    <?php
        require_once('include/functions.inc.php');
    ?>
    <main role="main" class="container">
        <div class="row p-2">
            <div class="col-md-3 row align-items-center">
                <img src="images/reg_pic.svg" width="100%" />
            </div>
            <div class="col-md-9">
                <h1 class="py-4">Registration</h1>
                <form method="POST" action="include/signup.inc.php">
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Name</label>
                        <div class="col-sm-4">
                            <input type="text" placeholder="First Name" class="form-control" name="firstName">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" placeholder="Last Name" class="form-control" name="lastName">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" placeholder="Email ID" class="form-control" name="email">
                            <?php
                                showerror('invalidemail','Please provide a valid email');
                                showerror('emailexists','Someone already registered with this email id.');
                            ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" placeholder="Password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-4 col-form-label">Confirm Password</label>
                        <div class="col-sm-8">
                            <input type="password" placeholder="Confirm Password" class="form-control"
                                name="confirmPassword">
                                <?php
                                    showerror('passmismatched','Your password mismatched.');
                                ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-4 col-form-label">Gender</label>
                        <div class="col-sm-8">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Male" name="gender">
                                <label class="form-check-label">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Female" name="gender" checked>
                                <label class="form-check-label">
                                    Female
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-8">
                            <button type="submit"name="submit" class="btn btn-primary mr-5">Sign Up</button>
                            Already Registered, <a href="login.php">Click Here</a> for login.
                        </div>
                    </div>
                </form>
                <?php
                    showerror('emptyinput','Please fillup all the fields correctly.');
                    showsuccess('regsuccess','You are registered successfully
                        <a href="login.php" class="btn btn-success ml-3">Login</a>
                    ');
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