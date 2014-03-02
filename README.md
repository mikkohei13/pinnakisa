
Pinnakisa
=========

Verkkopalvelu, johon voi perustaa (lintu)pinnakisoja. Käyttäjät voivat rekisteröityä, osallistua kisoihin ja tallentaa niihin pinnoja, sekä tarkastella reaaliaikaisia tuloksia ja tilastoja.

### Tekniset vaatimukset:

* PHP ja Codeigniter framework
* MySQL


Mikko Heikkinen 23.9.2013-

Dokumentaatiota:
---------------

### Kentän lisääminen osallistumiseen
-Lisää kenttä tietokantaan
-Lisää kenttä viewiin (huomaa että kentän nimi on tiedostossa kaksi kertaa)
-Määritä validointisäännöt controlleriin


### Tunnuksen luominen

Sähköpostiosoitetta ei aktivoida, koska
-Sähköposti vaaditaan joka tapauksessa, aktivointi vain varmistaisi sen oikeellisuuden
-Ion Authin aktivointitoiminto on hidas (usein >10 s)
-Oletuksena Ion Auth ei näytä ohjetta sähköpostiaktivoinnista; tämä pitäisi lisätä itse

### Muuta

Mikäli salasananpalautus antaa geneerisen ei onnistu -virheen, syynä voi olla että tunnus on muutettu epäaktiiviseksi, tai koska sitä ei ole vielä aktivoitu sähköpostilinkillä.

Tietokannan users-taulun remember_code-kohta tulee täytetyksi, jos käyttäjä kirjautuu sisään ja muista minut -chekbox on valittuna. Uloskirjautuminen ja checkboxin valinnan poistaminen ei poista koodia.

Perustuu / Based on
-------------------

* Codeigniter / http://ellislab.com/codeigniter / CODEIGNITER_LICENSE.txt 
* Ion Auth / http://benedmunds.com/ion_auth/ / Apache License v2.0 http://www.apache.org/licenses/LICENSE-2.0

Lisenssi / License
------------------
* [MIT License](LICENSE.md)
