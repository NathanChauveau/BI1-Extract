# BI1-Extract

## Description

Ce projet consiste à pouvoir intéragir avec 2 fournisseurs avec les commandes ci-dessous:
- Lister l'intérieur d'un bucket à n'importe quel endroit de celui-ci (avec/sans recursive)
- Télécharger un objet depuis le bucket
- D'envoyer un objet dans le bucket
- Supprimer un objet du bucket
- Partager un objet du bucket via un lien temporaire
- Vérifier si un objet existe ou pas
- Mettre à jour un objet spécifique dans le bucket

Ces méthodes devront être fonctionnelles avec ces fournisseurs uniquement :
- Google Cloud Provider (GCP)
- Amazon Web Services (AWS)

## Pour commencer

### Prerequire

* PHP 8.3.11 
* Visual Studio Code 1.105.1 
* Composer 2.8.12 
* Windows 11 Éducation 24H2

## Deployment

### Sur l'environnement dev
Recevez tous les paquets du projet via cette commande là:
```shell
composer install
```
puis réalisé un serve :
```shell
composer serve
```

Pour tester tous les testes, réalisé cette commande là:
```shell
./vendor/bin/phpunit
```
Pour un test uniquement :
```shell
./vendor/bin/phpunit --filter *NomDuTest*
```

### Sur l'environnement de production

Aucun pour le moment

## Structure du répertoire WIP

* Tip: try the tree bash command

```shell
├───src
│   └───App
│       │   ConfigProvider.php
│       │   
│       ├───Controllers
│       │       CreateObject.php
│       │       DeleteObject.php
│       │       ExistObject.php
│       │       ListObject.php
│       │       ShareObject.php
│       │       UpdateObject.php
│       │       
│       ├───Factories
│       │       AWSClientFactory.php
│       │       BucketAdapterFactory.php
│       │       S3ClientFactory.php
│       │       
│       ├───Handler
│       │       AWSAdapterImpl.php
│       │       AWSClient.php
│       │       BucketAdapter.php
│       │       CloudProvider.php
│       │       GCPAdapterImpl.php
│       │       IAWSClient.php
│       │       
│       └───Services
│               BucketService.php
│               
├───test
│   └───AppTest
│       │   InMemoryContainer.php
│       │   
│       └───Handler
│               AWSBucketAdapterImplTest.php
│               BucketImplTestGCP.php
│               MockGCPSDK.php

```

## Collaborer

* Take time to read some readme and find the way you would like to help other developers collaborate with you.

Convention
Commit
Ce projet utilise les [Conventional Commits](https://www.conventionalcommits.org/). Les morts principaux étant: feat, fix, chore, refactor, test, docs.

Workflow
Ce projet utilise Git. Les branches utilisés sont les suivantes: main, develop, feature, release, hotfix. Les noms des branches suivent ce pattern: type/short-description eg.(feature/awsome-feature).

## Contact

Nathan Chauveau	nathan.chauveau@eduvaud.ch
