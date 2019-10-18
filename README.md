<div align="center">

<img src="https://raw.githubusercontent.com/T2L4b/TelecomParis_CTF_Club_Platform/master/.github/logo.png" alt="Telecom Paris CTF Club Platform" width="500" />

[![License](https://img.shields.io/badge/license-AGPLv3-blue.svg?style=flat)](https://github.com/T2L4b/TelecomParis_CTF_Club_Platform/blob/master/LICENSE)
[![Build Status](https://travis-ci.org/T2L4b/TelecomParis_CTF_Club_Platform.svg?branch=master)](https://travis-ci.org/T2L4b/TelecomParis_CTF_Club_Platform)  
[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=T2L4b_TelecomParis_CTF_Club_Platform&metric=alert_status)](https://sonarcloud.io/dashboard?id=T2L4b_TelecomParis_CTF_Club_Platform)
[![Maintainability Rating](https://sonarcloud.io/api/project_badges/measure?project=T2L4b_TelecomParis_CTF_Club_Platform&metric=sqale_rating)](https://sonarcloud.io/dashboard?id=T2L4b_TelecomParis_CTF_Club_Platform)
[![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=T2L4b_TelecomParis_CTF_Club_Platform&metric=security_rating)](https://sonarcloud.io/dashboard?id=T2L4b_TelecomParis_CTF_Club_Platform)  
[![Maintainability](https://api.codeclimate.com/v1/badges/181c9606f1540b8c7810/maintainability)](https://codeclimate.com/github/T2L4b/TelecomParis_CTF_Club_Platform/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/181c9606f1540b8c7810/test_coverage)](https://codeclimate.com/github/T2L4b/TelecomParis_CTF_Club_Platform/test_coverage)

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

## Backers

[@JackPepper](https://github.com/JackPepper)  
<img src="https://avatars2.githubusercontent.com/u/24301234?s=460&v=4" alt="JackPepper avatar" width="75" />  

## Front Developers
[>>> You'll find the Front repository here <<<](https://github.com/nima3333/club_ctf_front/)

[@nima3333](https://github.com/nima3333)  
<img src="https://avatars2.githubusercontent.com/u/7372240?s=460&v=4" alt="nima3333 avatar" width="75" />

[@noedelorme](https://github.com/noedelorme)  
<img src="https://avatars3.githubusercontent.com/u/38424932?s=460&v=4" alt="noedelorme avatar" width="75" />  


[@pgimalac](https://github.com/pgimalac)  
<img src="https://avatars3.githubusercontent.com/u/23154723?s=460&v=4" alt="pgimalac avatar" width="75" />  

</div>

# @ToDo

## Code coverage 
* @TODO with PhpUnit (add to composer)

## Configuration
* Manage user & permissions (all requests w/ root atm) /!\
* Script that generate random string in core.php, SPO, ... & for credentials.
* Integrity checker

## Newman tests

Travis-ci issue when executing the newman collection: issue reported - waiting for an answer.
```
newman run tests/ClubCTF_Platform.postman_collection.json -e tests/JWToken.postman_environment.json

┌─────────────────────────┬──────────┬──────────┐
│                         │ executed │   failed │
├─────────────────────────┼──────────┼──────────┤
│              iterations │        1 │        0 │
├─────────────────────────┼──────────┼──────────┤
│                requests │       33 │        0 │
├─────────────────────────┼──────────┼──────────┤
│            test-scripts │       66 │        0 │
├─────────────────────────┼──────────┼──────────┤
│      prerequest-scripts │       33 │        0 │
├─────────────────────────┼──────────┼──────────┤
│              assertions │       33 │        0 │
├─────────────────────────┴──────────┴──────────┤
│ total run duration: 7s                        │
├───────────────────────────────────────────────┤
│ total data received: 1.74KB (approx)          │
├───────────────────────────────────────────────┤
│ average response time: 175ms                  │
└───────────────────────────────────────────────┘
```
