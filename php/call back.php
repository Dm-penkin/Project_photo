<?php 

if ( !empty($_POST) && trim($_POST['name']) != '' && trim($_POST['e-mail']) != '' && trim($_POST['message']) != ''  ) {

$message = "Вам пришло новое сообщение с сайта: \n" . 
           "Имя отправителя: " . $_POST['name'] . "\n" . 
           "E-mail отправителя: " . $_POST['e-mail'] . "\n" .
           "Сообщение: ". $_POST['message'];

mail ( 'penkindimon@mail.com', "Сообщение с фото сайта!", $message );

  header ('location: ./../html/thanks.html');

}


function checkValue($item, $message ) {
       if ( isset($item) && trim($item) == ''  ) {
           echo '<div class="error">' . $message . '</div>';
       }
} 


function printPostValue($item){
       if ( isset($item) && strlen(trim($item)) > 0 ) {
           echo $item;
         }
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Отправить сообщение</title>
    <link rel="stylesheet" href="./../css/callback.css">
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Jura:300,400,500,600,700&display=swap&subset=cyrillic" rel="stylesheet">
</head>


<body>
    <header class="header">
        <div class="content-wrapper">
            <h1 class="title">Отправьте мне сообщение</h1>
            
                <form method="POST" action="./../php/call back.php"class="form-wrapper" >

               
              
                    <div class="form-group">
                       <label for="" class="form-label">Ваше имя</label>
                       <?php checkValue ($_POST['name'], 'Вы не ввели имя.'); ?>
                       <input 
                       name="name" 
                       class="form-input" 
                       placeholder="Введите имя"
                       value="<?php printPostValue($_POST ['name']); ?>"
                       >
                    </div>


                     <div class="form-group">
                       <label for="" class="form-label">Ваш E-mail</label>
                       <?php checkValue ($_POST['e-mail'], 'Вы не ввели e-mail.'); ?>
                       <input 
                       name="e-mail" 
                       class="form-input" 
                       placeholder="Введите  E-mail" 
                       value="<?php printPostValue($_POST ['e-mail']); ?>"
                       >
                     </div>


                     <div class="form-group">
                             <label for="" class="form-label">Сообщение</label>
                             <?php checkValue ($_POST['message'], 'Вы не ввели сообщение.'); ?>
                             <textarea name= "message" placeholder="Напишите пару строк" class="form-message" name="" id="" cols="30" rows="10"><?php printPostValue($_POST ['message']); ?></textarea>
                             </div>

<input class="form-submit" type="submit" value="Отправить сообщение">
                </form>
            
        </div>
    </header>
</body>


</html>