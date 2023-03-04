## O aplikacji
Aplikacja zostałą stworzona do rejestrowania czasu pracy oraz materiału w przedsiębiorstwie.
Działa ona na frameworku Laravel z dodatkowaymi pakietami. Aby móc korzystać z aplikacji potrzebne jest zainstalowanie pewnyech pakietów i bibliotek.
Ponieżej instrukacja.

## Technologie
* PHP 8.0
* Laravel 9
* JS

## Instalacja
* Instalcja composera i uruchomienie 'composer install'
* Instalacja 'composer require laravel/breeze --dev' i uruchomienie polecenia 'php artisan breeze:install'
* Instalacja Xampp oraz stworzenie bazy danych i uruchomienie migracji.
* instalacja 'composer require laravel-views/laravel-views'
* Publikacja zasobów 'php artisan vendor:publish --tag=public --provider='LaravelViews\LaravelViewsServiceProvider' --force'
* Instalacja 'composer require wireui/wireui'
* Instalacja 'composer require maatwebsite/excel'
* Uruchomienie polecenia 'php artisan serve'
* Uruchomienie polecenia 'npm run dev'

## Uruchomienie
Zarejestrować się na stronie rejestracji. Po poprawanej rejestracji jesteśmy w stanie się zalogować i miec dostęp do funkcji aplikacji.
