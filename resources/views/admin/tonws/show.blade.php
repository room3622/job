@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="pull-left">
                            <h3>Show Tonwn </h3> <a class="btn btn-xs btn-primary" href="{{ route('tonws.index') }}">Back</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <strong>Info : </strong>
                            {{ $pro->name }}
                        </div>
                    </div>



                </div>


            </div>
        </div>
    </div>
@endsection
