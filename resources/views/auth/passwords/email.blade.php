@extends('layouts.default')
@section('title', 'Reset Password')
@section('content')
<section class="login">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="login-form">
                    {!! Form::open(['route' => 'password.update', 'id' => 'reset-password-form']) !!}
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-title">
                                    <h2>Reset Password</h2>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label>Email</label>
                                {!! Form::email('email', '', ['placeholder' => 'Enter Your Registered Email', 'class' => 'form-control validate[required,custom[email]]']) !!}
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-xs-12">
                                <div class="comment-btn">
                                    <button type="submit" class="btn-blue btn-red">Send password reset link</button>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery("#reset-password-form").validationEngine();
    });
</script>
@endsection