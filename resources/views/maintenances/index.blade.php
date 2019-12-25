@component('components.main')
    @slot('title')
        Tipos de mantenimientos
        <a href="{{ route('mantenimientos.create') }}" class="btn btn-secondary float-right">
            <i class="fas fa-plus"></i> Crear Mantenimiento
        </a>
    @endslot

    @include('maintenances.filter_form')

    <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Tipo</th>
                <th scope="col">Precio</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @forelse($maintenances as $maintenance)
                <tr id="target{{$maintenance->id}}">
                    <th>{{ $maintenance->name }}</th>
                    <td>{{ $maintenance->price }}</td>
                    <td>
                        <a href="{{ route('mantenimientos.edit', [$maintenance]) }}" class="btn btn-outline-dark"><i class="fas fa-edit"></i> Editar</a>
                        <a href="{{ route('mantenimientos.destroy', [$maintenance]) }}" class="btn btn-outline-danger" @click="getElementData" data-id={{$maintenance->id}} data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i> Eliminar</a>
                    </td>
                </tr>
            @empty
                <h3>No existen tipos de mantenimientos almacenados en el sistema.</h3>
            @endforelse
            </tbody>
        </table>
    </div>

    <section class="d-flex justify-content-center">
        {{ $maintenances->appends(request()->only('maintenance_name'))->links() }}
    </section>
@endcomponent


