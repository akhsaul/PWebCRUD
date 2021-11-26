<?php
require_once 'connection.php';
$connection = connect(db: $dbname);
$sql = "select id, username, email from $tbname;";
$result = $connection->query($sql);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Data</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <style>
        body {
            text-align: unset !important;
        }

        .gradient {
            background: linear-gradient(120deg, #7f70f5, #0ea0ff);
        }
    </style>
</head>
<body class="gradient">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0 bg-gradient">
                    <div class="p-5">
                        <a class="btn btn-primary" href="index.html" role="button">Back to Home</a>
                        <div class="mb-3 position-relative table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col" style="display: none;">id</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $id = -1;
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_row()) {
                                        $id = $row[0];
                                        echo "<tr>";
                                        for ($i = 0, $loopMax = count($row); $i < $loopMax; $i++) {
                                            if ($i === 0) {
                                                echo "<td style='display: none;'>$id</td>";
                                            } else {
                                                echo "<td>$row[$i]</td>";
                                            }
                                        }
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td style='display: none;'>$id</td><td>No Data</td><td>No Data</td></tr>";
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>