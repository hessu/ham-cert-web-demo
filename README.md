
Amateur Radio Certificate Authentication configuration for Apache and PHP
--------------------------------------------------------------------------


This is an example configuration to implement Amateur Radio Certificate
Authentication against Logbook of the World certificates (and other CAs once
they come around).

This is what is actually running at the
[authentication demo site](https://authtest.aprs.fi).

The config files in apache-conf/ contains the SSL server configuration. 
It's a pretty standard SSL apache setup, nothing magical in there.  It's
currently set up to not require a client certificate, but optionally use one
if the client has one that is trusted by us.

It's probably a good idea to start by setting up a regular SSL web service
without client certificate authentication.  The Internet is full of
examples, Apache on Linux has good example configs, and you can get a free
server certificate that is accepted by all current browsers from
[StartSSL](http://www.startssl.com/).  Once that's working, proceed with the
authentication.

Three settings are needed in Apache to enable cert auth:

 * <code>SSLCACertificateFile authtest-trusted-ca.pem</code> specifies
   the CAs we trust (Logbook of the World root certificate, and any
   others we'll want to add later).
 * <code>SSLVerifyClient optional</code> says that we would like to have
   a client certificate on this site, but it's not required. Set this to
   <code>SSLVerifyClient require</code> if you wish to absolutely require
   a valid client certificate on your site. This demo site wishes to display
   something even if an user doesn't have a cert installed, so authentication
   needs to be optional.
 * <code>SSLVerifyDepth 4</code> specifies we accept 4 levels of CAs.
   LoTW currently uses 1 intermediate production CA to sign the end-user
   certificates, so the minimum setting is probably 2 right now.

The PHP/HTML files in html/ show how to extract certificate contents
(callsign, signer, etc) from the environment.  Start from index.php. 
Nothing magical in there either, it should be easy to translate to other
languages.  The PHP stuff is only a demonstration of displaying and
utilizing certificate contents (callsign...) in an application, it's not
needed for the actual authentication.

Bonus hint: It's a good idea to set up a regular HTTP service on port 80,
and make it redirect users to the SSL service.  This makes it easier for
users to find the service - they'll get to the right place even when they
forget to type in the https protocol prefix.

<pre><code>    RewriteEngine On
    RewriteRule ^(.*) https://www.example.com$1            [R=301,L]
</code></pre>

Heikki Hannikainen, OH7LZB

