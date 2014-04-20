<?php 
// $sdkConfig = array(
	// "mode" => "sandbox"
// );

// $cred = new OAuthTokenCredential("AU7PpBDSY2mZxL66zgo0hmQJMVbHl5femo4AHNPxu_kbyvsMsw11TYT4eL40","EJjghBC7t9YvPE8nJBDxULDElwVWWGE0r9mATTGLjX12A0v3BA-kYks8hDaa", $sdkConfig);
	// curl https://api.sandbox.paypal.com/v1/oauth2/token 
	-H "Accept: application/json" 
	-u "AU7PpBDSY2mZxL66zgo0hmQJMVbHl5femo4AHNPxu_kbyvsMsw11TYT4eL40:EJjghBC7t9YvPE8nJBDxULDElwVWWGE0r9mATTGLjX12A0v3BA-kYks8hDaa" 
	-d "grant_type=client_credentials" 
	
	
// curl 
-v https://api.sandbox.paypal.com/v1/payments/payment
-H 'Content-Type:application/json'
-H 'Authorization: Bearer bkZCut8idXGUs5c1xhten6SI0tzoHd3Sk1TG-9b1snk'

-d '{
  "intent":"sale",
  "payer":{
    "payment_method":"credit_card",
    "funding_instruments":[
      {
        "credit_card":{
          "type":"visa",
          "number":"4446283280247004",
          "expire_month":"11",
          "expire_year":"2018",
          "first_name":"Joe",
          "last_name":"Shopper"
        }
      }
    ]
  },
  "transactions":[
    {
        "amount":{
        "total":"12",
        "currency":"USD"
      },
      "description":"creating a direct payment with credit card"
    }
  ]
}' 
 
?> 