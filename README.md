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
- Look for by word-key, genre and date.
- Make an account (Username/Password/Email).
- Connect.
- Password forgotten (password reset).

Member :
- All the features of a Visitor, plus :
- Display a Watchlist.
- Add/Delete a movie to a Watchlist.
- Rate a movie.
- Disconnect.
- Change Password.
- Change Username.
- Change Email adress.

Admin :
- All the features of a Visitor and a Member, plus :
- Create/Update/Delete a movie.
- Create/Update/Delete a member.

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
