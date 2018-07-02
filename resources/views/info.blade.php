@include('homeLayout.header')

<section class="page-header page-header-light page-header-more-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1>{{$town->name}}</h1>
            </div>

        </div>
    </div>
</section>

<div class="container">

    <div class="row pb-5 pt-3">
        <div class="col-lg-9">

            <div class="row">
                <div class="col-lg-7">

									<span class="thumb-info-listing-type thumb-info-listing-type-detail background-color-secondary text-uppercase text-color-light font-weight-semibold p-2 pl-3 pr-3">
										for sale
									</span>

                    <div class="thumb-gallery">
                        <div class="lightbox" data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}}">
                            <div class="owl-carousel owl-theme manual thumb-gallery-detail show-nav-hover" id="thumbGalleryDetail">
                                <div>
                                    <a href="{{ asset('img/demos/real-estate/listings/listing-detail-1.jpg') }}">
														<span class="thumb-info thumb-info-centered-info thumb-info-no-borders text-4">
															<span class="thumb-info-wrapper text-4">
																<img alt="Property Detail" src="{{ asset('img/demos/real-estate/listings/listing-detail-1.jpg') }}" class="img-fluid">
																<span class="thumb-info-title text-4">
																	<span class="thumb-info-inner text-4"><i class="icon-magnifier icons text-4"></i></span>
																</span>
															</span>
														</span>
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ asset('img/demos/real-estate/listings/listing-detail-2.jpg') }}">
														<span class="thumb-info thumb-info-centered-info thumb-info-no-borders text-4">
															<span class="thumb-info-wrapper text-4">
																<img alt="Property Detail" src="{{ asset('img/demos/real-estate/listings/listing-detail-2.jpg')}}" class="img-fluid">
																<span class="thumb-info-title text-4">
																	<span class="thumb-info-inner text-4"><i class="icon-magnifier icons text-4"></i></span>
																</span>
															</span>
														</span>
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ asset('img/demos/real-estate/listings/listing-detail-3.jpg') }}">
														<span class="thumb-info thumb-info-centered-info thumb-info-no-borders text-4">
															<span class="thumb-info-wrapper text-4">
																<img alt="Property Detail" src="{{ asset('img/demos/real-estate/listings/listing-detail-3.jpg') }} " class="img-fluid">
																<span class="thumb-info-title text-4">
																	<span class="thumb-info-inner text-4"><i class="icon-magnifier icons text-4"></i></span>
																</span>
															</span>
														</span>
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ asset('img/demos/real-estate/listings/listing-detail-4.jpg') }}">
														<span class="thumb-info thumb-info-centered-info thumb-info-no-borders text-4">
															<span class="thumb-info-wrapper text-4">
																<img alt="Property Detail" src="{{ asset('img/demos/real-estate/listings/listing-detail-4.jpg') }}" class="img-fluid">
																<span class="thumb-info-title text-4">
																	<span class="thumb-info-inner text-4"><i class="icon-magnifier icons text-4"></i></span>
																</span>
															</span>
														</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="owl-carousel owl-theme manual thumb-gallery-thumbs mt" id="thumbGalleryThumbs">
                            <div>
                                <img alt="Property Detail" src="{{ asset('img/demos/real-estate/listings/listing-detail-1-thumb.jpg') }}" class="img-fluid cur-pointer">
                            </div>
                            <div>
                                <img alt="Property Detail" src="{{ asset('img/demos/real-estate/listings/listing-detail-2-thumb.jpg') }}" class="img-fluid cur-pointer">
                            </div>
                            <div>
                                <img alt="Property Detail" src="{{ asset('img/demos/real-estate/listings/listing-detail-3-thumb.jpg') }}" class="img-fluid cur-pointer">
                            </div>
                            <div>
                                <img alt="Property Detail" src="{{ asset('img/demos/real-estate/listings/listing-detail-4-thumb.jpg') }}" class="img-fluid cur-pointer">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-5">

                    <table class="table table-striped">
                        <colgroup>
                            <col width="35%">
                            <col width="65%">
                        </colgroup>
                        <tbody>
                        <tr>
                            <td class="background-color-primary text-light align-middle">
                                Price
                            </td>
                            <td class="text-4 font-weight-bold align-middle background-color-primary text-light">
                                $ {{ $proparties->prise  }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Listing ID
                            </td>
                            <td>
                                #{{ $proparties->id  }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Address
                            </td>
                            <td>
                                {{$town->name}}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Beds
                            </td>
                            <td>
                                {{ $proparties->beds  }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Baths
                            </td>
                            <td>
                                {{ $proparties->wc  }}
                            </td>
                        </tr>



                        <tr>
                            <td>
                                Contacts

                            </td>
                            <td>
                                {{ $proparties->contacts  }}
                            </td>
                        </tr>


                        <tr>
                            <td>

                            </td>
                            <td>


                                @if($proparties->user_id == Auth::user()->id)


                                 <a class="btn btn-xs btn-primary" href="{{ route('pro.show', $proparties->id) }}">Edit</a>

                                {!! Form::open(['method' => 'DELETE', 'route'=>['info.destroy', $proparties->id], 'style'=> 'display:inline']) !!}
                                {!! Form::submit('Sell This Propatie',['class'=> 'btn btn-xs btn-danger']) !!}
                                    {!! Form::close() !!}


                                    @else

                                {!! Form::open(['method' => 'PUT', 'route'=>['info.update', $proparties->id], 'style'=> 'display:inline']) !!}
                                {!! Form::submit('Bay This Propatie',['class'=> 'btn btn-xs btn-danger']) !!}
                                {!! Form::close() !!}

                                @endif
                            </td>
                        </tr>



                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>

</div>


@include('homeLayout.footer')