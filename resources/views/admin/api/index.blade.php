@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md">


                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>




                    <h2>Filterable Table</h2>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <input class="form-control" id="myInput" type="text" placeholder="Search..">
                    <br>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Token</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody id="myTable">
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>

                                <td>{{$user->api_token}}</td>
                                <td>
                                    {!! Form::open(['method' => 'PUT', 'route'=>['api.update', $user->id], 'style'=> 'display:inline']) !!}
                                    {!! Form::submit('Generate',['class'=> 'btn btn-xs btn-primary']) !!}
                                    {!! Form::close() !!}

                                    {!! Form::open(['method' => 'DELETE', 'route'=>['api.destroy', $user->id], 'style'=> 'display:inline']) !!}
                                    {!! Form::submit('Delete',['class'=> 'btn btn-xs btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>


                </div>

                <script>
                    $(document).ready(function(){
                        $("#myInput").on("keyup", function() {
                            var value = $(this).val().toLowerCase();
                            $("#myTable tr").filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });
                    });
                </script>






@endsection