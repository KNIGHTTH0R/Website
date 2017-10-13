# Website
[NOT FINISHED]Small website with option to display "articles", adding new articles and managing database (PHP,HTML,CSS,JS,AJAX).
Not touched since 25-04-2016

- login: rafal
- password: bernat
 + i've never created proper login system
- Uses bootstrap for responsive design
- Allows for changing between available languages (in "opcje" (options) - Polish is default)
- Allows for manipulation of database (adding, editing, removing data - in DB (Baza) section)
- Home page (glowna) contains articles that are stored in database (different from that one from DB)
 + Articles on home page wil show title, language, first 30 characters and option to display whole "Czytaj dalej" (using with AJAX)
 + Above "carousel" there are buttons to load next 5 articles (or previous 5)(using with AJAX)
- Contact (kontakt) contains just a placeholder
- Options (opcje) allows for changing language (PL is default but there is also ENG and GER [since there is no German translation "engine" will load English version and or available one]
- DB (baza) allows for:
 + Adding new "person" to database (data is validated before it is added to database) [imie, wiek, wyślij]
 + Viewing data stored in database with option to load more by pressing "nastepne 10 wznikow" or "poprzednie 10 wznikow" (yes i misspeled "wznikow" and it should be "wynikow")
 + Modifying existing data (data is validated before it is changed in database)
 + Removing existing data
 + "Dodaj artykul" will take you to form which will add article to "article database"
  >There's place for title, article, language option and submit button (wyslij)
 
