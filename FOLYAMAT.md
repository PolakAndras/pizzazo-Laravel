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

Adatbázisok

User 
 - kész

A termékek
8. A termékek és azokhoz tartozó adatbázisok

 
    -Termékek DB / Categories
        -id
        -name 


        - pizza
            - id
            - category_id (FK-categories id-ra)
            - name
            - price
            - image
            - description

            - méretek: normál, kicsi, családi, party
            - feltétek és azok árai
            - megjegyzés
        -gyrosok
            - id
            - category_id (FK-categories id-ra)
            - name
            - price
            - image
            - description

                - extrák gyrosokhoz
                - Megjegyzés
        - hotdog
            - id
            - category_id (FK-categories id-ra)
            - name
            - price
            - image
            - description

                -extrák hotdoghoz
                -megjegyzés
        -saláta
            - id
            - category_id (FK-categories id-ra)
            - name
            - price
            - image
            - description

                -extrák hotdoghoz
                -megjegyzés
        -hamburger
            - id
            - category_id (FK-categories id-ra)
            - name
            - price
            - image
            - description

                -extrák burgerhez
                -megjegyzés
        -üditők
            - id
            - category_id (FK-categories id-ra)
            - name
            - price
            - image
            - description
        -Jégkrém
            - id
            - category_id (FK-categories id-ra)
            - name
            - price
            - image
            - description

9. Frontend, a products tábla elkészítése
10. Linkként összekötés a termékekkel :
    TODO: Itt kell majd a ha a kosár elkészült belerakni egy formba az egészet, post-al elküldeni

11. Kosár elkészítése:
    Szükség van: a) - egy cart controllerre : php artisan make:controller CartController
                 b) -  egy web.php-s post route-ra : Route::post('/cart/add', [CartController::class, 'add'])->name("cart.add");
                 c) A bladeben a form-ban elküldeni ami erre a route-ra mutat:  action={{ route("cart.add") }}  

A kosárban amit átadok a bladeből: product_id   -> ebből keresem vissza a terméket
                                 : quantity -> ez ugye csak a product oldalon megadható, kell
                                 : size -> ez ugye csak a product oldalon megadható, kell
                                 : extrak -> ez ugye csak a product oldalon megadható, kell















KÉSŐBB. Rendelések és Kosár

    - Orders
        - id
        - user_id
        - products_total (az ordered_products-ban lévő products_subtotal-ok összege)


    - Ordered_products
        	- id
        - ordered_id
        - products_id
        - product_json_snapshot
		products_price, products_name, products_image kerül majd bele a snapshot jsonbe
        - products_qtty (termék mennyiége-> lehetne jsonbe de a könnyebb elérés miatt kihozhatjuk)
        - products_price(lehetne jsonbe de a könnyebb elérés miatt kihozhatjuk)
        - products_subtotal



