<?php
/**
 * @version		$Id: helper.php 19492 2010-11-16 05:54:17Z eddieajau $
 * @package		Joomla.Framework
 * @subpackage	FileSystem
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('JPATH_BASE') or die;

jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');

/**
 * File system helper
 *
 * Holds support functions for the filesystem, particularly the stream
 *
 * @package		Joomla.Framework
 * @subpackage	FileSystem
 * @since		1.6
 */
class JFilesystemHelper
{
	// ----------------------------
	// Support Functions; should probably live in a helper?
	// ----------------------------

	/**
	 * Remote file size function for streams that don't support it
	 *
	 * @param	string	$url
	 *
	 * @return	mixed
	 * @since	1.6
	 * @see		http://www.php.net/manual/en/function.filesize.php#71098
	 */
	function remotefsize($url)
	{
		$sch = parse_url($url, PHP_URL_SCHEME);

		if (($sch != 'http') && ($sch != 'https') && ($sch != 'ftp') && ($sch != 'ftps')) {
			return false;
		}

		if (($sch == 'http') || ($sch == 'https')) {
			$headers = get_headers($url, 1);

			if ((!array_key_exists('Content-Length', $headers))) {
				return false;
			}

			return $headers['Content-Length'];
		}

		if (($sch == 'ftp') || ($sch == 'ftps')) {
			$server = parse_url($url, PHP_URL_HOST);
			$port = parse_url($url, PHP_URL_PORT);
			$path = parse_url($url, PHP_URL_PATH);
			$user = parse_url($url, PHP_URL_USER);
			$pass = parse_url($url, PHP_URL_PASS);

			if ((!$server) || (!$path)) {
				return false;
			}

			if (!$port) {
				$port = 21;
			}

			if (!$user) {
				$user = 'anonymous';
			}

			if (!$pass) {
				$pass = '';
			}

			switch ($sch)
			{
				case 'ftp':
					$ftpid = ftp_connect($server, $port);
					break;

				case 'ftps':
					$ftpid = ftp_ssl_connect($server, $port);
					break;
			}

			if (!$ftpid) {
				return false;
			}

			$login = ftp_login($ftpid, $user, $pass);

			if (!$login) {
				return false;
			}

			$ftpsize = ftp_size($ftpid, $path);
			ftp_close($ftpid);

			if ($ftpsize == -1) {
				return false;
			}

			return $ftpsize;
		}
	}

	/**
	 * Quick FTP chmod
	 *
	 * @param	string	$url
	 * @param			$mode
	 *
	 * @return	mixed
	 * @since	1.6
	 * @see		http://www.php.net/manual/en/function.ftp-chmod.php
	 */
	function ftpChmod($url, $mode)
	{
		$sch = parse_url($url, PHP_URL_SCHEME);

		if (($sch != 'ftp') && ($sch != 'ftps')) {
			return false;
		}

		$server = parse_url($url, PHP_URL_HOST);
		$port = parse_url($url, PHP_URL_PORT);
		$path = parse_url($url, PHP_URL_PATH);
		$user = parse_url($url, PHP_URL_USER);
		$pass = parse_url($url, PHP_URL_PASS);

		if ((!$server) || (!$path)) {
			return false;
		}

		if (!$port) {
			$port = 21;
		}

		if (!$user) {
			$user = 'anonymous';
		}

		if (!$pass) {
			$pass = '';
		}

		switch ($sch)
		{
			case 'ftp':
				$ftpid = ftp_connect($server, $port);
				break;

			case 'ftps':
				$ftpid = ftp_ssl_connect($server, $port);
				break;
		}

		if (!$ftpid) {
			return false;
		}

		$login = ftp_login($ftpid, $user, $pass);

		if (!$login) {
			return false;
		}

		$res = ftp_chmod($ftpid, $mode, $path);
		ftp_close($ftpid);

		return $res;
	}

	/**
	 * Modes that require a write operation
	 *
	 * @return	array
	 * @since	1.6
	 */
	static function getWriteModes()
	{
		return array('w','w+','a','a+','r+','x','x+');
	}

	// ----------------------------
	// Stream and Filter Support Operations
	// ----------------------------

	/**
	 * Returns the supported streams, in addition to direct file access
	 * Also includes Joomla! streams as well as PHP streams
	 *
	 * @return	array	Streams
	 * @since	1.6
	 */
	function getSupported()
	{
		// Really quite cool what php can do with arrays when you let it...
		static $streams;

		if (!$streams) {
			$streams = array_merge(
				stream_get_wrappers(),
				JFilesystemHelper::getJStreams()
			);
		}

		return $streams;
	}

	/**
	 * Returns a list of transports
	 *
	 * @return
	 * @since	1.6
	 */
	function getTransports()
	{
		// is this overkill?
		return stream_get_transports();
	}

	/**
	 * Returns a list of filters
	 *
	 * @return
	 * @since	1.6
	 */
	function getFilters()
	{
		// note: this will look like the getSupported() function with J! filters
		// TODO: add user space filter loading like user space stream loading
		return stream_get_filters();
	}

	/**
	 * Returns a list of J! streams
	 *
	 * @return
	 * @since	1.6
	 */
	function getJStreams()
	{
		static $streams;

		if (!$streams) {
			$streams = array_map(
				array('JFile', 'stripExt'),
				JFolder::files(dirname(__FILE__).DS.'streams', '.php')
			);
		}

		return $streams;
	}

	/**
	 * @param	$streamname
	 *
	 * @return	boolean
	 * @since	1.6
	 */
	function isJoomlaStream($streamname)
	{
		return in_array(
			$streamname,
			JFilesystemHelper::getJStreams()
		);
	}
}