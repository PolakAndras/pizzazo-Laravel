1. composer create-project laravel/laravel:8.* ./ - > projekt létrehozása
    a, env-> DB DATABASE = polak_andras_pizzazo_laravel  megadása
    b, Adatbázis elkészítése a phpMyAdminban
2. frontend elkészítése első rész : welcome, regisztráció oldal
3. Users adatbázis Séma elkészítése a regisztrációs adatok alapján majd php artisan migrate
4. Controllerbe helyezése az adatoknak, UserController
5. Validáció a UserControllerben:
    a, validálás
    b. jelszó mutatorral kezelése

    c, RegisterRequest elkészítése : 1.	php artisan make:request RegisterRequest 
            b.1, authorize(){ return !Auth::check()   }   // Ne lehessen regiszrtálni újra
            b.2. Vaidáció egy php fájlba helyezése: config/validation.php  
            b.3 rules() {return ['name' => Config::get('validation.name'),]}
6. login oldal létrehozása / vagy a navbarban belépés (ha külön oldalon van akkor kell egy get ág, ha nem akkor csak post ág kell)
7. Profil módosítása oldal létrehozása és az ottani validáció elkészítése   
