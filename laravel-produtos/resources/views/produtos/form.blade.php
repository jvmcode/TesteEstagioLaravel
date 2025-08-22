@csrf

<div class="mb-4">
    <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
    <input type="text" name="nome" id="nome"
        value="{{ old('nome', $produto->nome ?? '') }}"
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
</div>

<div class="mb-4">
    <label for="preco" class="block text-sm font-medium text-gray-700">Preço</label>
    <input type="number" step="0.01" name="preco" id="preco"
        value="{{ old('preco', $produto->preco ?? '') }}"
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
</div>

<div class="mb-4">
    <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
    <textarea name="descricao" id="descricao"
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('descricao', $produto->descricao ?? '') }}</textarea>
</div>

<button type="submit"
    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
    {{ $buttonLabel ?? 'Salvar' }}
</button>
