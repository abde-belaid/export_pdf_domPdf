@extends('Master')
@section('contenu')
    {{-- @dd($types) --}}
    <div class="container d-flex justify-content-center align-item-center p-5 m-5 flex-column">

        <form action="{{ route('save') }}" class="w-50" method="POST">
            @csrf
            <fieldset class="p-5 border-1 border-primary rounded-5">
                <div class="form-group mb-3">
                    <label class="form-label">Type : </label>
                    <select name="type_id" id="" class="form-select">
                        <option value="">.... Choisi Le Type .......</option>
                        @foreach ($types as $item)
                            <option value="{{ $item['id'] }}">{{ $item['titre'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Description : </label><br>
                    <textarea name="description" id="" name="description" cols="30" rows="5"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Superficier : </label>
                    <input type="number" name="superficier" class="form-control" name="" placeholder="en m2">
                </div>
                <div class="form-check">
                    <label class="form-label">Etage : </label><br>
                    <input type="checkbox" class="form" value="rdc" name="etage"> <strong>RDC</strong>
                    <input type="checkbox" class="form" value="1" name="etage"> <strong>1</strong>
                    <input type="checkbox" class="form" value="2" name="etage"> <strong>2</strong>
                    <input type="checkbox" class="form" value="3" name="etage"> <strong>3</strong>
                </div>

                <div class="form-group">
                    <label class="form-label">Prix : </label>
                    <input type="number" name="prix" class="form-control" name="" placeholder="en dhs">
                </div>
                <button class="btn btn-primary">Ajouter</button>
            </fieldset>
        </form>

    </div>
@endsection
