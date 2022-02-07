<?php
session_start();

if (!isset($_SESSION['username'])) {
  header('location: login.php');
}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header('location: login.php');
}
include('server.php');
$sql = "SELECT * FROM tbl_customer";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <!-- CSS -->
  <link rel="stylesheet" href="style.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Datatables  -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css" />
  <!-- SweetAlert -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
  <nav class="navbar navbar-light bg-light">
    <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
      <a class="navbar-brand" href="index.php">
        Datatables
      </a>
    </div>
    <div class="btn-group">
      <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
        <!-- logged in user information -->
        <?php if (isset($_SESSION['username'])) : ?>
          <?php echo $_SESSION['username']; ?>
        <?php endif ?>
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="index.php?logout='1'" style="color: red">Logout</a>
      </div>
    </div>
  </nav>
  <div class="homecontent">
    <!--  notification message -->
    <?php if (isset($_SESSION['status'])) {
    ?> <script>
        Swal.fire({
          title: '<?php echo $_SESSION['status']; ?>',
          icon: '<?php echo $_SESSION['status_code']; ?>',
          text: '<?php echo $_SESSION['status_text']; ?>',
          showConfirmButton: false,
          timer: 1500
        });
      </script>
    <?php
      unset($_SESSION['status']);
    }
    ?>
    <br>
    <div class="container">
      <h5 class="card-header">ตารางแสดงข้อมูล</h5>
      <div class="table-responsive">
        <table class="table table-striped " id="datatables">
          <thead>
            <tr>
              <td width="5%">#</td>
              <td width="20%">ชื่อ-สกุล</td>
              <td width="15%">เบอร์โทร1</td>
              <td width="15%">เบอร์โทร2</td>
              <td width="15%">วันที่สร้างข้อมูล</td>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($result as $row) { ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td class="name">
                  <?php echo $row['first_name']; ?>
                  &nbsp;
                  <?php echo $row['last_name']; ?>
                </td>

                <td class="phone1">
                  <?php echo $row['phone1']; ?>
                </td>
                <td class="phone2">
                  <?php echo $row['phone2']; ?>
                </td>
                <td class="created">
                  <?php
                  $date = new DateTime($row['created']);
                  echo $date->format('d-m-Y');
                  ?>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Datatables  -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

    <script>
      $(document).ready(function() {
        $("#datatables").DataTable();
      });
    </script>
    <div class="container-fluid">

    </div>

</body>

</html>