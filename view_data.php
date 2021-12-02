<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Data</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
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
    <?php
    require_once 'connection.php';
    $connection = connect(db: $dbname);
    $sql = "select * from $tbname;";
    $result = $connection->query($sql);
    ?>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0 bg-gradient">
                    <div class="p-5">
                        <a class="btn btn-primary" href="index.html" role="button">Back to Home</a>
                        <div class="mb-3 position-relative table-responsive">
                            <table class="table table-hover" style="text-align: center">
                                <thead>
                                <tr>
                                    <th scope="col" style="display: none;">id</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col" colspan="2">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_row()) {
                                        [$id, $username, $password, $email] = $row;
                                        ?>
                                        <tr>
                                            <td style='display: none;'><?= $id ?></td>
                                            <td><?= $username ?></td>
                                            <td><?= $email ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary actUpdate"
                                                        data-bs-toggle="modal" data-bs-target="#ubah"
                                                        value="<?= $id ?>">Ubah
                                                </button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary actDelete"
                                                        data-bs-toggle="modal" data-bs-target="#hapus"
                                                        value="<?= $id ?>">Hapus
                                                </button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td style='display: none;'>-1</td>
                                        <td>No Data</td>
                                        <td>No Data</td>
                                        <td>No Action</td>
                                        <td>No Action</td>
                                    </tr>
                                    <?php
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
<!-- Start Of Modal Delete -->
<div class="modal fade del" id="hapus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabelDelete">Konfirmasi Hapus Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4 style="text-align: center;">Apakah anda yakin ingin menghapus username
                    <strong id="usernameModal"></strong>?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="proses_data.php?do=delete&id=<?= $id ?>" role="button">Hapus</a>
            </div>
        </div>
    </div>
</div>
<!-- End Of Modal Delete -->
<!-- Start Of Modal Update -->
<div class="modal fade del" id="ubah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="user g-3 needs-validation" action="proses_data.php" method="post" novalidate>
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabelUpdate">Update Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 position-relative form-outline" style="display: none;">
                        <label>DO
                            <input type="text" name="do" required value="update">
                        </label>
                        <label>ID
                            <input type="text" id="myId" name="id" required>
                        </label>
                    </div>
                    <div class="mb-3 position-relative form-outline">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control form-control-user"
                               placeholder="Username" required>
                        <div class="invalid-tooltip">
                            Contoh: John Smite
                        </div>
                    </div>
                    <div class="mb-3 position-relative form-outline">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control form-control-user"
                               placeholder="Password" minlength="8" required>
                        <div class="invalid-tooltip">
                            Kata Sandi minimal 8 huruf dan harus "[a-zA-Z0-9]"
                        </div>
                    </div>
                    <div class="mb-3 position-relative form-outline">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control form-control-user"
                               aria-describedby="emailHelp" placeholder="Email Address" required>
                        <div class="invalid-tooltip">
                            Contoh: admin@example.com
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary d-block btn-user">Input</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Of Modal Update -->
<script>
    (() => {
        "use strict"; // Start of use strict
        $(document).ready(() => {
            document.querySelectorAll(".actDelete").forEach((e) => {
                e.addEventListener('click', () => {
                    $.post("proses_data.php", {
                        do: "get",
                        id: e.value,
                        key: "username"
                    }, (data) => {
                        document.getElementById("usernameModal").innerText = data;
                    });
                })
            })
            document.querySelectorAll(".actUpdate").forEach((e) => {
                e.addEventListener('click', () => {
                    $.post("proses_data.php", {
                        do: "get",
                        id: e.value,
                        key: "all"
                    }, (body) => {
                        const data = body.split(",")
                        document.getElementById("myId").value = data[0]
                        document.getElementById("username").value = data[1]
                        document.getElementById("password").value = data[2]
                        document.getElementById("email").value = data[3]
                    });
                })
            })
        });
    })(); // End of use strict
</script>
<script src="assets/custom/theme.js"></script>
</body>
</html>