# mvc-movies (School Exercice)


PHP Website displaying Movies informations from an SQL database using MVC.

Rules :
- English only.
- Based on a MVC PHP website sample (https://github.com/gsylvestre/mvc-base).
- Must respect instructions given in brief-client.txt file.
- Must start from a specific database "movies_db.sql" (which can be modified).

(WARNING : To test this site, use "new_movies_db.sql", see "Installation")

Dependencies :
This site uses "abeautifulsite/simpleimage" (v2.6 installed with Composer)

# Features

Visitor :
- Consult a list of movies and obtain the details of a selected movie.
- Look for by word-key, genre and date. (NOT YET IMPLEMENTED : wordkey & date)
- Make an account (Username/Password/Email). (NOT YET IMPLEMENTED)
- Connect. (NOT YET IMPLEMENTED)
- Password forgotten (password reset). (NOT YET IMPLEMENTED)

Member :
- All the features of a Visitor, plus :
- Display a Watchlist. (NOT YET IMPLEMENTED)
- Add/Delete a movie to a Watchlist. (NOT YET IMPLEMENTED)
- Rate a movie. (NOT YET IMPLEMENTED)
- Disconnect. (NOT YET IMPLEMENTED)
- Change Password. (NOT YET IMPLEMENTED)
- Change Username. (NOT YET IMPLEMENTED)
- Change Email adress. (NOT YET IMPLEMENTED)

Admin :
- All the features of a Visitor and a Member, plus :
- Create/Update/Delete a movie. (NOT YET IMPLEMENTED)
- Create/Update/Delete a member. (NOT YET IMPLEMENTED)

# Installation

- Clone this repository in the folder of your choice
- Import the modified SQL database (new_movies_db.sql)
- Setup the "abeautifulsite" dependency in command line : composer require abeautifulsite/simpleimage
- Edit the app/config/config.php file (Parameters BASE_URL & Database connexion infos !)
- ???
- Enjoy !

# Special thanks :

- gsylvestre for the MVC PHP website sample (https://github.com/gsylvestre/mvc-base)
- startbootstrap.com for the free template (https://startbootstrap.com/template-overviews/4-col-portfolio/)


romwaldtff
