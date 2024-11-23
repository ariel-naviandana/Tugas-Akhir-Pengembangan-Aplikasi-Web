<div class="auth-container">
    <h2>Login</h2>
    <form method="post" action="?c=Auth&m=loginSubmit">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>

        <input type="submit" value="Login">
    </form>
    <a href="?c=Auth&m=register" class="link-auth">Register here!</a>
</div>