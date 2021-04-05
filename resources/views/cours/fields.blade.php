<div class="form-group row {{ $errors->has('reference') ? 'has-error' : '' }}">
    <label class="col-sm-2 col-form-label" for="reference">Intitulé</label>
    <div class="col-sm-10">
        <input name="intitule" type="text" class="form-control" placeholder="Intitulé" value="{{ old('intitule', $cours->intitule ?? '') }}"/>
        <small class="text-danger">{{ $errors->has('intitule') ? $errors->first('intitule') : '' }}</small>
    </div>
</div>

<div class="form-group row {{ $errors->has('auteur_id') ? 'has-error' : '' }}">
    <label class="col-sm-2 col-form-label"for="auteur_id">Auteur</label>
    <div class="col-sm-10">
        <div class="custom_select">
            <select name="auteur_id" class="auteur_id form-control" id="auteur_id" required>
                @foreach($auteurs as $id => $display)
                    <option value="{{ $id }}" {{ (isset($cours->auteur_id) && $id === $cours->auteur_id) ? 'selected' : '' }}>{{ $display }}</option>
                @endforeach
            </select>
        </div>
        <small class="text-danger">{{ $errors->has('auteur_id') ? $errors->first('auteur_id') : '' }}</small>
    </div>
</div>

<div class="form-group row {{ $errors->has('classe_id') ? 'has-error' : '' }}">
    <label class="col-sm-2 col-form-label"for="classe_id">Classe</label>
    <div class="col-sm-10">
        <div class="custom_select">
            <select name="classe_id" class="classe_id form-control" id="classe_id" required>
                @foreach($classes as $id => $display)
                    <option value="{{ $id }}" {{ (isset($cours->classe_id) && $id === $cours->classe_id) ? 'selected' : '' }}>{{ $display }}</option>
                @endforeach
            </select>
        </div>
        <small class="text-danger">{{ $errors->has('classe_id') ? $errors->first('classe_id') : '' }}</small>
    </div>
</div>

<div class="form-group row {{ $errors->has('description') ? 'has-error' : '' }}">
    <label class="col-sm-2 col-form-label" for="reference">Description</label>
    <div class="col-sm-10">
        <textarea name="description" type="text" class="form-control" placeholder="Description" value="{{ old('description', $cours->description ?? '') }}"></textarea>
        <small class="text-danger">{{ $errors->has('description') ? $errors->first('description') : '' }}</small>
    </div>
</div>

@csrf
