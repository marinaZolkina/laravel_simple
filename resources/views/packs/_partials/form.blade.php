@include('includes.alerts')

@csrf

<div class="form-group">
    <input value="{{ $pack->quantity ?? old('quantity')  }}" class="form-control" type="text" name="quantity" placeholder="Quantity">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Submit</button>
</div>