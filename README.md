
# Projet déploiement

Yanis HESSINI

## Mon Matériel

https://materiel.webredirect.org

```
VPS Digital Ocean

Ubuntu 22.04 LTS

1 vCPU
1 GB RAM
25 GB SSD Disk
```

## Sommaire

1. [DigitalOcean et initialisation](#digitalocean-et-initialisation)
2. [Pull du projet GitHub](#pull-du-projet-github)
3. [Installation de PHP, Apache, MySQL](#installation-de-php-apache-mysql)
4. [Configuration de Apache](#configuration-de-apache)
5. [Configuration de MySQL](#configuration-de-mysql)
6. [Configuration du DNS Dynamique](#configuration-du-dns-dynamique)
7. [Configuration SSL](#configuration-ssl)

# DigitalOcean et initialisation

J'ai créé un compte sur DigitalOcean et j'ai créé un VPS avec Ubuntu 22.04 LTS.
J'ai pu bénéficier de crédits offerts grâce à GitHub Student.

Après avoir pris le serveur, je me suis connecté en SSH dessus :

```bash
	ssh root@164.92.192.72
```

Le mot de passe était envoyé par mail, mais je l'ai modifié par la suite.

```bash
	sudo su -
	passwd
```

# Pull du projet GitHub

En voulant cloner le projet, j'ai rencontré une erreur d'authentification.
GitHub a changé son système d'authentification et il faut maintenant utiliser un token.

J'ai donc créé un token sur GitHub avec les droits de lecture sur les dépôts.
C'est le token que j'ai utilisé comme mot de passe pour cloner le projet.

```bash
	git clone https://github.com/YanisHessini/monmateriel.git
```

J'ai cloné le projet dans le home du serveur. Mais je l'ai déplacé par la suite.


# Installation de PHP, Apache, MySQL

Pour mon projet, j'ai eu besoin des outils suivants :

- PHP
- Apache
- MySQL

J'ai donc installé ces outils avec la commande suivante :

```bash
	apt install php apache2 mysql-server
```

# Configuration de Apache

Après avoir installé Apache, je me suis assuré que le service était bien lancé.

```bash
	systemctl status apache2
```

J'ai ensuite activé des modules pour Apache.

```bash
	sudo a2enmod proxy_fcgi setenvif php8.1
	sudo a2enconf php8.1-fpm
```

Je suis ensuite allé dans `/var/www/html` et j'ai créé un fichier `info.php` pour tester le bon fonctionnement d'Apache.

```php
	<?php
	phpinfo();
	?>
```

J'ai ensuite redémarré Apache.

```bash
	systemctl restart apache2
```

J'ai ensuite supprimé le fichier `info.php` et j'ai copié le projet dans `/var/www/html`.

```bash
	cp -r monmateriel/ /var/www/html/
```


# Configuration de MySQL

Pour la configuration de MySQL, j'ai utilisé :

```bash
	mysql_secure_installation
```

Cela m'a permis de créer un mot de passe pour l'utilisateur `root`.

Ensuite, mon site nécessitant quelques données de base pour fonctionner, j'ai utilisé HeidiSQL pour exporter les données de ma base de données qui tournait dans un Raspberry Pi pour les importer dans le VPS. 

Après avoir exporté dans un fichier `data.sql`, J'ai ensuite créé une base de données `monmateriel` et j'ai importé les données.

Pour cela, j'ai utilisé la commande suivante :

```bash
	mysql -u root -p monmateriel < data.sql
```

# Configuration du DNS Dynamique

Afin d'accéder à mon site d'une manière plus simple qu'une IP de barbare, j'ai utilisé le service de DNS dynamique de Dynu.

Après création de compte, j'ai utilisé un de leurs noms de domaines gratuits (webredirect.org) et j'ai créé un sous-domaine `materiel`.

J'ai lié donc l'IP du serveur (trouvée sur DigitalOcean) à ce sous-domaine.

Cela me permet d'une part d'accéder au site avec un nom de domaine plus simple (via les ports 80 t 443), mais également de pouvoir accéder à la base de données via ce nom de domaine facilement et à distance (sur le port 3306).

Le site propose d'ailleurs un outil pour actualiser le DNS dynamique, qui permet de mettre à jour l'IP du serveur si elle change.

# Configuration SSL

Pour la configuration SSL, j'ai utilisé certbot.

```bash
	sudo a2enmod ssl
	sudo apt install certbot python3-certbot-apache
```

J'ai ensuite généré un certificat SSL pour mon sous-domaine.

```bash
	sudo certbot --apache -d materiel.webredirect.org
```

J'ai ensuite redémarré Apache.

```bash
	systemctl restart apache2
```

