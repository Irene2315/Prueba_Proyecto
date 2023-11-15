


    <h1>Nuevo Coche</h1>

    <form method="post" action="{{ route('anadirCoche') }}">
        @csrf 
        <label for="matricula">Matricula:</label>
        <input type="text" name="matricula" id="matricula" required>

        <label for="marca">Marca:</label>
        <input type="text" name="marca" id="marca" required>

        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" id="modelo" required>

        <input type="hidden" name="idEmpleado" value="{{ $idEmpleado }}" required>

    

        <button type="submit">Guardar</button>
    </form>

