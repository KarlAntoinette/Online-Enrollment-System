<?php
    include "../connect.php";
    session_start();
    
    if(isset($_POST["submit"])) {
            $checkbox1 = $_POST['chkl'];
            $checkbox2 = $_POST['chkl1'];
            $checkbox3 = $_POST['chkl2'];
            for ($i = 0; $i < sizeof ($checkbox1); $i++){
                for ($i = 0; $i < sizeof ($checkbox2); $i++){
                    if($checkbox2[$i] <= 100){
                        $dup=$db->query("SELECT * FROM grade WHERE subject_id='{$_POST["subject_id"]}' AND id='".$checkbox1[$i]."'");
                        if(mysqli_num_rows($dup)>0){
                            echo "
                                <script>window.open('grade.php?mes2=Grade Already Input','_self') </script>";
                        }
                        else{
                            $sq="INSERT INTO grade(grade,id,subject_id,course_id) values('".$checkbox2[$i]."','".$checkbox1[$i]."','{$_POST["subject_id"]}','{$_POST["course_id"]}')";
                                if($db->query($sq)){
                                    echo "
                                        <script>window.open('grade.php?mes1=Grade Input Successful','_self') </script>";
                                }
                        }
                    }
                    else{
                        echo "
                            <script>window.open('grade.php?mes2=Grade Input Invalid','_self') </script>";
                    }
                }
            }
    }      
?>