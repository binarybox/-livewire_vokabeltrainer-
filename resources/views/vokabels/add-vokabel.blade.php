
    <div>
      <form class="row" wire:submit.prevent="submit">
        <x-form-group>
          <x-input type="text" value="vokabel" placeholder="vokabel"/>
          @error('vokabel') <span class="error">{{ $message }}</span> @enderror
        </x-form-group>
        <x-form-group>
          <x-input  value="answers" placeholder="answers"/>
          @error('answers') <span class="error">{{ $message }}</span> @enderror
        </x-form-group>
        <div class="col-4">
          <x-button type="submit">Submit</x-button>

        </div>
      </form>
      {{implode(": ", $res)}}
    </div>
