<div>
    {{-- The whole world belongs to you --}}
    <div id="vokabel">
      {{$vokabel->word}}
    </div>
    <form wire:submit.prevent="submit">
      <div class="form-group">
        <input  wire:model.defer="answer" class="form-control" />
      </div>
      @if($answersArray !== "")
      <div class="alert alert-warning">
          {{$answersArray}}
      </div>
      @endif
      <div class="form-group row">
        <div class="col-md-6 col-12">
          <button type="submit" class="btn btn-primary btn-raised btn-block">check</button>
        </div>
        <div class="col-md-6 col-12">
          @if($try)
          <button type="button" wire:click="help" class="btn btn-info btn-raised btn-block">help</button>
          @endif
        </div>
      </div>
    </form>
    <div>
    </div>
</div>
