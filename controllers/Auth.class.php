<?php
class Auth extends Controller
{
    public function index()
    {
        $this->loadView('login');
    }

    public function register()
    {
        $this->loadView('register');
    }

    public function loginSubmit(): void
    {
        $email = addslashes($_POST['email']);
        $password = addslashes($_POST['password']);
        $authModel = $this->loadModel('AuthModel');
        $users = $authModel->getByEmail($email);

        if ($users->num_rows > 0) {
            $row = $users->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                echo "<script>alert('Login berhasil!');</script>";
                $_SESSION['username'] = $row['username'];
            } else {
                echo "<script>alert('Password salah!');</script>";
            }
        } else {
            echo "<script>alert('Username tidak ditemukan!');</script>";
        }
        if (isset($_SESSION["username"]))
            echo "<script>window.location.href = '?c=Film';</script>";
        else
            echo "<script>window.location.href = '?=c=Auth';</script>";
    }

    public function registerSubmit(): void
    {
        $authModel = $this->loadModel('AuthModel');
        $username = addslashes($_POST['username']);
        $email = addslashes($_POST['email']);
        $password = password_hash(addslashes($_POST['password']), PASSWORD_BCRYPT);

        $authModel->insert($username, $email, $password);

        echo "<script>alert('Register berhasil!');</script>";
        echo "<script>window.location.href = '?=c=Auth';</script>";
    }

    public function logout(): void
    {
        session_unset();
        session_destroy();

        header('Location: ?c=Auth');
    }
}
