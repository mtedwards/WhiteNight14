<?php  
          /* Retrieve POSTED FIELDS */
           				
  				$email = $_POST["Email"];

  				

          require('core/exacttarget_soap_client.php');
          
          $wsdl = 'https://webservice.s6.exacttarget.com/etframework.wsdl';
          
          try{
                 /* Create the Soap Client */
                 $client = new ExactTargetSoapClient($wsdl, array('trace'=>1));
          
                  /* Set username and password here */
                  $client->username = 'API_User_6269927';
                  $client->password = 'fS!4N5n@';
              
          		// create data extension object
                  $DE = new ExactTarget_DataExtensionObject();
                  $DE->CustomerKey="White Night Melbourne Master Data Ex"; // unique identifier to the data extension
          
          		/*Update can happen only if you have PrimaryKey column in the Data Extension*/ 
                  $apiPropertyKey = new ExactTarget_APIProperty();
                  $apiPropertyKey->Name="Email"; // primary key of the data extension
                  $apiPropertyKey->Value=$email; // value of the primary key for the row we want to add/update
                  $DE->Keys[] = $apiPropertyKey; // add primary key field to the data exension
          
                  $apiProperty1 =new ExactTarget_APIProperty();
                  $apiProperty1->Name="Year_2014"; // field we want to add/update
                  $apiProperty1->Value="True"; // new value for LastName
                  
                  $apiProperty2 =new ExactTarget_APIProperty();
                  $apiProperty2->Name="Opt In Details"; // field we want to add/update
                  $apiProperty2->Value="Added by Website Form"; // new value for LastName
                  
                  date_default_timezone_set("Australia/Sydney");
                  $apiProperty3 =new ExactTarget_APIProperty();
                  $apiProperty3->Name="Last Modified Date"; // field we want to add/update
                  $apiProperty3->Value=date("Y/m/d H:i:s"); // new value for Last Modified Date           
                  
                  $DE->Properties[] = $apiProperty1; // add field to data extension
                  $DE->Properties[] = $apiProperty2; // add field to data extension
                  $DE->Properties[] = $apiProperty3; // add field to data extension
                  
          		    $object1 = new SoapVar($DE, SOAP_ENC_OBJECT, 'DataExtensionObject', "http://exacttarget.com/wsdl/partnerAPI");
          		
                   /*% Create the ExactTarget_SaveOption Object */ 
                   $saveOption = new ExactTarget_SaveOption();                
                   $saveOption->PropertyName="DataExtensionObject";
                   $saveOption->SaveAction=ExactTarget_SaveAction::UpdateAdd; // set the SaveAction to add/update
          
                   // Apply options and object to request and perform update of data extension
          		     $updateOptions = new ExactTarget_UpdateOptions();
                   $updateOptions->SaveOptions[] = new SoapVar($saveOption, SOAP_ENC_OBJECT, 'SaveOption', "http://exacttarget.com/wsdl/partnerAPI");
                   $request = new ExactTarget_CreateRequest();
                   $request->Options = new SoapVar($updateOptions, SOAP_ENC_OBJECT, 'UpdateOptions', "http://exacttarget.com/wsdl/partnerAPI");
                   $request->Options = $updateOptions;
                   $request->Objects = array($object1);
                   $results = $client->Update($request);
          		 
                   
              		 $serverResponse = $results->Results->StatusCode;
                   
                  // echo '<pre>';
                 //  print_r($results);
                   
                   if ($serverResponse == 'OK') {
                     echo '<p>Thanks for signing up. You’ll be hearing from us shortly.</p>';
                     echo '<p>In the meantime don’t forget you can create a My Night account so you can start creating a list of your favourite events.</p>';
                     echo '<p>You can also follow us on <a title="White Night Facebook" href="https://www.facebook.com/WhiteNightMelbourne" target="_blank">Facebook</a>, <a title="White Night Twitter" href="https://twitter.com/whitenightmelb" target="_blank">Twitter</a>, <a title="White Night Instagram" href="http://instagram.com/whitenightmelb/" target="_blank">Instagram</a> or <a title="White Night Google Plus" href="https://plus.google.com/109173756154545584645" target="_blank">G+</a>.</p>';
                   } else {
                     echo '<h2>Oops</h2>';
                     print_r($results->Results->ErrorMessage);
                     print_r($results->Results->KeyErrors->KeyError->ErrorMessage);
                   }
              
              } catch (SoapFault $e) {
                var_dump($e);
              }

          ?>