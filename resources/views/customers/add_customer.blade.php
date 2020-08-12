@extends('layouts.default')
@if(!empty($customer_data))
    @section('title', 'Update Customer')
@else
    @section('title', 'Add Customer')
@endif
@section('content')
    <div class="dashboard-content customers-list">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-xs-8">
                {!! Form::model($customer_data, ['route' => 'save_customer', 'id' => 'add-customer-form']) !!}
                    {!! Form::hidden('id', null) !!}
                    <div class="my-profile">
                        <label>First name</label>
                        {!! Form::text('first_name', null, ['class' => 'form-control validate[required]', 'required' => true]) !!}
                        <label>Last name</label>
                        {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                        <label>Email</label>
                        {!! Form::email('email', null, ['class' => 'form-control validate[required,custom[email]]', 'required' => true]) !!}
                        <label>Phone</label>
                        {!! Form::text('phone', null, ['class' => 'form-control validate[required,custom[number],minSize[10],maxSize[12]]', 'required' => true]) !!}   
                {!! Form::close() !!}
                <div style="margin-top:20px;">

                    <button type="button" onclick="save_customer();" class="btn btn-danger submit-btn">
                        @if(!empty($customer_data))
                            Update Customer 
                        @else
                            Add Customer 
                        @endif
                    </button>
                </div>
            </div>
        </div>
    </div>`
    <script type="text/javascript">
    function manage_customer(id) {

        $("#add_customer").modal('show');
        var url = "{{url('/add_customer')}}";
        if(id == '') {
            $('#add_customer .modal-title').text('Add Customer');
            $('#add_customer .submit-btn').text('Add');        
        }
        else {
            $('#add_customer .modal-title').text('Update Customer Detail');
            $('#add_customer .submit-btn').text('Update');
            var url = "{{url('/add_customer')}}/"+id;     
        }
        $("#add_customer .modal-body").load(url);
    }
    function save_customer() {
        if(jQuery("#add-customer-form").validationEngine('validate')) {
            $('#add-customer-form').submit();
        }
    }

</script>
@endsection