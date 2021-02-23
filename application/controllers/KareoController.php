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
        
        $AppointmentName=$this->input->post("AppointmentName");
        $AppointmentStatus=$this->input->post("AppointmentStatus");
        $AppointmentType=$this->input->post("AppointmentType");
        $EndTime=$this->input->post("EndTime");
        $ForRecare=$this->input->post("ForRecare");
        $IsDeleted=$this->input->post("IsDeleted");
        $IsGroupAppointment=$this->input->post("IsGroupAppointment");
        $IsRecurring=$this->input->post("IsRecurring");
        $MaxAttendees=$this->input->post("MaxAttendees");
        $DateOfBirth=$this->input->post("DateOfBirth");
        $FirstName=$this->input->post("FirstName");
        $GenderId=$this->input->post("GenderId");
        $HomePhone=$this->input->post("HomePhone");
        $LastName=$this->input->post("LastName");
        $MobilePhone=$this->input->post("MobilePhone");
        $PatientId=$this->input->post("PatientId");
        $PracticeId=$this->input->post("PracticeId");
        $ProviderId=$this->input->post("ProviderId");
        $ServiceLocationId=$this->input->post("ServiceLocationId");
        $StartTime=$this->input->post("StartTime");
        $WasCreatedOnline=$this->input->post("WasCreatedOnline");
		

        try{
            $user = $this->input->post("user");
            $password = $this->input->post("password");
            $customerKey = $this->input->post("customerKey");
            $zohoToken = $this->input->get("zohoToken");
    //----------------------------------------
    
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
    // $WasCreatedOnline = true;/

    $PatientSummary = ['DateOfBirth' => $DateOfBirth, 'FirstName' => $FirstName, 'GenderId' => $GenderId, 'HomePhone' => $HomePhone, 'LastName' => $LastName, 'MobilePhone' => $MobilePhone, 'PatientId' => $PatientId];
    
    $wsdl = 'https://webservice.kareo.com/services/soap/2.1/KareoServices.svc?singleWsdl';
    $client = new SoapClient($wsdl);
    
    $request = array (
        'RequestHeader' => ['User' => $user, 'Password' => $password, 'CustomerKey' => $customerKey],
        'Appointment' => ['AppointmentName'=>$AppointmentName, 'AppointmentStatus' => $AppointmentStatus, 'AppointmentType' => $AppointmentType, 'EndTime' => $EndTime, 'ForRecare' => $ForRecare, 'IsDeleted' => $IsDeleted, 'IsGroupAppointment' => $IsGroupAppointment, 'IsRecurring' => $IsRecurring, 'MaxAttendees'=>$MaxAttendees,'PatientSummary' => $PatientSummary, 'PracticeId' => $PracticeId, 'ProviderId' => $ProviderId, 'ServiceLocationId' => $ServiceLocationId, 'StartTime' => $StartTime, 'WasCreatedOnline' => $WasCreatedOnline,],
    );
    // echo json_encode($request) . '<br />';
    // echo '<br />';

    $params = array('request' => $request);
    $response = $client->CreateAppointment($params)->CreateAppointmentResult;

    // print_r($response);
    $AppointmentData =json_encode($response);

    echo $AppointmentData;
    // print_r ($AppointmentData);
    return $AppointmentData;

    // echo json_encode($response) . '<br />';

    // foreach($response->Patients->PatientData as &$value)
    // {
    //     print($value->PatientFullName. '<br />');
    // }
} catch (Exception $err) {
    print "Error: ". $err->getMessage();
}


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
    $CaseName=$this->input->post("CaseName");
    $PlanName=$this->input->post("PlanName");
    $PolicyGroupNumber=$this->input->post("PolicyGroupNumber");
    $PolicyNotes=$this->input->post("PolicyNotes");
    $PolicyNumber=$this->input->post("PolicyNumber");
    $PracticeID=$this->input->post("PracticeID");
    $PracticeName=$this->input->post("PracticeName");

    try{
        $user = $this->input->post("user");
        $password = $this->input->post("password");
        $customerKey = $this->input->post("customerKey");
        $zohoToken = $this->input->get("zohoToken");
    
    
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
                        'PlanName'=>$PlanName,'CaseName'=>$CaseName, 'PolicyGroupNumber'=>$PolicyGroupNumber, 'PolicyNotes'=>$PolicyNotes, 'PolicyNumber'=>$PolicyNumber]]]
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
    
        // print_r($response);
        //  echo '<br />';
        $PatientData =json_encode($response);
    
        echo $PatientData;
        // print_r ($PatientData);
        return $PatientData;
        // foreach($response->Patients->PatientData as &$value)
        // {
        //     print($value->PatientFullName. '<br />');
        // }
    } catch (Exception $err) {
        print "Error: ". $err->getMessage();
    }
}
public function UpdatePatient()
{

    $this->load->helper('url');

    $AddressLine1 = $this->input->post("AddressLine1");
    $AddressLine2 = $this->input->post("AddressLine2");
    $City = $this->input->post("City");
    $Country = $this->input->post("Country");
    $DateofBirth = $this->input->post("DateofBirth");
    $EmailAddress = $this->input->post("EmailAddress");
    $FirstName = $this->input->post("FirstName");
    $Gender = $this->input->post("Gender");
    $HomePhone = $this->input->post("HomePhone");
    $LastName = $this->input->post("LastName");
    $MobilePhone = $this->input->post("MobilePhone");
    $PatientID = $this->input->post("PatientID");
    $State = $this->input->post("State");
    $WorkPhone = $this->input->post("WorkPhone");
    $ZipCode = $this->input->post("ZipCode");
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
    $PracticeID = $this->input->post("PracticeID");
    $PracticeName = $this->input->post("PracticeName");
    
    try{
        $user = $this->input->post("user");
        $password = $this->input->post("password");
        $customerKey = $this->input->post("customerKey");
        $zohoToken = $this->input->get("zohoToken");
        //-------------------------------------


        $wsdl = 'https://webservice.kareo.com/services/soap/2.1/KareoServices.svc?singleWsdl';
        $client = new SoapClient($wsdl);
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


        $UpdatePatientReq = array (
            'RequestHeader' => [
                'User' => $user, 'Password' => $password, 'CustomerKey' => $customerKey],
            'Patient'=>[
                'AddressLine1'=>$AddressLine1, 'AddressLine2'=>$AddressLine2, 'Cases'=>$Cases,'City'=>$City, 'Country'=>$Country, 'DateofBirth'=>$DateofBirth, 'EmailAddress'=>$EmailAddress, 'FirstName'=>$FirstName, 'Gender'=>$Gender, 'HomePhone'=>$HomePhone, 'LastName'=>$LastName, 'MobilePhone'=>$MobilePhone,'PatientID'=>$PatientID, 'Practice'=>$Practice, 'State'=>$State, 'WorkPhone'=>$WorkPhone, 'ZipCode'=>$ZipCode]
        );
        // echo json_encode($UpdatePatientReq);

        $params = array('UpdatePatientReq' => $UpdatePatientReq);
        $response = $client->UpdatePatient($params)->UpdatePatientResult;

        // print_r ($response);
        // echo '<br />';
        $PatientData =json_encode($response);
    
        echo $PatientData;
        // print_r ($PatientData);
        return $PatientData;
        // foreach($response->Patients->PatientData as &$value)
        // {
        //     print($value->PatientFullName. '<br />');
        // }
    } catch (Exception $err) {
        print "Error: ". $err->getMessage();
    }

}

public function UpdateAppointment()
{

    $this->load->helper('url');
    $AppointmentName=$this->input->post("AppointmentName");
    $AppointmentId=$this->input->post("AppointmentId");
    $AppointmentReasonId=$this->input->post("AppointmentReasonId"); 
    $AppointmentStatus =$this->input->post("AppointmentStatus");
    $EndTime =$this->input->post("EndTime");
    $IsGroupAppointment =$this->input->post("IsGroupAppointment");
    $IsRecurring =$this->input->post("IsRecurring");
    $MaxAttendees=$this->input->post("MaxAttendees");
    $PatientId =$this->input->post("PatientId");
    //$PracticeId =$this->input->post("PracticeId");
    $ProviderId =$this->input->post("ProviderId");
    $ResourceId=$this->input->post("ResourceId");
    $UpdatedBy=$this->input->post("UpdatedBy");
    $ServiceLocationId =$this->input->post("ServiceLocationId");
    $StartTime =$this->input->post("StartTime");

    try{
        $user = $this->input->post("user");
        $password = $this->input->post("password");
        $customerKey = $this->input->post("customerKey");
        $zohoToken = $this->input->get("zohoToken");
    
    
       
        
        
        
        //$PatientSummary = ['DateOfBirth' => $DateOfBirth, 'FirstName' => $FirstName, 'GenderId' => $GenderId, 'HomePhone' => $HomePhone, 'LastName' => $LastName, 'MobilePhone' => $MobilePhone, 'PatientId' => $PatientId];
        
        $wsdl = 'https://webservice.kareo.com/services/soap/2.1/KareoServices.svc?singleWsdl';
        $client = new SoapClient($wsdl);
        
        $request = array (
            'RequestHeader' => ['User' => $user, 'Password' => $password, 'CustomerKey' => $customerKey],
            'Appointment' => ['AppointmentName'=>$AppointmentName,'AppointmentId'=>$AppointmentId, 'AppointmentReasonId'=>$AppointmentReasonId,'AppointmentStatus' => $AppointmentStatus, 'EndTime' => $EndTime,'IsGroupAppointment' => $IsGroupAppointment, 'IsRecurring' => $IsRecurring, 'MaxAttendees'=>$MaxAttendees,'PatientId'=>$PatientId, 'ProviderId' => $ProviderId, 'ResourceId'=>$ResourceId,'ServiceLocationId' => $ServiceLocationId, 'StartTime' => $StartTime, 'UpdatedBy'=>$UpdatedBy],
        );
        // echo json_encode($request) . '<br />';
    
    
        $params = array('request' => $request);
        $response = $client->UpdateAppointment($params)->UpdateAppointmentResult;
    
        // print_r ($response);
    
        // echo '<br />';
        $UpAppointmentData =json_encode($response);
        echo $UpAppointmentData;
        return $UpAppointmentData;
        // foreach($response->Patients->PatientData as &$value)
        // {
        //     print($value->PatientFullName. '<br />');
        // }
    } catch (Exception $err) {
        print "Error: ". $err->getMessage();
    }


}
    public function GetPatients() {


        try{
            $user = $this->input->get("user");
            $password = $this->input->get("password");
            $customerKey = $this->input->get("customerKey");
            $zohoToken = $this->input->get("zohoToken");

            $PracticeName= $this->input->get("PracticeName");
            $PracticeId= $this->input->get("PracticeId");
            $FromLastModifiedDate= $this->input->get("FromLastModifiedDate");
            $ToLastModifiedDate= $this->input->get("ToLastModifiedDate");
        
            if($zohoToken=="BT7DD*CqYpYQ"){
                $wsdl = 'https://webservice.kareo.com/services/soap/2.1/KareoServices.svc?singleWsdl';
                $client = new SoapClient($wsdl);
                
                $request = array (
                    'RequestHeader' => array('User' => $user, 'Password' => $password, 'CustomerKey' => $customerKey),
                    'Filter' => array('PracticeName'=>$PracticeName, 'PracticeId'=>$PracticeId,'FromLastModifiedDate'=>$FromLastModifiedDate, 'ToLastModifiedDate'=>$ToLastModifiedDate)
                );
                //'FromLastModifiedDate'=>'02/12/2021', 'ToLastModifiedDate'=>'02/13/2021'
                $params = array('request' => $request);
                $response = $client->GetPatients($params)->GetPatientsResult;
                // print_r ($request);
                $PatientsInfo=json_encode($response);
                // print_r ($customerKey);
                print_r ($PatientsInfo);
                return $PatientsInfo;
                // foreach($response->Patients->PatientData as &$value)
                // {
                //     print($value->PatientFullName. '<br />');
                // }
            }
            
        } catch (Exception $err) {
            print "Error: ". $err->getMessage();
        }
    }
    public function GetAppointments() {


        try{
            $user = $this->input->get("user");
            $password = $this->input->get("password");
            $customerKey = $this->input->get("customerKey");
            $zohoToken = $this->input->get("zohoToken");

            $PracticeName= $this->input->get("PracticeName");
            $PracticeId= $this->input->get("PracticeId");
            $FromCreatedDate= $this->input->get("FromCreatedDate");
            $FromLastModifiedDate= $this->input->get("FromLastModifiedDate");
            $ToLastModifiedDate= $this->input->get("ToLastModifiedDate");
        
            if($zohoToken=="BT7DD*CqYpYQ"){
                $wsdl = 'https://webservice.kareo.com/services/soap/2.1/KareoServices.svc?singleWsdl';
                $client = new SoapClient($wsdl);
                
                $request = array (
                    'RequestHeader' => array('User' => $user, 'Password' => $password, 'CustomerKey' => $customerKey),
                    'Filter' => array('PracticeName'=>$PracticeName, 'PracticeId'=>$PracticeId,'FromCreatedDate'=>$FromCreatedDate,'FromLastModifiedDate'=>$FromLastModifiedDate, 'ToLastModifiedDate'=>$ToLastModifiedDate),
                    'Fields'=> array('PatientFullName'=>'true','ConfirmationStatus'=> 'true', 'CreatedDate'=> 'true','ID'=> 'true','PatientID'=> 'true','ResourceName1'=>'true','StartDate'=>'true') 
                );
                //'FromLastModifiedDate'=>'02/12/2021', 'ToLastModifiedDate'=>'02/13/2021'
                $params = array('request' => $request);
                $response = $client->GetAppointments($params)->GetAppointmentsResult;
                // print_r ($request);
                $AppointmentsInfo=json_encode($response);
                
                     print_r ($AppointmentsInfo);
                return $AppointmentsInfo;
             
                // print_r ($customerKey);
               
            }
            
        } catch (Exception $err) {
            print "Error: ". $err->getMessage();
        }
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
       
        
	}

}