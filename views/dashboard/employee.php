<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= URL ?>assets/css/main.css">
</head>

<body>
  <?php
  include("views/commonParts/header.php");
  ?>

  <section class="wrapper container">
    <form action="<?= isset($this->employee['id']) ? URL . 'dashboard/updateEmployee/' . $this->employee['id'] : URL . 'dashboard/createEmployee' ?>" method="POST" class="was-validated my-3">

      <div class="wrapper-profile-img">
        <img src="<?= isset($this->employee['avatar']) ? $this->employee['avatar'] : URL . "assets/images/no-user.png" ?>" class="profile-img img-thumbnail rounded-circle" alt="avatar">
      </div>

      <div class="radio-wrapper">
        <?php if (isset($this->result)) require("views/dashboard/imageGallery.php"); ?>
      </div>

      <div class="form-group">
        <label for="name">Name:</label>
        <input class="form-control" type="text" id="name" name="name" value="<?= isset($this->employee) ? $this->employee['name'] : ''; ?>" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>

      <div class="form-group">
        <label for="lastName">Last Name:</label>
        <input class="form-control" type="text" id="lastName" name="lastName" value="<?= isset($this->employee) ? $this->employee['lastName'] : ''; ?>" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>

      <div class="form-group">
        <label for="email">Email:</label>
        <input class="form-control" type="email" id="email" name="email" value="<?= isset($this->employee) ? $this->employee['email'] : ''; ?>" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>

      <div class="form-group">
        <label for="uGender" class="form-label">Gender:</label>
        <select class="form-control" id="uGender" name="gender" required>
          <option value="man" <?= isset($this->employee) ? ($this->employee['gender'] == "man" ? "selected" : "") : '' ?>>Man</option>
          <option value="woman" <?= isset($this->employee) ? ($this->employee['gender'] == "woman" ? "selected" : "") : '' ?>>Woman</option>
          <option value="nobinary" <?= isset($this->employee) ? ($this->employee['gender'] == "nobinary" ? "selected" : "") : '' ?>>No binary</option>
        </select>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>

      <div class="form-group">
        <label for="city">City:</label>
        <input class="form-control" type="text" id="city" name="city" value="<?= isset($this->employee) ? $this->employee['city'] : ''; ?>" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>

      <div class="form-group">
        <label for="streetAddress">Street Address: </label>
        <input class="form-control" type="text" id="streetAddress" name="streetAddress" value="<?= isset($this->employee) ? $this->employee['streetAddress'] : ''; ?>" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>

      <div class="form-group">
        <label for="state">State: </label>
        <input class="form-control" type="text" id="state" name="state" value="<?= isset($this->employee) ? $this->employee['state'] : ''; ?>" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>

      <div class="form-group">
        <label for="age">Age: </label>
        <input class="form-control" type="number" id="age" name="age" value="<?= isset($this->employee) ? $this->employee['age'] : ''; ?>" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>

      <div class="form-group">
        <label for="postalCode">Postal Code: </label>
        <input class="form-control" type="number" id="postalCode" name="postalCode" value="<?= isset($this->employee) ? $this->employee['postalCode'] : ''; ?>" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>

      <div class="form-group">
        <label for="phoneNumber">Phone Number: </label>
        <input class="form-control" type="number" pattern="[0-9]{10}" id="phoneNumber" name="phoneNumber" value="<?= isset($this->employee) ? $this->employee['phoneNumber'] : ''; ?>" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>

      <input class="btn btn-primary" type="submit" value="<?= isset($this->employee) ? "Update" : "Create" ?>" name="employeePage">
      <a href=<?= URL . "dashboard" ?>>Return</a>
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
    $('#employeeButton').addClass('font-weight-bold');
    $('#usersButton').addClass('text-muted');
    $('#userButton').addClass('text-muted');
  </script>

</body>

</html>