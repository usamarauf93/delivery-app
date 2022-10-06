$(document).ready(function() {
    console.log("ready!");
    var order_data = [];
    $('#btn_store_data_state').click(function() {
        var singleRow = [];
        if ($('#retailer').val() != 'Select Retailer' && $('#datetime').val() != '' && $('#order_id').val() != '' && $('#pickup_order_data').val() != '') {
            singleRow['retailer'] = $('#retailer').val();
            singleRow['datetime'] = $('#datetime').val();
            singleRow['order_id'] = $('#order_id').val();
            singleRow['pickup_order_data'] = $('#pickup_order_data').val();
            order_data.push(singleRow);
            $('#dataholder-table').show();
            $('#dataholder-table > tbody:last-child').append('<tr><td>' + singleRow['retailer'] + '</td>' +
                '<td>' + singleRow['datetime'] + '</td>' +
                '<td>' + singleRow['order_id'] + '</td>' +
                '<td>' + singleRow['pickup_order_data'] + '</td></tr>');
            $('#order-detail-form')[0].reset();
            $('#pickup_note').show();
        } else {
            alert('Please fill all fields');
        }
    });
    $('#save_order_btn').click(function() {
        var pickup = $('#pickup_note').val();
        if (pickup != '') {
            console.log(order_data);

            $.ajax({
                type: "POST",
                url: base_url + "index.php?controller=Order&function=saveOrder",
                data: { pickup_note: pickup, status: 'new' },
                cache: false,
                success: function(result) {
                    result = JSON.parse(result);
                    if (result.success == true) {
                        console.log(result.order_id);
                        var count = order_data.length;
                        console.log('count before loop: ' + count);
                        order_data.forEach(order => {
                            count--;
                            console.log('count: ' + count);
                            $.ajax({
                                type: "POST",
                                url: base_url + "index.php?controller=Order&function=saveOrderDetails",
                                data: {
                                    pickup_order_id: result.order_id,
                                    retailer_id: order['retailer'],
                                    retailer_order_id: order['order_id'],
                                    pickup_data: order['pickup_order_data'],
                                    status: 'new',
                                    pickup_datetime: order['datetime']
                                },
                                cache: false,
                                success: function(result) {
                                    if (count == 0) {
                                        location.reload();
                                    }
                                    console.log(result);
                                },
                                error: function(err) {
                                    console.log(result);
                                }
                            });
                        });
                    } else {
                        alert("order not save");
                    }

                },
                error: function(err) {
                    console.log(result);
                }
            });

        } else {
            alert('Please Add pickup note')
        }
    });
    $('span.fa.fa-star').click(function() {
        rating = $(this).data('rate');

        $(this).addClass('checked');
        $('#rating').val(rating);
        $('#ratingForm').submit();
    })
});