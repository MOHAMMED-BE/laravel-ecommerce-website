
// ------------------------- Confirm Order

$(function () {
  $(document).on('click', '#confirm', function (e) {
    e.preventDefault();
    var link = $(this).attr("href");
    Swal.fire({
      title: 'Are you sure to confirm',
      text: "You will not able to undo this again",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Confirm'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = link
        Swal.fire(
          'Confirmed!',
          'Order has been Confirmed.',
          'success'
        )
      }
    })
  });
});

// ------------------------- proccessing Order

$(function () {
  $(document).on('click', '#proccessing', function (e) {
    e.preventDefault();
    var link = $(this).attr("href");
    Swal.fire({
      title: 'Are you sure to confirm',
      text: "You will not able to undo this again",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Confirm'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = link
        Swal.fire(
          'Proccessing!',
          'Order is being Proccessed.',
          'success'
        )
      }
    })
  });
});

// ------------------------- shipped Order

$(function () {
  $(document).on('click', '#shipped', function (e) {
    e.preventDefault();
    var link = $(this).attr("href");
    Swal.fire({
      title: 'Are you sure to confirm',
      text: "You will not able to undo this again",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Confirm'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = link
        Swal.fire(
          'shipped!',
          'Order is being shipped.',
          'success'
        )
      }
    })
  });
});

// ------------------------- delivered Order

$(function () {
  $(document).on('click', '#delivered', function (e) {
    e.preventDefault();
    var link = $(this).attr("href");
    Swal.fire({
      title: 'Are you sure to confirm',
      text: "You will not able to undo this again",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Confirm'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = link
        Swal.fire(
          'delivered!',
          'Order has been delivered.',
          'success'
        )
      }
    })
  });
});


// ------------------------- Cancel Order

$(function () {
  $(document).on('click', '#cancel', function (e) {
    e.preventDefault();
    var link = $(this).attr("href");
    Swal.fire({
      title: 'Are you sure to confirm',
      text: "You will not able to undo this again",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Confirm'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = link
        Swal.fire(
          'Canceled!',
          'Order has been Canceled.',
          'success'
        )
      }
    })
  });
});