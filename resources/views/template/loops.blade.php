@foreach ($proparties as $post)
    <div class="col-md-6 col-lg-4 p-3 isotope-item">
        <div class="listing-item">
            <a href="{{ route('info.show', $post->id) }}" class="text-decoration-none">
                <div class="thumb-info thumb-info-lighten">
                    <div class="thumb-info-wrapper m-0">
                        <img src="img/demos/real-estate/listings/listing-1.jpg" class="img-fluid" alt="">
                        <div class="thumb-info-listing-type background-color-secondary text-uppercase text-color-light font-weight-semibold p-1 pl-3 pr-3">
                            for sale
                        </div>
                    </div>
                    <div class="thumb-info-price background-color-primary text-color-light text-4 p-2 pl-4 pr-4">
                        $ {{$post->prise }}
                        <i class="fas fa-caret-right text-color-secondary float-right"></i>
                    </div>
                    <div class="custom-thumb-info-title b-normal p-4">
                        <ul class="accommodations text-uppercase font-weight-bold p-0 mb-0 text-2">
                            <li>
															<span class="accomodation-title">
																Beds:
															</span>
                                <span class="accomodation-value custom-color-1">
                                    {{$post->beds }}
															</span>
                            </li>
                            <li>
															<span class="accomodation-title">
																Baths:
															</span>
                                <span class="accomodation-value custom-color-1">
																{{$post->wc }}


															</span>
                            </li>




                            <li>
															<span class="accomodation-title">
																Location:
															</span>
                                <span class="accomodation-value custom-color-1">
																@foreach($town as $tw)
                                                                @if($tw->id == $post->town)
                                                                {{$tw->name}}
                                                                @endif
                                                                @endforeach


                                </span>
                            </li>






                            <li>

                            </li>
                        </ul>
                    </div>
                </div>
            </a>
        </div>


    </div>
@endforeach




