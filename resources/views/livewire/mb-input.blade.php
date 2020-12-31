<div class="input-group">
  <div>
    <label :for="ID" wire:dirty.class="text-red-500" wire:target="focus" class="bmd-label-floating">{{$label}}</label>
    <input :id="ID" class="form-control" wire:focus="focus"  wire:model="value" :type="text" />
  </div>
</div>
