<div class="row">
    <div class="col-xs-12">
        <div class="form-group">
            <strong>Information : </strong>
            <input type="text" name="info" placeholder="info" class="form-control" style="height:150px">
        </div>
    </div>
    <div class="col-xs-4">
        <div class="form-group">
            <strong>Prise : </strong>


            <input type="text" name="prise" placeholder="prise" class="form-control">
        </div>
    </div>

    <div class="col-xs-4">
        <div class="form-group">
            <strong>Beds : </strong>

            <input type="text" name="beds" placeholder="beds" class="form-control">
        </div>
    </div>

    <div class="col-xs-4">
        <div class="form-group">
            <strong>Wc : </strong>

            <input type="text" name="wc" placeholder="wc" class="form-control">
        </div>
    </div>

    <div class="col-xs-8">
        <div class="form-group">
            <strong>Contacts : </strong>

            <input type="text" name="contacts" placeholder="Contacts" class="form-control">
        </div>
    </div>

    <div class="col-xs-4">
        <select name="town" class="form-control">

                    @if($towns->isEmpty())
                        <option value="">Option Not Available</option>
                    @endif

                @foreach ($towns as $town)
                <option value="{{ $town->id }}">{{ $town->name }}</option>

            @endforeach
        </select>
    </div>


    <div class="col-xs-12">
        <a class="btn btn-xs btn-success" href="{{ route('proparties.index') }}">Back</a>

        <button type="submit"  class="btn btn-xs btn-primary" name="button">Submit</button>
    </div>
</div>












