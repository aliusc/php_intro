# NFQ akademija
NFQ akademijos paskaitos "PHP intro" namų darbas.

Namų darbas leidžia 4 funkcijas su vienodais parametrais:
<code>calculateHomeWorkSum(3, 2.2, '1')</code>.

###Parametro `int` atitikimo principai (weak_type)
Aritmetiniams veiksmams atlikti PHP automatiškai konvertuoja parametrus į sveikus ar 
realiuosius skaičius. Jeigu skaičius yra sveikas, tai jis toks ir liks. Jeigu skaičius yra 
realusis (su kableliu), tai jam paliekama tik sveikoji dalis (neapvalinama). Jeigu skaičius
yra tekste, tuomet jis konvertuojamas pradedant iš kairės ir imama tiek skaitinių 
simbolių kol sutinkamas ne skaitinis simbolis. Tekstas netenkina `int` sąlygų tik
tuomet, jeigu jis nesikonvertuoja (ne skaičiais ar tarpais), yra objektas ar `null`.
Pilnesnė informacija [Scalar_types](https://wiki.php.net/rfc/scalar_type_hints_v5) 
(#Behaviour of weak type checks)

###Parametro `int` atitikimo principai (strict_type)
Tipo tikrinimas yra tiesioginis - tikrinamas kintamojo tipas, konversijos 
neatliekamos, o jam neatitikus iššauks klaidą.

###Pirmoji eilutė
Pirmoji funkcija leidžiama iš `global` namespace. Funkcijos parametro tipas nėra 
aprašytas, todėl PHP juos verčiant į 
skaitinę ar realinę reikšmę pagal weak konversijas. Atsakymo tipas neaprašytas, tad jie tiesiog sudedami 
ir grąžinamas rezultatas.

###Antroji eilutė
Antroji eilutė iš `Not_Typed` namespace reikalauja, kad grąžinamos funkcijos atsakymas
būtų `int` tipo. Jokios konversijos su skaitčiais nėra atliekamos (kaip ir ankstesnėje 
eilutėje). Dabar grąžinama suma (6.2) yra verčiama į `int` tipą (6).

###Trečioji eilutė
Trečioji eilutė iš `Soft` namespace reikalauja, kad grąžinam funkcijas atsakymas
būtų `int` tipo. Nurodoma, kad funkcijos parametrai turi būti `int` tipo, todėl visi 
"skaičiai" prieš atliekant veiksmus su jais konvertuojami į `int`. 
Atlikus aritmetiką grąžinama suma kuri jau ir taip atitiko `int` tipą.

###Ketvirtoji eilutė
Ketvirtoji eilutė iš `Strict` namespace reikalauja, kad parametrai ir grąžinamas 
funkcijas atsakymas būtų `int` tipo. 
Kreipinys į funkciją nukreipiamas per kitą funkciją, nes <b>strict parametras
galioja tik šiame faile</b>. 

Ši funkcija iššaukia klaidą dėl tipų neatitikimo: `TypeError: Argument 2 passed to Nfq\Akademija\Strict\calculateHomeWorkSum() must be of the type integer, float given` - nes antrasis parametras yra float tipo
