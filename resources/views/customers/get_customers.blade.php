<style type="text/css">
    .table-box {
        overflow:hidden;
    }
    .form-wrap .search-form {
        display:inline-block;
        width:70%;
    }
    .form-wrap .search-form-submit-btn {
        display:inline-block;
        width:28%;
    }
    .char-count-wrap {
        text-align:right;
        font-size:12px;
    }
    .customers-list-main-wrap table.customers-list-wrap td {
        padding: 0px 10px;
    }
    .customers-list-main-wrap table.customers-list-wrap th {
        padding: 5px 10px;
        vertical-align:middle;
    }
</style>
@php 
    $sms_text = $message = $package_data->title.' '.$package_data->duration.', Departure Date '.date('d M Y', strtotime($package_data->departure_date)).' ('.strtoupper($package_data->currency_type).')'.number_format($package_data->price).' '.Auth::user()->company_name.', '.Auth::user()->city.' '.Auth::user()->phone.', '.Auth::user()->phone2;
    if(!empty($package_data)) {
        preg_match_all('!\d+!', $package_data->duration, $duration);
        $package_data->days = $duration[0][0];
        $package_data->nights = $duration[0][1];
    }
@endphp
<div class="table-box customers-list-main-wrap" style="width:100%;">
    @if(count($customers_arr) > 0)
        <table id="customers-table" class="basic-table booking-table customers-list-wrap" style="margin-top:20px;">
            <thead>
                <tr>
                    <th> 
                        <div class="checkbox checkbox-danger">
                            {{ Form::checkbox('select_all','','', ['id' => 'checkbox6', 'class' => 'select_all'])}}
                            <label for="checkbox6"></label>
                        </div>
                    </th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers_arr as $customer)
                    <tr>
                        <td>
                            <div class="checkbox checkbox-danger">
                                {{ Form::checkbox('customer_id',$customer->id,'', ['id' => 'checkbox'.$customer->id, 'class' => 'select_customer'])}}
                                <label for="checkbox{{$customer->id}}"></label>
                            </div>
                        </td>
                        <td>{{$customer->first_name}} {{$customer->last_name}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->phone}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- <div>
            @if($sell_package)
                <button class="btn btn-danger sell-package-btn" onclick="manage_price_before_sell_package();">Sell Package</button>
            @else
                <button class="btn btn-danger send-package-btn" onclick="manage_sms_text();">Send Package</button>
            @endif
        </div> -->
    @else 
        <div class="no-data-found">No Customer added yet.</div>
    @endif
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#customers-table').DataTable( {
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "aaSorting": []
        });
        $('.select_all').click( function() {
            var check = false;
            if($(this).prop('checked')) {
                check = true;
            }
            $('#customers-table tbody .select_customer').each( function() {
                $(this).prop('checked', check);
            }); 
        });
        $('#customers-table .select_customer').click( function() {
            $('#customers-table tbody .select_customer').each( function() {
                if(!$(this).prop('checked')) {
                    $('.select_all').prop('checked', false);
                }
            }); 
        });
    });
    function manage_price_before_sell_package() {
        var customer_ids_arr = [];
        $('#customers-table tbody .select_customer').each(function() {
            if($(this).prop('checked')) {
                customer_ids_arr.push($(this).val());
            }
        }); 
        if(customer_ids_arr.length === 0) {
            alert_msg('Please select atleast one customer to sell package.', 'error');
        }   
        else {
            $('#manage-price-before-sell').modal('show');
            $('#manage-price-before-sell .price').val('{{$package_data->price}}');
            $('#manage-price-before-sell .days').val('{{$package_data->days}}');
            $('#manage-price-before-sell .nights').val('{{$package_data->nights}}');
            $('#manage-price-before-sell .customer_ids_field').val(customer_ids_arr);
            $('#manage-price-before-sell .currency_type').text('<?php echo Config::get('constants.CURRENCY_TYPE.'.$package_data->currency_type); ?>');
        }    
    }
    function sell_package() {
        if($('#manage-price-before-sell-form').validationEngine('validate')) {
            var customer_ids_arr = $('#manage-price-before-sell .customer_ids_field').val();
            var price = $('#manage-price-before-sell .price').val();
            var days = $('#manage-price-before-sell .days').val();
            var nights = $('#manage-price-before-sell .nights').val();
            var payment_due_date = $('#manage-price-before-sell .payment-due-date').val();
            //$('#manage-price-before-sell-form').submit();
            $.ajax({
                type: 'POST',
                url: "{{url('/sell_package')}}",
                data: {
                    _token:'{{csrf_token()}}',
                    customer_ids_arr: customer_ids_arr,
                    price: price,
                    days: days,
                    nights: nights,
                    package_id: '{{$package_data->id}}',
                    payment_due_date:payment_due_date
                },
                success: function(data) 
                { 
                    if(data == 'suc') {
                        $('#manage-price-before-sell').modal('hide');
                        $('#send_package').modal('hide');
                        alert_msg('Package has been sold successfully.', 'success');
                    }
                    else {
                        alert_msg('An error occured while selling package.', 'error');
                    }
                },
                error: function(data){
                    var errors = data.responseJSON;
                    $.each(errors.errors, function( key, value ) {
                        alert_msg(value, 'error');
                    });
                }
            });  
        }
    } 
    function manage_sms_text() {
        var customer_ids_arr = [];
        $('#customers-table tbody .select_customer').each(function() {
            if($(this).prop('checked')) {
                customer_ids_arr.push($(this).val());
            }
        }); 
        if(customer_ids_arr.length === 0) {
            alert_msg('Please select atleast one customer to send package details.', 'error');
        }   
        else {
            $('#manage-sms-text').modal('show');
            $('#manage-sms-text .sms-text').val('{{$sms_text}}');
            char_count($('#manage-sms-text .sms-text'));
            $('#manage-sms-text .customer_ids_field').val(customer_ids_arr);
        }
    }
    function char_count(thiss) {
        var chars = $(thiss).val().length;
        messages = Math.ceil(chars / 160),
        remaining = messages * 160 - (chars % (messages * 160) || messages * 160);
        $('#manage-sms-text .sms-count').text(messages);
        $('#manage-sms-text .char-count').text(remaining);
    }
    function send_package() {
        if($('#manage-sms-text-form').validationEngine('validate')) {
            var customer_ids_arr = $('#manage-sms-text .customer_ids_field').val();
            var sms_text = $('#manage-sms-text .sms-text').val();
            $.ajax({
                type: 'POST',
                url: "{{url('/send_package')}}",
                data: {
                    _token:'{{csrf_token()}}',
                    customer_ids_arr: customer_ids_arr,
                    package_id: '{{$package_data->id}}',
                    sms_text:sms_text
                },
                success: function(data) 
                { 
                    if(data == 'suc') {
                        alert_msg('Package Detail has been sent successfully.', 'success');
                        $('#manage-sms-text').modal('hide');
                        $('#send_package').modal('hide');
                    }
                    else {
                        alert_msg('An error occured while sending package details.', 'error');
                    }
                },
                error: function(data){
                    var errors = data.responseJSON;
                    $.each(errors.errors, function( key, value ) {
                        alert_msg(value, 'error');
                    });
                }
            });   
        }                       
    }
</script>


