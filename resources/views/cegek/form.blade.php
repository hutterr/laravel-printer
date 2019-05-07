<div class="form-group row">
        <label for="cegnev" class="col-sm-2 col-form-label text-right">Cégnév</label>
        <div class="col-sm-10">
          <input type="text" class="form-control{{($errors->first('cegnev') ? " fail" : "")}}" id="cegnev" name="cegnev" value="{{old('cegnev') ?? $ceg->cegnev}}">
          <small>{{$errors->first('cegnev')}}</small>
        </div>
      </div>
      <div class="form-group row">
              <label for="adoszam" class="col-sm-2 col-form-label text-right">Adószám</label>
              <div class="col-sm-10">
                <input type="text" class="form-control{{($errors->first('adoszam') ? " fail" : "")}}" id="adoszam" name="adoszam" value="{{ old('adoszam') ?? $ceg->adoszam}}">
                <small>{{$errors->first('adoszam')}}</small>
              </div>
      </div>
      <div class="form-group row">
              <label for="cim" class="col-sm-2 col-form-label text-right">Cím</label>
              <div class="col-sm-10">
                <input type="text" class="form-control {{($errors->first('cim') ? " fail" : "")}}" id="cim" name="cim" value="{{ old('cim') ?? $ceg->cim}}">
                <small>{{$errors->first('cim')}}</small>
              </div>
      </div>
      <div class="form-group row">
              <label for="telefon" class="col-sm-2 col-form-label text-right">Telefonszám:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control{{($errors->first('telefon') ? " fail" : "")}}" id="telefon" name="telefon" value="{{ old('telefon') ?? $ceg->telefon}}">
                <small>{{$errors->first('telefon')}}</small>
              </div>
      </div>
      <div class="form-group row">
              <label for="kapcsolattarto" class="col-sm-2 col-form-label text-right">Kapcsolattartó neve</label>
              <div class="col-sm-10">
                <input type="text" class="form-control{{($errors->first('kapcsolattarto') ? " fail" : "")}}" id="kapcsolattarto" name="kapcsolattarto" value="{{ old('kapcsolattarto') ?? $ceg->kapcsolattarto}}">
                <small>{{$errors->first('kapcsolattarto')}}</small>
              </div>
      </div>
      <div class="form-group row">
              <label for="kapcstel" class="col-sm-2 col-form-label text-right">Cégnév</label>
              <div class="col-sm-10">
                <input type="text" class="form-control{{($errors->first('kapcstel') ? " fail" : "")}}" id="kapcstel" name="kapcstel" value="{{old('kapcstel') ?? $ceg->kapcstel}}">
                <small>{{$errors->first('kapcstel')}}</small>
              </div>
      </div>
      <div class="row">
          <button type="submit" class="btn btn-primary mx-auto">Módosítás</button>                    
      </div>