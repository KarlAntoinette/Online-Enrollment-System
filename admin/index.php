<?php
	include "../connect.php";
	session_start();
	if(!isset($_SESSION['admin']))
	{
		echo"<script>window.open('../index.php?mes=Access Denied..','_self');</script>";	
    }

    $sql="SELECT * FROM users WHERE id={$_SESSION["id"]}";
    $res=$db->query($sql);
        if($res->num_rows>0) {
            $row=$res->fetch_assoc();
        }
?>

<?php include "../header.php"; ?>
<?php include "../sidebar.php"; ?>

<div class="content">
    <div class="row">
        <div class="col-md-12"> 
            <a href="register.php" class="btn btn-primary float-right">Add User</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-chart">
                <div class="card-header">
                    <h4>Students Enrolled</h4>
                    <h1 class="card-title">
                        <i class="tim-icons icon-single-02 text-primary"></i>
                        <span>
                            <?php
                                $sql = "SELECT * FROM users WHERE utype='student'";
                                $res=$db->query($sql);
                                $rows_count_value = mysqli_num_rows($res);	
                                echo $rows_count_value; 
                            ?>
                        </span>
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-chart">
                <div class="card-header">
                    <h4>Teachers</h4>
                    <h1 class="card-title">
                        <i class="tim-icons icon-single-02 text-primary"></i>
                        <span>
                            <?php
                                $sql = "SELECT * FROM users WHERE utype='teacher'";
                                $res=$db->query($sql);
                                $rows_count_value = mysqli_num_rows($res);	
                                echo $rows_count_value; 
                            ?>
                        </span>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-plain">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold">Students</h3>
                        <p class="category">Students List</p>
                            <?php
                                if(isset($_GET["mes"])) {
                                    echo"<div class='alert alert-danger' role='alert'>{$_GET["mes"]}</div>";	
                                }
                            ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter" id="">
                            <thead class="text-primary">
                                <tr>
                                    <th class="text-center">Student Name</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    $results_per_page = 2;
                                    $s="SELECT * FROM users
                                    INNER JOIN course_student ON users.id = course_student.id
                                    WHERE utype='student'";

                                    $res=$db->query($s);
                                    $number_of_results = mysqli_num_rows($res);
                                    $number_of_pages = ceil($number_of_results/$results_per_page);

                                    if(!isset($_GET['page'])){
                                        $page = 1;
                                    }
                                    else{
                                        $page = $_GET['page'];
                                    }
                                    $this_page_first_result = ($page - 1)* $results_per_page;

                                    $s = "SELECT * FROM users
                                    WHERE utype='student'
                                    ORDER BY fname ASC LIMIT " . $this_page_first_result . ',' . $results_per_page;
                                    $res=$db->query($s);
                                    $i = 0;
                                    while($r=$res->fetch_array()) {
                                        $i++;                           
                                            echo" 
                                            <tr>
                                                <td class='text-center'>{$r["fname"]}</td>
                                                <td class='text-center'>
                                                    <a href='stud_course_update.php?id={$r["id"]}' class='btn btn-success'>Update</a>
                                                    <a href='../stud_delete.php?id={$r["id"]}' onclick='javascript:confirmationDelete($(this));return false;'  class='btn btn-danger'>Delete</a>
                                                </td>
                                            </tr> "; 
                                    }
                                    ?>
                            </tbody>
                        </table>
                            <?php
                                for($page = 1; $page <= $number_of_pages; $page++){
                                        echo'<a href="index.php?page=' . $page . '" class="btn btn-primary">'. $page .'</a>';
                                    }
                            ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-plain">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold">Teachers</h3>
                        <p class="category">Teachers List</p>
                            <?php
                                if(isset($_GET["mes1"])) {
                                    echo"<div class='alert alert-danger' role='alert'>{$_GET["mes1"]}</div>";	
                                }
                            ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter" id="">
                            <thead class="text-primary">
                                <tr>
                                    <th class="text-center">Teacher Name</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $results_per_page = 2;
                                    $s="SELECT * FROM users
                                    WHERE utype='teacher'";

                                    $res=$db->query($s);
                                    $number_of_results = mysqli_num_rows($res);
                                    $number_of_pages = ceil($number_of_results/$results_per_page);

                                    if(!isset($_GET['page'])){
                                        $page = 1;
                                    }
                                    else{
                                        $page = $_GET['page'];
                                    }
                                    $this_page_first_result = ($page - 1)* $results_per_page;

                                    $s = "SELECT * FROM users
                                    WHERE utype='teacher'
                                    ORDER BY fname ASC LIMIT " . $this_page_first_result . ',' . $results_per_page;
                                    $res=$db->query($s);
                                    $i = 0;
                                    while($r=$res->fetch_array()) {
                                        $i++;                           
                                            echo" 
                                            <tr>
                                                <td class='text-center'>{$r["fname"]}</td>
                                                <td class='text-center'>
                                                    <a href='../teach_update.php?id={$r["id"]}' class='btn btn-success'>Update</a>
                                                    <a href='../teach_delete.php?id={$r["id"]}' onclick='javascript:confirmationDelete($(this));return false;'  class='btn btn-danger'>Delete</a>
                                                </td>
                                            </tr> "; 
                                    }
                                    ?>
                            </tbody>
                        </table>
                            <?php
                                for($page = 1; $page <= $number_of_pages; $page++){
                                        echo'<a href="index.php?page=' . $page . '" class="btn btn-primary">'. $page .'</a>';
                                    }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../footer.php"; ?>
