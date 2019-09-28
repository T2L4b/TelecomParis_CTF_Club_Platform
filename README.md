<div align="center">

<img src="https://github.com/T2L4b/TelecomParis_CTF_Club_Platform/blob/master/public_html/views/img/logo.png" alt="Wiki.js" width="500" />

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

## Lead Developer: Back

[@T2L4b](https://github.com/T2L4b)
<img src="https://avatars2.githubusercontent.com/u/50122584?s=460&v=4" alt="T2L4b avatar" width="75" />  

## Backers

[@JackPepper](https://github.com/JackPepper)
<img src="https://avatars2.githubusercontent.com/u/24301234?s=460&v=4" alt="JackPepper avatar" width="75" />  

## Front Developers
(in development - not the one currently used)  

[@noedelorme](https://github.com/noedelorme)
<img src="https://avatars3.githubusercontent.com/u/38424932?s=460&v=4" alt="noedelorme avatar" width="75" />  

[@pgimalac](https://github.com/pgimalac)
<img src="https://avatars3.githubusercontent.com/u/23154723?s=460&v=4" alt="pgimalac avatar" width="75" />  

</div>

# @ToDo

## Fix travis-ci build

Travis-ci build fail bc of the newman collection, although it runs perfectly fine locally as shown below:
```
┌─────────────────────────┬──────────┬──────────┐
│                         │ executed │   failed │
├─────────────────────────┼──────────┼──────────┤
│              iterations │        1 │        0 │
├─────────────────────────┼──────────┼──────────┤
│                requests │       10 │        0 │
├─────────────────────────┼──────────┼──────────┤
│            test-scripts │       20 │        0 │
├─────────────────────────┼──────────┼──────────┤
│      prerequest-scripts │       10 │        0 │
├─────────────────────────┼──────────┼──────────┤
│              assertions │       10 │        0 │
├─────────────────────────┴──────────┴──────────┤
│ total run duration: 1620ms                    │
├───────────────────────────────────────────────┤
│ total data received: 1.4KB (approx)           │
├───────────────────────────────────────────────┤
│ average response time: 115ms                  │
└───────────────────────────────────────────────┘
```

## PHP Filters + Issues
* Filter every user input (body req.)
* Register with email that is already in DB?
* Same for pseudo?

## Code coverage 
* @TODO with PhpUnit (add to composer)

## Configuration
* Manage user & permissions (all requests w/ root at the time) /!\
* Change database credentials (root).
* Script that generate random string in config.php & for credentials.
* Script - cronjob for apache - mail if file is edited! (checksum?)
* Dockerize composer?
