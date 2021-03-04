$(function () {
  $('.toast').toast({
    delay: 3000,
  });
  $('.toast').toast('show');
  $('#dashboardButton').addClass('text-muted');
  $('#employeeButton').addClass('text-muted');
  $('#usersButton').addClass('font-weight-bold');
  $('#userButton').addClass('text-muted');

  requestToPHP().done(data => {
    $('.header').after("<section id='jsGrid'></section>");
    $('#jsGrid').jsGrid({
      width: '100%',
      height: '800px',
      inserting: false,
      sorting: true,
      paging: true,
      datatype: 'json',
      editing: false,
      deleteConfirm: 'Do you really want to delete the client?',
      data: data,

      onItemDeleting: args =>
        requestToPHP('DELETE', { id: args.item.id }, 'deleteUser').done(() =>
          notifyToast(`${args.item.name} deleted`),
        ),

      rowClick: function (args) {
        window.location.href = `${route}users/getUser/${args.item.id}`;
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
        { type: 'control' },
      ],
    });
  });
});

const requestToPHP = (method = 'GET', data = '', url = 'getAllUsers') => {
  request = {
    url: `${route}users/${url}`,
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
