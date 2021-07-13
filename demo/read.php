<?php

//Check existence of id parameter before processing further
if (isset($_GET["id"])&& !empty(trim($_GET["id"]))){
    require_once "config.php";
    //Prepare a select statement
    $sql = "SELECT * FROM employees WHERE id = ?";
    if ($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        //set parameters
        $param_id = trim($_GET["id"]);
        if (mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $name = $row["name"];
                $address = $row["address"];
                $salary = $row["salary"];
            }else{
                header("location: error.php");
                exit();
            }
        }
    }
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
    <link href="css/demo.css" rel="stylesheet" type="text/css">
    <link href="css/test.css" rel="stylesheet" type="text/css">
    <link href="./plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">

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
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <a class="btn mb-1 btn-secondary" href="index.php" >Back
                        <span class="btn-icon-right"><i class="fa fa-sign-out"></i></span>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">View information record in database</h4>
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="form-validation">
                                        <div class="info-data">
                                            <label class="col-lg-2 col-form-label" for="val-name">Name: <span><?php echo $name;?></span>
                                            </label>
                                        </div>
                                        <div class="info-data">
                                            <label class="col-lg-2 col-form-label" for="val-name">Address: <span><?php echo $address;?></span>
                                            </label>
                                        </div>
                                        <div class="info-data">
                                            <label class="col-lg-2 col-form-label" for="val-salary">Salary: <span><?php echo $salary;?></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
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
<!--<script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>-->
<!--<script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script>-->
<script src="./plugins/validation/jquery.validate.min.js"></script>/
<script src="./plugins/validation/validate_new.js"></script>

</body>

</html>