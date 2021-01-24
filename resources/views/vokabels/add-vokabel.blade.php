@extends('layout')

@section('content')
<div class="card">
  <div class="card-header">
      <h2>Add Vokabel</h2>
  </div>
  <div class="card-body">
    <livewire:add-vokabel />
  </div>
</div>
<div class="card">

      <livewire:list-vokabels />
</div>
@endsection
