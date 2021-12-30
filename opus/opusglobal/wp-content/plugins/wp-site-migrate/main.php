<?php
if (!defined('ABSPATH')) exit;
if (!class_exists('WPEngine')) :
	
require_once dirname( __FILE__ ) . '/main/lib.php';
require_once dirname( __FILE__ ) . '/main/site_info.php';
require_once dirname( __FILE__ ) . '/main/auth.php';
require_once dirname( __FILE__ ) . '/main/db.php';

class WPEngine {
	public $version = '1.72';
	public $plugname = 'wpengine';
	public $brandname = 'WPEngine Migration';
	public $webpage = 'https://wpengine.com';
	public $appurl = 'https://wpengine.blogvault.net';
	public $slug = 'wp-site-migrate/wpengine.php';
	public $plug_redirect = 'wperedirect';
	public $badgeinfo = 'wpebadge';
	public $logo = '../assets/img/wpengine-logo.png';
	
	public $ip_header_option = 'wpeipheader';
	public $brand_option = 'wpebrand';
	
	public $lib;
	public $info;
	public $auth;
	public $db;
	function __construct() {
		$this->lib = new WPELib();
		$this->info = new WPESiteInfo($this->lib);
		$this->auth = new WPEAuth($this->info);
		$this->db = new WPEDb();
	}

	public function appUrl() {
		if (defined('BV_APP_URL')) {
			return BV_APP_URL;
		} else {
			$brand = $this->getBrandInfo();
			if ($brand && array_key_exists('appurl', $brand)) {
				return $brand['appurl'];
			}
			return $this->appurl;
		}
	}

	public function getIPHeader() {
		return $this->info->getOption($this->ip_header_option);
	}

	public function getBrandName() {
		$brand = $this->getBrandInfo();
		if ($brand && array_key_exists('menuname', $brand)) {
			return $brand['menuname'];
		}
		return $this->brandname;
	}

	public function getBrandInfo() {
		return $this->info->getOption($this->brand_option);
	}

	public function authenticatedUrl($method, $apicheck = null, $full = true) {
		$_params = $this->auth->newAuthParams($this->version);
		if ($apicheck) {
			$_params['bvapicheck'] = $apicheck;
		}
		$qstr = http_build_query($_params);
		if (!$full)
			return $method."?".$qstr;
		return $this->appUrl().$method."?".$qstr;
	}
	
	public function isConfigured() {
		return $this->auth->defaultPublic();
	}

	public function getMonitTime() {
		$time = $this->info->getOption('bvmonittime');
		return ($time ? $time : 0);
	}

	public function unSetMonitTime() {
		return $this->info->deleteOption('bvmonittime');
	}

	public function setMonitTime() {
		return $this->info->updateOption('bvmonittime', time());
	}

	public function isActivePlugin() {
		$expiry_time = time() - (3 * 24 * 3600);
		return ($this->getMonitTime() > $expiry_time);
	}

	public function isProtectModuleEnabled() {
		return ($this->info->getOption('bvptplug') === $this->plugname) &&
				$this->isActivePlugin();
	}

	public function isDynSyncModuleEnabled() {
		return ($this->info->getOption('bvdynplug') === $this->plugname) &&
				$this->isActivePlugin();
	}

	public function pingbv($method) {
		$body = array();
		$this->info->basic($body);
		$body['plug'] = $this->plugname;
		$url = $this->authenticatedUrl($method);
		$this->lib->http_request($url, $body);
	}

	public function setup($rand_secret) {
		$this->info->updateOption('bvSecretKey', $rand_secret);
		$this->info->updateOption($this->plug_redirect, 'yes');
		$this->info->updateOption('bvActivateTime', time());
	}

	public function isActivateRedirectSet() {
		if ($this->info->getOption($this->plug_redirect) === 'yes') {
			$this->info->updateOption($this->plug_redirect, 'no');
			return true;
		}
		return false;
	}

	public function activate() {
		if (!isset($_REQUEST['blogvaultkey'])) {
			##BVKEYSLOCATE##
		}
		if ($this->isConfigured()) {
			/* This informs the server about the activation */
			$this->pingbv('/bvapi/activate');
		} else {
			$this->setup($this->lib->randString(32));
		}
	}

	public function footerHandler() {
		$bvfooter = $this->info->getOption($this->badgeinfo);
		if ($bvfooter) {
			echo '<div style="max-width:150px;min-height:70px;margin:0 auto;text-align:center;position:relative;">
					<a href='.$bvfooter['badgeurl'].' target="_blank" ><img src="'.plugins_url($bvfooter['badgeimg'], __FILE__).'" alt="'.$bvfooter['badgealt'].'" /></a></div>';
		}
	}

	public function deactivate() {
		$this->pingbv('/bvapi/deactivate');
	}

	public static function uninstall() {
		##CLEARLPCONFIG##
		##CLEARFWCONFIG##
		##CLEARDYNSYNCCONFIG##
	}
}
endif;