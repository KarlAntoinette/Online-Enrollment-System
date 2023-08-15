<?php
	if(isset($_SESSION["admin"]))
		{
			echo'
                <div class="wrapper">
                    <div class="sidebar">
                        <div class="sidebar-wrapper">
                            <div class="logo">
                                <a href="index.php" class="simple-text logo-mini">
                                </a>
                                <a href="index.php" class="simple-text logo-normal">
                                    Admin
                                </a>
                            </div>
                            <ul class="nav">
                                <li>
                                    <a href="index.php">
                                    <i class="tim-icons icon-chart-pie-36"></i>
                                    <p>Dashboard</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="teacher.php">
                                    <i class="tim-icons icon-notes"></i>
                                    <p>Teachers</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="student.php">
                                    <i class="tim-icons icon-single-02"></i>
                                    <p>Students</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="subjects.php">
                                    <i class="tim-icons icon-bullet-list-67"></i>
                                    <p>Subjects</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="course.php">
                                    <i class="tim-icons icon-single-copy-04"></i>
                                    <p>Courses</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="assign_teach.php">
                                    <i class="tim-icons icon-tag"></i>
                                    <p>Assign Teacher</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="assign_stud.php">
                                    <i class="tim-icons icon-tag"></i>
                                    <p>Assign Student</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="assign_sub.php">
                                    <i class="tim-icons icon-tag"></i>
                                    <p>Assign Subject</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="main-panel">
                        <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
                            <div class="container-fluid">
                                <div class="navbar-wrapper">
                                    <div class="navbar-toggle d-inline">
                                        <button type="button" class="navbar-toggler">
                                            <span class="navbar-toggler-bar bar1"></span>
                                            <span class="navbar-toggler-bar bar2"></span>
                                            <span class="navbar-toggler-bar bar3"></span>
                                        </button>
                                    </div>
                                    <a class="navbar-brand" href="javascript:void(0)">HCCD</a>
                                </div>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-bar navbar-kebab"></span>
                                    <span class="navbar-toggler-bar navbar-kebab"></span>
                                    <span class="navbar-toggler-bar navbar-kebab"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navigation">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="search-bar input-group">
                                            <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split" ></i>
                                            <span class="d-lg-none d-md-block">Search</span>
                                            </button>
                                        </li>
                                        <li class="dropdown nav-item">
                                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                                <div class="photo">
                                                    <img src="../assets/img/anime3.png" alt="Profile Photo">
                                                </div>
                                                <b class="caret d-none d-lg-block d-xl-block"></b>
                                                <p class="d-lg-none"></p>
                                            </a>
                                            <ul class="dropdown-menu dropdown-navbar">
                                                <li class="nav-link"><a href="change-pass.php" class="nav-item dropdown-item">Change Password</a></li>
                                                <li class="dropdown-divider"></li>
                                                <li class="nav-link"><a href="../logout.php" class="nav-item dropdown-item">Log out</a></li>
                                            </ul>
                                        </li>
                                        <li class="separator d-lg-none"></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="tim-icons icon-simple-remove"></i>
                                            </button>
                                    </div>
                                </div>
                            </div>
                        </div>';
        }
else if(isset($_SESSION["teacher"]))
    {
        echo'
            <div class="wrapper">
                <div class="sidebar">
                    <div class="sidebar-wrapper">
                        <div class="logo">
                            <a href="index.php" class="simple-text logo-mini">
                                HCCD
                            </a>
                            <a href="index.php" class="simple-text logo-normal">
                                Admin
                            </a>
                        </div>
                        <ul class="nav">
                            <li>
                                <a href="index.php">
                                    <i class="tim-icons icon-chart-pie-36"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li>
                                <a href="grade.php">
                                    <i class="tim-icons icon-atom"></i>
                                    <p>Grades</p>
                                </a>
                            </li>
                            <li>
                                <a href="add_grade.php">
                                    <i class="tim-icons icon-atom"></i>
                                    <p>Add Grades</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="main-panel">
                    <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
                        <div class="container-fluid">
                            <div class="navbar-wrapper">
                                <div class="navbar-toggle d-inline">
                                    <button type="button" class="navbar-toggler">
                                        <span class="navbar-toggler-bar bar1"></span>
                                        <span class="navbar-toggler-bar bar2"></span>
                                        <span class="navbar-toggler-bar bar3"></span>
                                    </button>
                                </div>
                                <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
                            </div>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-bar navbar-kebab"></span>
                                <span class="navbar-toggler-bar navbar-kebab"></span>
                                <span class="navbar-toggler-bar navbar-kebab"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navigation">
                                <ul class="navbar-nav ml-auto">
                                    <li class="search-bar input-group">
                                        <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split" ></i>
                                            <span class="d-lg-none d-md-block">Search</span>
                                        </button>
                                    </li>
                                    <li class="dropdown nav-item">
                                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                            <div class="photo">
                                                <img src="../assets/img/anime3.png" alt="Profile Photo">
                                            </div>
                                            <b class="caret d-none d-lg-block d-xl-block"></b>
                                            <p class="d-lg-none">Log out</p>
                                        </a>
                                        <ul class="dropdown-menu dropdown-navbar">
                                            <li class="nav-link"><a href="change-pass.php" class="nav-item dropdown-item">Change Password</a></li>
                                            <li class="dropdown-divider"></li>
                                            <li class="nav-link"><a href="../logout.php" class="nav-item dropdown-item">Log out</a></li>
                                        </ul>
                                    </li>
                                    <li class="separator d-lg-none"></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                        <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="tim-icons icon-simple-remove"></i>
                                            </button>
                                    </div>
                                </div>
                            </div>
                        </div>';
    }
else if(isset($_SESSION["student"]))
    {
        echo'
            <div class="wrapper">
                <div class="sidebar">
                    <div class="sidebar-wrapper">
                        <div class="logo">
                            <a href="index.php" class="simple-text logo-mini">
                            </a>
                            <a href="index.php" class="simple-text logo-normal">
                                Student
                            </a>
                        </div>
                        <ul class="nav">
                            <li>
                                <a href="index.php">
                                    <i class="tim-icons icon-chart-pie-36"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="main-panel">
                    <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
                        <div class="container-fluid">
                            <div class="navbar-wrapper">
                                <div class="navbar-toggle d-inline">
                                    <button type="button" class="navbar-toggler">
                                        <span class="navbar-toggler-bar bar1"></span>
                                        <span class="navbar-toggler-bar bar2"></span>
                                        <span class="navbar-toggler-bar bar3"></span>
                                    </button>
                                </div>
                                <a class="navbar-brand" href="index.php">HCCD</a>
                            </div>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-bar navbar-kebab"></span>
                                <span class="navbar-toggler-bar navbar-kebab"></span>
                                <span class="navbar-toggler-bar navbar-kebab"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navigation">
                                <ul class="navbar-nav ml-auto">
                                    <li class="search-bar input-group">
                                        <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split" ></i>
                                            <span class="d-lg-none d-md-block">Search</span>
                                        </button>
                                    </li>
                                    <li class="dropdown nav-item">
                                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                            <div class="photo">
                                                <img src="../assets/img/anime3.png" alt="Profile Photo">
                                            </div>
                                            <b class="caret d-none d-lg-block d-xl-block"></b>
                                            <p class="d-lg-none"></p>
                                        </a>
                                        <ul class="dropdown-menu dropdown-navbar">
                                            <li class="nav-link"><a href="change-pass.php" class="nav-item dropdown-item">Change Password</a></li>
                                            <li class="dropdown-divider"></li>
                                            <li class="nav-link"><a href="../logout.php" class="nav-item dropdown-item">Log out</a></li>
                                        </ul>
                                    </li>
                                    <li class="separator d-lg-none"></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="tim-icons icon-simple-remove"></i>
                                        </button>
                                </div>
                            </div>
                        </div>
                    </div>';
}

