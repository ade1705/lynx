<div class="form-row">
    <div class="form-group col-md-12">
        <label for="title small text-muted">Job Name</label>
        <input name="order_job_name" type="text" class="p-0 h-auto form-control border-left-0 border-right-0 border-top-0 border-bottom" id="title">
    </div>
</div><div class="form-row mb-3">
    <label for="price">Order Price</label>
    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text pr-2 bg-transparent border-left-0 border-right-0 border-top-0 border-bottom">$</div>
        </div>
        <input type="text" name="order_price" class="form-control h-auto form-control border-left-0 border-right-0 border-top-0 border-bottom" id="price">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="category small text-muted" >Customer</label>
        <select name="order_customer_id" class="form-control p-0 border-left-0 border-right-0 border-top-0 border-bottom">
            <option selected value="">Choose...</option>
            @foreach($customers as $customerId => $customerName)
                <option value="{{ $customerId }}">{{ $customerName }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="category" >Service</label>
        <select name="order_service_id" class="form-control p-0 border-left-0 border-right-0 border-top-0 border-bottom">
            <option selected value="">Choose...</option>
            @foreach($services as $serviceId => $serviceName)
                <option value="{{ $serviceId }}">{{ $serviceName }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="inputAddress">Description</label>
    <textarea name="order_details" rows="10" class="form-control"></textarea>
</div>
