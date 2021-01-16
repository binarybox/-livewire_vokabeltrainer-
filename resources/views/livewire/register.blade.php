<div>
  @if (session()->has('message'))
  <div class="alert alert-danger">
    {{ session('message') }}
  </div>
  @endif
  <form  wire:submit.prevent="register">
    <div class="form-group">
      <input type="email" class="form-control" wire:model="email" placeholder="Email" required/>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" wire:model="name" placeholder="Name" required/>
    </div>
    <div class="form-group">
      <input type="password" class="form-control" wire:model="password" placeholder="Password" required minlength="8"/>
    </div>
    <div class="form-group">
      <input type="password" class="form-control" wire:model="password_repeat" placeholder="Repeat the password" required/>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-raised btn-primary btn-block">Register</button>
    </div>
    </form>
    <a class="btn btn-link btn-primary"  href="/login">go to Login</a>
  </div>
