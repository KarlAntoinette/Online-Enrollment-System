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
                    <h3 class="card-title font-weight-bold">Students</h3>
                        <p class="category">Students List</p>
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
                                    <th class="text-center">Student Name</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $s="SELECT * FROM users WHERE utype = 'student'
                                    ORDER BY fname";
                                    $res=$db->query($s);
                                        if($res->num_rows>0){
                                            $i=0;
                                            while($r=$res->fetch_assoc()) {
                                                $i++;                           
                                                    echo" 
                                                    <tr>
                                                        <td class='text-center'>{$r["fname"]}</td>
                                                        <td class='text-center'>
                                                            <a href='stud_course_update.php?id={$r["id"]}' class='btn btn-success'>Update</a>
                                                            <a href='../student_delete.php?id={$r["id"]}' onclick='javascript:confirmationDelete($(this));return false;'  class='btn btn-danger'>Delete</a>
                                                        </td>
                                                    </tr> "; 
                                            }
                                        }
                                        else{
                                            echo" 
                                                <tr>
                                                    <td class='text-center'>No Record Found</td>
                                                    <td class='text-center'>Not Available</td>
                                                </tr> ";
                                        }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-lg-8">
                        <div class="col-lg-12 col-xl-12 offset-lg-3 offset-xl-3">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="title">Register Student</h3>
                                    <p class="category">Register Student</p>
                                </div>
                                <div class="card-body">
                                    <?php
                                        if(isset($_POST["submit"])) {
                                            $sq="insert into users(fname,password,email,utype) values('{$_POST["fname"]}',1234,'{$_POST["email"]}','student')";
                                                if($db->query($sq)) {
                                                    $last_id = mysqli_insert_id($db);
                                                    $sq1="insert into students(id,fname,email) values('$last_id','{$_POST["fname"]}','{$_POST["email"]}')";
                                                    $res=mysqli_query($db,$sq1);
                                                        echo "
                                                            <script>window.open('student.php?mes1=Student Registration Successful','_self') </script>";
                                                }
                                                    else {
                                                        echo "
                                                            <script>window.open('student.php?mes2=Student Registration Invalid','_self') </script>";
                                                    }
                                        }           
                                    ?>
                                    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Full Name</label>
                                                    <input type="text" class="form-control" placeholder="Ex: Juan Dela Cruz" name="fname" required class="input">
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" placeholder="Ex: example@example.com" name="email" required class="input">
                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-fill btn-primary" name="submit">Register Student</button>
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