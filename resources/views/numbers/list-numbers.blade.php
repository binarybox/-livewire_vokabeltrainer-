<div class="card-body">
  <div class="row">
    <div class="col">
        <div class="form-group">
          <input class="form-control" type="number" max="{{$total_max}}" min="0" wire:model.lazy="min"/>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
          <input class="form-control" type="number" max="{{$total_max}}" min="0" wire:model.lazy="max"/>
        </div>
    </div>
  </div>
  <table class="table">
      <thead>
          <tr>
              <th>#</th>
              <th>Counter</th>
          </tr>
      </thead>
      <tbody>
        @for($i = $min; $i <= $max; $i++ )
        <tr style="background-color: rgba(76, 175, 80, {{$this->getNumberValue($i) > 0 ? floatval($this->getNumberValue($i)) / 100 : 0}})">
            <td >{{$i}}</td>
            <td>{{$this->getNumberValue($i)}}</td>
        </tr>
        @endfor

      </tbody>
  </table>
</div>
