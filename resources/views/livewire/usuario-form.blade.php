<div>
    <form action="{{ route('usuarios.update', $usuario) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="tipo">Tipo</label>
            <select name="tipo" id="tipo" class="form-control mb-3" wire:model="usuario.tipo">
                <option value="Cliente">Cliente</option>
                <option value="Admin">Administrador</option>
            </select>
        </div>
        <input type="submit" class="btn btn-primary w-full " value="Guardar Usuario"></input>
    </form>
</div>
