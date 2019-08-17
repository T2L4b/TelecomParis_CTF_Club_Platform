<div align="center">

# :construction: ClubCTF_Platform [DEV]

[![License](https://img.shields.io/badge/license-AGPLv3-blue.svg?style=flat)](https://github.com/T2L4b/TelecomParis_CTF_Club_Platform/blob/master/LICENSE)
[![Build Status](https://travis-ci.org/T2L4b/TelecomParis_CTF_Club_Platform.svg?branch=master)](https://travis-ci.org/T2L4b/TelecomParis_CTF_Club_Platform)

**Main website of Telecom Paris CTF club.**

</div>

# ToDoList

## Front

* Map front w. API (JS (XHR?) requests).
* Remove unused files from the template.
* Redesigned for the use case.


## Back (API)

### Infra

* Add Traefik HTTPS reverse-proxy + Let's Encrypt.
* Add SonarCloud.

### Database

* Add generated_date for the api_key (+ revoke trigger).
* Manage user & permissions (all requests w/ root at the time) /!\
* Change database credentials (root).

### Technical Layer (PHP)

* Add PHP filters (inputs are sanitized but aren't filtered).
* Brute-force & DoS API protection (ban after X try).
* PHPUnit (+ add to travis).
