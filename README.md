# ClubCTF_Platform [CURRENTLY BEING DEV]

Main website of Telecom Paris CTF club.

# ToDoList

## Front

* Map front w. API (JS (XHR?) requests).
* Remove unused files from the template.
* Redesigned for the use case.


## Back (API)

### Infra

* Add Traefik HTTPS reverse-proxy + Let's Encrypt.

### Database

* Add generated_date for the api_key (+ revoke trigger).
* Manage user & permissions (all requests w/ root at the time) /!\
* Change database credentials (root).

### Technical Layer (PHP)

* Add PHP filters (inputs are sanitized but aren't filtered).
* Brute-force & DoS API protection (ban after X try).
* PHPUnit (+ add to travis).
