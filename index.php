<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Net Income Activity</title>

  <!-- CDN CSS Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- CDN Fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col-5">
        <form action="" method="post">

          <div class="row mt-4 mb-4">
            <div class="col">
              <label for="fullname" class="form-label">Full Name</label>
              <input type="text" name="fullname" id="fullname" placeholder="John Doe" class="form-control" required>
            </div>
          </div>

          <div class="row mb-4">
            <div class="col">
              <label for="civil-status" class="form-label">Civil Status</label>
              <select name="civil_status" id="civil-status" class="form-control" required>
                <option value="" hidden>Select Civil Status</option>
                <option value="single">Single</option>
                <option value="married">Married</option>
              </select>
            </div>
          </div>

          <div class="row mb-4">
            <div class="col">
              <label for="position" class="form-label">Position</label>
              <select name="position" id="position" class="form-control" required>
                <option value="" hidden>Select Position</option>
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
              </select>
            </div>
          </div>

          <div class="row mb-4">
            <div class="col">
              <label for="employment-status" class="form-label">Employment Status</label>
              <select name="employment_status" id="employment-status" class="form-control" required>
                <option value="" hidden>Select Employment Status</option>
                <option value="contractual">Contractual</option>
                <option value="probationary">Probationary</option>
                <option value="regular">Regular</option>
              </select>
            </div>
          </div>

          <div class="row mb-4">
            <div class="col">
              <label for="regular-hours" class="form-label">Regular Hours Rendered</label>
              <input type="number" name="regular_hours" id="regular-hours" class="form-control" min="1" required>
            </div>
          </div>

          <div class="row mb-4">
            <div class="col">
              <label for="over-time" class="form-label">Over Time Hours</label>
              <input type="number" name="over_time" id="over-time" class="form-control" min="0" required>
            </div>
          </div>          

          <div class="row mb-4">
            <div class="col">
              <input type="submit" name="btn_submit" value="Submit" class="btn btn-success w-100">
            </div>
          </div>
        </form>
      </div>

      <?php
      include "Employee.php";

      if(isset($_POST['btn_submit'])){
        $fullname = $_POST['fullname'];
        $civil_status = $_POST['civil_status'];
        $position = $_POST['position'];
        $employment_status = $_POST['employment_status'];
        $regular_hours = $_POST['regular_hours'];
        $over_time = $_POST['over_time'];

        $employee = new Employee($fullname, $civil_status, $position, $employment_status, $regular_hours, $over_time);

      ?>

      <div class="col-7">
        <table class="table table-bordered table-striped mt-4">
            <tr>
              <th style="width: 30%;" class="table table-dark">Full Name</th>
              <td class="col-9"><?= $employee->getFullName(); ?></td>
            </tr>
            <tr>
              <th style="width: 30%;" class="table table-dark">Civil Status</th>
              <td><?= $employee->getCivilStatus(); ?></td>
            </tr>
            <tr>
              <th style="width: 30%;" class="table table-dark">Position</th>
              <td><?= $employee->getPosition(); ?></td>
            </tr>
            <tr>
              <th style="width: 30%;" class="table table-dark">Employment Status</th>
              <td><?= $employee->getEmploymentStatus(); ?></td>
            </tr>
            <tr>
              <th style="width: 30%;" class="table table-dark">Gross Income</th>
              <td><?= number_format($employee->regularPay() + $employee->overtimePay(), 2); ?></td>
            </tr>
            <tr>
              <th style="width: 30%;" class="table table-dark">Net Income</th>
              <td><?= number_format($employee->netIncome(), 2); ?></td>
            </tr>
          </div>
        </table>
      </div>

      <?php
      }
      ?>

    </div>
  </div>

</body>
</html>