<?php
$name = 'Garold';
$phone = '8775665512';
$description = 'Hello WOrld';
$email = "zjangiir@mail.ru";
$company = "GoldenTime";

$contact = array(
    'NAME'=>$name,
    'PHONE'=>$phone,
    'DESCRIPTION'=>$description,
    'EMAIL'=>$email,
    'COMPANY'=>$company,
    'CONTACT_ID'=>0,
    'COMPANY_ID'=>0,
    'DEAL_ID'=>0
);
$contact['COMPANY_ID'] = addCompany($contact);

$contact['CONTACT_ID'] = addContact($contact);

$contact['DEAL_ID'] = addDeal($contact);

if($contact['DESCRIPTION'] != '') addDescription($contact);

function sendData($method,$data){
    $query_url = 'https://b24-7u7t46.bitrix24.kz/rest/1/7f3kvf3tfxjlbohc/'.$method;
    $query_data = http_build_query($data);
    $curl = curl_init();
    curl_setopt_array($curl,array(
        CURLOPT_SSL_VERIFYPEER  => 0,
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $query_url,
        CURLOPT_POSTFIELDS  => $query_data

    ));
    $result = curl_exec($curl);
    curl_close($curl);
    return json_decode($result);

} 

function addDescription($contact) {
    $descriptionData = sendData('crm.livefeedmessage.add', [
      'fields' => [
        'MESSAGE' => $contact['DESCRIPTION'],
        'POST_TITLE' => 'Сообщение с формы сайта',
        'ENTITYTYPEID' => 2,
        'ENTITYID' => $contact['DEAL_ID'],
      ], 'params' => [
        'REGISTER_SONET_EVENT' => 'Y'
      ]
    ]);
    return $descriptionData->result;
  }

function addDeal($contact){
    $dealData = sendData('crm.deal.add',[
        'fields'=>[
            'TITLE'=>'Заявка с Сайта',
            'STAEG_ID'=>'NEW',
            'CONTACT_ID'=>$contact['CONTACT_ID']
        ],'params'=>[
            'REGISTER_SONET_EVENT'=>'Y'
        ]
    ]);
    return $dealData->result;
}

function addContact($contact){
    $contactData = sendData('crm.contact.add',[
        'fields'=>[
            'NAME'=> $contact['NAME'],

            'EMAIL'=> [['VALUE' => $contact['EMAIL'], 'VALUE_TYPE' => 'WORK']],
            
            'PHONE'=> [['VALUE' => $contact['PHONE'], 'VALUE_TYPE' => 'WORK']],

            'TYPE_ID'=>'CLIENT',

            'COMPANY_ID'=>$contact['COMPANY_ID'],
        ],'params'=>[
            'REGISTER_SONET_EVENT'=>'Y'
        ]
    ]);
    return $contactData->result;
}

function addCompany($contact){
    $companyData = sendData('crm.company.add',[
        'fields'=>[
            'TITLE'=> $contact['COMPANY'],
        ],'params'=>[
            'REGISTER_SONET_EVENT'=>'Y'
        ]
    ]);
    return $companyData->result;
}

echo json_encode(addCompany($contact),JSON_UNESCAPED_UNICODE);

?>