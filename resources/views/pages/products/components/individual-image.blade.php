<div class="col-2" style="margin: 20px; border: 1px solid rgba(0,0,0,0.1); padding: 5px; max-height: 400px">
    <div style="text-align: center; height: 200px;">
        <img src="{{ \Illuminate\Support\Facades\Storage::url($image->thumbnail) }}" width="100%" style="margin-bottom: 15px">
    </div>
    <div>
        <div class="form-group row" style="margin-bottom: 0px">
            <div class="col-12 col-form-label">
                <div class="radio-inline">
                    <label class="radio">
                        <input type="radio" name="main" value="{{ $image->id }}" @if($image->main == true) checked="checked" @endif>
                        <span></span>Main Image</label>
                </div>
                <span class="form-text text-muted" style="font-size: 10px">If set as main, this image will be your products main image</span>
            </div>
        </div>
        <div class="form-group row" style="margin-bottom: 0px">
            <div class="col-10 col-form-label">
                <div class="checkbox-inline">
                    <label class="checkbox">
                        <input type="checkbox" name="delete[{{ $image->id }}]">
                        <span></span>Delete</label>
                </div>
                <span class="form-text" style="font-size: 10px; color:red">If checked, this image will be deleted</span>
            </div>
        </div>
    </div>

</div>
