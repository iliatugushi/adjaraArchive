# Requirements

Application is created using framweork Laravel, to run this app following requirements has to be met on platform:

-   PHP >= 7.2.5
-   BCMath PHP Extension
-   Ctype PHP Extension
-   Fileinfo PHP extension
-   JSON PHP Extension
-   Mbstring PHP Extension
-   OpenSSL PHP Extension
-   PDO PHP Extension
-   Tokenizer PHP Extension
-   XML PHP Extension
-   MySql

Also platform has to have composer installed. The database name and all required information is located in .env file.

# Installation

After all requirements are met, there are several command that has to be executed to run the project:

`composer install`

_This command will install all composer required libraries for system to work._

`php artisan key:generate`

_This command will create key for project._

`php artisan storage:link`

_This command will create link from storage to public path._

`php artian migrate:fresh --seed`

_This command will migrate all the tables, and store them to database, also it will run the seeders._

---

`php artisan optimize:clear`

_This command will clear all the cache._

# System Structure & Folders

As system is made on Laravel framework, we have mvc structure.

## Views

All The Views are located in resources/views folder structured.

## Models

All The models are located in app/models folder.

## Controllers

All the controllers are located in app/Http/Controllers Folder.

## Routes

All the routes are located in "routes" folder

## Database Migrations and Seeders

### Migrations

Database migrates with tables structures can be found in following directory: /database/migrations

### Seeders

Database seeders with tables structures can be found in following directory: /database/seeders

## Functional & Technical Description

The application is developed in Laravel Framework, so we have mvc structure.

### Models

System has following Models, which are located in /app/Models folder, each model has its corresponding Controllers which will be discussed below:

#### Admin

ეს არის ადმინისტრატორის მოდელი,

#### Anaweri

ეს არის ანაწერის მოდელი, ამ მოდელში არის შემდეგი ფუნქციები:

-   fond() - ეს ფუნქცია აბრუნებს ფონდს რომელსაც ეკუთნის ეს ანაწერი
-   getNameAttribute() - ეს არის ატრიბუტის ფუნქცია რომელიც გამოიყენება რომ დავაბრუნოთ დასახელება
-   sakmesTree() - ეს აბრუნებს ამ ანაწერში შემავალ საქმეებს

#### Archive

ეს არის არქივის მოდელი, ამ მოდელში არის შემდეგი ფუნქციები:

-   megzuriAttribute() - რომელიც აბრუნებს მეგზურის ფაილს
-   getNameAttribute() - ეს არის ატრიბუტის ფუნქცია რომელიც გამოიყენება რომ დავაბრუნოთ დასახელება
-   fonds() - ეს ფუნქცია აბრუნებს ყველა ფონდს რომელიც ამ არქივს ეკუთნის

#### Creator

ეს არის ფონდშემქმნელის მოდელი, ამ მოდელში არის შემდეგი ფუნქციები:

-   getNameAttribute() - ეს არის ატრიბუტის ფუნქცია რომელიც გამოიყენება რომ დავაბრუნოთ დასახელება
-   type() - ეს ფუნქცია აბრუნებს ფონდშემქმნელის ტიპს
-   fondsTree() - ეს ფუნქცია აბრუნებს ფონდებს რომლებიც ამ შემქმნელს ეკუთნის

#### File

ეს არის ფაილის მოდელი, ამ მოდელში არის შემდეგი ფუნქციები:

-   getNameAttribute() - ეს არის ატრიბუტის ფუნქცია რომელიც გამოიყენება რომ დავაბრუნოთ დასახელება
-   sakme() - ეს ფუნქცია აბრუნებს საქმეს რომელსაც ეს ფაილი ეკუთნის

#### Fond

ეს არის ფონდის მოდელი, ამ მოდელში არის შემდეგი ფუნქციები:

-   getNameAttribute() - ეს არის ატრიბუტის ფუნქცია რომელიც გამოიყენება რომ დავაბრუნოთ დასახელება
-   archive() - ეს ფუნქცია აბრუნებს არქივს რომელსაც ეს ფონდი ეკუთნის
-   creator() - ეს ფუნქცია აბრუნებს ფონდშემქმნელს რომელსაც ეს ფონდი ეკუთნის
-   anaweris() - ეს ფუნქცია აბრუნებს ანაწერებს რომლებიც ამ ფონდს ეკუთნის
-   anawerisTree() - ეს ფუნქცია აბრუნებს ანაწერებს რომლებიც ამ ფონდს ეკუთნის ხისთვის

#### Sakme

ეს არის საქმის მოდელი, ამ მოდელში არის შემდეგი ფუნქციები:

-   getNameAttribute() - ეს არის ატრიბუტის ფუნქცია რომელიც გამოიყენება რომ დავაბრუნოთ დასახელება
-   anaweri() - ეს ფუნქცია აბრუნებს ანაწერს რომელსაც ეს საქმე ეკუთნის
-   files() - ეს ფუნქცია აბრუნებს ფაილებს რომლებიც ამ საქმეს ეკუთნის
-   filesTree() - ეს ფუნქცია აბრუნებს ფაილებს რომლებიც ამ საქმეს ეკუთნის

#### Type

ეს არის ფონდშემქმნელის ტიპის მოდელი

# Controllers

კონტროლერები არის განთავსებული: /app/Http/Controllers/Admin და /app/Http/Controllers ფოლდერებში
თითოეულ მოდელს აქვს თავისი კონტროლერი, სისტემაში სულ გვაქვს შემდეგი კონტროლერები:

#### ApiController

ეს არის კონტროლერი რომელიც ამუშავებს API მოთხოვნებს, რომელბიც არის შემდეგი:

-   getList() - ეს ფუნქცია აბრუნებს სიას მოდელის მოხედვით
-   getIdentifikator() - ეს ფუნქცია აბრუნებს იდენტიფიკატორს მოდელის მოხედვით

#### HomeController

ეს არის კონტროლერი რომელიც გამოიყენება ქეჩის გასასუფთავებლად შემდეგი ფუნციით:
clear()

#### LoginController

ეს არის კონტროლერი რომელიც გამოიყენება მომხმარებლის ავტორიზაციისთვის
ფუნქციები:

-   adminLoginShow() - ეს ფუნქცია გამოიყენება ავტორიზაქციის view ს დასაბრუნებლად
-   adminLogin() - ავტორიზაცია პროცესი
-   logout() - მომხმარებლის სისტემიდან გამოსვლა

#### AdminController

Admin მოდელის კონტროლერი ასევე დამატებითი ფუნქციონალით
ფუნქციები:

-   index() - ფუნქცია რომელიც აბრუნებს ადმინისტრატორების სიას
-   create() - ფუნქცია ადმინისტრატორების დამატების View
-   store() - ახალი მონაცემის დამატება
-   edit() - არსებული მონაცემის რედაქტირების View
-   update() - არსებული მონაცემის რედაქტირება
-   destroy() - მონაცემის წაშლა
-   dashboard() - ადმინისტრატორის dashboard View ს დასაბრულებელი ფუნქცია
-   elementDetails() - ეს ფუნქცია გამოიყენება ხის გენერაციისთვის დინამიურად, გადაცემული მოდელის მიხედვით ბრუნდება შესაბამისი მოდელის ინფორმაცია view ს სახით
-   treeExpand() - ეს ფუქნცია გამოიყენება ხის გახსნის დასაგენერირებლად დინამიურად ასევე მოდელის მიხედვით

#### AnaweriController

ეს არის Anaweri მოდელის კონტროლერი
ფუნქციები:

-   index() - ფუნქცია ანაწერის სიის დასაბრუნებლად, რომელიც ღებულობს ფონდს პარამეტრად
-   create() - ფუნქცია მოდელის დამატების View ს დასაბრუნებლად
-   store() - ფუნქცია მოდელის დამატების
-   edit() - ფუნქცია მოდელის რედაქტირების View ს დასაბრუნებლად
-   update() - ფუნქცია მოდელის რედაქტირებისთვის
-   show() - ფუნქცია მოდელის ინფორმაციის view ს დასაბრულებელად
-   destroy() - ფუნქცია მოდელის წასაშლელად

#### ArchiveController

ეს არის Archive მოდელის კონტროლერი
ფუნქციები:

-   index() - ფუნქცია მოდელის სიის დასაბრუნებლად
-   create() - ფუნქცია მოდელის დამატების View ს დასაბრუნებლად
-   store() - ფუნქცია მოდელის დამატების
-   edit() - ფუნქცია მოდელის რედაქტირების View ს დასაბრუნებლად
-   update() - ფუნქცია მოდელის რედაქტირებისთვის
-   show() - ფუნქცია მოდელის ინფორმაციის view ს დასაბრულებელად
-   destroy() - ფუნქცია მოდელის წასაშლელად
-

#### CreatorController

ეს არის Creator მოდელის კონტროლერი
ფუნქციები:

-   index() - ფუნქცია მოდელის სიის დასაბრუნებლად
-   create() - ფუნქცია მოდელის დამატების View ს დასაბრუნებლად
-   store() - ფუნქცია მოდელის დამატების
-   edit() - ფუნქცია მოდელის რედაქტირების View ს დასაბრუნებლად
-   update() - ფუნქცია მოდელის რედაქტირებისთვის
-   show() - ფუნქცია მოდელის ინფორმაციის view ს დასაბრულებელად
-   destroy() - ფუნქცია მოდელის წასაშლელად
-

#### FileController

ეს არის File მოდელის კონტროლერი
ფუნქციები:

-   index() - ფუნქცია მოდელის სიის დასაბრუნებლად, პარამეტრად ღებულობს საქმეს
-   create() - ფუნქცია მოდელის დამატების View ს დასაბრუნებლად
-   store() - ფუნქცია მოდელის დამატების
-   edit() - ფუნქცია მოდელის რედაქტირების View ს დასაბრუნებლად
-   update() - ფუნქცია მოდელის რედაქტირებისთვის
-   show() - ფუნქცია მოდელის ინფორმაციის view ს დასაბრულებელად
-   destroy() - ფუნქცია მოდელის წასაშლელად
-

#### FondController

ეს არის Fond მოდელის კონტროლერი
ფუნქციები:

-   index() - ფუნქცია მოდელის სიის დასაბრუნებლად
-   create() - ფუნქცია მოდელის დამატების View ს დასაბრუნებლად
-   store() - ფუნქცია მოდელის დამატების
-   edit() - ფუნქცია მოდელის რედაქტირების View ს დასაბრუნებლად
-   update() - ფუნქცია მოდელის რედაქტირებისთვის
-   show() - ფუნქცია მოდელის ინფორმაციის view ს დასაბრულებელად
-   destroy() - ფუნქცია მოდელის წასაშლელად
-

#### RoleController

ეს არის Role მოდელის კონტროლერი
ფუნქციები:

-   index() - ფუნქცია მოდელის სიის დასაბრუნებლად
-   create() - ფუნქცია მოდელის დამატების View ს დასაბრუნებლად
-   store() - ფუნქცია მოდელის დამატების
-   edit() - ფუნქცია მოდელის რედაქტირების View ს დასაბრუნებლად
-   update() - ფუნქცია მოდელის რედაქტირებისთვის
-   show() - ფუნქცია მოდელის ინფორმაციის view ს დასაბრულებელად
-   destroy() - ფუნქცია მოდელის წასაშლელად
-

#### SakmeController

ეს არის Sakme მოდელის კონტროლერი
ფუნქციები:

-   index() - ფუნქცია მოდელის სიის დასაბრუნებლად
-   create() - ფუნქცია მოდელის დამატების View ს დასაბრუნებლად
-   store() - ფუნქცია მოდელის დამატების
-   edit() - ფუნქცია მოდელის რედაქტირების View ს დასაბრუნებლად
-   update() - ფუნქცია მოდელის რედაქტირებისთვის
-   show() - ფუნქცია მოდელის ინფორმაციის view ს დასაბრულებელად
-   destroy() - ფუნქცია მოდელის წასაშლელად
-   viewFiles() - ფუნქცია რომელიც გამოიყენება ფაილების დათვალიერებისთვის და აბრუნებს, ფაილების სურათების და ასევე view ს.

# Views

Views ეს არის ფაილები სადაც მონაცემების განთავსება ხდება blade ფაილები, html css js ...
სულ გვაქვს 3 ფოლდერი:

### admin Folder

ამ ფოლდერში არის ადმინისტრირების ფოლდერები მოდელების მიხედვით დალაგებული:

#### admins - ადმინისტრატორების view ები

create -
edit -
index -

#### anaweris - ანაწერების view ები

create - მოდელის შემნა / რედაქტირება
index - მოდელის სია
show_component - ცალკე გატანილი დეტალური ინფორმაცია / რომელიც დინამიურად გამოძახების დროსაც ვიყენებთ
show - მოდელის დეტალური ინფორმაცია

#### archives - ანაწერების view ები

create - მოდელის შემნა / რედაქტირება
index - მოდელის სია
show_component - ცალკე გატანილი დეტალური ინფორმაცია / რომელიც დინამიურად გამოძახების დროსაც ვიყენებთ
show - მოდელის დეტალური ინფორმაცია

#### creators - ანაწერების view ები

create - მოდელის შემნა / რედაქტირება
index - მოდელის სია
show_component - ცალკე გატანილი დეტალური ინფორმაცია / რომელიც დინამიურად გამოძახების დროსაც ვიყენებთ
show - მოდელის დეტალური ინფორმაცია

#### files - ანაწერების view ები

create - მოდელის შემნა / რედაქტირება
index - მოდელის სია
show_component - ცალკე გატანილი დეტალური ინფორმაცია / რომელიც დინამიურად გამოძახების დროსაც ვიყენებთ
show - მოდელის დეტალური ინფორმაცია

#### fonds - ანაწერების view ები

create - მოდელის შემნა / რედაქტირება
index - მოდელის სია
show_component - ცალკე გატანილი დეტალური ინფორმაცია / რომელიც დინამიურად გამოძახების დროსაც ვიყენებთ
show - მოდელის დეტალური ინფორმაცია

#### roles - ანაწერების view ები

create - მოდელის შემნა / რედაქტირება
index - მოდელის სია

#### sakmes - ანაწერების view ები

create - მოდელის შემნა / რედაქტირება
index - მოდელის სია
show_component - ცალკე გატანილი დეტალური ინფორმაცია / რომელიც დინამიურად გამოძახების დროსაც ვიყენებთ
show - მოდელის დეტალური ინფორმაცია
viewer - ეს არის ფაილების დათვალიერების View ერთ ფაილად სრული ფუნქციონალი (გადაცემა ხდება სურათების მხოლოდ)

#### tree - ანაწერების view ები

expand - იერარქიული ხის გახსნის ვიზუალი დინამიური

dashboard - მომხმარებლის მთავარი გვერდი
login - ავტორიზაციის ვიზუალი

-

### layouts Folder

ამ ფოლდერში არის ზოგადი layout ები სულ გვაქვს ორი
admin - ეს არის layout რომელიც ყველა view ში არის გარდა ფაილების დათვალიერებისა
viewer- ეს არის layout ფაილების დათვალიერებისთვის

### partials Folder

აქ არის ორი ნაწილი/კომპონენტი
error - შეცდომის მესიჯის გამოტანა
success - წარმატების მესიჯის გამოტანა

# Routes

### web.php

ეს route ემსახურება პროგრამიდან ქეჩის გასუფთავებას
Route::get('/clear', [HomeController::class, 'clear'])->name('clear');

### admin.php

ეს route ემსახურება პროგრამის საწყისი გვერდის გახსნას ავტორიზაციის
Route::get('/', [LoginController::class, 'adminLoginShow'])->name('admin.login');

ეს route ემსახურება ავტორიზაციის პროცესს
Route::post('/post-login', [LoginController::class, 'adminLogin'])->name('admin.login.submit');

ეს route ები არის გაჯგუფებული და მუშაობს მხოლოდ ავტორიზაციის გავლის შემდეგ. ყველგან სადაც შეგვხვდება resource route ებში ეს არის გაერთიანებული შემდეგი route ები:
create - შექმნა
edit - რედაქტიების გვერდის გამოძახება
update - რედაქტირების ფუნქციონალი
store - ახალი მონაცემის ფუნქციონალი
destroy - მონაცემის წაშლა
show - მონაცემის დეტალური ინფორმაცია
Route::group(['middleware' => ['auth:admin',]], function () {

    ადმინისტრატორის Resource (create, edit, update, store, destory, show)
    Route::resource('admins', AdminController::class);

    ეს route ემსახურება ავტორიზაციის გავლის შემდეგ Dashboard გვერდის გახსნას
    Route::get('/dashboard',  [AdminController::class, 'dashboard'])->name('admin.dashboard');

    ეს route ემსახურება დინამიურად მოდულის ინფორმაციის გამოტანას იერარქიული ხისთვის
    Route::post('/element-details',  [AdminController::class, 'elementDetails'])->name('element.details');

    ეს route ემსახურება დინამიურად იერარქიული ხის დაგენერირებას
    Route::post('/tree-expand',  [AdminController::class, 'treeExpand'])->name('tree.expand');


    არქივების Resource (create, edit, update, store, destory, show)
    Route::resource('archives', ArchiveController::class);

    ფონდშემქმნელის ტიპების Resource (create, edit, update, store, destory, show)
    Route::resource('types', TypeController::class);

    ფონდშემქმნელების Resource (create, edit, update, store, destory, show)
    Route::resource('creators', CreatorController::class);

    ფონდების Resource (create, edit, update, store, destory, show)
    Route::resource('fonds', FondController::class);

    ანაწერების Resource (create, edit, update, store, destory, show)
    Route::resource('anaweris', AnaweriController::class)->except(['create', 'index']);

    ანაწერების სიის ნახვა ფონდის მიხედვით
    Route::get('anaweris/index/{fond}', [AnaweriController::class, 'index'])->name('anaweris.index');

    ანაწერუს შემქნა ფონდის მიხედვით
    Route::get('anaweris/create/{fond}', [AnaweriController::class, 'create'])->name('anaweris.create');

    საქმეების Resource (create, edit, update, store, destory, show)
    Route::resource('sakmes', SakmeController::class)->except(['create', 'index']);

    საქმეების სიის ნახვა ანაწერის მიხედვით
    Route::get('sakmes/index/{anaweri}', [SakmeController::class, 'index'])->name('sakmes.index');

    საქმის შექმნა ნაწერის მიხედვით
    Route::get('sakmes/create/{anaweri}', [SakmeController::class, 'create'])->name('sakmes.create');

    საქმის ფაილების დათვალიერების route
    Route::get('sakmes/view-files/{sakme}', [SakmeController::class, 'viewFiles'])->name('sakmes.viewFiles');

    ფაილების Resource (create, edit, update, store, destory, show)
    Route::resource('files', FileController::class)->except(['create', 'index']);

    ფაილების სიის ნახვა საქმის მიხედვით
    Route::get('files/index/{sakme}', [FileController::class, 'index'])->name('files.index');

    ფაილის შემნა საქმის მიხედვით
    Route::get('files/create/{sakme}', [FileController::class, 'create'])->name('files.create');

    როლების Resource (create, edit, update, store, destory, show)
    Route::resource('roles', RoleController::class);

});

სისტემიდან გამოსვლა
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

### api.php

ეს route ემსახურება პროგრამიდან API გზით სიების მოთხოვნას
Route::post('/getList', [ApiController::class, 'getList']);

ეს route ემსახურება პროგრამიდან იდენტიფიკატორის მოთხოვნას
Route::post('/getIdentifikator', [ApiController::class, 'getIdentifikator']);

# CSS

პროგრამის სტილები
/public/css/additional
ამ ფაილში არის დამატებითი სტილები აღწერილი

# JS

პროგრამის Javascript ფაილები

/public/js/additional.js
ამ ფაილში არის შემდეგი ფუნქციები:

treeUpdate(element, elementID, thisObj) - ეს ფუნქცია გამოიყენება იერარქიული ხის გენერაციისთვის, ყოველ ელემენტზე დაჭეით იხსნება მისი შვილი ელემენტები

-   element - ეს არის მოდელი
-   elementID - ეს არის მოდელის ID
-   thisObj - კონკრეული ელემენტი DOM იდან

getContent(element, elementID) - ეს ფუნქცია გამოიყენება ელემენტის ანოტაციის გამოძახებისთვის

-   element - ეს არის მოდელი
-   elementID - ეს არის მოდელის ID

openTree() - ხის გახნის ფუნქცია
