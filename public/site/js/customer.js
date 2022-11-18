$(document).ready(function () {
    $('.delete-cart-item').click(function (e) {
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            type: "POST",
            url: "deleteCart",
            data: {
                'prod_id': prod_id,
            },
            success: function (response) {
                window.location.reload();
                swal("",response.status,"success");
            }
        });
    });

    $('.qtybtn').click(function (e) {
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "updateCart",
            data: {
                'prod_id': prod_id,
                'prod_qty': qty,
            },
            success: function (response) {
                // swal(response.status);
            }
        });
    });
});