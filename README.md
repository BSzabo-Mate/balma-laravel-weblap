 Balma Laravel Weblap

Ez a projekt egy Laravel-alapú weboldal, amely a [Laravel](https://laravel.com) keretrendszert, a [Vite](https://vitejs.dev/) build eszközt és a [Laragon](https://laragon.org/) fejlesztői környezetet használja.  
Készült tanulási és fejlesztési célokra.

---

Telepítés lépései

1. Repository klónozása

```bash
git clone https://github.com/BSzabo-Mate/balma-laravel-weblap.git
cd balma-laravel-weblap

2. PHP csomagok telepítése
A backend telepítése Composer-rel:

bash
Kód másolása
composer install
3. JavaScript csomagok telepítése
A frontend (Vite, Vue/React/Bootstrap stb.) telepítése:

bash
Kód másolása
npm install
4. .env fájl létrehozása
A .env fájl tartalmazza a helyi beállításokat (adatbázis, APP_KEY, stb.).
A .env.example alapján készíts másolatot:

bash
Kód másolása
copy .env.example .env
Ezután szerkeszd meg a .env fájlt és add meg az adatbázisod adatait (pl. Laragon esetén, de xamp-nál ez lehet máshogy van, de lehet nem):

makefile
Kód másolása
DB_DATABASE=balma
DB_USERNAME=root
DB_PASSWORD=
5. Laravel kulcs generálása
bash
Kód másolása
php artisan key:generate
6. Adatbázis migrációk futtatása
bash
Kód másolása
php artisan migrate
Ha seed adatokat is használsz:

bash
Kód másolása
php artisan db:seed
7. Fejlesztői szerver indítása
Laravel szerver:

bash
Kód másolása
php artisan serve
Vite (frontend) szerver:

bash
Kód másolása
npm run dev
Nyisd meg az alkalmazást a böngészőben:
 http://localhost:8000

    Hasznos parancsok
Cél	Parancs
Cache ürítése	php artisan optimize:clear
Adatbázis újratelepítése	php artisan migrate:fresh --seed
Build készítése (éles környezet)	npm run build
Tesztek futtatása	php artisan test

 Mappa-struktúra
php
Kód másolása
├── app/              # Laravel backend kód
├── bootstrap/
├── config/
├── database/
├── public/           # Vite build ide kerül
├── resources/        # Blade view-k, JS, CSS
├── routes/
├── storage/
├── tests/
└── composer.json
 Fontos
Soha ne töltsd fel a .env fájlt nyilvánosan!

A vendor/, node_modules/, public/build/ mappák automatikusan kimaradnak a Git-ből (ezt a .gitignore kezeli).

Ha új gépre klónozod, mindig futtasd:

bash
Kód másolása
composer install
npm install
npm run dev

 Licenc
Ez a projekt szabadon felhasználható tanulási célokra, de tilos ellopni az ötletemet ;qq.

