# Simple CRUD Rest API Using Laravel
#### Create Project
- Open htdocs folder in command prompt
- Check composer existing `composer`
- Create project `composer create-project --prefer-dist laravel/laravel project-name`
#### Create Database
- Start mysql and apache
- Create database
- Open .env file and change database name
```
DB_DATABASE=laravel_restapi
```
#### Create Model
- Open project-name folder in command prompt
- Create model and migration `php artisan make:model Article --migration`
- Open migration file on database/migration/create_articles_table.php
- Add attribute of article table
```
public function up() {
    Schema::create('articles', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('title');
        $table->string('content');
        $table->timestamps();
    });
}
```
- Open model file on app/Article.php
- Add table and attribute
```
class Article extends Model {
    protected $table    = "articles";
    protected $fillable = ['title', 'content'];
}
```
- Migrate database `php artisan migrate`
- Open app/Providers/AppServiceProvider.php if migration process error
- Add this code and drop table on database
```
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider {
    public function boot() {
        Schema::defaultStringLength(191);
    }
}
```
#### Create Controller
- Create article controller `php artisan make:controller ArticleController`
- Open controller file on app/Http/Controllers/ArticleController.php
- Add function for crud article
```
use App\Article;
class ArticleController extends Controller {
    public function index(){
        $articles = Article::all();
        return $articles;
    }
    public function create(Request $request) {
        $article = new Article;
        $article->title   = $request->title;
        $article->content = $request->content;
        $article->save();
        return 'Article created successfully';
    }
    public function edit($id) {
        $article = Article::find($id);
        return $article;
    }
    public function update(Request $request, $id) {
        $article = Article::find($id);
        $article->title   = $request->title;
        $article->content = $request->content;
        $article->save();
        return 'Article updated successfully';
    }
    public function delete($id) {
        $article = Article::find($id);
        $article->delete();
        return 'Article deleted successfully';
    }
}
```
#### Create Route
- Open rooute file on routes/api.php
- Add api method, routes, function
```
Route::get('/article', 'ArticleController@index');
Route::post('/article', 'ArticleController@create');
Route::put('/article/{id}', 'ArticleController@update');
Route::delete('/article/{id}', 'ArticleController@delete');
```
#### Create Cors
- Open index file on public/index.php
- Add this code on top of file
```
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');
```
#### Run & Test
- Run application `php artisan serve`
- Access application on htp://127.0.0.1:8000/api/article
- Test restapi on postman

![asa](https://user-images.githubusercontent.com/55520351/132526279-f710dabc-c9a6-45aa-b7e5-5e028c91af61.png)

# Reference
[Membangun dan Testing Rest API dengan CRUD Sederhana Laravel](https://medium.com/@tedoharischandra29/membangun-dan-testing-rest-api-dengan-crud-sederhana-laravel-687a7d96ab3b)
