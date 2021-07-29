      <div class="container-center">
      <div class="card">
        <div class="card-body">
          <div>
              <div id="vokabel">
                {{$vokabel->word}}
              </div>
              <form wire:submit.prevent="submit">
                <div class="form-group">
                  <input wire:model.defer="answer" class="form-control" />
                </div>
                  <div class="alert alert-warning toggler {{ $answersArray === '' ? 'hidden ' : ''}}">
                    {{$answersArray}}
                  </div>
                <div class="form-group row">
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-raised btn-block">check</button>
                  </div>
                </div>
                  <div class="form-group row">
                    <div class="col-12 toggler {{ !$try_vokabel ? 'hidden ' : '' }}">
                      <button type="button" wire:click="help" class="btn btn-info btn-raised btn-block">help</button>
                    </div>
                  </div>
              </form>
              <div>
              </div>
          </div>
        </div>
      </div>
    </div>
