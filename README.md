<div align="center">

<img src="https://github.com/T2L4b/TelecomParis_CTF_Club_Platform/blob/master/public_html/views/img/logo.png" alt="Wiki.js" width="500" />

# :construction: ClubCTF_Platform :construction:

**Main website of Telecom Paris CTF club.**

**Born in August :two::zero::one::nine:** 

## General 

[![License](https://img.shields.io/badge/license-AGPLv3-blue.svg?style=flat)](https://github.com/T2L4b/TelecomParis_CTF_Club_Platform/blob/master/LICENSE)
[![Build Status](https://travis-ci.org/T2L4b/TelecomParis_CTF_Club_Platform.svg?branch=master)](https://travis-ci.org/T2L4b/TelecomParis_CTF_Club_Platform)

## Sonarcloud
[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=T2L4b_TelecomParis_CTF_Club_Platform&metric=alert_status)](https://sonarcloud.io/dashboard?id=T2L4b_TelecomParis_CTF_Club_Platform)
[![Maintainability Rating](https://sonarcloud.io/api/project_badges/measure?project=T2L4b_TelecomParis_CTF_Club_Platform&metric=sqale_rating)](https://sonarcloud.io/dashboard?id=T2L4b_TelecomParis_CTF_Club_Platform)
[![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=T2L4b_TelecomParis_CTF_Club_Platform&metric=security_rating)](https://sonarcloud.io/dashboard?id=T2L4b_TelecomParis_CTF_Club_Platform)



[![Vulnerabilities](https://sonarcloud.io/api/project_badges/measure?project=T2L4b_TelecomParis_CTF_Club_Platform&metric=vulnerabilities)](https://sonarcloud.io/dashboard?id=T2L4b_TelecomParis_CTF_Club_Platform)
[![Bugs](https://sonarcloud.io/api/project_badges/measure?project=T2L4b_TelecomParis_CTF_Club_Platform&metric=bugs)](https://sonarcloud.io/dashboard?id=T2L4b_TelecomParis_CTF_Club_Platform)
[![Code Smells](https://sonarcloud.io/api/project_badges/measure?project=T2L4b_TelecomParis_CTF_Club_Platform&metric=code_smells)](https://sonarcloud.io/dashboard?id=T2L4b_TelecomParis_CTF_Club_Platform)
[![Coverage](https://sonarcloud.io/api/project_badges/measure?project=T2L4b_TelecomParis_CTF_Club_Platform&metric=coverage)](https://sonarcloud.io/dashboard?id=T2L4b_TelecomParis_CTF_Club_Platform)
[![Technical Debt](https://sonarcloud.io/api/project_badges/measure?project=T2L4b_TelecomParis_CTF_Club_Platform&metric=sqale_index)](https://sonarcloud.io/dashboard?id=T2L4b_TelecomParis_CTF_Club_Platform)

## Codeclimate

[![Maintainability](https://api.codeclimate.com/v1/badges/181c9606f1540b8c7810/maintainability)](https://codeclimate.com/github/T2L4b/TelecomParis_CTF_Club_Platform/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/181c9606f1540b8c7810/test_coverage)](https://codeclimate.com/github/T2L4b/TelecomParis_CTF_Club_Platform/test_coverage)


</div>

# Feel free to contribute - ToDoList

## Front

* Map front w. API (JS (XHR?) requests).
* Remove unused files from the template (including nodejs w. vulnerabilities).


## Back (API)

### Infra

* Add Traefik HTTPS reverse-proxy + Let's Encrypt.

### Database

* Manage user & permissions (all requests w/ root at the time) /!\
* Change database credentials (root).

### Technical Layer (PHP)

* Add PHP filters (inputs are sanitized but aren't filtered).
* PHPUnit (+ add to travis).
* Brute-force & DoS API protection (ban after X try).


### User
* Register with email that is already in DB?
* Same for pseudo?
* sanitize at update + sanitize in token

### DDoS
* Infra or/and Code ?
* https://cloud.google.com/armor/
* chrome-extension://oemmndcbldboiebfnladdacbdfmadadm/https://cloud.google.com/files/GCPDDoSprotection-04122016.pdf
