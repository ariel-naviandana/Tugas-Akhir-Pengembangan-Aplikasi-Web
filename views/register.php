<div class="auth-container">
    <h2>Register</h2>
    <form method="post" action="?c=Auth&m=registerSubmit">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" required><br>

        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>

        <input type="submit" value="Register">
    </form>
    <a href="?c=Auth&m=index" class="link-auth">Login here!</a>
</div>