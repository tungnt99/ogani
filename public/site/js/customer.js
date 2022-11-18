$(document).ready(function () {
    var itemCount = 0;
    $('.add').click(function (e) {
        e.preventDefault();
        itemCount ++;
        $('#itemCount').html(itemCount).css('display', 'block');
    });
    $('.dec-btn').click(function (e) {
        e.preventDefault();

        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_value,10);
        value = isNaN(value) ? 0 : value;
        if(value > 1) 
        {
            value--;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });
    $('.inc-btn').click(function (e) {
        e.preventDefault();

        var inc_value = $(this).closest('.product_data').find('.qty-input').val();

        var value = parseInt(inc_value,10);
        value = isNaN(value) ? 0 : value;
        if(value < 10) 
        {
            value++;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });
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

    $('.changeQuantity').click(function (e) {
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
                window.location.reload();
                // console.log(response);
            }
        });
    });
});