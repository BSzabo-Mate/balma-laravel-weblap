 Balma Laravel Weblap

Ez a projekt egy Laravel-alapú weboldal, amely a [Laravel](https://laravel.com) keretrendszert, a [Vite](https://vitejs.dev/) build eszközt és a [Laragon](https://laragon.org/) fejlesztői környezetet használja.  
Készült tanulási és fejlesztési célokra.

---

Telepítés lépései
Én laragon virt. szervert használtam, nagyon hasonló az xampp-hez de nem tudom vannak e eltérések
```bash
1. Repository klónozása

git clone https://github.com/BSzabo-Mate/balma-laravel-weblap.git
cd balma-laravel-weblap

2. PHP csomagok telepítése
A backend telepítése Composer-rel:
composer install

3. JavaScript csomagok telepítése
A frontend (Vite, Vue/React/Bootstrap stb.) telepítése:
npm install

4. .env fájl létrehozása
A .env fájl tartalmazza a helyi beállításokat (adatbázis, APP_KEY, stb.).
A .env.example alapján készíts másolatot:
copy .env.example .env

Ezután szerkeszd meg a .env fájlt és add meg az adatbázisod adatait, elméletileg csak ki kell szedni a #-et a következők elöl (pl. Laragon esetén, de xamp-nál ez lehet máshogy van, de lehet nem):
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

5. Laravel kulcs generálása
php artisan key:generate

6. Adatbázis migrációk futtatása
php artisan migrate

Ha seed adatokat is használsz:
php artisan db:seed
7. Fejlesztői szerver indítása
Laravel szerver:
php artisan serve
url: a-projekt-neve.test (balma-laravel-projekt.test)

    Hasznos parancsok
Cache ürítése	php artisan optimize:clear
Adatbázis újratelepítése	php artisan migrate:fresh --seed

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

A vendor/, node_modules/, public/build/ mappák automatikusan kimaradnak a Git-ből (ezt a .gitignore kezeli).

Ha új gépre klónozod, mindig futtasd:

bash
Kód másolása
composer install
npm install
npm run dev

 Licenc
Ez a projekt szabadon felhasználható tanulási célokra, de tilos ellopni az ötletemet ;qq.

