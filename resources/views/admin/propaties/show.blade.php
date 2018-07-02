@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="pull-left">
                            <h3>Show proparties </h3> <a class="btn btn-xs btn-primary" href="{{ route('proparties.index') }}">Back</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <strong>Info : </strong>
                            {{ $pro->info }}
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <strong>Prise : </strong>
                            {{ $pro->prise }}
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <strong>Beds : </strong>
                            {{ $pro->beds }}
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="form-group">
                            <strong>Wc  : </strong>
                            {{ $pro->wc }}
                        </div>
                    </div>


                    <div class="col-xs-12">
                        <div class="form-group">
                            <strong>Contacts  : </strong>
                            {{ $pro->contacts }}
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="form-group">
                            <strong>Town  : </strong>
                            {{ $town->name }}
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection
