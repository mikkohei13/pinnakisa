
Pinnakisa
=========

Verkkopalvelu, johon voi perustaa (lintu)pinnakisoja. Käyttäjät voivat rekisteröityä, osallistua kisoihin ja tallentaa niihin pinnoja, sekä tarkastella reaaliaikaisia tuloksia ja tilastoja. Esimerkki: http://www.tringa.fi/kisa/ 

Web service for managing, publishing and participating to (bird) tick contests. Example site: http://www.tringa.fi/kisa/

### Tekniset vaatimukset:

* PHP
* Codeigniter framework
* Ion Auth plugin (sisältyy tähän repositoryyn)
* MySQL

Dokumentaatiota:
---------------

*[Käyttöohje](MANUAL.md)*

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

Käyttö / Usage
--------------

Voit joko asentaa ohjelmiston itse, tai pyytää päästä käyttämään valmiiksi asennettua versiota <hawk(ät)biomi.org>

You can install the system by yourself, or ask to use it as a service <hawk(ät)biomi.org>.

### Asennus
* Hanki ja asenna Codeigniter
* Kopioi tämän repositoryn tiedostot Codeigniterin kanssa samaan hakemistoon
* Luo tyhjä tietokanta ja sille käyttäjä kaikin oikeuksin.
* Luo ja populoi tietokantataulut. Taulujen tiedot ovat hakemistossa application/sql/ Käytä etuliitettä taulujen nimissä, jos käytätä samaa tietokantaa jonkin toisen palvelun kanssa (esim "kisa_").
* Päivitä omat tietosi application/config -hakemiston tiedostoihin
1. database.php: tietokannan tiedot
2. mail.php: postipalvelimen tiedot
3. config.php: encryption key


Lisenssit / Licenses
--------------------
* [MIT License](LICENSE.md) / 
Mikko Heikkinen/biomi.org 23.9.2013-

* Codeigniter / http://ellislab.com/codeigniter / CODEIGNITER_LICENSE.txt 
* Ion Auth / http://benedmunds.com/ion_auth/ / Apache License v2.0 http://www.apache.org/licenses/LICENSE-2.0
