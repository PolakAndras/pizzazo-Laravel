<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * A termékek feltöltése.
     *
     * Egy sor felépítése: [category_id, név, alapár, leírás, options]
     * Az options tömbből json lesz az adatbázisban:
     *   - sizes:  méret => felár az alapárhoz képest (csak pizzáknál)
     *   - extras: extra feltét => ár
     *   - null:   nincs választható opció (üdítő, jégkrém)
     *
     * @return void
     */
    public function run()
    {
        $products = [
            // Pizzák (category_id = 1)
            [1, 'Margherita pizza', 2000, 'Paradicsomszósz, mozzarella sajt', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'kukorica' => 250, 'gomba' => 250]]],
            [1, 'Prosciutto pizza', 2300, 'Paradicsomszósz, sonka, mozzarella sajt', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'kukorica' => 250, 'gomba' => 250]]],
            [1, 'Cardinale pizza', 2400, 'Paradicsomszósz, sonka, kukorica, mozzarella sajt', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'gomba' => 250, 'bacon' => 300]]],
            [1, 'Songoku pizza', 2500, 'Paradicsomszósz, sonka, gomba, kukorica, mozzarella sajt', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'olajbogyo' => 250, 'bacon' => 300]]],
            [1, 'Szalámis pizza', 2400, 'Paradicsomszósz, szalámi, mozzarella sajt', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'eros paprika' => 200, 'hagyma' => 200]]],
            [1, 'Magyaros pizza', 2600, 'Paradicsomszósz, kolbász, bacon, lila hagyma, erős paprika, sajt', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'tojas' => 250, 'fokhagyma' => 150]]],
            [1, 'Négysajtos pizza', 2500, 'Paradicsomszósz, mozzarella, trappista, füstölt sajt, márványsajt', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'diotoret' => 300]]],
            [1, 'Hawaii pizza', 2400, 'Paradicsomszósz, sonka, ananász, mozzarella sajt', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'kukorica' => 250]]],
            [1, 'Bolognai pizza', 2600, 'Bolognai ragu, mozzarella sajt', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'gomba' => 250]]],
            [1, 'Húsimádó pizza', 2700, 'Paradicsomszósz, sonka, szalámi, kolbász, bacon, sajt', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'eros paprika' => 200]]],
            [1, 'Gombás pizza', 2200, 'Paradicsomszósz, gomba, mozzarella sajt', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'kukorica' => 250]]],
            [1, 'Kukoricás pizza', 2200, 'Paradicsomszósz, kukorica, mozzarella sajt', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'sonka' => 350]]],
            [1, 'Vegetáriánus pizza', 2400, 'Paradicsomszósz, gomba, kukorica, borsó, paradicsomkarika, sajt', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'olajbogyo' => 250]]],
            [1, 'Tüzes pizza', 2500, 'Paradicsomszósz, csípős szalámi, lila hagyma, jalapeno, sajt', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'kolbasz' => 350]]],
            [1, 'Piedone pizza', 2600, 'Paradicsomszósz, bacon, bab, hagyma, kolbász, sajt', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'eros paprika' => 200]]],
            [1, 'BBQ Csirke pizza', 2600, 'BBQ alap, csirkemellcsíkok, kukorica, lila hagyma, sajt', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'bacon' => 300]]],
            [1, 'Görög csirkés pizza', 2600, 'Fokhagymás-tejfölös alap, csirkehús, lila hagyma, feta, sajt', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'olajbogyo' => 250]]],
            [1, 'Mexikói pizza', 2500, 'Chilis alap, darált hús, bab, kukorica, sajt', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'jalapeno' => 250]]],
            [1, 'Tonhalas pizza', 2600, 'Paradicsomszósz, tonhal, lila hagyma, olajbogyó, sajt', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'citrom' => 150]]],
            [1, 'Tarjás pizza', 2500, 'Paradicsomszósz, füstölt tarja, lila hagyma, sajt', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'fott tojas' => 250]]],
            [1, 'Sajtkrémes pizza', 2400, 'Sajtkrémes alap, sonka, kukorica, mozzarella', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'bacon' => 300]]],
            [1, 'Juhtúrós pizza', 2600, 'Tejfölös alap, juhtúró, szalonna, lila hagyma, sajt', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'kolbasz' => 350]]],
            [1, 'Bianco pizza', 2300, 'Fokhagymás-tejfölös alap, sonka, mozzarella sajt', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'kukorica' => 250]]],
            [1, 'Provance pizza', 2500, 'Paradicsomszósz, sonka, bacon, gomba, tojás, sajt', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'hagyma' => 200]]],
            [1, 'Fitness pizza', 2500, 'Paradicsomszósz, csirkemell, brokkoli, kukorica, sajt', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'paradicsom' => 200]]],
            [1, 'Calzone (Töltött) pizza', 2500, 'Paradicsomszósz, sonka, gomba, kukorica, sajt (összehajtva)', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'bacon' => 300]]],
            [1, 'Falusi pizza', 2600, 'Paradicsomszósz, tarja, kolbász, lila hagyma, hegyes erős, sajt', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'tojas' => 250]]],
            [1, 'Spinaci pizza', 2400, 'Fokhagymás-tejfölös alap, spenót, feta, mozzarella', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'csirkemell' => 400]]],
            [1, 'Caprese pizza', 2400, 'Paradicsomszósz, friss paradicsom, bivalymozaarella, bazsalikom', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['olajbogyo' => 250, 'rukkola' => 300]]],
            [1, 'Séf kedvence pizza', 2700, 'Tejfölös-mustáros alap, tarja, bacon, hagyma, gomba, sajt', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'jalapeno' => 250]]],
            [1, 'Maffiózó pizza', 2600, 'Chilis alap, szalámi, bacon, fokhagyma, lila hagyma, sajt', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'bab' => 200]]],
            [1, 'Kívánság pizza', 2800, 'Alapszósz + 4 szabadon választott feltét, sajt', ['sizes' => ['kicsi' => -400, 'normal' => 0, 'csaladi' => 1500, 'party' => 2800], 'extras' => ['extra sajt' => 400, 'bacon' => 300]]],

            // Gyrosok (category_id = 2)
            [2, 'Gyros Pitában', 1500, 'Gyros hús, saláta, paradicsom, lila hagyma, öntet, pita', ['extras' => ['extra hus' => 600, 'feta sajt' => 350, 'extra ontet' => 200]]],
            [2, 'Gyros Tál hasábburgonyával', 2400, 'Gyros hús, saláta, hasábburgonya, öntet', ['extras' => ['extra hus' => 600, 'feta sajt' => 350, 'extra ontet' => 200]]],
            [2, 'Gyros Tál rizzsel', 2400, 'Gyros hús, saláta, rizs, öntet', ['extras' => ['extra hus' => 600, 'feta sajt' => 350, 'extra ontet' => 200]]],
            [2, 'Gyros Tál vegyes körettel', 2500, 'Gyros hús, saláta, rizs, hasábburgonya, öntet', ['extras' => ['extra hus' => 600, 'feta sajt' => 350, 'extra ontet' => 200]]],
            [2, 'Sajttal sütött Gyros Tál', 2700, 'Gyros hús, köret, öntet, sajttal összesütve', ['extras' => ['extra hus' => 600, 'extra sajt' => 400]]],
            [2, 'Csípős Gyros Pitában', 1500, 'Csípős gyros hús, saláta, csípős öntet, pita', ['extras' => ['extra hus' => 600, 'jalapeno' => 250]]],
            [2, 'Gyros Box', 1700, 'Gyros hús, hasábburgonya, öntet pohárban', ['extras' => ['extra hus' => 400, 'extra ontet' => 150]]],
            [2, 'Vegetáriánus Gyros Pitában', 1300, 'Feta sajt, saláta, paradicsom, lila hagyma, öntet', ['extras' => ['extra sajt' => 350, 'olajbogyo' => 250]]],

            // Hot-Dog (category_id = 3)
            [3, 'Klasszikus Hot-Dog', 800, 'Kifli, virsli, ketchup, mustár, majonéz', ['extras' => ['extra virsli' => 300, 'sajt' => 250, 'piritott hagyma' => 150]]],
            [3, 'Sajtos Hot-Dog', 950, 'Kifli, virsli, szószok, reszelt sajt', ['extras' => ['extra virsli' => 300, 'piritott hagyma' => 150]]],
            [3, 'Francia Hot-Dog', 900, 'Lyukasztott kifli, virsli, francia szósz', ['extras' => ['extra virsli' => 300]]],
            [3, 'Chilis Hot-Dog', 1050, 'Kifli, virsli, chilis ragu, jalapeno', ['extras' => ['extra virsli' => 300, 'sajt' => 250]]],

            // Saláta (category_id = 4)
            [4, 'Görög saláta', 1600, 'Paradicsom, uborka, lila hagyma, olajbogyó, feta sajt', ['extras' => ['extra feta' => 350, 'piritott kruton' => 150]]],
            [4, 'Cézár saláta csirkével', 1900, 'Jégsaláta, csirkemellcsíkok, cézár öntet, kruton, parmezán', ['extras' => ['extra csirke' => 500, 'bacon' => 300]]],
            [4, 'Tonhalsaláta', 1800, 'Friss salátaágy, tonhal, lila hagyma, citrom, tojás', ['extras' => ['olajbogyo' => 250]]],
            [4, 'Fitnesz saláta', 1700, 'Zöldsaláta mix, uborka, paradicsom, grill csirke, joghurtos öntet', ['extras' => ['magvak' => 200]]],
            [4, 'Kerti saláta', 1300, 'Szezonális friss zöldségek, olívaolaj', ['extras' => ['feta sajt' => 350]]],
            [4, 'Amerikai káposztasaláta', 900, 'Gyalult káposzta, répa, majonézes-tejfölös szósz', ['extras' => ['extra ontet' => 150]]],

            // Hamburger (category_id = 5)
            [5, 'Sima Burger', 1500, 'Húspogácsa, saláta, paradicsom, burgerszósz', ['extras' => ['extra hus' => 600, 'bacon' => 300, 'sajt' => 250]]],
            [5, 'Sajtos Burger', 1700, 'Húspogácsa, cheddar sajt, saláta, csemegeuborka, szósz', ['extras' => ['extra hus' => 600, 'bacon' => 300, 'extra sajt' => 250]]],
            [5, 'Dupla Sajtburger', 2300, 'Két húspogácsa, dupla cheddar, saláta, szósz', ['extras' => ['bacon' => 300, 'jalapeno' => 200, 'extra szosz' => 150]]],
            [5, 'Bacon Burger', 1900, 'Húspogácsa, ropogós bacon, saláta, paradicsom, szósz', ['extras' => ['extra hus' => 600, 'sajt' => 250, 'tukortojas' => 250]]],
            [5, 'Retro Burger', 1600, 'Húspogácsa, csalamádé, mustár, ketchup, lila hagyma', ['extras' => ['extra hus' => 600, 'tojas' => 250, 'reszelt sajt' => 250]]],
            [5, 'BBQ Burger', 1850, 'Húspogácsa, BBQ szósz, pirított hagyma, bacon, sajt', ['extras' => ['extra hus' => 600, 'hagymakarika' => 200]]],
            [5, 'Chili Burger', 1800, 'Húspogácsa, csípős szósz, jalapeno, saláta', ['extras' => ['extra hus' => 600, 'sajt' => 250, 'extra chili' => 150]]],
            [5, 'Csirke Burger', 1700, 'Rántott csirkemellfilé, saláta, majonéz', ['extras' => ['sajt' => 250, 'bacon' => 300, 'csemegeuborka' => 150]]],
            [5, 'Vega Burger', 1600, 'Grillezett camembert sajt, áfonyalekvár, rukkola', ['extras' => ['dio' => 200, 'extra sajt' => 250]]],
            [5, 'Gombás Burger', 1800, 'Húspogácsa, pirított gomba, füstölt sajt, majonéz', ['extras' => ['extra hus' => 600, 'bacon' => 300]]],
            [5, 'Tojásos Burger', 1850, 'Húspogácsa, tükörtojás, bacon, saláta, szósz', ['extras' => ['sajt' => 250, 'extra hagyma' => 150]]],
            [5, 'Monster Burger', 2800, 'Három húspogácsa, tripla bacon, tripla cheddar, hagymakarika', ['extras' => ['jalapeno' => 200, 'extra szosz' => 150]]],

            // Üdítő (category_id = 6)
            [6, 'Coca-Cola 0.5l', 600, 'Eredeti íz', null],
            [6, 'Coca-Cola Zero 0.5l', 600, 'Cukormentes verzió', null],
            [6, 'Fanta Narancs 0.5l', 600, 'Gyümölcsös narancsíz', null],
            [6, 'Sprite 0.5l', 600, 'Citrom-lime íz', null],
            [6, 'Kinley Tonic 0.5l', 600, 'Frissítő kesernyés íz', null],
            [6, 'Naturaqua Szénsavas 0.5l', 450, 'Természetes ásványvíz', null],

            // Jégkrém (category_id = 7)
            [7, 'Magnum Mandula', 900, 'Vanília jégkrém tejcsokoládéval és manduladarabokkal', null],
            [7, 'Magnum Classic', 900, 'Vanília jégkrém roppanós tejcsokoládéval', null],
            [7, 'Magnum Fehér Csoki', 900, 'Vanília jégkrém fehér csokoládé bevonattal', null],
            [7, 'Cornetto Csokoládé', 750, 'Csokis tölcséres jégkrém csokiöntettel', null],
            [7, 'Cornetto Eper', 750, 'Epres-vaníliás tölcséres jégkrém', null],
            [7, 'Ben & Jerry’s Cookie Dough 465ml', 2600, 'Vanília jégkrém süteménydarabkákkal', null],
            [7, 'Ben & Jerry’s Chocolate Fudge 465ml', 2600, 'Csokoládé jégkrém szaftos brownie darabokkal', null],
            [7, 'Calippo Citrom', 500, 'Frissítő citromos vizes jégkrém', null],
        ];

        $now = now();

        foreach ($products as [$categoryId, $name, $price, $description, $options]) {
            DB::table('products')->insert([
                'category_id' => $categoryId,
                'name'        => $name,
                'price'       => $price,
                'description' => $description,
                'image'       => null,
                'options'     => $options ? json_encode($options, JSON_UNESCAPED_UNICODE) : null,
                'created_at'  => $now,
                'updated_at'  => $now,
            ]);
        }
    }
}
