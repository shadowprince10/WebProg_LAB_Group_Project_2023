<script>
    $(document).ready(function() {
        $('.minus-qty-btn').click(function(e) {
            e.preventDefault();
            var input = $(this).parent().find('.input-cart-qty');
            var current_value = parseInt(input.val());

            if (current_value > 1) {
                input.val(current_value - 1);
            }
        })
    })

    $(document).ready(function() {
        $('.add-qty-btn').click(function(e) {
            e.preventDefault();
            var input = $(this).parent().find('.input-cart-qty');
            var current_value = parseInt(input.val());

            input.val(current_value + 1);
        })
    })

    $(document).ready(function() {
        $('form').submit(function(e) {
            e.preventDefault();
            var quantity = $(this).find('input-cart-qty').val();
            var productID = $(this).data('productID');
            $.ajax({
                url: '/update-quantity',
                method: 'POST',
                data: {
                    quantity: quantity,
                    productID: productID
                },
                // handle success response from the server
                success:function(response) {
                    console.log(response);
                },
                // handle error response from the server
                error:function(response) {
                    console.log(xhr.responseText);
                }
            })
        })
    })
</script>
