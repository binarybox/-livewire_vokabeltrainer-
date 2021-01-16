<div>
  @if (session()->has('message'))
  <div class="alert alert-danger">
    {{ session('message') }}
  </div>
  @endif
  <form  wire:submit.prevent="login">
    <div class="form-group">
      <input type="email" class="form-control" wire:model="email" placeholder="email"/>
    </div>
    <div class="form-group">
      <input type="password" class="form-control" wire:model="password" placeholder="password"/>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-raised btn-block">Submit</button>
    </div>
  </form>
  <a class="btn btn-link btn-primary" href="/register">go to Register</a>
</div>
