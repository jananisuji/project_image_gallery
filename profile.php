<?php
    session_start();
    $email=$_SESSION['login_email'];

    
    if(empty($email)){
        header('location:login.php');
    }
?>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/sticky-footer.css">

    <title>Photo Gallery | Profile</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
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
                <a href="#" class="nav-item nav-link active">Profile</a>
            </div>
            <div class="navbar-nav ml-auto">
                <a href="logout.php" class="nav-item nav-link">Logout</a>
            </div>
        </div>
    </nav>
 <main role="main" class="container position-sticky mt-5 position-absolute">
        <div class="row">
            <div class="col-md-2 mt-5">
                <div id="list-example" class="list-group">
                    <?php
                        $p='myprofile';
                        if(isset($_SERVER['QUERY_STRING'])){
                            parse_str($_SERVER['QUERY_STRING'],$arr);
                            $p=$arr['p'];
                        }

                        $menuItemLables=array('My Profile','My Photos','Upload Photos');
                        $menuItemLinks=array('myprofile','myphotos','uploadpics');
                        $marray=array_combine($menuItemLinks,$menuItemLables);

                        foreach($marray as $k=>$v){
                            if($p===$k){
                                echo '<a class="list-group-item list-group-item-action active" href="?p='.$k.'">'.$v.'</a>';
                            }else{
                                echo '<a class="list-group-item list-group-item-action" href="?p='.$k.'">'.$v.'</a>';
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="col m-4">
               <?php 
                    $page='profile_'.$p.'.php';
                    //echo $page;
                    include_once($page);
               ?>
            </div>
        </div>
    </main>

    <footer class="footer position-fixed">
        <div class="container fixed-bottom">
            <span class="text-muted">Place sticky footer content here.</span>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
</body>

</html>