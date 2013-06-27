
<h3 class="text-success">Congratulations! Your amateur radio certificate is properly installed in your web browser.</h3>

<p>Your certificate identifies you with a callsign of <b><? print htmlent($dn_parms['call']) . '</b> and a name of <b>' . htmlent($dn_parms['name']) . ''; ?></b>.</p>

<?
	$sk = array('SSL_CLIENT_I_DN_O', 'SSL_CLIENT_I_DN_OU', 'SSL_CLIENT_I_DN_CN');
	$a = array();
	foreach ($sk as $k) {
		if (isset($_SERVER[$k]))
			array_push($a, htmlent($_SERVER[$k]));
	}
	$issuer = join(', ', $a);
?>

<p>The certificate was issued by <b><? print $issuer; ?></b>.</p>

<p>The certificate is valid from <b><? print htmlent($_SERVER["SSL_CLIENT_V_START"]) ?></b>
to <b><? print htmlent($_SERVER["SSL_CLIENT_V_END"]) ?></b>.</p>

<p>Web sites which support <b>Amateur Radio Certificate Authentication</b> and trust
<b><? print htmlent($_SERVER['SSL_CLIENT_I_DN_O']); ?></b> for license validation
will be happy to provide you with exclusive Amateur Radio services.</p>

<div class="accordion" id="accordion">
<? include("supporting-sites.php"); ?>
</div>
