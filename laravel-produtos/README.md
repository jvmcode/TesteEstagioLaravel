🚀 Etapas para Criar o CRUD de Produtos
1. 🛠️ Preparação do Projeto
Bash
composer create-project laravel/laravel laravel-produtos
cd laravel-produtos
php artisan serve

2. 🗃️ Configuração do Banco de Dados
No arquivo .env , configure sua conexão:
Env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=produtos_db
DB_USERNAME=root
DB_PASSWORD=senha
Crie o banco de dados produtos_db no MySQL.

3. 🧱 Criar a Migration e o Model
Bash
php artisan make:model Produto -m
No arquivo database/migrations/xxxx_xx_xx_create_produtos_table.php:

public function up()
{
Schema::create('produtos', function (Blueprint $table) {
$table->id();
$table->string('nome');
$table->decimal('preco', 10, 2);
$table->text('descricao');
$table->timestamps();
});
}

Execute a migration:

Bash
php artisan migrate

4. 🧭 Criar o Controller com Recursos do CRUD

Bash
php artisan make:controller ProdutoController --resource

No ProdutoController.php , implemente os métodos index , create , store ,
edit , update , e destroy :

Php
use App\Models\Produto;
use Illuminate\Http\Request;

public function index()
{
$produtos = Produto::all();
return view('produtos.index', compact('produtos'));
}
public function create()
{
return view('produtos.create');
}
public function store(Request $request)
{
Produto::create($request->all());

return redirect()->route('produtos.index');
}

public function edit(Produto $produto)
{
return view('produtos.edit', compact('produto'));
}

public function update(Request $request, Produto $produto)
{
$produto->update($request->all());
return redirect()->route('produtos.index');
}

public function destroy(Produto $produto)
{
$produto->delete();
return redirect()->route('produtos.index');
}

5. 🧾 Habilitar Fillable no Model

No Produto.php :
Php
protected $fillable = ['nome', 'preco', 'descricao'];

6. 🛣️ Definir Rotas
No routes/web.php :
Php
use App\Http\Controllers\ProdutoController;
Route::resource('produtos', ProdutoController::class);

7. 🎨 Criar as Views Blade

Crie os arquivos em resources/views/produtos/ :
index.blade.php – lista de produtos
create.blade.php – formulário de criação
edit.blade.php – formulário de edição

Exemplo de create.blade.php :

Blade
<form action="{{ route('produtos.store') }}" method="POST">
@csrf
<input type="text" name="nome" placeholder="Nome">
<input type="number" step="0.01" name="preco" placeholder="Preço">
<textarea name="descricao" placeholder="Descrição"></textarea>
<button type="submit">Salvar</button>
</form>

✅ Resultado

Com isso, você terá um sistema funcional para:

Criar produtos
Listar todos os produtos
Editar produtos existentes
Excluir produtos