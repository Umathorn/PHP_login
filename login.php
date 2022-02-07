<?php
include('server.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <div class="text-center mt-5">
        <form action="login_db.php" method="POST">
            <!--  notification message -->
            <?php if (isset($_SESSION['status'])) {
            ?>
                <script>
                    Swal.fire({
                        title: '<?php echo $_SESSION['status']; ?>',
                        icon: '<?php echo $_SESSION['status_code']; ?>',
                        text: '<?php echo $_SESSION['status_text']; ?>',
                    });
                </script>
            <?php
                unset($_SESSION['status']);
            }
            ?>
            <div class="header">
                <h2>เข้าสู่ระบบ</h2>
            </div>
            <!-- Username input -->
            <div class="input-group">
                <!-- <label class="form-label" for="username">Username</label> -->
                <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off" required>
            </div>
            <!-- Password input -->
            <div class="input-group">
                <!-- <label class="form-label" for="form3Example4">Password</label> -->
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <!-- Login button -->
            <div class="mt-3">
                <button type="submit" class="btn btn-primary" name="login_btn">เข้าสู่ระบบ</button>
            </div>
        </form>
    </div>
</body>

</html>