@props([
    'inputlabel' => 'Image',
    'inputid'=>'image',
    'inputname'=>'image',
    'required' =>true,

    ])
<div class="form-group">
    <label for={{$inputname}}> @lang('translate.'.$inputlabel)</label>
    <input id="{{$inputid}}" type="file" name="{{$inputname}}" class="form-control" 
    {{ $required ===true ? 'required' : ''}}>
</div>
      