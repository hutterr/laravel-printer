<div class="form-group row">
        <label for="gepszam" class="col-sm-2 col-form-label ">Gépszám</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="gepszam" name="gepszam" value="{{old('gepszam') ?? $printer->gepszam}}" @isset($printer->gepszam) readonly @endisset>
            <small>{{$errors->first('gepszam')}}</small>
        </div>
        </div>
          <div class="form-group row">
        <label for="gyszam" class="col-sm-2 col-form-label ">Gyári szám</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="gyszam" name="gyszam" value="{{old('gyszam')  ?? $printer->gyszam }}" @isset($printer->gyszam) readonly @endisset>
            <small>{{$errors->first('gyszam')}}</small>
        </div>
        </div>
        <div class="form-group row">
            <label for="marka" class="col-sm-2 col-form-label ">Márka</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="marka" name="marka" value="{{old('marka')  ?? $printer->marka}}">
                <small>{{$errors->first('marka')}}</small>
            </div>
        </div>
        <div class="form-group row">
                <label for="geptipus" class="col-sm-2 col-form-label ">Géptípus</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="geptipus" name="geptipus" value="{{old('geptipus')  ?? $printer->geptipus}}">
                    <small>{{$errors->first('geptipus')}}</small>
                </div>
        </div>
        <div class="form-group row">
                <label for="ceg" class="col-sm-2 col-form-label ">Cég</label>
                <div class="col-sm-10">
                        <select class="form-control" id="ceg" name="ceg_id">
                            @if($cegek->count() == 0){
                                <option disabled>Még nincsenek cégek...</option>
                            }
                            @else
                            <option selected disabled>Válasszont céget</option>
                                @foreach ($cegek as $ceg)
                                <option value="{{$ceg->id}}" {{ $ceg->id == $printer->ceg_id ? 'selected' : ''}}>{{$ceg->cegnev}}</option>
                                @endforeach
                            @endif
                        </select>
                </div>
        </div>
        <div class="form-group row">
                <label for="hely" class="col-sm-2 col-form-label ">Jelengi hely</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="hely" name="hely" value="{{old('hely') ?? $printer->hely}}">
                    <small>{{$errors->first('hely')}}</small>
                </div>
        </div>
        <div class="form-group row">
                <label for="elozohely" class="col-sm-2 col-form-label ">Előző helye</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="elozohely" name="elozohely" value="{{old('elozohely') ?? $printer->elozohely}}">
                    <small>{{$errors->first('elozohely')}}</small>
                </div>
        </div>
        <div class="form-group row">
                <label for="telefon" class="col-sm-2 col-form-label ">Telefon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="telefon" name="telefon" value="{{old('telefon') ?? $printer->telefon}}">
                    <small>{{$errors->first('telefon')}}</small>
                </div>
        </div>
        <div class="form-group row ">
                <div class="col-sm-2">Opciók</div>
                <div class="col-sm-5">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="df" name="df" value="1" {{  $printer->df == 1 ? 'checked' : ''}}>
                    <label class="form-check-label" for="df">
                        DF
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="duplex" name="duplex" value="1" {{  $printer->duplex == 1 ? 'checked' : ''}}>
                    <label class="form-check-label" for="duplex">
                        Duplex
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="gépasztal" name="gepasztal" {{  $printer->gépasztal == 1 ? 'checked' : ''}}>
                    <label class="form-check-label" for="gépasztal">
                        Gépasztal
                    </label>
                </div>
                <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="egytalca" name="egytalca" {{  $printer->egytalca == 1 ? 'checked' : ''}}>
                        <label class="form-check-label" for="egytalca">
                            Egy tálca
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="kettalca" name="kettalca" {{  $printer->kettalca == 1 ? 'checked' : ''}}>
                        <label class="form-check-label" for="kettalca">
                            Két tálca
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="lct" name="lct" {{  $printer->lct == 1 ? 'checked' : ''}}>
                        <label class="form-check-label" for="lct">
                            LCT
                        </label>
                    </div>
                </div>
                <div class="col-sm-5">
                        <div class="form-check">
                            <input class="form-check-input " type="checkbox" value="1" id="szorter" name="szorter" {{  $printer->szorter == 1 ? 'checked' : ''}}>
                            <label class="form-check-label " for="szorter">
                                Szorter
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="nyomtato" name="nyomtato" {{  $printer->nyomtato == 1 ? 'checked' : ''}}>
                            <label class="form-check-label" for="nyomtato">
                                Nyomtató
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="halo" name="halo" {{  $printer->halo == 1 ? 'checked' : ''}}>
                            <label class="form-check-label" for="halo">
                                Hálozat
                            </label>
                        </div>
                        <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="scan" name="scan" {{  $printer->scan == 1 ? 'checked' : ''}}>
                                <label class="form-check-label" for="scan">
                                    Scan
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="fax" name="fax" {{  $printer->fax == 1 ? 'checked' : ''}}>
                                <label class="form-check-label" for="fax">
                                   Fax
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="hdd" name="hdd" {{  $printer->hdd == 1 ? 'checked' : ''}}>
                                <label class="form-check-label" for="hdd">
                                    HDD
                                </label>
                            </div>
                        </div>
            </div>
            <div class="form-group row">
                    <label for="beszer_ar" class="col-sm-2 col-form-label ">Beszerzési ár</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="beszer_ar" name="beszer_ar" value="{{old('beszer_ar') ?? $printer->beszer_ar}}">
                        <small>{{$errors->first('beszer_ar')}}</small>
                    </div>
            </div>
            <div class="row justify-content-center my-3">
                    <button type="submit" class="btn btn-primary col-lg-2">{{$felirat}}</button>                    
            </div>     