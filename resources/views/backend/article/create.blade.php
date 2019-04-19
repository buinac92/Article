@extends('layouts.app')

@section('content')
    {{--<script type="text/javascript">--}}
        {{--$(document).ready(function(){--}}

            {{--$('#upload_form').on('submit', function(event){--}}
                {{--event.preventDefault();--}}
            {{--var title=$("#title").val();--}}
            {{--var body=$("#edit").val();--}}
            {{--var user_id=$("#user_id").val();--}}

                {{--var image = $('#picture')[0].files[0];--}}

                {{--if( window.FormData ) {--}}
                    {{--var formdata = new FormData();--}}
                    {{--formdata.append('image', image);--}}
                    {{--formdata.append('action', 'save-image');--}}
                    {{--$.ajax--}}
                    {{--({--}}
                        {{--headers: {--}}
                            {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
                        {{--},--}}
                        {{--url: '<?php //print route("articles.store"); ?>',--}}
                        {{--type: 'POST',--}}
                        {{--dataType: 'json',--}}
                        {{--enctype: 'multipart/form-data',--}}

                        {{--data: {--}}
                            {{--"title": title,--}}
                            {{--"body": body,--}}
                            {{--"user_id": user_id,--}}
                            {{--"picture": formdata,--}}

                        {{--},--}}
                        {{--success: function (result) {--}}
                            {{--console.log(result);--}}

                        {{--},--}}
                        {{--error: function (data) {--}}
                            {{--console.log(data);--}}
                        {{--}--}}
                    {{--});--}}
                {{--}--}}

        {{--});--}}
        {{--});--}}
    {{--</script>--}}
    <div class="container">
        <div class="row">


            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Create New Article</div>
                    <div class="card-body">
                        <a href="{{ url('/article') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        {{--<form method="post" id="upload_form" enctype="multipart/form-data">--}}
                        <form method="POST" action="{{ url('/article') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('backend.article.form', ['formMode' => 'create'])

                        </form>
                        {{--</form>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
