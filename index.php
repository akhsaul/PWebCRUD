<?php
require_once "assets/header.html"
?>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="p-5">
                        <form class="user g-3 needs-validation" action="proses_registrasi.php" method="post" novalidate>
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
                                <input type="password" id="password" name="password"
                                       class="form-control form-control-user" placeholder="Password" minlength="8"
                                       required>
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
                            <button type="submit" class="btn btn-primary d-block btn-user w-100">Input</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php
require_once "assets/footer.html"
?>