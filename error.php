<?php
$location = $_GET['loc'];
$message = $_GET['msg'];
$title = $_GET['title'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Error</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
            crossorigin="anonymous"></script>
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
    <!-- Button trigger modal -->
    <button type="button" id="click" class="btn btn-primary visually-hidden" data-bs-toggle="modal"
            data-bs-target="#staticBackdrop">Launch
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        <?php
                        echo $title
                        ?>
                    </h5>
                </div>
                <div class="modal-body">
                    <?php
                    echo $message;
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-primary" data-bs-dismiss="modal">Okay</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = () => {
        document.getElementById('click').click()
    }
    <?php
    echo "document.getElementById('close').addEventListener('click', () => {
            document.location = '$location'; 
        })"
    ?>
</script>
</body>
</html>
