<?php

require_once __DIR__ . "/../PHPMailer/src/PHPMailer.php";
require_once __DIR__ . "/../PHPMailer/src/SMTP.php";
require_once __DIR__ . "/../PHPMailer/src/Exception.php";

// use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_status() === PHP_SESSION_ACTIVE ?: session_start();
class AuthController
{
    private static $random;
    private static $secret;

    function __construct()
    {
        $this->random = '';
    }

    protected function setRandom()
    {
        self::$random =  generateRandomKey();
    }

    public function getRandom()
    {
        return self::$random;
    }

    public function setSecret()
    {
        $this->secret = self::$random;
    }

    public function getSecret()
    {
        return self::$secret;
    }

    public function login()
    {
        return View::load('Auth/login');
    }
    // ============== End Of Login View ===============

    public function applyLogin()
    {
        Validate::request_method('POST');
        $validateUserData = User::validateLoginData();

        if (!empty($validateUserData['errors'])) {
            View::redirect('Auth/login', ['errors' => $validateUserData['errors'], 'data' => $_POST]);
        } else {
            $query = Database::selectByEmail('users', $_POST['email']);
            if ($query) {
                if (password_verify($_POST['password'], $query['password'])) {
                    $userData = [
                        'id' => $query['id'],
                        'name' => $query['name'],
                        'role' => $query['role'],
                        'image' => $query['image'],
                    ];

                    session_start();
                    $_SESSION['user'] = $userData;

                    if ($_SESSION['user']['role'] == 'admin') {
                        View::redirect('User/index', ['users' => User::getAll()]);
                    }
                    else if ($_SESSION['user']['role'] == 'customer') {
                        View::redirect('Cart/index');
                    }
                    else {
                        header("Location: /iti-php-cafeteria/public/");
                    }
                } else {
                    View::redirect('Auth/login', ['errors' => ['Invalid Credentials...!'], 'data' => $_POST]);
                }
            } else {
                View::redirect('Auth/login', ['errors' => ['Invalid Credentials...!'], 'data' => $_POST]);
            }
        }
    }
    // ============== End Of Login ===============

    public function register()
    {
        return View::load('Auth/register');
    }
    // ============== End Of Register View ===============

    public function applyRegister()
    {
        Validate::request_method('POST');
        $validateUserData = User::validateCreate();

        if (!empty($validateUserData['errors'])) {
            View::redirect('Auth/register', ['errors' => $validateUserData['errors'], 'data' => $_POST]);
        } else {
            $query = Database::selectByEmail('users', $_POST['email']);
            if ($query) {
                View::redirect('Auth/register', ['errors' => ['Already exists...!'], 'data' => $_POST]);
            } else {
                // print_r($_POST);exit;
                $file = $validateUserData['imgPath'];
                $imgPath = end(explode('/', $file));
                $hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $result = Database::insert('users', [
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'image' => $imgPath,
                    'password' => $hashed,
                    'room_number' => $_POST['room_number'],
                    'ext' => $_POST['ext'],
                    'role' => 'customer',
                    'secret' => $_POST['secret']
                ]);

                if ($result) {
                    $imgPath = UPLOADS . $validateUserData['imgPath'];
                    move_uploaded_file($validateUserData['fileTmp'], $imgPath);

                    User::welcomeMail($_POST['email']);

                    View::redirect('Auth/login', [
                        'success' => 'User created successfully'
                    ]);
                } else {
                    View::redirect('Auth/register', [
                        'errors' => ['User not created']
                    ]);
                }
            }
        }
    }
    // ============== End Of Register ===============

    public function email()
    {
        return View::load('Auth/email');
    }
    // ============== End Of Check Secret View ===============

    public function sendEmail()
    {
        Validate::request_method('POST');
        $validateUserData = User::validateEmail();

        if (!empty($validateUserData['errors'])) {
            View::redirect('Auth/check_secret', ['errors' => $validateUserData['errors'], 'data' => $_POST]);
        } else {
            $query = Database::selectByEmail('users', $_POST['email']);
            if ($query) {
                // Initialize Randome Value...
                $this->setRandom();
                $query2 = Database::update('users', $query['id'], [
                    'secret' => $this->getRandom()
                ]);
                $_SESSION['email'] = $_POST['email'];

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
                    $to = $query['email'];
                    $mail->setFrom('admin@cafeteria.com', 'Cafeteria Admin');
                    $mail->addAddress($to, 'User');     //Add a recipient

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Reset Password @Cafeteria';
                    $mail->Body    = 'Dont send this <b>Secret</b> key to any person:<br> <h4 style="text-align: center">' . $this->getRandom() . '</h4>';
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    // Check if mail is sent...
                    if ($mail->send()) {
                        View::redirect('Auth/check_secret', ['msg' => ['Mail sent successfully, check your email.']]);
                    } else {
                        View::redirect('Auth/check_secret', ['errors' => ['Failed to send Email...!'], 'data' => $_POST]);
                    }
                } catch (Exception $e) {
                    View::redirect('Auth/email', ['errors' => ["Message could not be sent. Mailer Error:"], 'data' => $_POST]);
                }
            } else {
                View::redirect('Auth/email', ['errors' => ['Invalid Email...!'], 'data' => $_POST]);
            }
        }
    }
    // ============== End Of Sending Mail ===============

    public function check_secret()
    {
        Validate::request_method('POST');
        $validateUserData = User::validateSecret();

        if (!empty($validateUserData['errors'])) {
            View::redirect('Auth/check_secret', ['errors' => $validateUserData['errors'], 'data' => $_POST]);
        } else {
            if (isset($_SESSION['email'])) {
                $query = Database::selectByEmail('users', $_SESSION['email']);
                if ($query) {
                    if ($_POST['secret'] == $query['secret']) {
                        echo "test2";

                        View::load('Auth/reset');
                    } else {
                        View::redirect('Auth/check_secret', ['errors' => ['Secret is not valid...!'], 'data' => $_POST]);
                    }
                } else {
                    View::redirect('Auth/email');
                }
            } else {
                View::redirect('Auth/email');
            }
        }
    }
    // ============== End Of Check Secret View ===============

    public function reset_pass()
    {
        Validate::request_method('POST');
        $validateUserData = User::validateNewPassword();

        if (!empty($validateUserData['errors'])) {
            View::redirect('Auth/reset', ['errors' => $validateUserData['errors'], 'data' => $_POST]);
        } else {
            if (isset($_SESSION['email'])) {
                $hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $query = Database::selectByEmail('users', $_SESSION['email']);

                if ($query) {
                    $updatePassword = Database::update('users', $query['id'], [
                        'password' => $hashed
                    ]);

                    if ($updatePassword) {
                        $_SESSION['msg'] = 'Password Updated Successfully.';
                        View::redirect('Auth/login');
                    }
                } else {
                    View::redirect('Auth/email');
                }
            }
        }

        return View::load('Auth/reset');
    }
    // ============== End Of Check Secret View ===============

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();

        header("Location: /iti-php-cafeteria/public/auth/login");
    }
}
