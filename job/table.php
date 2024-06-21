<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
     crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
      <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Job Table</title>
</head>
<style>
    .search{
        margin-left:900px;
    }
</style>
<body>
    <?php include("../navbar.php");?>
    <?php include("../sidebar.php");?>
    <div class="container mt-5">
    <div class="row">
        <div class="d-flex justify-content-between">
            <h5><i class="bi bi-journal-richtext"></i> Job Details</h5>
            <!-- <a href="index.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i> New Registration</a> -->
        </div>
        <div class="search">
        <input type="text" id="searchInput" class="form-label" placeholder="Search...">

        </div>
        <div class="col-md-12 table-responsive table table-success mt-3">
            <table id="example" class="display table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Framework</th>
                    <th>Mail</th>
                    <th>Resume</th>
                    <th>Task</th>
                    <!-- <th>View</th> -->
                    <th>Compose</th>
                </tr>
                </thead>
                <tbody class="table-warning">
                <?php
                include("../dbconfig.php");
                $sql = "SELECT * FROM tblreg1";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='id'>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["contact"] . "</td>";
                        echo "<td>" . $row["framework"] . "</td>";
                        echo "<td><a class='text-dark' style='text-decoration:none;' href='mail1.php?mobile=".$row['contact']."'>" . $row["mail"] . "</td>";
                        echo "<td><a class='text-dark' style='text-decoration:none;' href='resume.php?mobile=".$row['contact']."'>" . $row["resume"] . "</td>";
                        echo "<td><a class='text-dark' style='text-decoration:none;' href='task.php?mobile=".$row['contact']."'>" . $row["task"] . "</td>";
                        echo "<td>";
                        echo "<a href='../resumecompanylist/tableres.php?mobile=".$row['contact']."'><i class='bi bi-envelope-arrow-up h3'></i>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center'>No records found</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
<script>
$(document).ready(function() {
    $('#searchInput').on('input', function() {
        const query = $(this).val();

        $.ajax({
            url: 'search.php',
            method: 'POST',
            data: { query: query },
            success: function(data) {
                $('#example tbody').html(data);
            },
            error: function(err) {
                console.error('Error:', err);
            }
        });
    });
});
</script>
</html>