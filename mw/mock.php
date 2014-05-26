<?php
global $wgWellFormedXml, $wgHtml5, $wgJsMimeType;

$wgWellFormedXml = true;
$wgHtml5 = true;
$wgJsMimeType = 'text/javascript';


global $wgUseTidy, $wgAllowMicrodataAttributes, $wgAllowImageTag,
	$wgAllowRdfaAttributes, $wgAllowMicrodataAttributes,
	$wgExperimentalHtmlIds;

$wgUseTidy = false;
$wgAllowMicrodataAttributes = true;
$wgAllowImageTag = false;
$wgExperimentalHtmlIds = true;

global $wgUrlProtocols;

$wgUrlProtocols = array(
	'bitcoin:', 'ftp://', 'ftps://', 'geo:', 'git://', 'gopher://', 'http://',
	'https://', 'irc://', 'ircs://', 'magnet:', 'mailto:', 'mms://', 'news:',
	'nntp://', 'redis://', 'sftp://', 'sip:', 'sips:', 'sms:', 'ssh://',
	'svn://', 'tel:', 'telnet://', 'urn:', 'worldwind://', 'xmpp:', '//'
);

function wfSuppressWarnings() {}
function wfRestoreWarnings() {}
function wfProfileIn( $functionname = null ) {}
function wfProfileOut( $functionname = null ) {}
function wfUrlProtocols( $includeProtocolRelative = false ) {
	global $wgUrlProtocols;

	static $withProtRel = null, $withoutProtRel = null;

	$protocols = array();
	foreach ( $wgUrlProtocols as $protocol ) {
		// Filter out '//' if !$includeProtocolRelative
		if ( $includeProtocolRelative || $protocol !== '//' ) {
			$protocols[] = preg_quote( $protocol, '/' );
		}
	}
	$retval = implode( '|', $protocols );

	// Cache return value
	if ( $includeProtocolRelative ) {
		$withProtRel = $retval;
	} else {
		$withoutProtRel = $retval;
	}

	return $retval;
}

function wfRunHooks( $event = null, $args = null, $deprecatedVersion = null ) {}