<?php

// $Id$

/**
 * @file
 */

class WindSecurityManager {

  var $settings = array();
  var $wind_server = 'wind.columbia.edu';
  var $wind_login_uri = '/login';
  var $wind_validate_uri = '/validate';
  var $UNI;
  var $affiliations;
  var $kitten_loggedin;
  var $kitten_email;
  var $kitten_userlevel;
  var $login_error;

  public function __construct($settings) {

    /**
     * Returns whether a session has been started.
     */
    if (!drupal_session_started()) {
      /**
       * Forcefully starts a session, preserving already set session data.
       */
      drupal_session_start();
    }

    $_SESSION['kitten_loggedin'] = (isset($_SESSION['kitten_loggedin'])) ? $_SESSION['kitten_loggedin'] : NULL;
    $_SESSION['UNI'] = (isset($_SESSION['UNI'])) ? $_SESSION['UNI'] : NULL;

    $this->settings = $settings;

  }

  function windURL($api) {
    $is_sandbox = (variable_get('wind|sandbox_mode|enable') ? 'sandbox_' : '');
    return variable_get("wind|wind_service|{$is_sandbox}{$api}_url");
  }

  function verifyTicket($ticketid) {
	  //originally -> $wind_response = file_get_contents($this->windURL('validate') . "?ticketid={$ticketid}");
		
		$wind_request = drupal_http_request($this->windURL('validate')."?ticketid={$ticketid}");
		$wind_response = $wind_request->data;

    /*$wind_response = file_get_contents($this->windURL('validate') . "?ticketid={$ticketid}");*/
    if (strpos($wind_response, '<') === 0) {
      // xml response
      $xml = simplexml_load_string($wind_response, 'SimpleXMLElement', LIBXML_DTDATTR, 'http://www.columbia.edu/acis/rad/authmethods/wind');
      // Uncomment the line below for debugging purposes only.
      // print_r($xml);

      if (($xml->authenticationSuccess) && (!empty($xml->authenticationSuccess))) {
        $this->UNI = (string)$xml->authenticationSuccess->user;
        /**
         * Exception: Serialization of 'SimpleXMLElement' is not allowed in session_write_close().
         * Therefore, set data type as an array.
         */
        $this->affiliations = (array)$xml->authenticationSuccess->affiliations;
        return TRUE;
      }
      elseif (($xml->authenticationFailure) && (!empty($xml->authenticationFailure))) {
        // Uncomment the line below for debugging purposes only.
        // $message = $xml->authenticationFailure;
      }
    }
    else {
      // plain-text response
      $lines = preg_split("/[\s]/", $wind_response, 3);
      if ($lines[0] == "yes") {
        $this->UNI = $lines[1];
        $this->affiliations = preg_split("/\s+/", $lines[2], -1, PREG_SPLIT_NO_EMPTY);
        return TRUE;
      }
    }
    return FALSE;
  }

  function isAuthorized() {

    if (($_SESSION['kitten_loggedin']) && ($_SESSION['UNI'])) {
      return TRUE;
    }

    $authenticated = FALSE;

    /**
     * Your Columbia Universal Network Identifier (UNI).
     */
    $this->UNI = 0;

    $this->kitten_email = '';
    $this->kitten_loggedin = FALSE;
    $this->kitten_userlevel = 0;

    list($this->UNI, $this->kitten_email, $this->kitten_userlevel, $this->kitten_loggedin) = $this->refresh_session_variables();

    $ticketid = ($ticketid = filter_input(INPUT_GET, 'ticketid', FILTER_SANITIZE_STRING)) ? $ticketid : NULL;

    /**
     * Begin login processing, if necessary.
     */
    if (!is_null($ticketid)) {
      $authenticated = $this->verifyTicket($ticketid);
    }
    else {
      $this->login_form();
    }

    /**
     * At this point, if authentication was successful, $authenticated and $UNI are set.
     * If unsuccessful, $authenticated is false.
     */
    if ($authenticated) {
      $this->kitten_loggedin = TRUE;
      $this->kitten_email = $this->UNI . '@columbia.edu';
      $this->kitten_userlevel = 1;

      /**
       * Permitted Users function not in use currently
       */
      //if (isset($this->settings['permittedUsers'])) {
      //  if (!in_array($this->UNI,$this->settings['permittedUsers']))
      //    // Deny access if not authorized
      //    return false;
      //  }
      // }

      $_SESSION['UNI'] = $this->UNI;
      $_SESSION['kitten_email'] = $this->kitten_email;
      $_SESSION['kitten_userlevel'] = $this->kitten_userlevel;
      $_SESSION['kitten_loggedin'] = $this->kitten_loggedin;
      $_SESSION['wind']['affiliations'] = $this->affiliations;
      $_SESSION['wind']['ticketid'] = $ticketid;

      return TRUE;
    }

    return FALSE;
  }

  /**
   * Simple login form.
   */
  function login_form() {

    global $base_url;

    $wind_realm = $this->settings['windService'];

    $wind_destination_path = ($wind_destination_path = filter_input(INPUT_GET, 'wind_destination_path', FILTER_SANITIZE_STRING)) ? $wind_destination_path : NULL;

    $path = 'user/wind';

    if ($wind_destination_path) {
      $path = $path . '?wind_destination_path=' . $wind_destination_path;
    }

    $destination = "{$base_url}/{$path}";

    $login_link = $this->windURL('login') . "?service={$wind_realm}&destination=" . urlencode($destination);

    if ($this->kitten_loggedin) {
      session_destroy();
      echo "You are currently logged in as <strong>{$this->kitten_email}</strong><br />";
      drupal_goto($login_link);
    }
    else {
      drupal_goto($login_link);
    }

    return FALSE;

  }

  /**
   * Refresh the session variables into the current scope.
   */
  function refresh_session_variables() {

    $_SESSION['kitten_email'] = (isset($_SESSION['kitten_email'])) ? $_SESSION['kitten_email'] : '';
    $_SESSION['UNI'] = (isset($_SESSION['UNI'])) ? $_SESSION['UNI'] : 0;
    $_SESSION['kitten_userlevel'] = (isset($_SESSION['kitten_userlevel'])) ? $_SESSION['kitten_userlevel'] : 0;

    $this->UNI = $_SESSION['UNI'];
    $this->kitten_email = $_SESSION['kitten_email'];
    $this->kitten_userlevel = $_SESSION['kitten_userlevel'];
    $this->kitten_loggedin = (bool)($this->kitten_userlevel > 0) ? TRUE : FALSE;

    $result = array($this->UNI, $this->kitten_email, $this->kitten_userlevel, $this->kitten_loggedin);

    return $result;

  }

}
