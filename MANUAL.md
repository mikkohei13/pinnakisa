
# Käyttöohje

Kun kirjaudut ylläpitäjän (admin) tunnuksella, etusivun alaosassa näkyvät ylläpitäjän työkalut:

* Lisää uusi kisa
* Kaikki kisat (jolla muokataan olemassaolevia kisoja)
* Käyttäjät

## Lisää uusi kisa

### Perustiedot, jotka kannattaa täyttää kaikista kisoista:

* Kisan nimi: käytä nimeä joka yksilöi kisan riittävän tarkasti. Esim. "Yhdistyksen NN talvipinnakisa 2014-2015"
* Lyhyt kuvaus: etusivulla näkyvä kuvaus, joka kertoo lyhyesti mistä kisassa on kyse.
* Alku- ja loppupäivämäärä: Kisa-aika muodossa vvvvkkpp ... vvvvkkpp
* Lisätieto-www-osoite: osoite, jossa kerrotaan kisasta lisää. Esim. säännöt kannattaa laittaa tänne.
* Kisan tila:
** luonnos: näkyy vain ylläpitäjille
** julkaistu: näkyy kaikille, pinnoja voi tallentaa
** arkistoitu: näkyy kaikille, mutta pinnoja ei voi tallentaa

### Erikoistiedot, joita täytetään harvemmin

*Kilpailualueiden rajaus*

Palvelussa voi järjestää kahdenlaisia kisoja:

1. 'Tavallisia' pinnakisoja, joissa lintuharrastajat kisaavat toisiaan vastaan
2. Aluekisoja, joissa alueet kisaavat toisiaan vastaan

Kisan tyyppi valitaan kohdassa Kilpailualueiden rajaus. *Jätä tämä tyhjäksi jos lisäät tavallisen kisan*. Jos sen sijaan haluat lisätä aluekisan, kirjaa ensin tiedostoon application/controllers/includes/locationarray.php PHP-arrayhin ne alueet, joiden haluat olevan mukana kisassa. Tämän jälkeen alueet tulevat näkyville Kilpailualueiden rajaus -valikkoon, josta voit valita ne. 

*Vertailu aiempaan kisaan* (POISTUMASSA?)

Jos vastaava kisa on järjestetty aiemmin Jukka Koiviston (Suomenselän lintutieteellinen yhdistys) tekemällä pinnakisasovelluksella, voi pinnakisapalvelu näyttää kisaajalle hänen pinnamääränsä kehityksen kaaviona tänä vs. aiempana vuonna. Tämän aikaansaamiseksi pitää tehdä useampi asia:

1. Kirjaa tähän kenttään 'eko2013'.
2. Kirjaa jokaisen käyttäjän tietoihin hänen numeronsa aiemmassa kisasovelluksessa
3. Kirjaa tiedostoon application/config/database.php käyttäjätunnus, jolla on oikeudet käyttää aiemman kisasovelluksen tietokantaa




http://www.tringa.fi/ekopinnaskaba/
