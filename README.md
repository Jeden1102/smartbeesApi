# Smartbees rekrutacja LARAVEL
Poniżej kolejne etapy aby appka działała lokalnie


## Installation

```bash
composer install
```
Nazwę pliku .envexample zmieniamy na .env i uzupełniamy danymi do bazy danych + jeśli chcemy aby działały nam maile potwierdzajace zamówienie to dodatkowo uzupełniamy dane dot. dostępu do maila
## Live version
```bash
php artisan migrate
php artisan db:seed
php artisan serve
```
Domyślne kody rabatowe : V4L1D -> kod działający, -20% od ceny, B4D <- kod nieważny 
See me live !
https://dominikraducki.works/smartbees/



## License
[MIT](https://choosealicense.com/licenses/mit/)
