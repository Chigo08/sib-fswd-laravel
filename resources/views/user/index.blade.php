<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <!-- Fontawesome -->
  <script src="https://kit.fontawesome.com/88325827eb.js" crossorigin="anonymous"></script>
  <title>CRUD</title>
</head>

<body>
  <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        Tugas SIB - CRUD
      </a>
    </div>
  </nav>
  <div class="container-fluid mt-4">
    <h1>Data Pengguna</h1>
    <a href="" type="button" class="btn btn-primary mt-3">
      <i class="fa fa-plus me-1"></i>
      Tambah Data</a>
    <div class="table-responsive mt-5">
      <table class="table table-hover">
        <thead class="table-secondary">
          <tr>
            <th>#</th>
            <th>Action</th>
            <th>Avatar</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Phone</th>
            <th>Address</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-center">1</td>
            <td>
              <button type="button" class="btn btn-primary"><i class="fa fa-pencil"></i></button>
              <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </td>
            <td>Testing Avatar</td>
            <td>Testing Name</td>
            <td>Testing Email</td>
            <td>Testing Role</td>
            <td>Testing Phone</td>
            <td>Testing Address</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Bootstrap Javascript CDN -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>