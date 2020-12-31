<div>
  <form class="card-body" wire:submit.prevent="login">
    <div class="form-group">
      <input type="email" wire:model="email" placeholder="email"/>
    </div>
    <div class="form-group">
      <input type="password" wire:model="password" placeholder="password"/>
    </div>
    <div class="form-group">
      <button type="submit">Submit</button>
    </div>
    </form>
    @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
</div>
