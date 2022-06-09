# Assignment
Create web application for Slovak cities. Required list, detail.

## Setup

Install dependencies
```
npm install
```

Serve application
```
php artisan serve
```

## Technologies used
- Laravel
- Blade
- Bootstrap
- JQuery
- MySQL
- php, js

## Output
Screenshots:
 - [home](docs/homepage.png)
 - [city_detail](./docs/city_detail.png)

## Time schedule
| Úloha      | Strávený čas | Poznámky|
| ----------- | ----------- | ----------- |
| Setup      | 1 h       | Celkom dlho trvalo nastaviť všetky dependencies, ale verím, že je to všetko štandardne|
| č.1   | 3 h        | Tak trochu som si pomohol listom obcí (viď DataImport.php). Tá zložitejšia časť bolo vybrať dáta z toho nechutného layoutu. Myslím, že je to pomalé (check + create/update), ale celkom stabilné. |
| č.2   | -        | Pre zachovanie mentálneho zdravia nebudem ten dom viac otvárať. To som fakt spravil lepšie moj_prvy_web.html. |
| č.3   | -        | Nebol čas, nakoľko deadline je do piatka rána. Preto som vynechal aj všetky bonusy.
| č.4   | 4 h        | Šablóny som robil viacmenej spoločne. Najdlhšie trval header, footer. Začal som touto, takže hrubý odhad. |
| č.5   | 1 h        | Vysvetlené vyššie.|
| č.6   | 0 h        | Tak nejak som to spravil bez rozmýšľania, takže fakt netuším, možno pár minút.|
| č.7   | 0.5 h        | Lahôdka na záver. Úplne som si nebol istý, či si mám spraviť widget, alebo použiť vue. Nevzal som na to najväčšie kladivo, jquery + axios splnili účel.|
PS: Čo sa mi zdalo nie úplne bežné/v poriadku je okomentované priamo na mieste v kóde.

### Plán prác:

1. [4, 5] zostavenie blade sablon podla homepage.png / city_detail.png
2. [6] nastavit routy domov a /city/{id}
3. [1, 2] zostavit migracie pre jednotlive polia (chcel som indexovat podla mena obce, ale ocividne su minimalne dvoje abrahámovce, takze to chce index na meno obce s menom starostu...)
4. [1, 2] natiahnut si data (text + obrazky) pomocou parsera, zaobalit do prikazu data:import
5. [3] prikaz data:geocode, nova migracia na doplnenie modelu, vsetky existujuce zaznamy dostanu null (budeme simulovat, ze sa jedna o dorabku a klient ma uz data v databaze natiahnute)
6. [6] citycontroller
7. [7] search s vysledkami
