<div>
  <div id="vokabel">
    {{$number}}
  </div>
  <form wire:submit.prevent="submit">
    <div class="form-group">
      <input  wire:model.defer="value" class="form-control" />
    </div>
    <div class="alert alert-warning toggler {{ $answer === '' ? 'hidden ' : ''}}">
      {{$answer}}
    </div>
    <div class="form-group row">
      <div class="col-12">
        <button type="submit" class="btn btn-primary btn-raised btn-block">check</button>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-12 toggler {{ !$try ? 'hidden ' : '' }}">
        <button type="button" wire:click="help" class="btn btn-info btn-raised btn-block">help</button>
      </div>
    </div>
  </form>
  <button type="button" class="btn btn-primary" wire:click="toggleSettings"><i class="material-icons">settings</i></button>
  <div class="row toggler {{ !$settings ? 'hidden' : ''}}">
    <div class="col-6">
      <input id="number-start" class="form-control" min="0" wire:model="start" type="number" />
    </div>
    <div class="col-6">
      <input id="number-end" class="form-control" max="100" wire:model="end" type="number" />
    </div>
  </div>
</div>
