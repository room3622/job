@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="pull-left">
                            <h3>Add New Tonws</h3>
                        </div>
                    </div>
                </div>

                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whooops!! </strong> There were some problems with your input.<br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form action="{{route('tonws.store')}}" method="post">
                    <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                    @include('admin.tonws.form')
                </form>

            </div>
        </div>
    </div>
@endsection


