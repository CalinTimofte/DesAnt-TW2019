<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<project>
    <div id="body" style="text-align: center">
    <span typeof="schema:Person" resource="http://orcid.org/0000-0003-1279-3709">
        <meta property="schema:givenName" content="Bianca">
        <meta property="schema:familyName" content="Chirica">
          <span property="schema:name">Chirica Bianca</span>
      </span> </br>

      <span typeof="schema:Person" resource="http://orcid.org/0000-0003-1279-3709">
        <meta property="schema:givenName" content="Calin">
        <meta property="schema:familyName" content="Timofte">
          <span property="schema:name">Timofte Calin</span>
      </span> </br>

      <span typeof="schema:Organization" resource="https://www.info.uaic.ro/">
        <span property="schema:name"><a href="https://www.info.uaic.ro/"><infoiasi>Facultatea de Informatica Iasi</infoiasi></a></span>
      (<span property="schema:location" typeof="schema:Place">
        <span property="schema:address" typeof="schema:PostalAddress">
          <span property="schema:addressLocality">Iasi</span>,
          <span property="schema:addressRegion">IS</span>,
          <span property="schema:addressCountry">Romania</span>
        </span>
      </span>)
    </span> </body>  </br>

      <article resource="#" typeof="schema:ScholarlyArticle">
        <header>
          <web><h1 property="schema:name">Web Design Assistant</h1></web>
          <p role="doc-subtitle" property="schema:alternateName">
            DesAnt
          </p>
        </header>
        <meta property="schema:accessibilityFeature" content="alternativeText">
        <meta property="schema:accessibilityFeature" content="MathML">
        <meta property="schema:accessibilityHazard" content="noFlashingHazard">

        <p>
            Am inceput proiectul cu partea de front-end, unde am creeat doua viewuri semnificative, index-ul proiectului, unde se introduce linkul
            catre site-ul ce este inspectat si view-ul cu statisticile efective.
        </p>

        
        <p>
               Dupa am modelat si am construit baza de date unde stocam accesarile in apelatia noastre, pentru a servi mai tarziu utilizatorilor
            serviciul de a compara versiunea actuala a site-ului cu statisticile din trecut.
            Exista un fisier de configurare pentru baza de date si un model in care, avand un singur tabel (deci nicio relatie de reprezentat) am definit
            conexiunea la baza de date.
        </p>

           
        <p>
                In fisierul dbinteraction, avem functionalitati pentru a verifica daca un link este prezent in baza de date, cate intrari sunt pentru acesta,
            salvarea unei intrari noi si recuperarea unei intrari din baza de date (un select).
        </p>

        <p>
            In folderul ApiCalls se afla diversele Controllere, in general pentru apeluri API. Sunt 3 fisiere, Code Quality, Design si Performance
            in care am construit clase pentru a apela API-urile folosite in aplicatia noastra si functionalitatile din jurul lor (calcularea numarului
            de erori si asocierea unei note).

            In afara folderului, se gaseseste controllerul Comparator, ce contine logica pe care am implementat-o pentru a compara doua intrari ale aceluiasi
            site (in functie de note).

        </p>

        <p>
            In indexMain se leaga toata logica (teoretic e un sistem de rutare, dar e mai mult ca un controller principal deoarece de aici se apeleaza
            toate functionalitatile relevante).
        </p>

        <p>
            Am lucrat cu Github si Trello, Trello a fost util pentru a tine evidenta tuturor taskurilor si a imparti sarcinile si Github ne-a fost
            de folos, deoarece dupa fiecare update relevant al aplicatiei am putut sa avem acces la codul nou si sa lucram simultan pe versiuni
            up-to-date ale aplicatiei.
        </p>
    </article>

</project>
</div>
</body>
</html>
