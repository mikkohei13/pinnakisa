
# Käyttöohjeita

Kun kirjaudut ylläpitäjän (admin) tunnuksella, etusivun alaosassa näkyvät ylläpitäjän työkalut:

* Lisää uusi kisa
* Kaikki kisat (jolla muokataan olemassaolevia kisoja)
* Käyttäjät

## Lisää uusi kisa

### Perustiedot, jotka kannattaa täyttää kaikista kisoista:

* _Kisan nimi_: käytä nimeä joka yksilöi kisan riittävän tarkasti. Esim. "Yhdistyksen NN talvipinnakisa 2014-2015"
* _Lyhyt kuvaus_: etusivulla näkyvä kuvaus, joka kertoo lyhyesti mistä kisassa on kyse. Tähän voi kirjoittaa HTML:aa, esim. lihavointeja ja kuva-tageja.
* _Alku- ja loppupäivämäärä_: Kisa-aika muodossa vvvvkkpp ... vvvvkkpp
* _Lisätieto-www-osoite_: osoite, jossa kerrotaan kisasta lisää. Esim. säännöt kannattaa laittaa tänne.
* _Kisan tila_:
	* _luonnos_: näkyy vain ylläpitäjille
	* _julkaistu_: näkyy kaikille, pinnoja voi tallentaa
	* _arkistoitu_: näkyy kaikille, mutta pinnoja ei voi tallentaa

### Erikoistiedot, joita täytetään harvemmin

__Kilpailualueiden rajaus__

Palvelussa voi järjestää kahdenlaisia kisoja:

1. 'Tavallisia' pinnakisoja, joissa lintuharrastajat kisaavat toisiaan vastaan
2. Aluekisoja, joissa alueet kisaavat toisiaan vastaan

Kisan tyyppi valitaan kohdassa Kilpailualueiden rajaus. *Jätä tämä tyhjäksi jos lisäät tavallisen kisan*. Jos sen sijaan haluat lisätä aluekisan, kirjaa ensin tiedostoon application/controllers/includes/locationarray.php PHP-arrayhin ne alueet, joiden haluat olevan mukana kisassa. Tämän jälkeen alueet tulevat näkyville Kilpailualueiden rajaus -valikkoon, josta voit valita ne. 

__Vertailu aiempaan kisaan (POISTUMASSA?)__

Jos vastaava kisa on järjestetty aiemmin Jukka Koiviston (Suomenselän lintutieteellinen yhdistys) tekemällä pinnakisasovelluksella, voi pinnakisapalvelu näyttää kisaajalle hänen pinnamääränsä kehityksen kaaviona tänä vs. aiempana vuonna. Tämän aikaansaamiseksi pitää tehdä useampi asia:

1. Kirjaa tähän kenttään 'eko2013'.
2. Kirjaa jokaisen käyttäjän tietoihin hänen numeronsa aiemmassa kisasovelluksessa
3. Kirjaa tiedostoon application/config/database.php käyttäjätunnus, jolla on oikeudet käyttää aiemman kisasovelluksen tietokantaa


## Toimintalogiikkaa

Kisan tiedoissa oleva päivämäärä ei (vielä) vaikuta pinnojen tallentamiseen. Pinnoja voi tallentaa kisa-ajan ulkopuolelta. Ylläpidon on syytä tarkkailla ettei kukaan tee näin; tällaiset pinnat näkyvät kertymäkaaviossa.

Kisa ei sulkeudu automaattisesti kisa-ajan umpeuduttua. Kisa pitää käydä säätämässä käsin arkistoitu-tilaan sitten kun osallistujilla on ollut riittävästi aikaa tallentaa viimeiset pinnansa. (Aikaraja kannattaa kirjata kisan tietoihin tai sääntöihin.)

Yksi henkilö voi osallistua samaan kisaan useita kertoja (MUUTTUMASSA?). Näin aluekisoissa voi kisata useilla alueilla ja ekopinnakisoissa esim. kotoa ja mökiltä erikseen. (_Kisan säännöissä määritellään saako näin tehdä._)

Kisaan voi osallistua joukkueena kirjaamalla kaikkien joukkuueen jäsenten nimet osallistumislomakkeen nimikenttään. (_Kisan säännöissä määritellään voiko joukkueena osallistua._) Tämän takia kisaan osallistuttaessa pitää oma nimi korjata osallistumislomakkeelle, vaikka se on kirjattu jo käyttäjätietoihin.


## Ylläpitotoimia

Jos joku kirjaa oletettavasti virheellisen pinnan (väärä päivämäärä, epäilyttävän harvinainen laji), kannattaa häneen ensin ottaa yhteyttä sähköpostitse ja kysyä lisätietoja tai pyytää korjaamaan pinna itse. Jos vastausta ei kuulu, pinnan voi korjata suoraan tietokannassa. (Vähäisen tarpeen takia (n. 1 / vuosi) tähän ei ole työkalua.)

Yhden pinnan poistaminen

1. Etsi korjattava osallistuminen taulusta kisa_participations
2. Muuta seuraavat kentät:
	* ticks_day_json: vähennä pinnamäärää yhdellä virheellisen havainnon päivämäärn kohdalta 
	* species_json: poista laji ja sen havaintopäivämäärä
	* species_count: vähennä kokonaislajimäärää yhdellä
3. Testaa tulospalvelusta että kokonaislajilista ja kertymäkaavio näyttävät oikeilta


## Dokumentaatiota:

### Kentän lisääminen osallistumiseen
-Lisää kenttä tietokantaan
-Lisää kenttä viewiin (huomaa että kentän nimi on tiedostossa kaksi kertaa: name ja value)
-Määritä validointisäännöt controlleriin

### Tunnuksen luominen

Sähköpostiosoitetta ei aktivoida, koska
-Sähköposti vaaditaan joka tapauksessa, aktivointi vain varmistaisi sen oikeellisuuden
-Ion Authin aktivointitoiminto on hidas (usein >10 s)
-Oletuksena Ion Auth ei näytä ohjetta sähköpostiaktivoinnista; tämä pitäisi lisätä itse

### Muuta

Mikäli salasananpalautus antaa geneerisen ei onnistu -virheen, syynä voi olla että tunnus on muutettu epäaktiiviseksi, tai koska sitä ei ole vielä aktivoitu sähköpostilinkillä.

Tietokannan users-taulun remember_code-kohta tulee täytetyksi, jos käyttäjä kirjautuu sisään ja muista minut -chekbox on valittuna. Uloskirjautuminen ja checkboxin valinnan poistaminen ei poista koodia.

