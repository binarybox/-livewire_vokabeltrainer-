
    <div>
      <form class="row" wire:submit.prevent="submit">
        <div class="form-group col-6">
          <input class="form-control" type="text" wire:model="vokabel" placeholder="vokabel"/>
          @error('vokabel') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group col-6">
          <input class="form-control" wire:model="answers" placeholder="answers"/>
          @error('answers') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="col-4">
          <button class="btn btn-primary btn-raised" type="submit">Submit</button>

        </div>
      </form>
      {{implode(": ", $res)}}
    </div>
