@props(['modalid','modaltitle'])

<div class="modal fade" id={{$modalid}} data-focus="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">            
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{{$modaltitle}}}</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div style="display: none;" id = '{{$modalid}}alert' class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <div id = '{{$modalid}}txt'></div>
                    </div>
        
                    
                    
                    <div class="modal-body">
                   
                    {{ $slot }}
                    <div class="modal-footer">
                        <button type="submit" id ="{{$modalid}}Btn" data-id='' class="btn btn-primary">@lang('translate.save')</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('translate.cancel')</button>
                       
                    </div>
        
            </div>
        </div>
    </div>
</div>