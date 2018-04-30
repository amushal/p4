<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobile_phone">Mobile
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('mobile_phone', null, ['id' => 'mobile_phone', 'class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="home_phone">Home Phone
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('home_phone', null, ['id' => 'home_phone', 'class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('address', null, ['id' => 'address', 'class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city">City
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('city', null, ['id' => 'city', 'class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="state">State
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('state', null, ['id' => 'state', 'class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="zip">Zip Code
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('zip', null, ['id' => 'zip', 'class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="group_id">Group
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">

        <select name='group_id' id='group_id'>
            <option value=''>Choose one...</option>
            @foreach($groupsForDropdown as $id => $groupName)
                <option value='{{ $id }}' {{ ($contact->group_id == $id) ? 'selected' : '' }}>{{ $groupName }}</option>
            @endforeach
        </select>
    </div>

</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('description', null, ['id' => 'description', 'class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tag
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">

        @foreach($tagsForCheckboxes as $tagId => $tagName)
            <ul class='tags'>
                <li>
                    <label>
                        <input
                                {{ (in_array($tagId, $tags)) ? 'checked' : '' }}
                                type='checkbox'
                                name='tags[]'
                                value='{{ $tagId }}'>
                        {{ $tagName }}
                    </label>
                </li>
            </ul>
        @endforeach
    </div>
</div>

<div class="ln_solid"></div>
<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <a href="{{ route('contacts.index') }}" class="btn btn-primary">Cancel</a>
        {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
    </div>
</div>