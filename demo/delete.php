<?php

//Check existence of id parameter before processing further
if (isset($_GET["id"])&& !empty(trim($_GET["id"]))){
    require_once "config.php";
    //Prepare a select statement
    $sql = "DELETE FROM employees WHERE id = ?";
    if ($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        //set parameters
        $param_id = trim($_GET["id"]);
        if (mysqli_stmt_execute($stmt)){
            header("location: index.php");
            exit();
        }else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <!--    <link href="./plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">-->
    <link href="css/demo.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
        </svg>
    </div>
</div>
<!--*******************
    Preloader end
********************-->


<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">

        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title">Invalid Request</h1>
                            <hr>
                            <div class="text-error" >
                                <span>Sorry, you've made an invalid request. Please <a style="font-weight: bold" href="index.php">go back</a> and try again.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
    <!--**********************************
        Content body end
    ***********************************-->


    <!--**********************************
        Footer start
    ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
        </div>
    </div>
    <!--**********************************
        Footer end
    ***********************************-->
</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<script src="plugins/common/common.min.js"></script>
<script src="js/custom.min.js"></script>
<!--<script src="js/settings.js"></script>-->
<!--<script src="js/gleek.js"></script>-->
<!--<script src="js/styleSwitcher.js"></script>-->
<!---->
<!--<script src="./plugins/tables/js/jquery.dataTables.min.js"></script>-->
<!--<!--<script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>-->-->
<!--<script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script>-->

</body>

</html>
