@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif


                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Simple laravel CRUD with resource controller</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="pull-right">
                                <a class="btn btn-xs btn-success" href="{{ route('proparties.create') }}">Create New Propertie</a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <tr>
                            <th>No.</th>
                            <th>Info</th>
                            <th>Prise</th>
                            <th>Town</th>
                            <th width="300px">Actions</th>
                        </tr>





                        @foreach ($proparties as $post)



                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $post->info }}</td>
                                <td>{{ $post->prise }}</td>
                                <td>@foreach($town as $tw)
                                        @if($tw->id == $post->town)
                                            {{$tw->name}}
                                        @endif
                                    @endforeach</td>

                                <td>
                                    <a class="btn btn-xs btn-info" href="{{ route('proparties.show', $post->id) }}">Show</a>
                                    <a class="btn btn-xs btn-primary" href="{{ route('proparties.edit', $post->id) }}">Edit</a>
                                    {!! Form::open(['method' => 'DELETE', 'route'=>['proparties.destroy', $post->id], 'style'=> 'display:inline']) !!}
                                    {!! Form::submit('Delete',['class'=> 'btn btn-xs btn-danger']) !!}
                                    {!! Form::close() !!}


                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {!! $proparties->links() !!}

                    @if($proparties->isEmpty())
                        <table class="table table-bordered">
                            <tr>
                                <td class="text-center">You Have No Data</td>
                            </tr>

                        </table>
                    @endif



            </div>
        </div>
    </div>
@endsection