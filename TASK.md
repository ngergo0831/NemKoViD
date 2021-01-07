A Nemzeti Koronavírus Depó (NemKoViD - Mondj nemet a koronavírusra!) központi épületében különböző időpontokban oltásokat szervez. Feladatod egy olyan webes alkalmazás készítése PHP segítségével, ahol a koronavírus elleni oltásra lehet időpontot foglalni.

## Feladatok

### Listaoldal

- A *listaoldalon*, avagy a *főoldalon* statikus szöveggel jelenjen meg egy cím és egy rövid tájékoztatás.
- A főoldalra elérhető azonosítatlan felhasználók számára, akik szabadon tudják böngészni a rendelkezésre álló időpontokat és foglaltsági adataikat (ld. lejjebb).
- A foglaló rendszerben eleve adott pár időpont: melyik napon, milyen időpontban, hány embert tudnak fogadni.
- A listaoldalon legyenek kilistázva az adott hónapban meghirdetett időpontok "nap, időpont, szabad hely/összes hely" formában (pl. 2021.01.22. 15:00 3/5 szabad hely).
- A szabad időpontok legyenek zöldek (szöveg, háttér, keret vagy egyéb stílusjeggyel), a már betelt időpontok legyenek pirosak.
- A táblázat alatt legyen két link: az egyikkel az előző, a másikkal a következő hónapot lehet kilistázni.
- Minden időpontnál legyen egy "Jelentkezés" hivatkozás.
- Ha nem vagyunk bejelentkezve, akkor a "Jelentkezés"-re kattintva a belépő oldalra jutunk.

### Hitelesítési oldalak

- A főoldalról legyen lehetőség elérni a bejelentkező és regisztrációs oldalt.

- **Regisztráció** során meg kell adni a teljes nevet, a TAJ számot, az értesítési címet, az email címet és a jelszót kétszer.

  - Teljes név: kötelező
  - TAJ szám: kötelező, 9 hosszú, csak számokból áll, pl. 123456789
  - Értesítési cím: kötelező
  - Email: kötelező, egyedi, email formátumú
  - Jelszó: kötelező
  - Jelszó megerősítése: kötelező, meg kell egyeznie a jelszóval

  Hiba esetén a hibaüzeneteket jelenítsd meg! Az űrlap legyen állapottartó! Sikeres regisztráció után kerüljünk a bejelentkező oldalra!

- A **bejelentkező oldalon** az email címmel és jelszóval tudjuk azonosítani magunkat:

  - Email: kötelező, egyedi, email formátumú
  - Jelszó: kötelező

  A bejelentkezési hibát az űrlap fölött jelezd! Sikeres belépés után kerüljünk a listaoldalra!

### Jelentkezés részletei

- Bejelentkezve a "Jelentkezés" gombra kattintva az adott időpontot részletező oldalra jutunk. Itt ki kell írni a dátumot, az időpontot, meg kell jeleníteni a bejelentkezett felhasználó nevét, lakcímét és TAJ számát, majd be kell pipálni egy jelölőmezőt, miszerint az időpontra jelentkezéssel elfogadjuk a jelentkezés feltételeit (pl. hogy kötelező megjelenni, vagy lehetnek az oltásnak mellékhatásai). Ekkor egy "Jelentkezés megerősítése" gombra kattintva a rendszer rögzíti az adott időponthoz a nevünket. Ha a jelölőmező nincs kitöltve, akkor ezt hibaüzenetként jelezd az oldalon! Sikeres jelentkezés után egy külön oldalra kerülünk, ahol kiírjuk, hogy a jelentkezés sikeres.

### Ha már van időpontunk foglalva, ...

- ... akkor a listaoldalon fent nagy betűkkel ki kell írni, hogy mikorra szól a foglalásunk (lefoglalt időpont adatai).
- ... a listaoldalon a lefoglalt időpont adatai alatt egy gomb jelenik meg, amelyre kattintva lemondhatjuk a jelentkezést. Ekkor a listaoldalon megint csak a lista látszik.
- ... akkor a listaoldalon a listában az egyes időpontok mellől hiányzik a "Jelentkezés" link.

### Admin funkciók

- Legyen egy speciális felhasználó, az **admin** (email: <admin@nemkovid.hu>, jelszó: admin), aki két dolgot tud csinálni:

  - Az időpont részletei oldal (ahol jelentkezni lehet) alján megjelenik egy lista az arra az időpontra jelentkező felhasználókról: név, TAJ, email cím adattartalommal.

  - A listaoldalon jelenjen meg egy link "Új időpont meghirdetése" felirattal. Erre kattintva egy külön oldalon új időpont felvitele lehetséges:

    - Dátum: kötelező, valid dátum
    - Időpont: kötelező, valid időpont
    - Helyek száma: kötelező, szám

    Az esetleges hibákat írd ki az oldalon! Az űrlap legyen állapottartó! Siker esetén az új időpontot el kell menteni, és a listaoldalra visszairányítani a böngészőt. Ezt az oldalt csak az admin felhasználó érheti el!

### Plusz funkciók

- A listaoldalon jelenítsd meg az adott hónap időpontjait **naptár formában**. Hetek sorokban, oszlopok hétfőtől vasárnapig, és egy napon belül pedig fel lehet sorolni az időpontokat. Jelentkezés gomb nem kell, ilyenkor az időpontra kattintva lehet a jelentkezést kezdeményezni.
- Ha a listaoldalon vendégként kattintottunk egy adott időpont melletti Jelentkezés gombra, akkor a bejelentkezés után ne a listaoldalra, hanem az adott időpont oldalára kerüljünk! Technikai segítség: ezt az információt általában az URL-ben szokták megőrizni a bejelentkező oldalon, de használható erre a munkamenet is.
- A listaoldalon a naptár lapozását AJAX-szal oldd meg, azaz a teljes oldal újratöltése nélkül!
- A regisztrációs űrlapon és az új időpont meghirdetésénél a hibaüzeneteket az űrlapmezők mellett jelenítsd meg!

## További elvárások és segítség

Fontos az **igényes megjelenés**. Ez nem feltétlenül jelenti egy agyon csicsázott oldal elkészítését, de azt igen, hogy 1024x768 felbontásban az oldal jól jelenjen meg. Ehhez lehet minimalista designt is alkalmazni, lehet különböző háttérképekkel és grafikus elemekkel felturbózott saját CSS-t készíteni, de lehet bármilyen CSS keretrendszer segítségét is igénybe venni.

Az űrlapok `<form>` eleminek attribútumai közé vegyük fel a `novalidate` attribútumot is, hogy kikapcsoljuk a böngésző validálását!

<form action="" novalidate>
</form>

A feladatban kétféle adat van: időpontok és felhasználók. Ez a kétféle adat hivatkozik egymásra, hiszen egy időpontnál tárolni kell, hogy kik jelentkeztek már rá, és egy felhasználónál (opcionálisan, mert máshogy is megoldható) tárolni lehet, hogy melyik időpontot választotta. Amikor kétféle adat egymásra hivatkozik, akkor ezt az információt el kell tárolni az adatai között. Pl. az időpontoknál a jelentkezett felhasználók egy tömbben lesznek, a tömb egyes elemeiként eltárolhatnánk a felhasználónevet, email címet, stb, de ezek helyett érdemes a felhasználó azonosítóját eltárolni, hiszen az biztosan egyedi a felhasználóra nézve. Az azonosító alapján pedig gyorsan kikereshető a felhasználók közül az adata. Pl.

$users = [
  'userid1' => [
    'id'        => 'userid1',
    'username'  => 'user1',
    'email'     => 'email1',
  ],
  'userid2' => [
    'id'        => 'userid2',
    'username'  => 'user2',
    'email'     => 'email2',
  ],
];
$appointments = [
'appid1' => [
'id' => 'appid1',
'time' => '2021-01-04 15:00',
'users' => [
'userid2',
],
]
];

## A fejlesztés lépésekre bontása

Szeretnénk azoknak is segítséget nyújtani, akiknek nehezebb egy nagyobb feladatot átlátni, megtervezni. Lehet az egész feladatot előre megtervezni, és utána fejleszteni, de az alábbi lépések kisebb részfeladatok megoldásánál is használhatók:

1.  Készítsd el a fejlesztendő alkalmazás **statikus HTML prototípusát**! Azaz első lépésben csak HTML és CSS segítségével tervezd a listaoldalt, a jelentkezés részletei oldalt, a sikeres jelentkezés oldalt, az új időpont oldalt, stb. Vannak olyan oldalak, ahol vannak feltételes információk, mint pl. a listaoldalon a jelentkezett időpont, vagy a jelentkezés részletei oldalon a jelentkezett emeberek adatai. Ezeket is tervezd meg, majd később PHP-val eltünteted. A CSS-t is ki tudod próbálni statikusan, pl. a listaoldalon, hogy zöld vagy piros-e egy időpont, ezt statikusan beégetheted. Az egyes oldalak linkekkel kötheted össze.
2.  Gondold át, hogy milyen **adatok**ra lesz szükséged. Mit kell tárolni, azokban milyen mezőket?
    - Hol tárolod a felhasználókat?
    - Hol tárolod az időpontokat?
    - Hogyan tárolod azt, hogy melyik időpontokra mely felhasználók jelentkeztek? (pl. ezt az információt lehet az egyes időpontoknál tárolni)
3.  Gondold át, hogy az előbb átgondolt adatszerkezetekből hogyan tudod az oldalaid számára a **megfelelő adatokat kinyerni**? Készíts ezekhez egy-egy függvényt, de sokkal jobb, ha ezeket az adott Storage osztály metódusaiként implementálod.
    - Hogy kapod vissza egy hónaphoz az időpontokat?
    - Honnan tudod, hogy jelentkeztél-e már?
    - Egy adott időponthoz tartozó felhasználók?
    - stb.
4.  **Űrlapok**nál két utat kell bejárni:
    - siker esetén mi történjen
    - hibát hogyan érzékelem, hogyan jelenítem meg, hogyan lesz űrlap állapottartó.

## Pontozás

A feladat megoldásával 20 pont szerezhető. Vannak minimum elvárások, melyek teljesítése nélkül a beadandó nem elfogadható. A plusz feladatokért további 5 pont szerezhető. Azaz ha valaki mindent megcsinál a beadandóra 25 pontot kaphat.

## További elvárások

- Az elkészült feladatot tömörítve, az összes szükséges állománnyal, illetve a program gyökérmappájában elhelyezett `README.md` fájllal együtt legkésőbb a határidőig kell feltölteni a Canvas rendszerbe.

- A megvalósításához NEM használható semmilyen keretrendszer, külső PHP függvénykönyvtár. Csak CSS keretrendszerek használhatók.

A megfelelően kitöltött `README.md` fájl nélkül a megoldást nem fogadjuk el!
