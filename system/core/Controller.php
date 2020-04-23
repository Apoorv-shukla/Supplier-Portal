<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

	/**
	 * Reference to the CI singleton
	 *
	 * @var	object
	 */
	private static $instance;

	/**
	 * Class constructor
	 *
	 * @return	void
	 */
	public function __construct()
	{
		self::$instance =& $this;

		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');
		$this->load->initialize();
		log_message('info', 'Controller Class Initialized');
	}

	// --------------------------------------------------------------------

	/**
	 * Get the CI singleton
	 *
	 * @static
	 * @return	object
	 */
	public static function &get_instance()
	{
		return self::$instance;
	}

	public function getAccessTokenSalesforce(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
			/*CURLOPT_URL => "https://cs105.salesforce.com/services/oauth2/token?grant_type=password&client_id=3MVG9LzKxa43zqdJUFWSEMqtd.gv8dsD6w6pL7_rmlSrBDnTNeYtJoES6AaVcLwGBhKhDR_55oZMVoiuzghMG&client_secret=23D44AF4ABE6B6564D41AD65A093057B18AA9591BFCA20E3E9192579420D7AE4&username=ronald@digital-transformation.institute.360DCAPI&password=g6bHkGnpfnWaohUpn",*/
			//CURLOPT_URL =>"https://test.salesforce.com/services/oauth2/token?grant_type=password&client_id=3MVG9Lu3LaaTCEgLmAlD0wLY9XXQkwHfLeWyC6NVgxtnIkaF6_C9Ipqbx6tfHu8zhSQkkcI7THNAFx.tmD8gW&client_secret=1F7146F36C50F2DC2B98976043DF2A15B663AD7B4BCF8E3F1234C6CD658BE251&username=ronald@digital-transformation.institute.manrasdev&password=360degreecloud1",
			CURLOPT_URL =>"https://test.salesforce.com/services/oauth2/token?grant_type=password&client_id=3MVG9ZPHiJTk7yFyo2kgZvLTvpimyJPFdhTUO41uOFoI50aZA0KWoJgQToMMEv3twiaSFoZCuUp85aZ8I0eFd&client_secret=620353F448BB43998D7B02992BFEF5BFEF3205F63B59B7CA840CCAB12B1B7C28&username=ronald@digital-transformation.institute.manrasdev&password=zFUDvLQ^rIB}0kcW>",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  return json_decode($response);
		}
	}

}
