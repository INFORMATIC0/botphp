<?php
function bot($method,$datas=[]){
    global $config;
    $url = "https://api.telegram.org/bot".$config['aqui puse el token']."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
$update = json_decode(file_get_contents("php://input"));

$chat_id = $update->message->chat->id;

$userId = $update->message->from->id;

$firstname = $update->message->from->first_name;

$lastname = $update->message->from->last_name;

$username = $update->message->from->username;

$chattype = $update->message->chat->type;

$message = $update->message->text;

$message_id = $update->message->message_id;

$replytomessageis = $update->message->reply_to_message->text;

$data = $update->callback_query->data;

$callbackfname = $update->callback_query->from->first_name;

$callbacklname = $update->callback_query->from->last_name;

$callbackusername = $update->callback_query->from->username;

$callbackchatid = $update->callback_query->message->chat->id;

$callbackuserid = $update->callback_query->message->reply_to_message->from->id;

$callbackmessageid = $update->callback_query->message->message_id;

if (strpos($message, "/start") === 0) {
    bot('sendmessage', [
      'chat_id' => $chat_id,
      'text' => "<b>Hola @$username bienvenido al bot checker de @antesdeltiempo2003\n\n¡Escriba /cmds para conocer todos mis comandos!\n\n$messagesec</b>",
      'parse_mode' => 'html',
      'reply_to_message_id' => $message_id,
    ]);
  }
  file_put_contents("./users.log",$callbackusername."
  ");
?>