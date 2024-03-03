@extends('Master')
@section('contenu')
    {{-- @dd($types) --}}
    <div class="container d-flex justify-content-center justify-item-center p-5 m-5 flex-column">
        <a href="{{ route('create') }}" class="btn btn-success w-25 m-2">Ajouter Chambre</a>
        <table class="table table-striped table-hover table-responsive table-bordered">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Type
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Superficier
                    </th>
                    <th>
                        Etage
                    </th>
                    <th>
                        Prix
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($chambres as $key => $item)
                    <tr>
                        <td>
                            {{ $item['id'] }}
                        </td>
                        <td>
                            @foreach ($types as $type)
                                @if ($type['id'] == $item['type_id'])
                                    {{ $type['titre'] }}
                                @endif
                            @endforeach

                        </td>
                        <td>
                            {{ $item['description'] }}
                        </td>
                        <td>
                            {{ $item['superficier'] }}
                        </td>
                        <td>
                            {{ $item['etage'] }}
                        </td>
                        <td>
                            {{ $item['prix'] }}
                        </td>
                        <td>
                            <a href="/afficher/{{ $item['id'] }}" class="btn btn-info">Afficher</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
