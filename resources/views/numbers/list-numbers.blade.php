<div>
  <div class="py-4 flex justify-center">
  <x-card>
        <x-form-group>
          <x-input type="number" max="{{$total_max}}" min="0" value="min"/>
        </x-form-group>
        <x-form-group>
          <x-input type="number" max="{{$total_max}}" min="0" value="max"/>
        </x-form-group>
  </x-card>
</div>
<div class="flex justify-center">
  <table class="table-auto w-72">
      <thead>
          <tr class="border-b-2 border-gray-500">
              <th class="py-4">#</th>
              <th class="py-4">Counter</th>
          </tr>
      </thead>
      <tbody>
        @for($i = $min; $i <= $max; $i++ )
        <tr class="border-b-2 border-gray-200">
            <td class="py-1 my-1">{{$i}}</td>
            <td class="py-1 my-1">{{$this->getNumberValue($i)}}</td>
        </tr>
        @endfor

      </tbody>
  </table>
</div>
</div>
