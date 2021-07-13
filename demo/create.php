<?php
require_once "config.php";

//define variables and initialize with empty values
$name = $address = $salary = "";
$name_err = $address_err = $salary_err = "";

//Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //validate name
    $input_name = trim($_POST["val-name"]);
     if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var(trim($_POST["val-name"]), FILTER_VALIDATE_REGEXP,
        array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $name_err = 'Please enter a valid name.';
    } else{
        $name = $input_name;
    }

    //validate address
    $input_address = trim($_POST["val-address"]);
    if (empty($input_address)){
        $address_err = "Please enter a address.";
    }else{
        $address = $input_address;
    }

    //validate salary
    $input_salary = trim($_POST["val-salary"]);
    if (empty($input_salary)){
        $salary_err = "Please enter a name.";
    }elseif (!ctype_digit($input_salary)){
        $salary_err = 'Please enter a positive integer value.';
    }else{
        $salary = $input_salary;
    }

    //Check input errors before inserting in database
    if (empty($name_err)&&empty($address_err)&&empty($salary_err)){
        //Prepare an insert statement
        $sql = "INSERT INTO employees (name, address, salary) VALUES (?, ?, ?)";
        if ($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ssd", $param_name, $param_address,  $param_salary);
            //set parameters
            $param_name = $name;
            $param_address =  $address;
            $param_salary = $salary;

            //Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)){
                //Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            }else{
                echo "Something went wrong, Please try again later.";
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }
    //Close connection
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
    <link href="./plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/demo.css" rel="stylesheet">

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
                            <h4 class="card-title">Add new record database to table employee</h4>
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="form-validation">
                                                <form class="form-valide" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                                                    <div class="form-group row is-invalid">
                                                        <label class="col-lg-2 col-form-label" for="val-name">Name <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <?php echo (empty($name_err)) ?  '<input type="text" class="form-control" id="val-name" name="val-name" placeholder="Enter a name.."></div>': '<input type="text" class="form-control" id="val-name" name="val-name" placeholder="Enter a name.." aria-required="true" aria-describedby="val-name-error" aria-invalid="true"> </div> <div  class="invalid-feedback animated fadeInDown" style="display: block">'.  $name_err .'</div>' ; ?>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label" for="val-name">Address <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <textarea class="form-control" id="val-address" name="val-address" rows="3" placeholder="Enter address..."></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label" for="val-salary">Salary <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" id="val-salary" name="val-salary" placeholder="1000">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-8 ml-auto">
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                            <a  class="btn btn-danger" href="index.php" >Cancel </a>
                                                        </div>
                                                    </div>
                                                </form>
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