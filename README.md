
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

Three settings are needed in Apache to enable cert auth:

 * <code>SSLCACertificateFile authtest-trusted-ca.pem</code> specifies
   the CAs we trust (Logbook of the World root certificate, and any
   others we'd like to add later)
 * <code>SSLVerifyClient optional</code> says that we would like to have
   a client certificate on this site, but it's not required. Set this to
   <code>SSLVerifyClient require</code> if you wish to absolutely require
   a valid client certificate on your site.
 * <code>SSLVerifyDepth 4</code> specifies we accept 4 levels of CAs.
   LoTW currently uses 1 intermediate production CA to sign the end-user
   certificates, so the minimum setting is probably 2 right now.

The PHP/HTML files in html/ show how to extract certificate contents
(callsign, signer, etc) from the environment.  Start from index.php. 
Nothing magical in there either, it should be easy to translate to other
languages.  The PHP stuff is only a demonstration of displaying and
utilizing certificate contents (callsign...) in an application, it's not
needed for the actual authentication.

Heikki Hannikainen, OH7LZB

