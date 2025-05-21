<div class="mb-3">
    <label for="titulo" class="form-label">Título</label>
    <input type="text" name="titulo" class="form-control" value="{{ old('titulo', $tarefa->titulo ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="descricao" class="form-label">Descrição</label>
    <textarea name="descricao" class="form-control">{{ old('descricao', $tarefa->descricao ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="data_fim" class="form-label">Data de Fim</label>
    <input type="date" name="data_fim" class="form-control" value="{{ old('data_fim', $tarefa->data_fim ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" class="form-control">
        @foreach(['pendente', 'em andamento', 'concluída'] as $status)
            <option value="{{ $status }}" @selected(old('status', $tarefa->status ?? '') == $status)>
                {{ ucfirst($status) }}
            </option>
        @endforeach
    </select>
</div>