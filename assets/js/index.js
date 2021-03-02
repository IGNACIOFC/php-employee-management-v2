const route = 'http://localhost:8080/php-employee-management-v2/';

$(function () {
  $('.toast').toast({
    delay: 3000,
  });
  $('.toast').toast('show');
  $('#dashboardButton').addClass('font-weight-bold');
  $('#employeeButton').addClass('text-muted');
  console.log(route);
  requestToPHP().done(data => {
    console.log(data);
    $('.header').after("<section id='jsGrid'></section>");
    $('#jsGrid').jsGrid({
      width: '100%',
      height: '800px',
      inserting: true,
      sorting: true,
      paging: true,
      datatype: 'json',
      editing: true,

      onItemDeleting: args =>
        requestToPHP('DELETE', { data: args.item.id }).done(() =>
          notifyToast(`${args.item.name} deleted`),
        ),
      onItemInserting: args =>
        requestToPHP('POST', args.item).done(resp => {
          args.item.id = resp;
          args.item.lastName = '';
          args.item.gender = '';
          notifyToast(`${args.item.name} created`);
        }),
      onItemUpdating: args =>
        requestToPHP('PUT', args.item).done(() =>
          notifyToast(`${args.item.name} updated`),
        ),

      deleteConfirm: 'Do you really want to delete the client?',
      data: data,

      rowClick: function (args) {
        window.location.href = `employee.php?id=${args.item.id}`;
      },

      fields: [
        {
          name: 'name',
          type: 'text',
          width: 150,
          validate: 'required',
          align: 'center',
        },
        {
          name: 'email',
          type: 'text',
          width: 200,
          validate: 'required',
          align: 'center',
        },
        {
          name: 'age',
          type: 'number',
          width: 50,
          validate: 'required',
          align: 'center',
        },
        {
          name: 'streetAddress',
          type: 'text',
          width: 200,
          validate: 'required',
          align: 'center',
        },
        {
          name: 'city',
          type: 'text',
          width: 200,
          validate: 'required',
          align: 'center',
        },
        {
          name: 'state',
          type: 'text',
          width: 50,
          validate: 'required',
          align: 'center',
        },
        {
          name: 'postalCode',
          type: 'number',
          width: 70,
          validate: 'required',
          align: 'center',
        },
        {
          name: 'phoneNumber',
          type: 'number',
          width: 100,
          validate: 'required',
          align: 'center',
        },
        { type: 'control' },
      ],
    });
  });
});

const requestToPHP = (method = 'GET', data = '', url = 'getAllEmployees') => {
  request = {
    url: `http://localhost:8080/php-employee-management-v2/dashboard/${url}`,
    data: data,
    type: method,
  };
  return $.ajax(request);
};

const notifyToast = message => {
  $('.header').after(
    `<div class='toast position-absolute d-flex justify-content-center px-1 bg-success'>
    <p class='toast-body text-white text-center h-100'>${message}</p>
    </div>`,
  );
  $('.toast').toast({
    delay: 1000,
  });
  $('.toast').toast('show');
  setTimeout(function () {
    $('.toast').remove();
  }, 1000);
};
