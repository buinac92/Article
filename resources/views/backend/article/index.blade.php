@extends('layouts.app')

@section('content')
    <script type="text/javascript">
        // A $( document ).ready() block.
        $(document).on ("click", ".deleteProducat", function () {
            var id = $(this).data("id");
            var token = $(this).data("token");
            $.ajax(
                {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: 'api/articles/'+id,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        "_token": token
                    },
                    success: function (response)
                    {
                        window.location.reload();
                        console.log(response); // see the reponse sent
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText); // this line will save you tons of hours while debugging
                        // do something here because of error
                    }
                });


        });

        $( document ).ready(function() {

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "GET",
                        url: '<?php print route("articles.index"); ?>',
                        success: function (obj) {
                            var msg

                            for (var i = 0; i < obj.data.length; i++) {
                                msg += "<tr><td>" + obj.data[i]['id'] + "</td><td>" + obj.data[i]['title'] + "</td><td>" + obj.data[i]['user_id'] + "</td><td>" + obj.data[i]['body'] + "</td><td>" +
                                    "<a href='article/" + obj.data[i]['id'] + "'  title='View article'><button class='btn btn-info btn-sm'><i class='fa fa-eye' aria-hidden='true'></i> View</button></a>" +
                                    "<a href='article/" + obj.data[i]['id'] + "/edit' title='Edit article'><button class='btn btn-primary btn-sm'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit</button></a>" +
                                    "<button class='btn btn-danger btn-sm deleteProducat' data-id='" + obj.data[i]['id'] + "' data-token=\"{{ csrf_token() }}\"  title='Delete article' ><i class='fa fa-trash-o' aria-hidden='true'></i> Delete</button>" +

                                    "</td></tr>"

                            }
                            $('#table > tbody').append(msg);
                            console.log(obj.data)
                        }
                    });






        });


    </script>
    <div class="container">
        <div class="row">


            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Article</div>
                    <div class="card-body">
                        <a href="{{ url('/article/create') }}" class="btn btn-success btn-sm" title="Add New Article">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/article') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}" id="search">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit" id="btns">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Title</th><th>User Id</th><th>Body</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                {{--<tr>--}}
                                    {{--<td>--}}
                                        {{--{{$it}}--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                        {{--<a href="{{ url('/article/' . $item->id) }}" title="View article"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>--}}
                                        {{--<a href="{{ url('/article/' . $item->id . '/edit') }}" title="Edit article"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>--}}

                                        {{--<form method="POST" action="{{ url('/article' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">--}}
                                            {{--{{ method_field('DELETE') }}--}}
                                            {{--{{ csrf_field() }}--}}
                                            {{--<button type="submit" class="btn btn-danger btn-sm" title="Delete article" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>--}}
                                        {{--</form>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}

                                </tbody>

                            </table>
                            <div class="pagination-wrapper"> {!! $article->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
