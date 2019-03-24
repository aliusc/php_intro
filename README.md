# NFQ akademija
NFQ akademijos paskaitos "PHP intro" namų darbas.

Namų darbas leidžia 4 funkcijas su vienodais parametrais:
<code>calculateHomeWorkSum(3, 2.2, '1')</code>.

## Parametro `int` atitikimo principai 
Yra du paremetru atitikimo principai
### weak_type
Aritmetiniams veiksmams atlikti PHP automatiškai konvertuoja parametrus į sveikus ar 
realiuosius skaičius. Jeigu skaičius yra sveikas, tai jis toks ir liks. Jeigu skaičius yra 
realusis (su kableliu), tai jam paliekama tik sveikoji dalis (neapvalinama). Jeigu skaičius
yra tekste, tuomet jis konvertuojamas pradedant iš kairės ir imama tiek skaitinių 
simbolių kol sutinkamas ne skaitinis simbolis. Tekstas netenkina `int` sąlygų tik
tuomet, jeigu jis nesikonvertuoja (ne skaičiais ar tarpais), yra objektas ar `null`.
Pilnesnė informacija [Scalar_types](https://wiki.php.net/rfc/scalar_type_hints_v5) 
(#Behaviour of weak type checks)

### strict_type
Tipo tikrinimas yra tiesioginis - tikrinamas kintamojo tipas, konversijos 
neatliekamos, o jam neatitikus iššauks klaidą.

## Funkcijų vykdymas ir rezultatas
Rodomas keturios eilutės su funkcija+namespace bei rezultatu:
* calculateHomeWorkSum(…$numbers); #po root namespace;
* calculateHomeWorkSum(…$numbers): int; #po Nfq\Akademija\Not_Typed namespace;
* calculateHomeWorkSum(int…$numbers): int; #po Nfq\Akademija\Soft namespace;
* calculateHomeWorkSum(int…$numbers): int; #po Nfq\Akademija\Strict namespace

Rezultatas (minimaliai formatuotas bei pašalintas DIR kelias):
```
calculateHomeWorkSum: 6.2
Nfq\Akademija\Not_Typed\calculateHomeWorkSum: 6
Nfq\Akademija\Soft\calculateHomeWorkSum: 6
<br />
<b>Fatal error</b>:  Uncaught TypeError: Argument 2 passed to Nfq\Akademija\Strict\calculateHomeWorkSum() must be of the type integer, float given, called in C:\PATH\php_intro\src\functions_strict.php on line 8 and defined in C:\PATH\php_intro\src\functions_strict.php:11
Stack trace:
* 0 C:\PATH\php_intro\src\functions_strict.php(8): Nfq\Akademija\Strict\calculateHomeWorkSum(3, 2.2, '1')
* 1 C:\PATH\php_intro\index.php(15): Nfq\Akademija\Strict\calculateHomeWorkSumFromOutside(3, 2.2, '1')
* 2 {main}

Next TypeError: Argument 3 passed to Nfq\Akademija\Strict\calculateHomeWorkSum() must be of the type integer, string given, called in C:\PATH\php_intro\src\functions_strict.php on line 8 and defined in C:\PATH\php_intro\src\functions_strict.php:11
Stack trace:
* 0 C:\PATH\php_intro\src\functions_strict.php(8): Nfq\Akademija\Strict\calculateHomeWorkSum(3, 2.2, '1')
* 1 C:\PATH\php_intro\index.php(1 in <b>C:\PATH\php_intro\src\functions_strict.php</b> on line <b>11</b><br />
```

### Pirmoji eilutė `root`
Pirmoji funkcija leidžiama iš `global` namespace. Funkcijos parametro tipas nėra 
aprašytas, todėl PHP juos verčiant į 
skaitinę ar realinę reikšmę pagal weak konversijas. Atsakymo tipas neaprašytas, tad jie tiesiog sudedami 
ir grąžinamas rezultatas.

Rezultatas 6.2

### Antroji eilutė `Not_Typed`
Antroji eilutė iš `Not_Typed` namespace reikalauja, kad grąžinamos funkcijos atsakymas
būtų `int` tipo. Jokios konversijos su skaitčiais nėra atliekamos (kaip ir ankstesnėje 
eilutėje). Dabar grąžinama suma (6.2) yra verčiama į `int` tipą (6).

Rezultatas 6

### Trečioji eilutė `Soft`
Trečioji eilutė iš `Soft` namespace reikalauja, kad grąžinamas funkcijos atsakymas
būtų `int` tipo. Nurodoma, kad funkcijos parametrai taip pat turi būti `int` tipo, todėl visi 
"skaičiai" prieš atliekant veiksmus su jais konvertuojami į `int` pagal weak konversijas. 
Atlikus aritmetiką grąžinama suma kuri jau ir taip atitiko `int` tipą.

Rezultatas 6

### Ketvirtoji eilutė `Strict`
Ketvirtoji eilutė iš `Strict` namespace reikalauja, kad parametrai ir grąžinamas 
funkcijos atsakymas būtų `int` tipo. 
Kreipinys į funkciją nukreipiamas per kitą funkciją, nes <b>strict parametras
galioja tik šiame faile</b>. 

Ši funkcija iššaukia klaidą dėl tipų neatitikimo: `TypeError: Argument 2 passed to Nfq\Akademija\Strict\calculateHomeWorkSum() 
must be of the type integer, float given` - nes antrasis parametras yra `float` tipo, po to seka klaida ir dėl trečiojo tipo, kuris yra `string`.
