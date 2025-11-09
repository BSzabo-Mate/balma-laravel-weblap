<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumentáció</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body id="secondBody">
<div class="page">
    <aside class="sidebar">
        <div class="logo">
            <img src="{{ asset('logo.jpg') }}" alt="Logo" class="logo-img">
        </div>
        <a href="{{ route('tasks.index') }}" class="nav-btn">Vissza a főoldalra</a>
    </aside>

    <main class="content">
        <div class="doc-container">

            <h1>Főoldal dokumentáció</h1>
            <p>Ez a dokumentáció még csak egy sablon, ennél sokkal részletesebben be lesz mutatva minden, ez még a java scriptel bővülni fog.</p>
            <p>Én xamp-helyett laragon-t használtam és sqlite-ot.</p>

            <hr>

            <h2>To-Do lista</h2>
            <p>Egyszerű To-Do list, Név, Leírás, Dátum mezői vannak, viszont a nem változik még a dátum ha a naptárban másik napra lesznek áthelyezve.</p>
            <pre><code>
        // TaskController.php (részlet)
        public function store(Request $request)
        {
            Task::create([
                'title' => $request->title,
                'description' => $request->description,
                'due_date' => $request->due_date,
                'is_done' => false
            ]);
            return redirect()->route('tasks.index');
        }
        </code></pre>

            <h3>Feladat kipipálása</h3>
            <p>Ha a feladat checkbox-a be van jelölve, az <code>is_done</code> értéke <code>true</code>-ra változik, és a szöveg áthúzottan fog megjelenni.</p>
            <table class="table">
                <th colspan="2">
                    <h2 style="margin: auto">Naptár</h2>
                </th>
                <tr class="highlight">
                    <td>
                        <p>Bal oldalon található naptár. A naptár külön komponens, amely a <code>.calendar-section</code> osztályban található.</p>
                        <p>Itt a laravelnek egy félig előre elkészített naptárját használom, amit elég volt consolból betenem és utána már tudtam costumizálni</p></td>
                    <td>
                        <pre><code>
                            &lt;div class="calendar-section"&gt;
                            &lt;h2&gt;November 2025&lt;/h2&gt;
                            &lt;!-- ide jön majd a naptár kód --&gt;
                            &lt;/div&gt;
                        </code></pre>
                    </td>
                </tr>
            </table>

            <h2>Stílus (CSS)</h2>
            <p>A teljes kinézetet a <span class="code">resources/css/style.css</span> fájl határozza meg. A fő elrendezés a <code>flexbox</code> segítségével működik.</p>
            <p>A flexbox rendszert most használok előszőr "élesben" úgyhogy sokat néztem más modern felépítésű weboldalakat, meg itt használtam egy kevés ai-t hogy megértsem és megtaláljam ezt a funkciót amit keresek.</p>

            <pre><code>
        .main-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 30px;
        }
        </code></pre>

            <h2>Amit el szeretnék érni még ha lehet</h2>
            <img src="{{ asset('FőFileRendszer.png') }}" title="fileRendszer" alt="" class="kep">
            <ul>
                <li>Naptár bővítés, Heti nézet -> feadatok pontos beosztása</li>
                <li>Bejelentkezés, felhasználónként mentse az adatokat</li>
                <li>To-Do list bővebb testreszabása</li>
            </ul>

        </div>
    </main>
</div>

</body>
</html>
