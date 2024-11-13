<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    $message = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $message = register($username, $email, $password);
    }
    ?>

    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <form action="" method="POST">
                                <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                                <p class="text-white-50 mb-5">Please enter your details!</p>

                                <?php if (!empty($message)): ?>
                                    <div class="alert alert-info"><?= $message; ?></div>
                                <?php endif; ?>

                                <div class="form-outline form-white mb-4">
                                    <input type="text" name="username" class="form-control form-control-lg" required />
                                    <label class="form-label">Username</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="email" name="email" class="form-control form-control-lg" required />
                                    <label class="form-label">Email</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="password" name="password" class="form-control form-control-lg"
                                        required />
                                    <label class="form-label">Password</label>
                                </div>

                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>
                            </form>

                            <div class="mt-4">
                                <p class="mb-0">Already have an account? <a href="login.php"
                                        class="text-white-50 fw-bold">Login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>