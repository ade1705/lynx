<div class="form-row">
    <div class="form-group col-md-12">
        <label for="title small text-muted">Title</label>
        <input value="{{ $service->service_title ?? "" }}" name="service_title" type="text" class="p-0 h-auto form-control border-left-0 border-right-0 border-top-0 border-bottom" id="title">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="price small text-muted">Price</label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text pr-2 bg-transparent border-left-0 border-right-0 border-top-0 border-bottom">$</div>
            </div>
            <input value="{{ $service->service_price ?? "" }}"  type="text" name="service_price" class="form-control h-auto form-control border-left-0 border-right-0 border-top-0 border-bottom" id="price">
        </div>
    </div>
{{--    <div class="form-group col-md-6">--}}
{{--        <label for="unit small text-muted">Unit</label>--}}
{{--        <select value="{{ $service->service_unit ?? "" }}"  name="service_unit" class="form-control p-0 border-left-0 border-right-0 border-top-0 border-bottom" id="unit">--}}
{{--            <option selected value="">Choose...</option>--}}
{{--            <option value="1">Unit</option>--}}
{{--        </select>--}}
{{--    </div>--}}
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="category small text-muted" >Category</label>
        <select value=""  name="service_category_id" class="form-control p-0 border-left-0 border-right-0 border-top-0 border-bottom" id="unit">
            <option value="">Choose...</option>
            <option value="1" {{ old('service_category_id', $service->service_category_id ?? 0) == 1 ? 'selected' : '' }}>Business Cards</option>
            <option value="2" {{ old('service_category_id', $service->service_category_id ?? 0) == 2 ? 'selected' : '' }}>Logos</option>
            <option value="3" {{ old('service_category_id', $service->service_category_id ?? 0) == 3 ? 'selected' : '' }}>Video Editing</option>
            <option value="4" {{ old('service_category_id', $service->service_category_id ?? 0) == 4 ? 'selected' : '' }}>Accounting & Tax Services</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="inputAddress">Description</label>
    <service-description description="{{ $service->service_description ?? '' }}"></service-description>
</div>
<div>
    <service-images :user_id="'{{ \Illuminate\Support\Facades\Auth::id() }}'" :uploaded_images="'{{ implode(',', $images ?? []) ?? '' }}'"></service-images>
</div>
