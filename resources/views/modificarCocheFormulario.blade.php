<x-app-layout>
    <h1>Modificar Coche</h1>

    <form method="post" action="{{ route('actualizarCoche', $cocheModificar->matricula) }}">
        @csrf
        @method('PUT') {{-- Use PUT method for updating data --}}

        <label for="matricula">Matricula:</label>
            <input type="text" name="matricula" id="matricula" value="{{ $cocheModificar->matricula }}" readonly>

        <label for="marca">Marca:</label>
        <input type="text" name="marca" id="marca" value="{{ $cocheModificar->marca }}" required>

        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" id="modelo" value="{{ $cocheModificar->modelo }}" required>

        <input type="hidden" name="idEmpleado" value="{{ $cocheModificar->idEmpleado }}" required>

        <button type="submit">Guardar</button>
    </form>
</x-app-layout>

