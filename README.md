## **DDOM-assignment**
**by norivo7**

### Requirements
- Docker Engine

### Installation
1. clone the repository etc. git clone
2. go to the repo root ("/DDOM-assignment")
3. ``docker compose build``
4. ``docker compose up -d``

### How-to
go to the root directory of the project "/DDOM-assignment", then:
1. ``docker compose run ddom-assignment bash``
2. ``composer install``
3. ``php example.php``

example.php contains emails and passwords that are checked for errors,
you can add your own cases and check if it works.