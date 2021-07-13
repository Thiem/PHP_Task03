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
                    <a class="btn mb-1 btn-primary" href="create.php" >Add new data
                        <span class="btn-icon-right"><i class="fa fa-pencil-square-o"></i></span>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Employees</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <?php
                                        require_once 'config.php';
                                        $sql = "SELECT * FROM employees";
                                        if ($result = mysqli_query($link, $sql)){
                                            if (mysqli_num_rows($result) > 0){
                                                echo'<thread>';
                                                    echo'<tr >';
                                                        echo '<th>#</th>';
                                                        echo '<th>Name</th>';
                                                        echo '<th>Address</th>';
                                                        echo '<th>Salary</th>';
                                                        echo '<th style="width: 10%">Action</th>';
                                                    echo'</tr>';
                                                echo'</thread>';
                                                echo'<tbody>';
                                                while ($row = mysqli_fetch_array($result)){
                                                    echo'<tr>';
                                                        echo"<td>".$row['id']."</td>";
                                                        echo"<td>".$row['name']."</td>";
                                                        echo"<td>".$row['address']."</td>";
                                                        echo"<td>".$row['salary']."</td>";
                                                        echo "<td>";
                                                            echo"<a style='padding: 0px 10px; color: blue' href='read.php?id=".$row['id']."' title='View Record' data-toggle='tooltip'><span class='fa fa-eye'></span></a>";
                                                            echo"<a style='padding: 0px 10px; color: blue' href='update.php?id=".$row['id']."' title='Update Record' data-toggle='tooltip'><span class='fa fa-pencil'></span></a>";
                                                            echo"<a style='padding: 0px 10px; color: red' href='delete.php?id=".$row['id']."' title='Delete Record' data-toggle='tooltip'><span class='fa fa-trash'></span></a>";
                                                        echo"</td>";
                                                    echo'</tr>';
                                                }
                                                echo'</tbody>';
                                                //free result set
                                                mysqli_free_result($result);
                                            }else{
                                                echo"<h5 class='text'>No records were found </h5>";
                                            }
                                        }else{
                                            echo "ERROR: Could not able to execute $sql." .mysqli_error($link);
                                        }
                                    ?>
                                </table>
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
<script src="./plugins/tables/js/jquery.dataTables.min.js"></script>
<!--<script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>-->
<script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

</body>

</html>