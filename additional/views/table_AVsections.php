<!DOCTYPE html>
<body>
<div class="table-responsive table-bordered" id="AVsections" style="height:100%;width:100%;">
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>Section ID</th>
            <th>Classroom</th>
            <th>Capacity</th>
            <th>Total Enrolled</th>
            <th>Meeting Days</th>
            <th>Start Time</th>
            <th>End Time</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require_once(dirname(__FILE__) . "/../../php_actions/getViews.php");
        $AVs = getAVsections($_POST['c_id']);
        if (empty($AVs)) {
            echo "<tr>
                              <td>No sections are available for this course.</td>
                              </tr>
                               ";
        } else {
            foreach ($AVs as $sections) {
                $capacity = ltrim($sections[4], '0');
                echo "<tr>
                              <td>$sections[1]</td>
                              <td>$sections[2]</td>
                              <td>$capacity</td>
                              <td>$sections[3]</td>
                              <td>$sections[5]</td>
                              <td>$sections[6]</td>
                              <td>$sections[7]</td>
                              </tr>
                               ";
            }
        }
        ?>
        </tbody>
    </table>
</div>
</body>
