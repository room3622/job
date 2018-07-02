<div class="row">
    <div class="col-xs-12">
        <div class="form-group">
            <strong>Information : </strong>
            <input type="text" name="info" value="{{$pro->info}}" placeholder="info" class="form-control" style="height:150px">
        </div>
    </div>
    <div class="col-xs-4">
        <div class="form-group">
            <strong>Prise : </strong>


            <input type="text" name="prise" value="{{$pro->prise}}" placeholder="{{$pro->prise}}" class="form-control">
        </div>
    </div>

    <div class="col-xs-4">
        <div class="form-group">
            <strong>Beds : </strong>

            <input type="text" name="beds" placeholder="beds" value="{{$pro->beds}}" class="form-control">
        </div>
    </div>

    <div class="col-xs-4">
        <div class="form-group">
            <strong>Wc : </strong>

            <input type="text" name="wc" value="{{$pro->wc}}" placeholder="wc" class="form-control">
        </div>
    </div>

    <div class="col-xs-8">
        <div class="form-group">
            <strong>Contacts : </strong>

            <input type="text" name="contacts" value="{{$pro->contacts}}"  placeholder="Contacts" class="form-control">
        </div>
    </div>

    <div class="col-xs-4">
        <select name="town" class="form-control">

            @if($towns->isEmpty())
                <option value="">Option Not Available</option>
            @endif

            @foreach ($towns as $town)



                @if($pro->town == $town->id)
                        <option selected value="{{ $town->id }}">{{ $town->name }}</option>
                    @else
                        <option  value="{{ $town->id }}">{{ $town->name }}</option>
                    @endif

            @endforeach
        </select>
    </div>

    <div class="col-xs-12">
        <a class="btn btn-xs btn-success" href="{{ route('proparties.index') }}">Back</a>

        <button type="submit"  class="btn btn-xs btn-primary" name="button">Submit</button>
    </div>
</div>












