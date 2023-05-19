<?php

require_once __DIR__ . "/../PHPMailer/src/PHPMailer.php";
require_once __DIR__ . "/../PHPMailer/src/SMTP.php";
require_once __DIR__ . "/../PHPMailer/src/Exception.php";

// use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class User
{
    private static $table = 'users';

    static function getAll()
    {
        return Database::select(self::$table);
    }

    private static function getEmail($id)
    {
        $connection = Database::connect();
        $stmt = $connection->prepare("SELECT email FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch()['email'];
    }

    public static function getImage($id)
    {
        $connection = Database::connect();
        $stmt = $connection->prepare("SELECT image FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch()['image'];
    }

    static function validateCreate()
    {
        $errors = [];

        // Validate name
        Validate::empty($_POST['name'], $errors, 'Name is required');

        // Validate email
        Validate::email($_POST['email'], $errors);
        Validate::unique(
            $_POST['email'],
            $errors,
            'Email already exists',
            "SELECT * FROM users WHERE email = ?"
        );

        // Validate password
        Validate::password($_POST['password'], $errors);
        Validate::match_password($_POST['password'], $_POST['password2'], $errors);

        // Validate room number & ext
        Validate::number_nullable($_POST['room_number'], $errors, 'Room number must be a number');
        Validate::number_nullable($_POST['ext'], $errors, 'Ext must be a number');

        // Validate image
        $image = Validate::image($errors, 'users');

        // Validate Secret
        Validate::empty($_POST['secret'], $errors, 'Secret is required');

        return [
            'errors' => $errors,
            'fileTmp' => $image['fileTmp'],
            'imgPath' => $image['imgPath']
        ];
    }

    static function validateEdit()
    {
        $errors = [];

        // Validate name
        Validate::empty($_POST['name'], $errors, 'Name is required');

        // Validate email
        Validate::email($_POST['email'], $errors);
        Validate::unique(
            $_POST['email'],
            $errors,
            'Email already exists',
            "SELECT * FROM users WHERE email = ?",
            self::getEmail($_POST['id'])
        );

        // Validate password
        if (!empty($_POST['password'])) {
            Validate::password($_POST['password'], $errors);
        }
        Validate::match_password($_POST['password'], $_POST['password2'], $errors);


        // Validate room number & ext
        Validate::number_nullable($_POST['room_number'], $errors, 'Room number must be a number');
        Validate::number_nullable($_POST['ext'], $errors, 'Ext must be a number');

        // Validate image
        $image = Validate::image($errors, 'users', self::getImage($_POST['id']));

        return [
            'errors' => $errors,
            'fileTmp' => $image['fileTmp'],
            'imgPath' => $image['imgPath']
        ];
    }

    static function validateLoginData()
    {
        $errors = [];

        Validate::empty($_POST['email'], $errors, 'Email field required...!');
        Validate::empty($_POST['password'], $errors, 'Password field required...!');

        Validate::email($_POST['email'], $errors, 'Email must be in email format "example@example.com"...!');
        Validate::password($_POST['password'], $errors, 'Password field required...!');

        return [
            'errors' => $errors,
        ];
    }

    static function validateEmail(){
        $errors = [];

        Validate::empty($_POST['email'], $errors, 'Email field required...!');
        Validate::email($_POST['email'], $errors, 'Must be a real email...!');

        return [
            'errors' => $errors
        ];
    }

    static function validateSecret(){
        $errors = [];

        Validate::empty($_POST['secret'], $errors, 'Secret Key field required...!');

        return [
            'errors' => $errors
        ];
    }

    static function validateNewPassword(){
        $errors = [];

        Validate::empty($_POST['password'], $errors, 'Password Field Required...!');
        Validate::password($_POST['password'], $errors, 'Password Must be strong Password...!');
        Validate::empty($_POST['password2'], $errors, 'Confirmed Password Required...!');
        Validate::match_password($_POST['password'], $_POST['password2'], $errors, 'Confirmed Password Required...!');
        
        return [
            'errors' => $errors
        ];
    }

    static function welcomeMail($email = ''){
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
            
        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'mudev307@gmail.com';                     //SMTP username
            $mail->Password   = 'cjpjtgeqhunihcby';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $to = $email;
            $mail->setFrom('admin@cafeteria.com', 'Cafeteria Admin');
            $mail->addAddress($to, 'User');     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Welcome Mail from @Cafeteria';
            $mail->Body    = "Dear {$email},\n\n"
                            . "Welcome to our website! We are delighted to have you as a member.\n\n"
                            . "If you have any questions or need assistance, please don't hesitate to contact us.\n\n"
                            . "Best regards,\n"
                            . "Your Website Team";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            // Check if mail is sent...
            if($mail->send()){
                View::redirect('Auth/login', ['msg' => ['Mail sent successfully, check your email.']]);
            }else{
                View::redirect('Auth/login', ['errors' => ['Failed to send Email...!'], 'data' => $_POST]);
            }
        } catch (Exception $e) {
            View::redirect('Auth/register', ['errors' => ["Message could not be sent. Mailer Error:"], 'data' => $_POST]);
        }
    }
}
