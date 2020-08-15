<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//use Illuminate\Routing\Route;

Route::get('/', function () {
    return view('public.index');
});

Auth::routes();


Route::get('/user', 'UserController@index');

Route::get('/admin', 'AdminController@index')->middleware('role:superadministrator');
Route::get('/logadmin','AdminController@show')->name('admin');
Route::post('/loginAdmin','AdminController@log');

//Category



Route::group(['middleware' => ['auth']], function () {
Route::post('/addcat','CategoryController@addCategory');
//Route::get('/getcat','CategoryController@getAllCategory');
Route::get('category','CategoryController@all_category');
Route::get('category/{id}','CategoryController@delete_category');
Route::get('editcategory/{id}','CategoryController@edit_category');
Route::post('updateC/{id}','CategoryController@update_category');
Route::get('chercheCategorie','CategoryController@cherche_categorie');

//Article
Route::get('article','ArticleController@all_Article');
 Route::post('/addArticle','ArticleController@add_article');
 Route::get('article/{id}','ArticleController@delete_article');
 Route::get('editArticle/{id}','ArticleController@edit_article');
 Route::post('updateArticle/{id}','ArticleController@update_article');
 Route::get('chercheArticleadmin','ArticleController@cherche_article');
 //subcategory
 Route::get('subcategory','SubcategoryController@all_subcategory');
 Route::get('subcategory/{category}','SubcategoryController@all_subcategoryByCategory');
 Route::post('/addSubcategory','SubcategoryController@add_subcategory');
 Route::get('editSubcategory/{id}','SubcategoryController@edit_subcategory');
 Route::post('updateSubcategory/{id}','SubcategoryController@update_subcategory');
 Route::get('subcategory/{id}','SubcategoryController@delete_subcategory');
 Route::get('chercheSubcategory','SubcategoryController@cherche_subcategory');
//Users
Route::get('users','UserController@all_users');
Route::get('user/{id}','UserController@delete_user');
Route::post('/adduser','UserController@add_user');
Route::get('edituser/{id}','UserController@edit_user');
Route::post('updateU/{id}','UserController@update_user');
Route::get('chercheUser','UserController@cherche_user');
Route::get('regions','regionController@getAllRegion');
Route::get('ville/{region}','villeController@all_VilleByregion');
Route::get('/countArticle','ArticleController@counter');
Route::get('blog/{id}','BlogController@delete_blog');


Route::post('/addAnnonce','PostArticleController@add_annonce');
Route::get('/annonceParUser','PostArticleController@annonces_by_user');

Route::get('/editAnnonces/{id}','PostArticleController@editer_annonce');
Route::post('/updateAnnonce/{id}','PostArticleController@update_annonce');
Route::get('/UserProfile','PostArticleController@userProfile')->middleware('auth');
Route::get('/editProfile','PostArticleController@editerprofile');
Route::post('/updateProfile','PostArticleController@update_profile');
Route::post('/addblog','BlogController@ajouterblog');

});



//Public
Route::get('regionsForAnn','PostArticleController@get_tous_region');
Route::get('postarticles','PostArticleController@all_postArticle');
Route::get('postarticlesbyid/{id}','PostArticleController@get_postArticlebyid');
Route::get('categories','PostArticleController@get_tous_categories');
Route::get('articleByCat/{id}','PostArticleController@get_art_by_cat');
Route::get('chercheArticle','PostArticleController@cherche_article');
Route::get('dernierarticles','PostArticleController@all_dernier_articles');
Route::get('articleByReg/{id}','PostArticleController@get_art_by_reg');
Route::get('villes','PostArticleController@get_viles');
Route::get('articleByVille/{ville}','PostArticleController@get_art_by_ville');
Route::get('subcategories','PostArticleController@get_Subcategories');
Route::get('articleBySubcategory/{subcategory}','PostArticleController@get_art_by_subcategory');
Route::get('articleByVilleSubcategory/{ville}/{subcategory}/{prix_min}/{prix_max}','PostArticleController@get_art_by_ville_subcategory');
Route::get('allblog','BlogController@allblog');
Route::get('blogByid/{id}','BlogController@blogByid');
Route::post('favorite/{post}', 'PostArticleController@favoritePost');
Route::post('unfavorite/{post}', 'PostArticleController@unFavoritePost');

Route::get('my_favorites', 'UserController@myFavorites');
