# Totothèque

[![Build Status](https://travis-ci.com/nkirchhoffer/tototheque.svg?token=ds33jhx1yuxm7ARdHprK&branch=master)](https://travis-ci.com/nkirchhoffer/tototheque)

Totothèque est un projet écrit en PHP principalement, sous Laravel, dont le principe est de fournir un site de bibliothèque ainsi que son interface de gestion.

Conduit dans le cadre des cours en DUT Réseaux et télécommunications, ce projet est inscrit dans l'ensemble d'un projet tutoré.

Les charges principales sont les suivantes :

- [ ] Gérer le personnel de la bibliothèque
- [ ] Gérer les ouvrages de la bibliothèque
- [ ] Avoir un aperçu en direct des emprunts en cours de la bibliothèque
- [ ] Afficher les ouvrages et proposer un aperçu individuel
- [ ] Disposer d'un espace membre
- [ ] Pour les membres, proposer d'emprunter un ouvrage
- [ ] Actualiser l'affichage en fonction des disponibilités

Le reste des charges sera détaillé davantage et la planification concrète sera effectuée dans le but d'une restitution par dossier et orale de nos travaux.

## Déploiement

Le projet est indexé sur Travis CI et est constamment reconstruit et déployé en direct.

Dans le cadre actuel de ce projet, seul un environnement de staging est mis à disposition de l'équipe de développement, celui-ci est entièrement automatisé grâce au processus de Continuous Integration (et Continuous Deployment).

Les détails de ces compilation et déploiement sont disponibles au travers des fichiers .travis.yml et Dockerfile, ainsi que deploy.sh.

Le déploiement final est propulsé par Caddy Web Server et NGINX Ingress sous Kubernetes permettant une balance de la charge tout en gardant une configuration simple au niveau de notre application. Il est de la tâche du DevOps de configurer le load-balancer NGINX Ingress dans le cadre des déploiements.

L'intérêt de nos pipelines est :

* installer les dépendances du projet
* lancer les tests unitaires via PHPUnit et avec NPM
* compiler l'application dans une image Docker
* publier l'image Docker sur un registre privé

Le cluster Kubernetes écoutera les mises à jour des images Docker et les effectuera dès que nécessaire en fonction de la politique de déploiement, à terme, deux environnements, `staging`et `production`seront déployés sur les serveurs.

Cet aspect du projet est très important car garantit une rigueur et une flexibilité avantageuse dans le cadre d'une modification d'ampleur de l'équipe. Également, elle permet une compatibilité avec le système hébergeant finalement l'application, celui-ci isolant l'application sur Docker, permettant d'éviter tous soucis de compatibilité.

Les fichiers YAML de déploiement seront disponibles sur un répertoire Git adapté, dont le lien sera mentionné.

L'étiquette `build`disponible en haut de ce document renseigne sur l'état actuel du projet, en cas de `failed`, la version actuelle n'est pas déployée sur les serveurs.

## Équipe de développement

L'équipe est actuellement composée de trois personnes, consistant le groupe de projet tutoré au sein de notre formation, que voici :

* Nicolas Kirchhoffer, développeur PHP/JS et DevOps de ce projet
* Théo Ramstein, intégrateur HTML/CSS et designer
* Ayoub Khafallah, développeur JS et PHP

Celle-ci n'est pas vouée à changer tant que ce projet reste du domaine scolaire, mais une migration du projet est possible et les contributions seront de ce fait les bienvenues.

## Licence

Ce projet est sous licence MIT, que vous pourrez retrouver dans le fichier `LICENSE.md`.

