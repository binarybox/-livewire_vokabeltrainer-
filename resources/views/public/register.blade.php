  @if (session()->has('message'))
  <div class="alert alert-danger">
    {{ session('message') }}
  </div>
  @endif
  <x-card>
    <form  wire:submit.prevent="register">
      <x-h1>Register</x-h1>
      <x-form-group>
        <x-input type="email" value="email" placeholder="Email" required/>
      </x-form-group>
      <x-form-group>
        <x-input type="text" value="name" placeholder="Name" required/>
      </x-form-group>
      <x-form-group>
        <x-input type="password" value="password" placeholder="Password" required minlength="8"/>
      </x-form-group>
      <x-form-group>
        <x-input type="password" value="password_repeat" placeholder="Repeat the password" required/>
      </x-form-group>
      <x-form-group>
        <x-button type="submit" block >Register</x-button>
      </x-form-group>
    </form>

  </x-card>
  <x-form-group>
    <x-link href="/login">go to Login</x-link>
  </x-form-group>
