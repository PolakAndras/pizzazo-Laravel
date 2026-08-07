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
1. A termékek és azokhoz tartozó adatbázisok

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


2. Rendelések és Kosár

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


    - categories? -> ez kell?
    	- id
        - name
    A kategóriáknál ugye felmerül a szülő és gyermek kategória is. Ezért szükség lenne egy parent_id-re is, amit most nem viszünk bele a bonyolultsága okán. 
    A kategóriák relációja hasMany, hiszen a kategóriának vannak termékei.
