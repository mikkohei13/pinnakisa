
# Käyttöohje

Kun kirjaudut ylläpitäjän (admin) tunnuksella, etusivun alaosassa näkyvät ylläpitäjän työkalut:

* Lisää uusi kisa
* Kaikki kisat (jolla muokataan olemassaolevia kisoja)
* Käyttäjät

## Lisää uusi kisa

### Perustiedot, jotka kannattaa täyttää kaikista kisoista:

* _Kisan nimi_: käytä nimeä joka yksilöi kisan riittävän tarkasti. Esim. "Yhdistyksen NN talvipinnakisa 2014-2015"
* _Lyhyt kuvaus_: etusivulla näkyvä kuvaus, joka kertoo lyhyesti mistä kisassa on kyse.
* _Alku- ja loppupäivämäärä_: Kisa-aika muodossa vvvvkkpp ... vvvvkkpp
* _Lisätieto-www-osoite_: osoite, jossa kerrotaan kisasta lisää. Esim. säännöt kannattaa laittaa tänne.
* _Kisan tila_:
** _luonnos_: näkyy vain ylläpitäjille
** _julkaistu_: näkyy kaikille, pinnoja voi tallentaa
** _arkistoitu_: näkyy kaikille, mutta pinnoja ei voi tallentaa

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




http://www.tringa.fi/ekopinnaskaba/
