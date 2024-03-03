@extends('Master')
@section('contenu')
    <div style="display: flex; justify-content:center; align-item:center; flex-direction:column; "
        class="container d-flex justify-content-center align-item-center flex-column m-5 bg-primary text-light w-70 rounded-3 p-5">
        <h1>Detail de la chambre numero : {{ $chambre->id }} </h1>
        <div class="row">
            <div class="col-6">

                <strong>Type : </strong> <span>{{ $type->titre }}</span><br>
                <strong>Superficier : </strong> <span>{{ $chambre->superficier }}</span><br>
                <strong>Description : </strong> <span>{{ $chambre->description }}</span><br>
            </div>
            <div class="col-6">

                <strong>Etage : </strong> <span>{{ $chambre->etage }}</span><br>
                <strong>Prix : </strong> <span>{{ $chambre->prix }}</span><br>
            </div>

        </div>
        <div>

            <h3 style="text-decoration: underline; color:blue;" class="text-decoration-underline m-5">Reservation en cours et Reservation Prochaine :</h3>

            <table   style="border:solide 2px; " class="table table-stripped table-hover table-responsive table-bordered">
                <thead>
                    <th>Nom de l'utilisateur</th>
                    <th>Date d'arrivée </th>
                    <th>Date de depart</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user['nom'] }}</td>
                            @foreach ($reservations as $reservation)
                                @if ($user['id'] == $reservation['user_id'])
                                    <td>{{ $reservation['date_arrivee'] }}</td>
                                    <td>{{ $reservation['date_depart'] }}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>

            </table>
            {{-- <a href="/pdf/{{$chambre->id}}" class="btn btn-warning">Exporter ( PDF )</a> --}}
        </div>
    </div>
@endsection
