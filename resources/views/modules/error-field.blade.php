@if($errors->get($field))
    <div class="col-md-3 col-sm-3 col-xs-12">

        <ul class='error'>
            @foreach($errors->get($field) as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>
@endif