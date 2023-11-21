@extends('layouts.main')
@section('title', 'Blank')

@section('content')
<div class="page-heading">
  <div class="page-title mb-4">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Blank Page</h3>
        <p class="text-subtitle text-muted">Blank page subtitle</p>
      </div>
    </div>
  </div>
  <section class="section">

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Dummy Text</h4>
      </div>
      <div class="card-body">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mollis tincidunt tempus. Duis vitae facilisis enim, at rutrum lacus. Nam at nisl ut ex egestas placerat sodales id quam. Aenean sit amet nibh quis lacus pellentesque venenatis vitae at justo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse venenatis tincidunt odio ut rutrum. Maecenas ut urna venenatis, dapibus tortor sed, ultrices justo. Phasellus scelerisque, nibh quis gravida venenatis, nibh mi lacinia est, et porta purus nisi eget nibh. Fusce pretium vestibulum sagittis. Donec sodales velit cursus convallis sollicitudin. Nunc vel scelerisque elit, eget facilisis tellus. Donec id molestie ipsum. Nunc tincidunt tellus sed felis vulputate euismod.
        </p>
      </div>
    </div>

  </section>
</div>
@endsection


@push('prepend-style')
@endpush
@push('addon-style')
@endpush

@push('prepend-script')
@endpush
@push('addon-script')
@endpush