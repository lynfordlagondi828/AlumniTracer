<?php
    require_once 'inc/Db_Functions.php';
    $database = new Db_Functions();

    $result = $database->get_all_alumni();
?>
<h3>Negros Oriental State University Bayawan Sta. Catalina Campus Alumni Tracer</h3>
<?php if(count($result)>0): ?>
    <p>Alumni Records</p>
    <table border="1">
        <tr>

            <th>Family Name</th>
            <th>First Name</th>
            <th>Maiden Name</th>
            <th>Age</th>
            <th>Nationality</th>
            <th>Status</th>
            <th>Year Graduated</th>
            <th>Present Address</th>
            <th>Present Employment</th>
            <th>Employment Status</th>
            <th>Office Address</th>
            <th>Contact Number</th>
            <th>Email Address</th>
            <th>Facebook Address</th>
            <th>Name of Classmate</th>
            <th>Address of Classmate</th>
        </tr>
        <?php foreach($result as $row): ?>
            <tr>
                <td><?php echo htmlentities($row["familyname"]); ?></td>
                <td><?php echo htmlentities($row["firstname"]); ?></td>
                <td><?php echo htmlentities($row["maidenname"]); ?></td>
                <td><?php echo htmlentities($row["age"]); ?></td>
                <td><?php echo htmlentities($row["nationality"]); ?></td>
                <td><?php echo htmlentities($row["status"]); ?></td>
                <td><?php echo htmlentities($row["year_graduated"]); ?></td>
                <td><?php echo htmlentities($row["present_address"]); ?></td>
                <td><?php echo htmlentities($row["present_employment"]); ?></td>
                <td><?php echo htmlentities($row["employment_status"]); ?></td>
                <td><?php echo htmlentities($row["office_address"]); ?></td>
                <td><?php echo htmlentities($row["contact_number"]); ?></td>
                <td><?php echo htmlentities($row["email"]); ?></td>
                <td><?php echo htmlentities($row["facebook"]); ?></td>
                <td><?php echo htmlentities($row["name_of_classmate"]); ?></td>
                <td><?php echo htmlentities($row["classmate_address"]); ?></td>
            </tr>
        <?php endforeach ?>
    </table>

    <?php
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename= alumni report.xls');
     ?>

<?php  else : ?>
    <h3>No Records Found</h3>
<?php  endif ?>