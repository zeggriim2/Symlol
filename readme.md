# SymLol
Dépot : site de statistique global de League Of Legends. Vérification de votre Summoner.
Repository: League Of Legends global statistics website. Check your Summoner.

------
### Version des différents outils utilisé.

PHP >=8.0,
YARN 1.14,
NODE 14.17(LTS à ce jour), 
BOOTSTRAP 5

------
### Fonctionnalité

* Listing des champions du jeux (/champions) : 
  * Statistique de chaque champions 
  * Listing des Skins du champions
  * Carrousel de Skins vendu sur chaque champion
* Ranking d'un joueur
* Invocateur : 
  * Affichage de la league rattaché par l'invocateur
  * Infos de l'invocateur
* Ajout d'une rubrique de suggestion d'idée sur la platform

------
### Register

Lors de l'inscription, des constraints de Validation on été créé et mise en place.

* Summoner League Of Legends :
    * Ne doit pas être vide
    * Doit être de type string
    * Création d'une Validator pour savoir si le "Summoner" existe pour la platform choisie.
* Platform :
    * Ne doit pas être vide
* Email :
    * Ne doit pas être vide
    * Vérifie si cela est bien un email renseigné
* Password :
    * Doit contenir 6 caractères
    * Ne doit pas être vide
    
![register](https://user-images.githubusercontent.com/51760726/140040440-e74ea107-db4f-4157-8594-1adaf0b5b454.png)

------

### Visuel
![dashboard statistique](https://user-images.githubusercontent.com/51760726/127852433-3fb22009-8047-4984-b23f-363f49350b63.PNG)