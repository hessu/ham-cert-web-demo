
Amateur Radio Certificate Authentication
configuration for Apache and PHP
------------------------------------------


This is an example configuration to implement Amateur Radio
Certificate Authentication against Logbook of the World
certificates (and other CAs once they come around).

This is what is actually running at the
[authentication demo site](https://authtest.aprs.fi).

The config files in apache-conf/ contains the SSL server
configuration. It's a pretty standard SSL apache setup,
nothing magical in there. It's currently set up to not
require a client certificate, but optionally use one if the
client has one that is trusted by us.

The PHP/HTML files in html/ show how to extract certificate
contents (callsign, signer, etc) from the environment.
Start from index.php. Nothing magical in there either, it should
be easy to translate to other languages.

Heikki Hannikainen, OH7LZB

