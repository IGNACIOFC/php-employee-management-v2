<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= URL ?>assets/css/main.css">
</head>

<body>
  <?php
  include("views/commonParts/header.php");
  ?>

  <section class="wrapper container">
    <form action="<?= isset($this->user['id']) ? URL . 'users/updateUser/' . $this->user['id'] : URL . 'users/createUser' ?>" method="POST" class="was-validated my-3">

      <div class="form-group">
        <label for="uName" class="form-label">Name:</label>
        <select class="form-control" id="uName" name="name" required>
          <option value="user" <?= isset($this->user) ? ($this->user['name'] == "user" ? "selected" : "") : '' ?>>User</option>
          <option value="admin" <?= isset($this->user) ? ($this->user['name'] == "admin" ? "selected" : "") : '' ?>>Admin</option>
        </select>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>

      <div class="form-group">
        <label for="email">Email:</label>
        <input class="form-control" type="email" id="email" name="email" value="<?= isset($this->user) ? $this->user['email'] : ''; ?>" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>

      <?php
      if (!isset($this->user)) {
        echo "<div class='form-group'>
          <label for='password'>Password: </label>
          <input class='form-control' type='password' id='password' name='password' required>
          <div class='valid-feedback'>Valid.</div>
          <div class='invalid-feedback'>Please fill out this field.</div>
        </div>";
      }
      ?>

      <input class="btn btn-primary" type="submit" value="<?= isset($this->user) ? "Update" : "Create" ?>">
      <a href=<?= URL . "users" ?>>Return</a>
    </form>
  </section>

  <?php
  include("views/commonParts/footer.php");
  ?>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>

  <script>
    $('#dashboardButton').addClass('text-muted');
    $('#employeeButton').addClass('text-muted');
    $('#usersButton').addClass('text-muted');
    $('#userButton').addClass('font-weight-bold');
  </script>

</body>

</html>