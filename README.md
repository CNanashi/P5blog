//*P5 OC "Créez votre premier blog en PHP"*//

__Install

Crée une base de données et importer le fichier db.sql qui se trouve dans le dossier db dans le formulaire de contact edit votre email dans le fichier mail/contact.php

Create a db and import db.sql file located in the db folder, Contact Form edit your email in the mail/contact.php file

__Example

Mailer
```php
$to='example@example.com';

$message = $_POST['message'];

$headers = 'FROM: site@example.dev';

mail($to, 'Form contact', $message, $headers);
```