
Pinnakisapalvelu
================

Sovellus ja verkkopalvelu, johon voi perustaa (lintu)pinnakisoja. Käyttäjät voivat rekisteröityä, osallistua kisoihin ja tallentaa niihin pinnoja, sekä tarkastella reaaliaikaisia tuloksia ja tilastoja. Esimerkki: http://www.tringa.fi/kisa/ 

Web app and a service for managing, publishing and participating to (bird) tick contests. Example site: http://www.tringa.fi/kisa/ You can install the system by yourself, or ask to use it as a service <hawk(ät)biomi.org>.

* [Käyttöohje](MANUAL.md)
* [API (rajapinta)](API.md)
* [Kuvakaappauksia](docs/screencaptures.md)

### Tekniset vaatimukset:

* PHP
* Codeigniter framework
* Ion Auth plugin (sisältyy tähän repositoryyn)
* MySQL

Käyttö
------

Voit joko asentaa ohjelmiston itse, tai pyytää päästä käyttämään valmiiksi asennettua versiota <hawk(ät)biomi.org>

### Asennus
1. Hanki ja asenna Codeigniter
2. Kopioi tämän repositoryn tiedostot Codeigniterin kanssa samaan hakemistoon
3. Luo tyhjä tietokanta ja sille käyttäjä kaikin oikeuksin.
4. Luo ja populoi tietokantataulut. Taulujen tiedot ovat hakemistossa application/sql/ Käytä etuliitettä taulujen nimissä, jos käytät samaa tietokantaa jonkin toisen palvelun kanssa (esim "kisa_").
5. Päivitä omat tietosi application/config -hakemiston tiedostoihin
	1. database.php: tietokannan tiedot
	2. mail.php: postipalvelimen tiedot
	3. config.php: encryption key
6. Rajoita tietokantakäyttäjän oikeudet: vain luku ja kirjoitusoikeudet tarvitaan


Lisenssit / Licenses
--------------------
* [MIT License](LICENSE.md) / 
Mikko Heikkinen/biomi.org 23.9.2013-
* Codeigniter / http://ellislab.com/codeigniter / CODEIGNITER_LICENSE.txt 
* Ion Auth / http://benedmunds.com/ion_auth/ / Apache License v2.0 http://www.apache.org/licenses/LICENSE-2.0


TODO
----

Parannusmahdollisuuksia:

SHOULD:
* Pinnojen poistotoiminto admineille
* Yhteystietojen katselutoiminto admineille
* Osallistumisen poisto / roskakorittaminen
* Estetään tallennus päivämäärillä, jotka ovat kisa-ajan ulkopuolella
* Kisan tietoihin päivämäärät näkyviin suomalaisessa formaatissa p(p).k(k).vvvv
* Käyttäjälle jonkinlainen mahdollisuus piilottaa rarit tallennuslomakkeelta
* Tekstimuutos: Väliaikaisesti suljettu -> Tunnus on suljettu väliaikaisesti liian monen epäonnistumisen kirjautumisen takia. Yritä uudelleen X minuutin kuluttua.

NICE:
* Siistimmän näköiset error/success-ilmoitukset
* Mahdollisuus sallia kisaan vain yksi osallistuminen per kisa
* Helpompi linkitys tulokset <-> osallistumislomake
* tunnus luotu -> vahvistus infomessage
* infomessage-tyylit puuttuvat
* pienennä infomessage-fonttia





