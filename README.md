Firmstep queue demo
==================

A simple browser-based queueing application built with Symfony 2.8. 

Requirements
===========
PHP >= 5.5

Composer

npm, node & less (for compiling CSS)

MySQL >= 14.14

Other:
Git >= 1.91


Installation 
============
1. Clone this repo to a unix machine running a web-server or similar VM.

2. In the application root run `composer install`

3. Create a MySQL schema for this application, (InnoDB, UTF-8 collation).

3. Add DB credentials to app/config/parameters.yml
 
4. Although unlikely, it may be necessary to perform `app/console assetic:dump`, in which case you'll need to have the abovementioned node packages installed (see http://kiwwito.com/less-css-with-assetic-and-symfony-2/). This also requires updates to app/config/config.yml, e.g.

```
assetic:
    filters:
        less:
            node: /usr/bin/nodejs
            node_paths: [/path/to/your/node_modules]`
```


Design Choices
=======================
Symfony was chosen as the basis for this project as it's the one of most popular, actively supported and feature-rich frameworks available. This allows for minimizing the time spent constructing HTML forms for example. Third party implementations are also numerous giving the developer access to substantial resources and guidance.

Symfony's features also informed the application design. Four entities were identified; Citizen, Organisation, Anonymous (children of Customer) and QueueEntry. Storing Customers as entities using table inheritance facilitated the use of Symfony's FormBuilder, to generate forms with various possible input fields.

LESS CSS framework was used to style the main the application interface, as this framework provides further effort-saving features such as variables and functions, helping to keep code DRY. Also taking care of CSS inheritance in the compiled files.

jQuery was used to manage the displays of forms and queue entries, this allows for the Queue feature to repeatedly poll a second endpoint (/list) for updates to the queue. This was made in anticipation of a need to delete queue entries as services are provided to customers, and thereby keep the list updated without the user needing to refresh the page.


Issues
======

The queue list feature is currently not displaying scheduled entries, even though the entries themselves are appropriately constructed and stored. It is believed this has something to do with the relation mapping, although in the absence of any errors this has proved impossible to remedy in time.

The front-end styling is very basic and could use significant improvements. The decision was taken to prioritise JS functionality over CSS polish.

There are no tests, again in the interests of timeliness these were neglected. A suite of unit tests made with PHPUnit and/or behavioural tests would make the project more reliable and maintainable.

