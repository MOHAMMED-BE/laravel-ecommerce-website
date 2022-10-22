

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function productView(id) {
    // ========================= alert(id);
    $.ajax({
        url: "/product/view/modal/" + id,
        type: "GET",
        dataType: "json",
        success: function (data) {
            console.log(data)
            $('#product-name').text(data.product.product_name_en);

            if (data.product.discount_price == null) {
                $('#product-old-price').css('display', 'none');
                $('#product-selling-price').text("$" + data.product.selling_price);
            } else {
                $('#product-selling-price').text("$" + data.product.discount_price);
                $('#product-old-price').text("$" + data.product.selling_price).css('display', 'block');
            }

            $('#product-code').text(data.product.product_code);
            $('#product-thumbnail').attr('src', '/' + data.product.product_thumbnail);
            $('#product-category').text(data.product.category.category_name_en);
            $('#product-brand').text(data.product.brand.brand_name_en);
            $('#product-id').val(id);
            $('#quantity').val(1);

            var stock = data.product.product_quantity;

            if (stock > 0) {
                $('#product-stock').text('in stock').attr('class', 'badge badge-pill badge-success').css('background-color', 'green', 'color', '#fff');
                $('.save-cart').removeAttr('disabled');
            }

            else if (stock < 1) {
                $('#product-stock').text('out of stock').attr('class', 'badge badge-pill badge-danger').css('background-color', 'red', 'color', '#fff');
                $('.save-cart').attr('disabled', 'disabled');
            }


            $('select[name="product-color"]').find('option').remove().end();
            $('#color-group').hide();
            if (data.product_color_en != "") {
                $('#color-group').show();

                $.each(data.product_color_en, function (key, value) {
                    $('select[name="product-color"]').append('<option value="' + value + '">' + value + '</option>');
                });
            }


            $('select[name="product-size"]').find('option').remove().end();
            $('#size-group').hide();
            if (data.product_size_en != "") {
                $('#size-group').show();

                $.each(data.product_size_en, function (key, value) {
                    $('select[name="product-size"]').append('<option value="' + value + '">' + value + '</option>');
                });
            }

        } // ========================= end success
    }) // ========================= end ajax

} // ========================= end ProductView


// ========================= Start Add To Cart
function AddToCart() {
    var product_name = $('#product-name').text();
    var id = $('#product-id').val();
    var size = $('#size option:selected').text();
    var color = $('#color option:selected').text();
    var quantity = $('#quantity').val();

    $.ajax({
        type: "POST",
        dataType: "json",
        data: {
            product_name: product_name,
            size: size,
            color: color,
            quantity: quantity
        },

        url: "/cart/data/store/" + id,

        success: function (data) {
            miniCart();
            couponCalculation();
            $('.close-modal').click();

            // ========================= start message

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                icon: 'success',
                showConfirmButton: false,
                timer: 3000
            })

            if ($.isEmptyObject(data.error)) {
                Toast.fire({
                    type: 'success',
                    title: data.success
                })
            } else {
                Toast.fire({
                    type: 'error',
                    title: data.error
                })
            }

            // ========================= end message
        }


    })
}

// ========================= End Add To Cart



function miniCart() {
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: '/product/mini/cart/',
        success: function (response) {
            $('span[id="cart-quantity"]').text(response.cartQuantity)
            $('.cart-sub-total').text(response.cartTotal)
            var miniCart = ""
            $.each(response.carts, function (key, value) {
                miniCart += `
          <div class="cart-item product-summary">
            <div class="row">
                <div class="col-xs-4">
                    <div class="image"> <a href="detail.html"><img src="/${value.options.image}" alt=""></a> </div>
                </div>
                <div class="col-xs-7">
                    <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                    <div class="price">$ ${value.price} * ${value.qty} </div>
                </div>
                <div class="col-xs-1 action"> <button class="btn-remove" type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa-solid fa-trash-can"></i></button> </div>
            </div>
        </div>
        <!-- /.cart-item -->
        <div class="clearfix"></div>
        <hr>
          `;
            });
            $('#miniCart').html(miniCart);
        }
    })
}

miniCart();

// ========================= miniCartRemove start
function miniCartRemove(rowId) {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "/minicart/product-remove/" + rowId,

        success: function (data) {
            miniCart();
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                icon: 'success',
                showConfirmButton: false,
                timer: 3000
            })

            if ($.isEmptyObject(data.error)) {
                Toast.fire({
                    type: 'success',
                    title: data.success
                })
            } else {
                Toast.fire({
                    type: 'error',
                    title: data.error
                })
            }
        }


    })
}
// ========================= miniCartRemove end

// ========================= view cart 

function cart() {
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: '/user/get-cart-product',
        success: function (response) {
            $('#cart-sub-total').text(response.cartTotal)
            var cart_row = ""
            $.each(response.carts, function (key, value) {
                cart_row += `
                <tr>
                <td class="cart-td col-md-2"><img src="/${value.options.image}" alt="imga" style="width: 60px; border-radius: 5px; box-shadow: 0 0.1rem 0.9rem 0 rgb(22 39 86 / 15%);"></td>
                <td class="cart-td col-md-4">
                    <div class="product-name"><a href="#">${value.name}</a></div>
                    <div class="price">
                    $${value.price}
                    </div>
                </td>
                <td class="cart-td col-md-2">
                    ${value.options.size == null ?
                        `<span></span>` :
                        `<strong>size : ${value.options.size}</strong>`

                    }
                </td>
                <td class="cart-td col-md-2">
                    ${value.options.color == null ?
                        `<span></span>` :
                        `<strong>color : ${value.options.color}</strong>`
                    }
                </td>
                <td class="cart-td col-md-2" style=" display: flex; margin: 15px 0px 0px 0px; ">
                    ${value.qty > 1
                        ? `<button type="submit" id="${value.rowId}" onclick="cartDecrement(this.id)" id="cartDecrement" class="btn btn-success btn-sm" style=" margin: 0 5px 0 0; ">-</button>`
                        : `<button type="submit" id="${value.rowId}" onclick="cartDecrement(this.id)" id="cartDecrement" class="btn btn-success btn-sm" disabled style=" margin: 0 5px 0 0; ">-</button>`
                    }
                    <input type="text" class="form-control" id="quantity" value="${value.qty}" min="1" max="100" disabled style=" width: 6rem; ">

                    ${value.qty < 100
                        ? `<button type="submit" id="${value.rowId}" onclick="cartIncrement(this.id)" id="cartIncrement" class="btn btn-danger btn-sm" style=" margin: 0 0 0 4px; ">+</button>`
                        : `<button type="submit" id="${value.rowId}" onclick="cartIncrement(this.id)" id="cartIncrement" disabled class="btn btn-danger btn-sm" style=" margin: 0 0 0 4px; ">+</button>`
                    }
                </td>

                <td class="cart-td col-md-2">
                <strong>$${value.subtotal}</strong>
                </td>
                
                <td class="cart-td col-md-1 close-btn">
                    <button type="submit" class="btn-remove" id="${value.rowId}" onclick="cartRemove(this.id)"  class=""><i class="fa-solid fa-trash-can"></i></button>
                </td>
            </tr>
          `;
            });
            $('#cart-page').html(cart_row);
        }
    })
}

cart();


// ========================= cartRemove start
function cartRemove(rowId) {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "/user/cart-remove/" + rowId,

        success: function (data) {
            cart();
            miniCart();
            couponCalculation();
            $('#coupon-field').show();
            $('#coupon_name').val('');
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
// ========================= cartRemove end


// ========================= cartIncrement start
function cartIncrement(rowId) {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "/cart-increment/" + rowId,

        success: function (data) {
            cart();
            miniCart();
            couponCalculation();
        }
    })
}
// ========================= cartIncrement end


// ========================= cartDecrement start
function cartDecrement(rowId) {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "/cart-decrement/" + rowId,

        success: function (data) {
            cart();
            miniCart();
            couponCalculation();
        }
    })
}
// ========================= cartDecrement end
