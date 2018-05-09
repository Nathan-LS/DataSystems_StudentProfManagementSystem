<?php
require_once("class/permissions.php");
$permissions = new permissions(2);
$permissions->can_access();
?>
<!DOCTYPE html>
<html style="width:100%;height:100%;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professor Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/sidebar.css">
    <link rel="stylesheet" href="assets/css/sidebar1.css">
</head>

<body style="background-color:rgb(88,88,88);width:100%;height:100%;">
    <?php include "additional/navbar.php" ?>
    <div class="d-inline-block" style="width:80%;height:91%;background-color:#171616;min-height:auto;max-height:auto;min-width:auto;max-width:auto;">
        <div class="container d-flex justify-content-center align-items-center align-content-center align-self-center" id="load_form" style="margin-top:10%;margin-bottom:0px;background-color:#e7e7e7;"></div>
    </div>
    <div class="d-block float-left" style="background-color:#d7d7d7;width:20%;height:91vh;min-height:auto;max-height:auto;">
        <div class="container-fluid" style="width:100%;max-width:100%;min-width:100%;padding-right:0;padding-left:0;height:100%;min-height:100%;max-height:100%;">
            <div style="height:100%;width:100%;min-width:100%;max-width:100%;min-height:100%;max-height:100%;">
                <ul class="nav nav-pills nav-fill" style="width:100%;min-width:100%;max-width:100%;height:132px;">
                    <li class="nav-item"><a role="tab" data-toggle="pill" href="#tab-2" class="nav-link">View</a></li>
                    <li class="nav-item"><a role="tab" data-toggle="pill" href="#tab-1" class="nav-link active">Create</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade show active" id="tab-1">
                        <div class="list-group" style="font-size:20px;height:100%;">
                            <button class="list-group-item list-group-item-action"
                                    href="additional/forms/create_department.php #s_form"><span>Department</span>
                            </button>
                            <button class="list-group-item list-group-item-action"
                                    href="additional/forms/create_course.php #s_form"><span>Course</span>
                            </button>
                            <button class="list-group-item list-group-item-action"
                                    href="additional/forms/add_coursePreq.php #s_form"><span>Course Prerequisite</span>
                            </button>
                            <button class="list-group-item list-group-item-action"
                                    href="additional/forms/create_section.php #s_form"><span>Section</span>
                            </button>
                            <button class="list-group-item list-group-item-action"
                                    href="additional/forms/create_classroom.html #s_form"><span>Classroom</span>
                            </button>
                            <button class="list-group-item list-group-item-action"
                                    href="additional/forms/create_professor.html #s_form"><span>Professor</span>
                            </button>
                            <button class="list-group-item list-group-item-action"
                                    href="additional/forms/add_profDegree.php #s_form"><span>Professor Degree</span>
                            </button>
                            <button class="list-group-item list-group-item-action"
                                    href="additional/forms/create_student.php #s_form"><span>Student</span></button>
                            <button class="list-group-item list-group-item-action"
                                    href="additional/forms/add_studentMinor.php #s_form"><span>Student Minor</span>
                            </button>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab-2">
                        <div class="list-group" style="font-size:22px;">
                            <button class="list-group-item list-group-item-action"
                                    href="additional/views/view_profSections.html #s_form"><span>My classes</span>
                            </button>
                            <button class="list-group-item list-group-item-action"><span>My Class Grades</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "additional/modals.php" ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/project_logic.js"></script>
</body>

</html>