# BI1-Extract

## Description

This project is designed to be able to interact with 2 providers and the main features are 
- Listing a bucket or a folder in the bucket
- Download an object from the bucket
- Upload an object into the bucket
- Delete an object from the bucket
- Share an object from the bucket, the link is temporary
- Create an object from the bucket
- Check if an object exist

All those methods should work on those providers:
- Google Cloud Provider
- AWS

## Getting Started

### Prerequisites

* PHP 8.3.11 
* Visual Studio Code 1.105.1 
* Composer 2.8.12 
* Windows 11 Éducation 24H2

## Deployment

### On dev environment WIP

get all packages with composer by typing this :

```shell
composer install
```
then serve with composer
```shell
composer serve
```

To test all test, just type this to the terminal :

```shell
./vendor/bin/phpunit
```
### On integration environment

How to deploy the application outside the dev environment.

## Directory structure WIP

* Tip: try the tree bash command

```shell
src
│   └───App
│       │   ConfigProvider.php
│       │   
│       ├───Bucket
│       │       CreateObject.php
│       │       DeleteObject.php
│       │       ExistObject.php
│       │       ListObject.php
│       │       ShareObject.php
│       │       UpdateObject.php
│       │       
│       ├───Handler
│       │       AWSAdapterImpl.php
│       │       BucketAdapter.php
│       │       BucketAdapterFactory.php
│       │       CloudProvider.php
│       │       GCPAdapterImpl.php
│       │       
│       └───Services
│               BucketService.php
│               
├───test
│   └───AppTest
│       │   InMemoryContainer.php
│       │   
│       └───Handler
│               BucketImplTestAWS.php
│               BucketImplTestGCP.php
│               MockGCPSDK.php

```

## Collaborate

* Take time to read some readme and find the way you would like to help other developers collaborate with you.

* They need to know:
  * How to propose a new feature (issue, pull request)
  * [How to commit](https://www.conventionalcommits.org/en/v1.0.0/)
  * [How to use your workflow](https://nvie.com/posts/a-successful-git-branching-model/)

## License

* [Choose the license adapted to your project](https://docs.github.com/en/repositories/managing-your-repositorys-settings-and-features/customizing-your-repository/licensing-a-repository).

## Contact

* How to get in contact with you? Discord, Trello, Issue?
