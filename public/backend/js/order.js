
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
      confirmButtonText: 'Yes, Confirmed it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = link
        Swal.fire(
          'Confirmed!',
          'Your Order has been Confirmed.',
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
      title: 'Are you sure to Proccessing',
      text: "You will not able to undo this again",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Proccessing it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = link
        Swal.fire(
          'Proccessing!',
          'Your Order has been Proccessing.',
          'success'
        )
      }
    })
  });
});

// ------------------------- Picked Order

$(function () {
  $(document).on('click', '#picked', function (e) {
    e.preventDefault();
    var link = $(this).attr("href");
    Swal.fire({
      title: 'Are you sure to picked',
      text: "You will not able to undo this again",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Picked it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = link
        Swal.fire(
          'Picked!',
          'Your Order has been Picked.',
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
      title: 'Are you sure to shipped',
      text: "You will not able to undo this again",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, shipped it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = link
        Swal.fire(
          'shipped!',
          'Your Order has been shipped.',
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
      title: 'Are you sure to delivered',
      text: "You will not able to undo this again",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delivered it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = link
        Swal.fire(
          'delivered!',
          'Your Order has been delivered.',
          'success'
        )
      }
    })
  });
});