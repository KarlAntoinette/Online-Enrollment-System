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
                    <a href="assign_sub.php" class="btn btn-primary float-right">Assign</a>
                    <h3 class="card-title font-weight-bold">Subjects</h3>
                        <p class="category">Subjects List</p>
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
                                    <th class="text-center">Subject Code</th>
                                    <th class="text-center">Units</th>
                                    <th class="text-center">Pre-Requisite</th>
                                    <th class="text-center">Subject Name</th>
                                    <th class="text-center">Semester</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $results_per_page = 4;
                                    $s="SELECT * FROM subjects
                                    ORDER BY subcode";

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

                                        $s = "SELECT * FROM subjects
                                        ORDER BY subcode 
                                        ASC LIMIT " . $this_page_first_result . ',' . $results_per_page;
                                        $res=$db->query($s);
                                        $i = 0;
                                        while($r=$res->fetch_array()) {   
                                            $i++;                        
                                                echo" 
                                                <tr>
                                                    <td class='text-center'>{$r["subcode"]}</td>
                                                    <td class='text-center'>{$r["units"]}</td>
                                                    <td class='text-center'>{$r["req"]}</td>
                                                    <td class='text-center'>{$r["subname"]}</td>
                                                    <td class='text-center'>{$r["sem"]}</td>
                                                    <td class='text-center'>
                                                        <a href='sub_update.php?subject_id={$r["subject_id"]}' class='btn btn-success'>Update</a>
                                                        <a href='../sub_delete.php?subject_id={$r["subject_id"]}' onclick='javascript:confirmationDelete($(this));return false;'  class='btn btn-danger'>Delete</a>
                                                    </td>
                                                </tr> "; 
                                        }
                                ?>
                            </tbody>
                        </table>
                            <?php
                                for($page = 1; $page <= $number_of_pages; $page++){
                                        echo'
                                            <a href="subjects.php?page=' . $page . '" class="btn btn-primary" >'. $page .'</a>';
                                }
                            ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-lg-8">
                        <div class="col-lg-12 col-xl-12 offset-lg-3 offset-xl-3">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="title">Register Subject</h3>
                                    <p class="category">Add Subject to Curriculum</p>
                                </div>
                                <div class="card-body">
                                    <?php
                                        if(isset($_POST["submit1"])) {
                                            if($_POST["units"] <= 6){
                                                $sq="insert into subjects(subcode,req,subname,units,sem) values('{$_POST["subcode"]}','{$_POST["req"]}','{$_POST["subname"]}','{$_POST["units"]}','{$_POST["sem"]}')";
                                                if($db->query($sq)){
                                                    echo "
                                                        <script>window.open('subjects.php?mes1=Subject Registration Successful','_self') </script>";
                                                }
                                            }
                                            else{
                                                echo "
                                                    <script>window.open('subjects.php?mes2=Subject Registration Invalids','_self') </script>";
                                            }
                                        }      
                                    ?>
                                    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Subject Code</label>
                                                    <?php
                                                        $no="S1";
                                                        $sql="select * from subjects order by subcode desc limit 1";
                                                        $res=$db->query($sql);
                                                        if($res->num_rows>0)
                                                        {
                                                            $row1=$res->fetch_assoc();
                                                            $no=substr($row1["subcode"],1,strlen($row1["subcode"]));
                                                            $no++;
                                                            $no="S".$no;
                                                        }
                                                    ?>
                                                    <input type="text" class="form-control" placeholder="<?php echo $no;?>" value="<?php echo $no;?>" name="subcode" required class="input" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Subject Name</label>
                                                    <input type="text" class="form-control" placeholder="Ex: Math" name="subname" required class="input">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Pre-Requisite</label>
                                                        <select class="form-control text-muted" name="req" style="background-color:#27293d;">
                                                            <?php 
                                                                $sl="SELECT * FROM subjects";
                                                                $r=$db->query($sl);
                                                                    if($r->num_rows>0) {
                                                                        echo"<option value='None' style='font-size: 15px;''>None</option>";
                                                                        while($ro=$r->fetch_assoc()) {
                                                                            echo "<option value='{$ro["subname"]}' style='color:white; font-size: 15px;'>({$ro["subcode"]}) - {$ro["subname"]}</option>"; 
                                                                        }
                                                                    }
                                                            ?>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Units</label>
                                                    <input type="text" class="form-control" name="units" required class="input">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Semester</label>
                                                        <select class="form-control text-muted" name="sem" required class="input" style="background-color:#27293d;">
                                                            <option value="" style="font-size: 15px;">SELECT SEMESTER</option>
                                                            <option value="1st" style="color:white; font-size: 15px;">1st</option>
                                                            <option value="2nd" style="color:white; font-size: 15px;">2nd</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-fill btn-primary" name="submit1">Register Subject</button>
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