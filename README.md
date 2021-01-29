# Boutique en ligne avec [Laravel](https://laravel.com/)

Ce projet, réalisé dans le cadre de mes études, consiste à créer une boutique en ligne grâce à Laravel.

> Laravel est un framework web open-source écrit en PHP respectant le principe modèle-vue-contrôleur et entièrement développé en programmation orientée objet.

Ce dernier sera donc codé en HTML/CSS, en PHP puis j'ajouterai un peu de JS pour fluidifier le site.

---

## Étape 1 : Création des maquettes

Dans un premier temps, avec mon binôme, nous avons créé les maquettes des différentes pages du site. Uniquement codés en HTML et CSS, nous avons créé les maquettes suivantes :

- un **header** : avec une barre de naviagtion et un logo
- un **footer** : avec deux icônes pour des réseaux sociaux
- un **catalogue** : devant afficher 3 lignes de 4 produits en affichage maximal
- une page **produit** : affichant des informations comme le prix, la catégorie, etc.
- un **panier** : affichant les articles qui se trouvent dans le panier ainsi que le prix total
- des pages d'**authentification** : un *login*, un *register* et un *reset_password*
- une page **admin** : pour ajouter, modifier ou supprimer un article.

Jusque là, aucune réelle difficulté ne se fait ressentir, on essaye de trvailler au maximum l'aspect visuel afin de produire un beau rendu.

![screen 1](https://raw.githubusercontent.com/nicolasdecorbez/webshop_laravel/main/images/menu.png "Menu")

![screen 2](https://raw.githubusercontent.com/nicolasdecorbez/webshop_laravel/main/images/catalogue.png "Catalogue")

![screen 3](https://raw.githubusercontent.com/nicolasdecorbez/webshop_laravel/main/images/article.png "Article avec option de modification (connecté en admin)")

---

## Étape 2 : Configuration de Laravel

Ensuite, nous mettons en place notre configuration **Laravel** afin de se familiariser avec le framework. On commence à créer quelques routes, qu'on supprime rapidement d'ailleurs, mais nous avanceons petit à petit.

Nous arrivons enfin à générer une base fonctionnelle, il faut mainteant tout relier aux bases de données, créer les bonnes migrations, bonnes routes afin que tout s'accorde.

- Dans notre **web.php**, on créé des routes sous cette forme :

```php
Route::get('/log', [App\Http\Controllers\HomeController::class, 'index'])->name('log');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/count', [App\Http\Controllers\BasketController::class, 'show_from_basket'])->name('show_from_basket');
```

- Puis nos migrations dans le dossier **database/migrations** :

```PHP
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->boolean('active')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
```

---

## Étape 3 : Fusion des deux étapes précédentes

Ici rien de très intéressant, on remplace les pages auto-générées par nos maquettes en prenant soin de bien modifier les liens de redirection, ainsi que d'ajouter quelques fonctionnalités de dernière minute (comptage des produits, affichage du prix sur toutes les pages, etc.)

On commence à pouvoir créer de nouveaux produits et à les modifier grâce à l'**admin** donc voici un screen-shot :

![admin]("Page Admin")
