<?php
defined('BASEPATH') OR exit('No direct script access allowed');




class KareoController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	
	public function index() {
		$this->load->helper('url');
		$this->load->view('index');
    }
    
    public function CreateAppointment()
    {
        $this->load->helper('url');

		$this->load->library('session');
		//$this->session->set_userdata('sesion', 1);
		

		//$this->load->database('default');
		//$this->load->model('strabajador');
			
        $this->request = json_decode(file_get_contents('php://input'));
        
        $curl = curl_init();

curl_setopt($curl , CURLOPT_URL , 'https://www.zohoapis.com/crm/v2/functions/serverlesstest/actions/execute?auth_type=apikey&zapikey=1003.bd8bfa9be391059bc021faf645da2de5.35e6095fb73458fc45f37cba022b1791');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$ress = curl_exec($curl);

$jsonn = json_decode($ress);
$details = $jsonn->details;
$output = $details->output;

echo $ress . '<br/><br/>';

$dataMap = json_decode($output);

print_r($output);

echo '<br/><br/>';

try{
    $user = 'antonio@marksgroup.net';
    $password = 'PLKu4Wf*';
    $customerKey = 'g74nf36tq59z';
    //----------------------------------------
    $AppointmentStatus = '';
    $AppointmentType = '';
    $EndTime = $dataMap->EndTime;
    $ForRecare = $dataMap->ForRecare;
    $IsDeleted = $dataMap->IsDeleted;
    $IsGroupAppointment = $dataMap->IsGroupAppointment;
    $IsRecurring = $dataMap->IsRecurring;
    $DateOfBirth = $dataMap->DateOfBirth;
    $FirstName = $dataMap->FirstName;
    $GenderId = $dataMap->GenderId;
    $HomePhone = $dataMap->HomePhone;
    $LastName  = $dataMap->LastName ;
    $MobilePhone = $dataMap->MobilePhone;
    $PatientId = $dataMap->PatientId;
    $PracticeId = $dataMap->PracticeId;
    $ProviderId = $dataMap->ProviderId;
    $ServiceLocationId = $dataMap->ServiceLocationId;
    $StartTime  = $dataMap->StartTime ;
    $WasCreatedOnline = $dataMap->WasCreatedOnline;
    // $AppointmentStatus = 'Scheduled';
    // $AppointmentType = 'P';
    // $EndTime = '2021-01-28T17:30:00.000Z';
    // $ForRecare = false;
    // $IsDeleted = false;
    // $IsGroupAppointment = false;
    // $IsRecurring = false;
    // $DateOfBirth = '1975-04-04';
    // $FirstName = 'TESTTEST';
    // $GenderId = '2';
    // $HomePhone = '(001)245-4567';
    // $LastName = 'Omar';
    // $MobilePhone = '(871)158-7895';
    // $PatientId = '26';
    // $PracticeId = '3';
    // $ProviderId = '42';
    // $ServiceLocationId = '3';
    // $StartTime = '2021-01-28T17:00:00.000Z';
    // $WasCreatedOnline = true;

    $PatientSummary = ['DateOfBirth' => $DateOfBirth, 'FirstName' => $FirstName, 'GenderId' => $GenderId, 'HomePhone' => $HomePhone, 'LastName' => $LastName, 'MobilePhone' => $MobilePhone, 'PatientId' => $PatientId];
    
    $wsdl = 'https://webservice.kareo.com/services/soap/2.1/KareoServices.svc?singleWsdl';
    $client = new SoapClient($wsdl);
    
    $request = array (
        'RequestHeader' => ['User' => $user, 'Password' => $password, 'CustomerKey' => $customerKey],
        'Appointment' => ['AppointmentStatus' => $AppointmentStatus, 'AppointmentType' => $AppointmentType, 'EndTime' => $EndTime, 'ForRecare' => $ForRecare, 'IsDeleted' => $IsDeleted, 'IsGroupAppointment' => $IsGroupAppointment, 'IsRecurring' => $IsRecurring, 'PatientSummary' => $PatientSummary, 'PracticeId' => $PracticeId, 'ProviderId' => $ProviderId, 'ServiceLocationId' => $ServiceLocationId, 'StartTime' => $StartTime, 'WasCreatedOnline' => $WasCreatedOnline,],
    );
    // echo json_encode($request) . '<br />';


    $params = array('request' => $request);
    $response = $client->CreateAppointment($params)->CreateAppointmentResult;

    print_r ($response);

    echo '<br />';

    echo json_encode($response) . '<br />';

    // foreach($response->Patients->PatientData as &$value)
    // {
    //     print($value->PatientFullName. '<br />');
    // }
} catch (Exception $err) {
    print "Error: ". $err->getMessage();
}
return $response;


    }


public function CreatePatient()
{

    $this->load->helper('url');

		//$this->load->library('session');
		//$this->session->set_userdata('sesion', 1);
		

		//$this->load->database('default');
		//$this->load->model('strabajador');
			
    //$this->request = json_decode(file_get_contents('php://input'));

    $AddressLine1 = $this->input->post("AddressLine1");
    $AddressLine2 = $this->input->post("AddressLine2");
    $City = $this->input->post("City");
    $Country = $this->input->post("Country");
    $DateofBirth = $this->input->post("DateofBirth");
    $EmailAddress = $this->input->post("EmailAddress");
    $FirstName = $this->input->post("FirstName");
    $Gender=$this->input->post("Gender");
    $HomePhone=$this->input->post("HomePhone");
    $LastName=$this->input->post("LastName");
    $MobilePhone=$this->input->post("MobilePhone");
    $State=$this->input->post("State");
    $WorkPhone=$this->input->post("WorkPhone");
    $ZipCode=$this->input->post("ZipCode");
    $ContactFullName=$this->input->post("ContactFullName");
    $ContactPhone=$this->input->post("ContactPhone");
    $InsurancePlanName=$this->input->post("InsurancePlanName");
    $Number=$this->input->post("Number");
    $NumberOfVisits=$this->input->post("NumberOfVisits");
    $Copay=$this->input->post("Copay");
    $Deductible=$this->input->post("Deductible");
    $InsuredDateofBirth=$this->input->post("InsuredDateofBirth");
    $InsuredFirstName=$this->input->post("InsuredFirstName");
    $InsuredLastName=$this->input->post("InsuredLastName");
    $InsuredMiddleName=$this->input->post("InsuredMiddleName");
    $PlanName=$this->input->post("PlanName");
    $PolicyGroupNumber=$this->input->post("PolicyGroupNumber");
    $PolicyNotes=$this->input->post("PolicyNotes");
    $PolicyNumber=$this->input->post("PolicyNumber");
    $PracticeID=$this->input->post("PracticeID");
    $PracticeName=$this->input->post("PracticeName");

    try{
        $user = 'antonio@marksgroup.net';
        $password = 'PLKu4Wf*';
        $customerKey = 'g74nf36tq59z';
    
    
        $wsdl = 'https://webservice.kareo.com/services/soap/2.1/KareoServices.svc?singleWsdl';
        $client = new SoapClient($wsdl);
    
        // 'Authorizations'=>[
        //     'InsurancePolicyAuthorizationCreateReq'=>[
        //         'ContactFullName'=>$ContactFullName, 'ContactPhone'=>$ContactPhone,'InsurancePlanName'=>$InsurancePlanName,'Number'=>$Number,'NumberOfVisits'=>$NumberOfVisits ]],
        $Cases=array(
            'PatientCaseCreateReq'=>[
            'Policies'=>[
                'InsurancePolicyCreateReq'=>[
                    'Copay'=>$Copay,'Deductible'=>$Deductible, 
                    'Insured'=>[
                        'DateofBirth'=>$InsuredDateofBirth, 'FirstName'=>$InsuredFirstName, 'LastName'=>$InsuredLastName, 'MiddleName'=>$InsuredMiddleName], 
                    'PlanName'=>$PlanName, 'PolicyGroupNumber'=>$PolicyGroupNumber, 'PolicyNotes'=>$PolicyNotes, 'PolicyNumber'=>$PolicyNumber]]]
        );
        $Practice=array(
            'PracticeID'=>$PracticeID, 'PracticeName'=>$PracticeName
        );
    
    
        $request = array (
            'RequestHeader' => [
                'User' => $user, 'Password' => $password, 'CustomerKey' => $customerKey],
            'Patient'=>[
                'AddressLine1'=>$AddressLine1, 'AddressLine2'=>$AddressLine2, 'Cases'=>$Cases, 'City'=>$City, 'Country'=>$Country, 'DateofBirth'=>$DateofBirth, 'EmailAddress'=>$EmailAddress, 'FirstName'=>$FirstName, 'Gender'=>$Gender, 'HomePhone'=>$HomePhone, 'LastName'=>$LastName, 'MobilePhone'=>$MobilePhone, 'Practice'=>$Practice, 'State'=>$State, 'WorkPhone'=>$WorkPhone, 'ZipCode'=>$ZipCode]
        );
        // echo json_encode($request);
    
        $params = array('request' => $request);
        $response = $client->CreatePatient($params)->CreatePatientResult;
    
        print_r($response);
        $PatientData =json_encode($response);
    
        echo $PatientData;
        print_r ($PatientData);
    
        // foreach($response->Patients->PatientData as &$value)
        // {
        //     print($value->PatientFullName. '<br />');
        // }
    } catch (Exception $err) {
        print "Error: ". $err->getMessage();
    }
    //$jsson_convert = json_decode($jsson);
    //$output = $jsson_convert->output;

    //$dataMap = json_decode($output);
    
    /*$curl = curl_init();

curl_setopt($curl , CURLOPT_URL , 'https://www.zohoapis.com/crm/v2/functions/createpatients/actions/execute?auth_type=apikey&zapikey=1003.bd8bfa9be391059bc021faf645da2de5.35e6095fb73458fc45f37cba022b1791');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$ress = curl_exec($curl);

echo $ress;
$jsonn=json_decode($ress);
$details=$this->input->post("tails;
$output=$details->output;

echo $ress . '<br/><br/>';

$dataMap=json_decode($jsonn);

print_r($output. '<br/><br/>');*/
//return $AddressLine1;
}





	public function TEST() {

		$this->load->helper('url');

		$this->load->library('session');
		//$this->session->set_userdata('sesion', 1);
		

		//$this->load->database('default');
		//$this->load->model('strabajador');
			
        $this->request = json_decode(file_get_contents('php://input'));
        
        $AddressLine1="Test line 1";
$AddressLine2="Test line 2";
$City="Philadelphia";
$Country="U.S.";
$DateofBirth="1970-01-01";
$EmailAddress="TestQA2@gmail.com";
$FirstName="TEST TEST";
$Gender="Male";
$HomePhone="(871)785-8965";
$LastName="Omar";
$MobilePhone="(871)654-8569";
$PatientID=26;
$State="PA";
$WorkPhone="(871)854-2154";
$ZipCode=19148;
$PracticeID=3;
$PracticeName="Sandbox";
$user = 'antonio@marksgroup.net';
    $password = 'PLKu4Wf*';
    $customerKey = 'g74nf36tq59z';
    $Practice=array(
        'PracticeID'=>$PracticeID, 'PracticeName'=>$PracticeName
    );


    $UpdatePatientReq = array (
        'RequestHeader' => [
            'User' => $user, 'Password' => $password, 'CustomerKey' => $customerKey],
        'Patient'=>[
            'AddressLine1'=>$AddressLine1, 'AddressLine2'=>$AddressLine2, 'City'=>$City, 'Country'=>$Country, 'DateofBirth'=>$DateofBirth, 'EmailAddress'=>$EmailAddress, 'FirstName'=>$FirstName, 'Gender'=>$Gender, 'HomePhone'=>$HomePhone, 'LastName'=>$LastName, 'MobilePhone'=>$MobilePhone,'PatientID'=>$PatientID, 'Practice'=>$Practice, 'State'=>$State, 'WorkPhone'=>$WorkPhone, 'ZipCode'=>$ZipCode]
    );
    

    $params = array('UpdatePatientReq' => $UpdatePatientReq);
    echo json_encode($params);
    return $params;
        /*$curl = curl_init();

        curl_setopt($curl , CURLOPT_URL , 'https://www.zohoapis.com/crm/v2/functions/createpatients/actions/execute?auth_type=apikey&zapikey=1003.bd8bfa9be391059bc021faf645da2de5.35e6095fb73458fc45f37cba022b1791');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        $ress = curl_exec($curl);
        
        $jsonn=json_decode($ress);
        $details=$jsonn->details;
        $output=$details->output;
        
        echo $ress . '<br/><br/>';
        
        $dataMap=json_decode($output);
        
        print_r($output. '<br/><br/>');
        
        
        try{
            $user = 'antonio@marksgroup.net';
            $password = 'PLKu4Wf*';
            $customerKey = 'g74nf36tq59z';
        
            $AddressLine1=$dataMap->AddressLine1;
            $AddressLine2=$dataMap->AddressLine2;
            $City=$dataMap->City;
            $Country=$dataMap->Country;
            $DateofBirth=$dataMap->DateofBirth;
            $EmailAddress=$dataMap->EmailAddress;
            $FirstName=$dataMap->FirstName;
            $Gender=$dataMap->Gender;
            $HomePhone=$dataMap->HomePhone;
            $LastName=$dataMap->LastName;
            $MobilePhone=$dataMap->MobilePhone;
            $State=$dataMap->State;
            $WorkPhone=$dataMap->WorkPhone;
            $ZipCode=$dataMap->ZipCode;
            $ContactFullName=$dataMap->ContactFullName;
            $ContactPhone=$dataMap->ContactPhone;
            $InsurancePlanName=$dataMap->InsurancePlanName;
            $Number=$dataMap->Number;
            $NumberOfVisits=$dataMap->NumberOfVisits;
            $Copay=$dataMap->Copay;
            $Deductible=$dataMap->Deductible;
            $InsuredDateofBirth=$dataMap->InsuredDateofBirth;
            $InsuredFirstName=$dataMap->InsuredFirstName;
            $InsuredLastName=$dataMap->InsuredLastName;
            $InsuredMiddleName=$dataMap->InsuredMiddleName;
            $PlanName=$dataMap->PlanName;
            $PolicyGroupNumber=$dataMap->PolicyGroupNumber;
            $PolicyNotes=$dataMap->PolicyNotes;
            $PolicyNumber=$dataMap->PolicyNumber;
            $PracticeID=$dataMap->PracticeID;
            $PracticeName=$dataMap->PracticeName;
        
        
            $wsdl = 'https://webservice.kareo.com/services/soap/2.1/KareoServices.svc?singleWsdl';
            $client = new SoapClient($wsdl);
        
            // 'Authorizations'=>[
            //     'InsurancePolicyAuthorizationCreateReq'=>[
            //         'ContactFullName'=>$ContactFullName, 'ContactPhone'=>$ContactPhone,'InsurancePlanName'=>$InsurancePlanName,'Number'=>$Number,'NumberOfVisits'=>$NumberOfVisits ]],
            $Cases=array(
                'PatientCaseCreateReq'=>[
                'Policies'=>[
                    'InsurancePolicyCreateReq'=>[
                        'Copay'=>$Copay,'Deductible'=>$Deductible, 
                        'Insured'=>[
                            'DateofBirth'=>$InsuredDateofBirth, 'FirstName'=>$InsuredFirstName, 'LastName'=>$InsuredLastName, 'MiddleName'=>$InsuredMiddleName], 
                        'PlanName'=>$PlanName, 'PolicyGroupNumber'=>$PolicyGroupNumber, 'PolicyNotes'=>$PolicyNotes, 'PolicyNumber'=>$PolicyNumber]]]
            );
            $Practice=array(
                'PracticeID'=>$PracticeID, 'PracticeName'=>$PracticeName
            );
        
        
            $request = array (
                'RequestHeader' => [
                    'User' => $user, 'Password' => $password, 'CustomerKey' => $customerKey],
                'Patient'=>[
                    'AddressLine1'=>$AddressLine1, 'AddressLine2'=>$AddressLine2, 'Cases'=>$Cases, 'City'=>$City, 'Country'=>$Country, 'DateofBirth'=>$DateofBirth, 'EmailAddress'=>$EmailAddress, 'FirstName'=>$FirstName, 'Gender'=>$Gender, 'HomePhone'=>$HomePhone, 'LastName'=>$LastName, 'MobilePhone'=>$MobilePhone, 'Practice'=>$Practice, 'State'=>$State, 'WorkPhone'=>$WorkPhone, 'ZipCode'=>$ZipCode]
            );
            // echo json_encode($request);
        
            $params = array('request' => $request);
            $response = $client->CreatePatient($params)->CreatePatientResult;
        
            print_r($response);
            $PatientData =json_encode($response);
        
            print_r ($PatientData);
        
            // foreach($response->Patients->PatientData as &$value)
            // {
            //     print($value->PatientFullName. '<br />');
            // }
        } catch (Exception $err) {
            print "Error: ". $err->getMessage();
        }*/
        
        
	}

}