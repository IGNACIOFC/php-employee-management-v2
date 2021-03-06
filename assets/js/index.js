$(function () {
  $('.toast').toast({
    delay: 3000,
  });
  $('.toast').toast('show');
  $('#dashboardButton').addClass('font-weight-bold');
  $('#employeeButton').addClass('text-muted');
  $('#usersButton').addClass('text-muted');
  $('#userButton').addClass('text-muted');

  requestToPHP().done(data => {
    $('.header').after("<section id='jsGrid'></section>");
    $('#jsGrid').jsGrid({
      width: '100%',
      height: '800px',
      inserting: true,
      sorting: true,
      paging: true,
      datatype: 'json',
      editing: true,
      deleteConfirm: 'Do you really want to delete the client?',
      data: data,

      onItemDeleting: args =>
        requestToPHP(
          'DELETE',
          { id: args.item.id },
          'deleteEmployee',
        ).done(() => notifyToast(`${args.item.name} deleted`)),
      onItemInserting: args =>
        requestToPHP('POST', args.item, 'createEmployee').done(resp => {
          args.item.id = resp;
          args.item.lastName = '';
          args.item.gender = '';
          notifyToast(`${args.item.name} created`);
        }),
      onItemUpdating: args =>
        requestToPHP(
          'PUT',
          args.item,
          `updateEmployee/${args.item.id}`,
        ).done(() => notifyToast(`${args.item.name} updated`)),
      rowClick: function (args) {
        window.location.href = `${route}dashboard/getEmployee/${args.item.id}`;
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
    url: `${route}dashboard/${url}`,
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
