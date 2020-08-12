@extends('layouts.default')
@section('title', 'Customers')
@section('content')
<style type="text/css">
    .customers-list .btn-red {
        padding: 3px 8px;
        font-weight: normal;
        font-size: 13px;
    }
    .my-profile textarea {
        height:auto !important;
    }
    #customers-index-page .opacity {
        opacity:0.5;
    }
    table.basic-table th {
        background-color: #303030;
    }
    table.basic-table th, table.basic-table td {
        padding:10px;
    }
    .table-condensed > tbody > tr > td, .table-condensed > tbody > tr > th, .table-condensed > tfoot > tr > td, .table-condensed > tfoot > tr > th, .table-condensed > thead > tr > td, .table-condensed > thead > tr > th {
        padding:20px 10px;
    }
</style>
<div class="dashboard-content customers-list">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="dashboard-list-box">
                <h4 class="gray">All Customers
                    <a href="{{url('/add_customer')}}" style="margin-left:10px;" class="btn-blue btn-red pull-right" onclick="manage_customer('');">+ Add Customer</a>
                </h4>
                <div class="table-responsive">
                    @if(count($customers_arr) > 0)
                        <table class="basic-table booking-table table-condensed" id="customers-index-page">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers_arr as $customer)
                                    <tr class="customer_id_{{$customer->id}}">
                                        <td>{{$customer->first_name}} {{$customer->last_name}}</td>
                                        <td>{{$customer->email}}</td>
                                        <td>{{$customer->phone}}</td>
                                        @if($customer->status)
                                            <td><span data-toggle="tooltip" data-placement="top" title="Change Status" class="paid t-box" status="0" onclick="change_status('{{$customer->id}}', this);">Active</span></td>
                                        @else
                                            <td><span data-toggle="tooltip" data-placement="top" title="Change Status" class="cancel t-box" status="1" onclick="change_status('{{$customer->id}}', this);">Inactive</span></td>
                                        @endif
                                        <td>
                                            <a data-toggle="tooltip" data-placement="top" title="Edit Customer" href="{{url('/add_customer')}}/{{$customer->id}}" class="button gray enabled"><i class="sl sl-icon-pencil"></i></a>
                                            <a data-toggle="tooltip" data-placement="top" title="Delete Customer" href="javascript:;" onclick="delete_customer('{{$customer->id}}', this);" class="button gray enabled"><i class="sl sl-icon-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else 
                        <div class="no-data-found">No Customer added yet.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    // FUNTION TO ACTIVATE/DEACTIVATE CUSTOMER //
    function change_status(id,thiss) {
        var status = $(thiss).attr('status');
        if(id != '' && status != '') {
            if(confirm('Are you sure to change the status of customer?')) {
                $.ajax({
                    type: 'POST',
                    url: "{{url('/update_customer_status')}}",
                    data: {
                        _token:'{{csrf_token()}}',
                        status: status,
                        id: id,
                    },
                    success: function(data) 
                    { 
                        if(data == 'suc') {
                            if(status == 1) {
                                $(thiss).text('Active');
                                $(thiss).removeClass('cancel');
                                $(thiss).addClass('paid');
                                $(thiss).attr('status', 0);
                            }
                            else {
                                $(thiss).removeClass('paid');
                                $(thiss).addClass('cancel');
                                $(thiss).text('Inactive');
                                $(thiss).attr('status', 1);
                            }
                            alert_msg('Customer status has been updated successfully.', 'success');
                        }
                        else {
                            alert_msg('An error occured while updating status.', 'error');
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
        else {
            alert_msg('Invalid Request.', 'error');
        }
    }

    // FUNTION TO DELETE CUSTOMER //
    function delete_customer(id) {
        if(id != '') {
            if(confirm('Are you sure to delete this customer?')) {
                $.ajax({
                    type: 'POST',
                    url: "{{url('/delete_customer')}}",
                    data: {
                        _token:'{{csrf_token()}}',
                        id: id,
                    },
                    success: function(data) 
                    { 
                        if(data == 'suc') {
                            $('.customer_id_'+id).fadeOut(2000);
                            alert_msg('Customer has been deleted successfully.', 'success');
                        }
                        else {
                            alert_msg('An error occured while deleting customer.', 'error');
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
        else {
            alert_msg('Invalid Request.', 'error');
        }
    }
</script>


@endsection