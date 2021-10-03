<div>
  <x-card>
    <form  wire:submit.prevent="login">
      <x-h1>Login</x-h1>
      <x-form-group>
        <x-input block type="email" value="email" placeholder="Email"/>
      </x-form-group>
      <x-form-group>
        <x-input block type="password" value="password" placeholder="Password"/>
      </x-form-group>
      <x-form-group>
        <input type="checkbox" class="form-check-input" wire:model="remember" id="remember" />
        <label for="remember" class="form-check-label">Remember me</label>
      </x-form-group>

      <x-form-group>
        <x-button block type="submit" >Submit</x-button>
      </x-form-group>
    </form>

  </x-card>
  <div class="@if(!session()->has('message')) h-0 @endif transition-all overflow-hidden" x-data{ show: false }>
    <div class="bg-red-400 font-semibold p-4 my-2">
      {{ session('message') }}

    </div>
  </div>


  <x-form-group class="text-center">
    <x-link  href="/register">Go to register</x-link>

  </x-form-group>

</div>
