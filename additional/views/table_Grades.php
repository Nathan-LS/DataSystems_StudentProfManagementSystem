<!DOCTYPE html>
<body>
<div class="table-responsive table-bordered" id="GradeTable" style="height:100%;width:100%;">
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>Grade</th>
            <th>Count</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require_once(dirname(__FILE__) . "/../../php_actions/getViews.php");
        $gradesAr = getGradeCount($_POST['enrolled_section']);
        if (empty($gradesAr)) {
            echo "<tr>
                              <td>No students are enrolled in this course yet.</td>
                              </tr>
                               ";
        } else {
            foreach ($gradesAr as $grades) {
                $letter = $grades['grade'];
                $count = $grades['total'];
                echo "<tr>
                              <td>$letter</td>
                              <td>$count</td>
                              </tr>
                               ";
            }
        }
        ?>
        </tbody>
    </table>
</div>
</body>
