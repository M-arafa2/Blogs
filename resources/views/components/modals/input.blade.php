@props([
    'inputlabel',
    'inputtype'=>'text',
    'inputid'=>'name',
    'inputname'=>'name',
    'customattrs'=>'',
    'required' =>true

    ])
<div class="form-group">
    <label for={{$inputname}}> @lang('translate.'.$inputlabel)</label>
    <input value="{{ old($inputname) }}" 
     {{$customattrs}} 
     type={{$inputtype}} class="form-control" id={{$inputid}} name={{$inputname}}
     {{ $required ==true ? 'required' : ''}}
     >
</div>