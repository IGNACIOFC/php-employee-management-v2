<header class="header bg-light d-flex justify-content-start align-items-center py-2">
  <h1 class="h3 px-3">Employees Management</h1>
  <section class="d-flex justify-self-start">

    <form class="mr-3" action="<?= URL ?>dashboard" method="POST">
      <input id="dashboardButton" class="buttons__header" type="submit" name="dashboard" value="Dashboard">
    </form>

    <form action="<?= URL ?>dashboard/employee" method="POST">
    <input id="employeeButton" class="buttons__header" type="submit" name="employee" value="Employee">
    </form>

  </section>
  <form class="ml-auto mr-3" action="<?= URL ?>main/logout" method="POST">
    <input class="btn btn-link" type="submit" name="logout" value="Logout">
  </form>
</header>