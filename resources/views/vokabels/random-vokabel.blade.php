<div class="w-screen h-screen pt-16 lg:justify-center flex items-center flex-col">
  <div class="shadow px-4 py-2">
    <div x-data="{ show_answer: false, open_add: @entangle('try_vokabel').defer}"
    @correct.window="show_answer = false">
      <x-h1>
        {{$vokabel->word}}
      </x-h1>
      <form wire:submit.prevent="submit">
        <x-form-group>
          <x-input value="answer"  />
        </x-form-group>
        <div >
          <x-toggle-height variable="show_answer" name="answer">
            <div class="bg-green-200 rounded p-2 my-2">
                  {{$answersArray}}
            </div>
          </x-toggle-height>
        </div>
          <x-form-group>
            <x-button block type="submit">Check</x-button>
          </x-form-group>
          <div>
            <x-form-group>
              <div x-ref="button" x-bind:style="open_add ? 'height: ' + $refs.button.scrollHeight + 'px' : 'height: 0px'" class="overflow-hidden transition-all">
                <x-button block type="button" variant="secondary" click="show_answer = true">Help</x-button>
              </div>
            </x-form-group>
          </div>
      </form>
    </div>
  </div>
</div>
