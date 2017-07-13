# e-lab

1-Instalation Laravel(optionnel)
https://laravel.com/docs/5.4

2-pour accéder au partie privé de l'application suivi les instruction suivantes:

   - si vous deployez l'application avec le serveur de laravel 
      * Laravel est équipé d’un serveur sommaire pour le développement qui se lance avec cette commande : 
         (dans le repértoire qui contient le projet laravel)
        php artisan serve
      * puis On y accède à cette adresse : http://localhost:8000/login.
         (Mais évidemment pour que ça fonctionne il faut que vous ayez PHP installé).
   - si vous deployez l'application avec le serveur Wampserver
      http://localhost/projet/public/login  

2-Modifier mot de passe admin ( OBLIGATOIRE )
   apres la commande migrate un admin par defaut pret a l'utiliser : 
    email :admin@example.com
    mot de passe :admin
   -visiter la rubrique Parametres 
   -puis cliquer sur la boutonne changer mot de passe.

3-modifier le fichier projet/.env (OBLIGATOIR pour la récupération de mot de passe )
   -entrer l'username dans l'attribut MAIL_USERNAME
    (votre email ou bien créer un email spécifique pour l'application, 
                      pour qu'elle puisse envouyer l'email de recupération )
     exemple:
       MAIL_USERNAME=mail@gmail.com.
   -entrer le mot de passe de votre email dans l'attribut MAIL_PASSWORD
     (si le mot de passe contient des espaces insérer le entre parenthèse)
    exemple:
     MAIL_PASSWORD="mot de pass avec parenthese"
    exemple2:
     MAIL_PASSWORD=MotDePasseSansParenthese

** il faut changer le MAIL_PORT suivant le MAIL_HOST utilisé.

4-mot de pass oublié 
   *lors de la connexion cliqué sur le lien "forgot your password"
   * saisir l'email de l'administrateur 
   * puis vous recevrez un e-mail. Si vous ne recevez pas ce message,
     Vérifiez le dossier "Spam" et le dossier des messages en masse. 

