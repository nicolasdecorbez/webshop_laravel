const form = document.getElementById('refresh-form');
const url_users = form.getAttribute('action');
const url_commands = document.getElementById('commands_link').getAttribute('href');
const url_big = document.getElementById('big_link').getAttribute('href');

form.addEventListener('submit', function(e){
  e.preventDefault();

  const token = document.querySelector('meta[name="csrf-token"]').content;

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': token,
    }
  });

  $.ajax({

    url: url_users,
    type: 'POST',
    data: {

    },

    success: function (data) {
      document.getElementById('users').innerHTML = data;
    },

    error: function (e) {
      console.log(e.responseText);
    }

  });

  $.ajax({

    url: url_commands,
    type: 'POST',
    data: {

    },

    success: function (data) {
      document.getElementById('coms').innerHTML = data;
    },

    error: function (e) {
      console.log(e.responseText);
    }

  });

  $.ajax({

    url: url_big,
    type: 'POST',
    data: {

    },

    success: function (data) {
      document.getElementById('big').innerHTML = data + " €";
    },

    error: function (e) {
      console.log(e.responseText);
    }

  });

});
