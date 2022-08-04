@if(isset($detail['product']))
    <div class="col-md-2 mt-3">
        <img src="/{{ $detail['product']['image_path'] }}"
                 alt="{{ $detail['product']['name'] }}" height="50" width="50" >
      </div>
      <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
        <p class="text-muted mb-0">{{ $detail['product']['name'] }}</p>
      </div>
      <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
        <p class="text-muted mb-0 small">{{ $detail['quantity'] }}</p>
      </div>
      <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
        <p class="text-muted mb-0 small">{{$detail['total'] }}</p>
      </div>
      <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
          <p class="text-muted mb-0 small">{{$detail['status'] }}</p>
    </div>
    <hr class="mt-3">
@endif