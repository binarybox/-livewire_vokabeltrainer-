<div class="w-screen h-screen pt-16 lg:justify-center flex items-center flex-col">
  <div class="shadow px-4 py-2">
    <div x-data="{show_answer: false, open_add: @entangle('try'), show_settings: false}" @correct.window="show_answer = false">
        <x-h1>
          {{$number}}
        </x-h1>
        <form wire:submit.prevent="submit">
          <x-form-group>
            <x-input  value="value" />
          </x-form-group>
          <div class="{{ $answer === '' ? 'h-0 ' : ''}}">
            <x-toggle-height variable="show_answer" name="answer">
              <div class="bg-green-200 rounded p-2 mx-2">
                {{$answer}}
              </div>
            </x-toggle-height>
          </div>
            <x-form-group>
              <x-button type="submit" block>check</x-button>
            </x-form-group>
            <x-form-group>
              <x-toggle-height variable="open_add" name="button">
                <x-button type="button" variant="secondary" block click="show_answer = true">help</x-button>
              </x-toggle-height>
            </x-form-group>
        </form>
        {{-- <x-button type="button" variant="gray" round click="show_settings = !show_settings"><i class="material-icons">settings</i></x-button>
        <x-toggle-height variable="show_settings" name="settings">
          <div class="col-6">
            <x-input min="0" value="start" type="number" />
          </div>
          <div class="col-6">
            <x-input max="100" value="end" type="number" />
          </div>
        </x-toggle-height> --}}
    </div>
  </div>
</div>
