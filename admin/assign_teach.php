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
        <div class="card card-plain">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Teachers List</h3>
                    <p class="category">Teachers and their assigned subjects</p>
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
                                <th class="text-center">Subject</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $results_per_page = 4;
                                $s="SELECT * FROM teachers
                                INNER JOIN sub_teach ON teachers.id = sub_teach.id
                                INNER JOIN subjects ON sub_teach.subject_id = subjects.subject_id
                                ORDER BY fname";

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

                                    $s = "SELECT * FROM teachers
                                    INNER JOIN sub_teach ON teachers.id = sub_teach.id
                                    INNER JOIN subjects ON sub_teach.subject_id = subjects.subject_id
                                    ORDER BY fname
                                    ASC LIMIT " . $this_page_first_result . ',' . $results_per_page;
                                    $res=$db->query($s);
                                    $i = 0;
                                    while($r=$res->fetch_array()) {   
                                        $i++;                        
                                            echo" 
                                                <tr>
                                                    <td class='text-center'>{$r["fname"]}</td>
                                                    <td class='text-center'>{$r["subname"]}</td>
                                                    <td class='text-center'>
                                                        <a href='../sub_teach_delete.php?subject_teach_id={$r["subject_teach_id"]}' onclick='javascript:confirmationDelete($(this));return false;'  class='btn btn-danger'>Delete</a>
                                                    </td>
                                                </tr> "; 
                                    }
                            ?>
                </tbody>
            </table>
                <?php
                    for($page = 1; $page <= $number_of_pages; $page++){
                            echo'
                                <a href="assign_teach.php?page=' . $page . '" class="btn btn-primary" >'. $page .'</a>';
                    }
                ?>
                </div>
            </div>
            <div class="card-body">
                <div class="col-lg-8">
                    <div class="col-lg-12 col-xl-12 offset-lg-3 offset-xl-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="title">Subjects to Teacher</h3>
                                <p class="category">Assign Subject to Teacher</p>
                            </div>
                            <div class="card-body">
                                <?php
                                    if(isset($_POST["submit2"])) { 
                                        $id=$_POST["id"];
                                        $checkbox1 = $_POST['chkl'] ;
                                            for ($i=0; $i<sizeof ($checkbox1);$i++) {
                                                $dup=$db->query("SELECT * FROM sub_teach WHERE id='$id' AND subject_id='".$checkbox1[$i]."'");
                                                if(mysqli_num_rows($dup)>0){
                                                    echo "
                                                        <script>window.open('assign_teach.php?mes2=Subject Assign Invalid','_self') </script>";
                                                }
                                                else{
                                                    $sq="INSERT INTO sub_teach(id,subject_id) VALUES ('{$_POST["id"]}','".$checkbox1[$i]."')";  
                                                    $r=$db->query($sq); 
                                                    if($r){
                                                        echo "
                                                            <script>window.open('assign_teach.php?mes1=Subject Assign Successful','_self') </script>";
                                                    }
                                                    else {
                                                        echo "
                                                            <script>window.open('assign_teach.php?mes2=Subject Assign Invalid','_self') </script>";
                                                    }
                                                }
                                            }
                                    }
                                ?>
                                <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Teacher Name</label>
                                                <select class="form-control text-muted" placeholder="Teacher" name="id" required class="input" style="background-color:#27293d;">
                                                    <?php 
                                                        $sl="SELECT * FROM teachers";
                                                        $r=$db->query($sl);
                                                            if($r->num_rows>0) {
                                                                echo"<option value='' style='font-size: 15px;''>SELECT TEACHER</option>";
                                                                while($ro=$r->fetch_assoc()) {
                                                                    echo "<option value='{$ro["id"]}' style='color:white; font-size: 15px;'>{$ro["fname"]}</option>"; 
                                                                }
                                                            }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Courses</label>
                                                    <table class="table">
                                                        <tbody>
                                                                <?php 
                                                                    $sl="SELECT * FROM subjects";
                                                                    $r=$db->query($sl);
                                                                        if($r->num_rows>0) {
                                                                            foreach($r as $label){
                                                                    ?>
                                                                        <tr>
                                                                            <td>
                                                                                <div class="form-check">
                                                                                    <label class="form-check-label">
                                                                                    <input class="form-check-input" type="checkbox" name="chkl[]" value="<?= $label['subject_id']; ?> "/>
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                    </label>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <p class="title"><?= $label['subname']; ?></p>
                                                                            </td>
                                                                        </tr>
                                                                            <?php 
                                                                        }
                                                                    }
                                                                        else {
                                                                            echo "No Record Found";
                                                                    }
                                                                ?>
                                                        </tbody>
                                                    </table>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-fill btn-primary" name="submit2">Assign Subject</button>
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

<?php include "../footer.php"; ?>