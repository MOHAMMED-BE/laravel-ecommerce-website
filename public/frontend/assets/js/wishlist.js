//   <!-- //   Start Add To Wishlist -->

function addToWishList(product_id) {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: '/user/add-to-wishlist/' + product_id,
        success: function (data) {
            // start message

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            })

            if ($.isEmptyObject(data.error)) {
                Toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: data.success
                })
            } else {
                Toast.fire({
                    type: 'error',
                    icon: 'error',
                    title: data.error
                })
            }

            // end message
        }
    })
}


//   <!-- End Add To Wishlist -->




// view wishlist 

function wishlist() {
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: '/user/get-wishlist-product',
        success: function (response) {

            var wishlist_row = ""
            $.each(response, function (key, value) {
                wishlist_row += `
                <tr>
                <td class="col-md-2"><img src="/${value.product.product_thumbnail}" alt="imga"></td>
                <td class="col-md-7">
                    <div class="product-name"><a href="#">${value.product.product_name_en}</a></div>
                    <div class="price">
                    ${value.product.discount_price == null
                        ? `${value.product.selling_price}`
                        : `${value.product.discount_price} <span>$${value.product.selling_price}</span>`
                    }
                    </div>
                </td>
                <td class="col-md-2">
                    <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart" id="${value.product.id}" onclick="productView(this.id)" class="btn-upper btn btn-primary">Add to cart</button>
                </td>
                <td class="col-md-1 close-btn">
                    <button type="submit" id="${value.id}" class="btn-remove" onclick="wishlistRemove(this.id)"  class=""><i class="fa-solid fa-trash-can"></i></button>
                </td>
            </tr>
          `;
            });
            $('#wishlist').html(wishlist_row);
        }
    })
}

wishlist();



// wishlistRemove start
function wishlistRemove(id) {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "/user/wishlist-remove/" + id,

        success: function (data) {
            wishlist();
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            })

            if ($.isEmptyObject(data.error)) {
                Toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: data.success
                })
            } else {
                Toast.fire({
                    type: 'error',
                    icon: 'error',
                    title: data.error
                })
            }
        }


    })
}
// wishlistRemove end