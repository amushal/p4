<div class='details'>* Required fields</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name *
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12{{ $errors->has('name') ? ' has-error' : '' }}">
        {!! Form::text('name', null, ['id' => 'name', 'placeholder' => 'Contact name', 'class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">
        @include('modules.error-field', ['field' => 'name'])
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email *
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12{{ $errors->has('email') ? ' has-error' : '' }}">
        {!! Form::text('email', null, ['id' => 'email', 'placeholder' => 'Contact email', 'class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">
        @include('modules.error-field', ['field' => 'email'])
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobile_phone">Mobile *
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12{{ $errors->has('mobile_phone') ? ' has-error' : '' }}">
        {!! Form::text('mobile_phone', null, ['id' => 'mobile_phone', 'placeholder' => '(555) 555-5555', 'class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">
        @include('modules.error-field', ['field' => 'mobile_phone'])
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="home_phone">Home Phone
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12{{ $errors->has('home_phone') ? ' has-error' : '' }}">
        {!! Form::text('home_phone', null, ['id' => 'home_phone', 'placeholder' => '(555) 555-5555', 'class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">
        @include('modules.error-field', ['field' => 'home_phone'])
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12{{ $errors->has('address') ? ' has-error' : '' }}">
        {!! Form::text('address', null, ['id' => 'address', 'placeholder' => '123 Acme St.', 'class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">
        @include('modules.error-field', ['field' => 'address'])
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city">City
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12{{ $errors->has('city') ? ' has-error' : '' }}">
        {!! Form::text('city', null, ['id' => 'city', 'placeholder' => 'City', 'class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">
        @include('modules.error-field', ['field' => 'city'])
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="state">State
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12{{ $errors->has('state') ? ' has-error' : '' }}">
        {!! Form::text('state', null, ['id' => 'state', 'placeholder' => 'State', 'class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">
        @include('modules.error-field', ['field' => 'state'])
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="zip">Zip Code
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12{{ $errors->has('zip') ? ' has-error' : '' }}">
        {!! Form::text('zip', null, ['id' => 'zip', 'placeholder' => '12345', 'class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">
        @include('modules.error-field', ['field' => 'zip'])
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="group_id">Group *
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12{{ $errors->has('group_id') ? ' has-error' : '' }}">
        <select name='group_id' id='group_id'>
            <option value=''>Choose one...</option>
            @foreach($groupsForDropdown as $id => $groupName)
                <option value='{{ $id }}' {{ ($contact->group_id == $id) ? 'selected' : '' }}>{{ $groupName }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">
        @include('modules.error-field', ['field' => 'group_id'])
    </div>
</div>
<div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
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