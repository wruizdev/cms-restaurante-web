<div class="table-responsive shadow-sm rounded">
    <table class="table table-striped table-hover align-middle mb-0 table-custom">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Mesa</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Comensales</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Control Personal</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservas as $reserva)
            <tr>
                <td>{{ $reserva->id }}</td>
                <td>{{ $reserva->mesa_id }}</td>
                <td>{{ $reserva->nombre }}</td>
                <td>{{ $reserva->telefono }}</td>
                <td>{{ $reserva->email }}</td>
                <td>{{ $reserva->comensales }}</td>
                <td>{{ $reserva->fecha }}</td>
                <td>{{ \Carbon\Carbon::parse($reserva->hora)->format('H:i') }}</td>
                <td>
                    @if($reserva->visto)
                    <form action="{{ route('reservas.visto', $reserva->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-sm btn-outline-warning">No Visto</button>
                    </form>
                    @else
                    <span class="text-success fw-semibold">Visto</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-sm btn-outline-warning me-1">Editar</a>

                    <form action="{{ route('reservas.destroy', $reserva) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('¿Seguro que quieres eliminar esta reserva?')" class="btn btn-sm btn-outline-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
