@extends('admin.layouts.master')
@section('title',$title)
@section('content')
<div class="row">
 
    <div class="col-xl-8 offset-xl-2 py-5">

        <form id="contact-form" method="post" action="contact.php" role="form">

            <div class="messages"></div>

            <div class="controls">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_name">name *</label>
                            <input id="form_name" type="text" name="name" class="form-control" placeholder="Enter your name *" required="required" data-error="Name is required">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_lastname">Lastname *</label>
                            <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Enter your Lastname *" required="required" data-error="Lastname is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_email">Email *</label>
                            <input id="form_email" type="email" name="email" class="form-control" placeholder="Enter your Email Address *" required="required" data-error="Enter a valid Email.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_need">Phone number *</label>
                            <input type="number" name="number" id="" class="form-control" placeholder="Enter your Phone number *" required="required" data-error="Enter a valid number.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="form_message">Message *</label>
                            <textarea id="form_message" name="message" class="form-control" placeholder="Votre Message *" rows="4" required="required" data-error="Please complete the Message field."></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-success btn-send" value="Envoyer">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-muted">
                            <strong>*</strong> This field is required .</p>
                    </div>
                </div>
            </div>

        </form>

    </div>
    <!-- /.8 -->

</div>
<!-- /.row-->
 
@endsection
@section('stylesheets')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection
@section('scripts')

@endsection