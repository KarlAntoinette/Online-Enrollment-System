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
        <div class="col-lg-12">
            <div class="card card-plain">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold">Courses</h3>
                        <p class="category">Courses List</p>
                            <?php
                                if(isset($_GET["mes1"])) {
                                    echo"<div class='alert alert-success' role='alert'>{$_GET["mes1"]}</div>";	
                                }
                                if(isset($_GET["mes2"])) {
                                    echo"<div class='alert alert-danger' role='alert'>{$_GET["mes2"]}</div>";	
                                }
                            ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter" id="">
                            <thead class="text-primary">
                                <tr>
                                    <th class="text-center">Course Name</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $results_per_page = 4;
                                    $s="SELECT * FROM courses
                                    ORDER BY coursename";

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

                                        $s = "SELECT * FROM courses
                                        ORDER BY coursename 
                                        ASC LIMIT " . $this_page_first_result . ',' . $results_per_page;
                                        $res=$db->query($s);
                                        $i = 0;
                                        while($r=$res->fetch_array()) {   
                                            $i++;                        
                                                echo" 
                                                <tr>
                                                    <td class='text-center'>{$r["coursename"]}</td>
                                                    <td class='text-center'>
                                                        <a href='../course_delete.php?course_id={$r["course_id"]}' onclick='javascript:confirmationDelete($(this));return false;'  class='btn btn-danger'>Delete</a>
                                                    </td>
                                                </tr> "; 
                                        }
                                ?>
                        </tbody>
                    </table>
                        <?php
                            for($page = 1; $page <= $number_of_pages; $page++){
                                    echo'
                                        <a href="course.php?page=' . $page . '" class="btn btn-primary" >'. $page .'</a>';
                            }
                        ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-lg-8">
                        <div class="col-lg-12 col-xl-12 offset-lg-3 offset-xl-3">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="title">Register Course</h3>
                                    <p class="category">Add Course to System</p>
                                </div>
                                <div class="card-body">
                                    <?php
                                        if(isset($_POST["submit1"])) {
                                            $sq="insert into courses(coursename) values('{$_POST["coursename"]}')";
                                                if($db->query($sq)){
                                                        echo "
                                                            <script>window.open('course.php?mes1=Course Registration Successful','_self') </script>"; 
                                                }
                                                else {
                                                    echo "
                                                        <script>window.open('course.php?mes2=Course Registration Invalid','_self') </script>"; 
                                                }
                                        }      
                                    ?>
                                    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Course Name</label>
                                                    <input type="text" class="form-control" placeholder="Ex: Bachelor Of Science in Information Technology" name="coursename" required class="input">
                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-fill btn-primary" name="submit1">Register Course</button>
                                                </div>
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
</div>




<?php include "../footer.php"; ?>