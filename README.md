<div align="center">

<img src="https://raw.githubusercontent.com/T2L4b/TelecomParis_CTF_Club_Platform/master/.github/logo.png" alt="Telecom Paris CTF Club Platform" width="500" />

[![License](https://img.shields.io/badge/license-AGPLv3-blue.svg?style=flat)](https://github.com/T2L4b/TelecomParis_CTF_Club_Platform/blob/master/LICENSE)
[![Build Status](https://travis-ci.org/T2L4b/TelecomParis_CTF_Club_Platform.svg?branch=master)](https://travis-ci.org/T2L4b/TelecomParis_CTF_Club_Platform)  
[![Maintainability Rating](https://sonarcloud.io/api/project_badges/measure?project=T2L4b_TelecomParis_CTF_Club_Platform&metric=sqale_rating)](https://sonarcloud.io/dashboard?id=T2L4b_TelecomParis_CTF_Club_Platform)
[![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=T2L4b_TelecomParis_CTF_Club_Platform&metric=security_rating)](https://sonarcloud.io/dashboard?id=T2L4b_TelecomParis_CTF_Club_Platform)  
[![Maintainability](https://api.codeclimate.com/v1/badges/181c9606f1540b8c7810/maintainability)](https://codeclimate.com/github/T2L4b/TelecomParis_CTF_Club_Platform/maintainability)

# :construction: ClubCTF_Platform :construction:

**Main website of Telecom Paris CTF club.**

**Born in August :two::zero::one::nine:** 

# Install lib (composer) 
```
cd www/ && composer install --no-dev
```

# Contributors

## Lead Developer

[@T2L4b](https://github.com/T2L4b)  
<img src="https://avatars2.githubusercontent.com/u/50122584?s=460&v=4" alt="T2L4b avatar" width="75" />  

## Integration Front/Back

[@JackPepper](https://github.com/JackPepper)  
<img src="https://avatars2.githubusercontent.com/u/24301234?s=460&v=4" alt="JackPepper avatar" width="75" />  

## Front-End Developers
[>>> You'll find the Front (separate repository) here <<<](https://github.com/nima3333/club_ctf_front/)

[@nima3333](https://github.com/nima3333)  
<img src="https://avatars2.githubusercontent.com/u/7372240?s=460&v=4" alt="nima3333 avatar" width="75" />

[@noedelorme](https://github.com/noedelorme)  
<img src="https://avatars3.githubusercontent.com/u/38424932?s=460&v=4" alt="noedelorme avatar" width="75" />  


[@pgimalac](https://github.com/pgimalac)  
<img src="https://avatars3.githubusercontent.com/u/23154723?s=460&v=4" alt="pgimalac avatar" width="75" />  

</div>

# About this PoC (Proof of Concept)

## Ideas of features (@ToDo)
* Multilingual support (+ choose a language -> front?)
* Manage user & permissions (all requests w/ root atm) /!\
* Random string generator for core.php, SPDO, ... (for credentials)
* Add PHPUnit testing, Postman testing + (re)add them in the Travis-CI build

## Newman tests

Travis-ci issue when executing the newman collection: issue reported - waiting for an answer.
```
newman run tests/ClubCTF_Platform.postman_collection.json -e tests/JWToken.postman_environment.json

┌─────────────────────────┬──────────┬──────────┐
│                         │ executed │   failed │
├─────────────────────────┼──────────┼──────────┤
│              iterations │        1 │        0 │
├─────────────────────────┼──────────┼──────────┤
│                requests │       37 │        0 │
├─────────────────────────┼──────────┼──────────┤
│            test-scripts │       74 │        0 │
├─────────────────────────┼──────────┼──────────┤
│      prerequest-scripts │       37 │        0 │
├─────────────────────────┼──────────┼──────────┤
│              assertions │       38 │        0 │
├─────────────────────────┴──────────┴──────────┤
│ total run duration: 6.4s                      │
├───────────────────────────────────────────────┤
│ total data received: 2.56KB (approx)          │
├───────────────────────────────────────────────┤
│ average response time: 136ms                  │
└───────────────────────────────────────────────┘
```
