#Web Design Assistant
#Arhitectura
<ol>
<!-- first title -->
<li>
 <h1><b> Tehnologii utilizate </b></h1><br>
  <ul>
    <li>Protocolul utilizat pentru transmiterea datelor intre client (browser) si aplicatie este HTTP/HTTPS.</li>
    <li>Datele transmise vor fi in format JSON. </li>
    <li>Pentru client vom folosi : html, css, javascript .</li>
    <li>Pentru aplicatie vom folosi : PHP .</li>
  </ul>
</li>

<!--2nd title -->
<li>
<h2><b> Detalii de implementare </b></h2><br>

</li>
<!--3rd title -->
<li>
<h3><b> Modelarea datelor </b></h3><br>
  <p>
Adresa URL a site-ului ce va fi analizat, este introdusa de utilizator prin formularul pus la dispozitie pe pagina web. Aceasta va fi trimisa prin metoda “POST” catre aplicatia noastra care va analiza site-ul folosindu-se de diferite api-uri preluand datele in format JSON.<br> 
Daca adresa nu a mai fost testata anterior de acel client, rezultatul analizei va fi afisat clientului fara a fi salvat. In cazul in care un utilizator a mai testat acea pagina in trecut, acestuia i se va oferi optiunea de a alege una dintre cele trei metode de analiza : <br>
<ol>
<li> Recalcularea statisticilor ale paginii pentru starea in care era cand a fost testata anterior, acestea fiind afisate impreuna cu statisticile pentru pagina actuala </li>
<li> Analizarea paginii acutale si afisarea progresului (doar numarul de erori pentru pagina anterior testata nu si erorile) </li>
<li> Analizarea paginii actuale fara alte comparatii cu variante mai vechi</li>
</ol>
<br>
Pentru a avea datele unui variante anterioare a paginii aplicatia va folosi un serviciu oferit de alte aplicatii ce arhiveaza pagini web, cautand in functie de data la care utilizatorul a testat acea pagina in aplicatia oferita de noi.
<br>
Baza de date va consta intr-un singur tabel si va fi populat cu id-ul sesiunii, URL-ul analizat de utilizator, data la care a folosit serviciul nostru pentru fiecare site testat, cat si numarul de erori pentru cele trei tipuri de statistici si nota acordata.

  </p>

</li>

</ol>
