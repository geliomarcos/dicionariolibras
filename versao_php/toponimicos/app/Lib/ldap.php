<?php
	class ldap {

		private $ldap = null;
		private $ldapServer = '172.19.0.7';
		private $ldapPort = '389';
		public $suffix = '@uninorteac.com.br';
		public $baseDN = 'dc=uninorteac,dc=com,dc=br';
		private $ldapUser = 'ruberson.maia';
		private $ldapPassword = '00728619245';

		public function __construct() {
			$this->ldap = ldap_connect($this->ldapServer,$this->ldapPort);
			
			//these next two lines are required for windows server 03
			ldap_set_option($this->ldap, LDAP_OPT_REFERRALS, 0);
			ldap_set_option($this->ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
		}

		public function auth($user,$pass) {
			if (empty($user) or empty($pass))  {
				return false;
			}
			@$good = ldap_bind($this->ldap,$user.$this->suffix,$pass);
			if ($good === true  ){
				return true;
			} else {
				return false;
			}
		}

		public function __destruct() {
			ldap_unbind($this->ldap);
		}

		public function getInfo($user, $pass){
			$username = $user.$this->suffix;;
			$attributes = array('givenName', 
								'sn', 
								'mail', 
								'samaccountname', 
								'memberof', 
								'useraccountcontrol');
			$filter = "(userPrincipalName=$username)";

			ldap_bind($this->ldap,$user.$this->suffix,$pass);
			$result = ldap_search($this->ldap, $this->baseDN, $filter, $attributes);
			$entries = ldap_get_entries($this->ldap, $result);

			return $this->formatInfo($entries);
		}

		private function formatInfo($array) {
			$info = array();
			$info['first_name'] = $array[0]['givenname'][0];
			$info['last_name'] = $array[0]['sn'][0];
			$info['name'] = $info['first_name'] .' '. $info['last_name'];
			$info['email'] = $array[0]['mail'][0];
			$info['user'] = $array[0]['samaccountname'][0];
			$info['groups'] = $this->groups($array[0]['memberof']);
			$info['status'] = $array[0]['useraccountcontrol'][0];
			return $info;
		}

		private function groups($array) {
			$groups = array();
			$tmp = array();

			foreach($array as $entry) {
				$tmp = array_merge($tmp,explode(',',$entry));
			}

			foreach($tmp as $value) {
				if( substr($value,0,2) == 'CN' ){
					$groups[] = substr($value,3);
				}
			}

			return $groups;
		}

		public function getUserAccountControlAttributes($inputCode) {
		/**
		* http://support.microsoft.com/kb/305144
		*
		* You cannot set some of the values on a user or computer object because
		* these values can be set or reset only by the directory service.
		*
		*/
		$userAccountControlFlags = array(16777216 => "TRUSTED_TO_AUTH_FOR_DELEGATION",
										8388608 => "PASSWORD_EXPIRED",
										4194304 => "DONT_REQ_PREAUTH",
										2097152 => "USE_DES_KEY_ONLY",
										1048576 => "NOT_DELEGATED",
										524288 => "TRUSTED_FOR_DELEGATION",
										262144 => "SMARTCARD_REQUIRED",
										131072 => "MNS_LOGON_ACCOUNT",
										65536 => "DONT_EXPIRE_PASSWORD",
										8192 => "SERVER_TRUST_ACCOUNT",
										4096 => "WORKSTATION_TRUST_ACCOUNT",
										2048 => "INTERDOMAIN_TRUST_ACCOUNT",
										512 => "NORMAL_ACCOUNT",
										256 => "TEMP_DUPLICATE_ACCOUNT",
										128 => "ENCRYPTED_TEXT_PWD_ALLOWED",
										64 => "PASSWD_CANT_CHANGE",
										32 => "PASSWD_NOTREQD",
										16 => "LOCKOUT",
										8 => "HOMEDIR_REQUIRED",
										2 => "ACCOUNTDISABLE",
										1 => "SCRIPT");

			$attributes = NULL;
			while($inputCode > 0) {
			    foreach($userAccountControlFlags as $flag => $flagName) {
			        $temp = $inputCode-$flag;
			        if($temp>0) {
			            $attributes[$userAccountControlFlags[$flag]] = $flag;
			            $inputCode = $temp;
			        }
			        if($temp==0) {
			            if(isset($userAccountControlFlags[$inputCode])) {
			                $attributes[$userAccountControlFlags[$inputCode]] = $inputCode;
			            }
			            $inputCode = $temp;
			        }
			    }
			}
			return $attributes;
		}
}
?>