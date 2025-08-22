# 🚀 Etapas para Criar o CRUD de Produtos

## Observação: Foi utilizado o XAMPP para servidores de banco de dados MySQL e Apache.

## 1. 🛠️ Preparação do Projeto 
Bash <br> 
composer create-project laravel/laravel laravel-produtos cd laravel-produtos php artisan serve

## 2. 🗃️ Configuração do Banco de Dados No arquivo .env , configure sua conexão: 
Env DB_CONNECTION=mysql<br> 
DB_HOST=127.0.0.1  
DB_PORT=3306<br> 
DB_DATABASE=produtos_db <br> 
DB_USERNAME=root <br> 
DB_PASSWORD= <br> 
Crie o banco de dados produtos_db no MySQL.<br> 

## 3. 🧱 Criar a Migration e o Model Bash php artisan make:model Produto -m No arquivo database/migrations/xxxx_xx_xx_create_produtos_table.php:

public function up() <br> 
{ Schema::create('produtos', function (Blueprint $table) { <br> 
$table->id(); <br> 
$table->string('nome'); <br> 
$table->decimal('preco', 10, 2); <br> 
$table->text('descricao'); <br> 
$table->timestamps(); }); }<br> 

Execute a migration:

Bash 
php artisan migrate

## 4. 🧭 Criar o Controller com Recursos do CRUD
Bash 

php artisan make:controller ProdutoController --resource

No ProdutoController.php , implemente os métodos index , create , store , edit , update , e destroy :<br> 

Php <br> 
use App\Models\Produto;<br> 
use Illuminate\Http\Request;<br> 
public function index()<br> 
{<br> 
$produtos = Produto::all();<br> 
return view('produtos.index', compact('produtos'));<br> 
}<br> 
public function create()<br> 
{<br> 
return view('produtos.create');<br> 
}<br> 
public function store(Request $request)<br> 
{<br> 
Produto::create($request->all());<br> 

return redirect()->route('produtos.index');<br> 
}<br> 
public function edit(Produto $produto)<br> 
{<br> 
return view('produtos.edit', compact('produto'));<br> 
}<br> 
public function update(Request $request, Produto $produto)<br> 
{<br> 
$produto->update($request->all());<br> 
return redirect()->route('produtos.index');<br> 
}<br> 
public function destroy(Produto $produto)<br> 
{<br> 
$produto->delete();<br> 
return redirect()->route('produtos.index');<br> 
}<br> 

## 5. 🧾 Habilitar Fillable no Model
No Produto.php : <br> 
Php <br> 
protected $fillable = ['nome', 'preco', 'descricao'];<br> 

## 6. 🛣️ Definir Rotas No routes/web.php :
Php <br> 
use App\Http\Controllers\ProdutoController;<br> 
use Illuminate\Support\Facades\Route;<br> 


Route::get('/', fn() => redirect()->route('produtos.index'));<br> 

Route::resource('produtos', ProdutoController::class)->names([<br> 
    'index' => 'produtos.index',<br> 
    'create' => 'produtos.create',<br> 
    'store' => 'produtos.store',<br> 
    'edit' => 'produtos.edit',<br> 
    'update' => 'produtos.update',<br> 
    'destroy' => 'produtos.destroy',<br> 
]);<br> 

## 7. 🎨 Criar as Views Blade

Crie os arquivos em resources/views/produtos/ : <br> 
index.blade.php – lista de produtos <br> 
create.blade.php – formulário de criação <br> 
edit.blade.php – formulário de edição<br> 

Exemplo de create.blade.php :<br> 
Blade<br> 
<form action="{{ route('produtos.store') }}" method="POST"><br> 
@csrf<br> 
<input type="text" name="nome" placeholder="Nome"><br> 
<input type="number" step="0.01" name="preco" placeholder="Preço"><br> 
<textarea name="descricao" placeholder="Descrição"></textarea><br> 
<button type="submit">Salvar</button><br> 
</form><br> 

## 8. ✅ Resultado

Com isso, você terá um sistema funcional para:<br> 

Criar produtos <br> 
Listar todos os produtos <br> 
Editar produtos existentes <br> 
Excluir produtos <br> 

Att,
Joao Oliveira.
