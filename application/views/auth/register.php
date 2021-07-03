<form action="<?= base_url("Auth/doRegister") ?>" method="POST">
  <div>Username</div>
  <input type="text" name="username" />
  <div>Email</div>
  <input type="text" name="email" />
  <div>Password</div>
  <input type="password" name="password" />
  <div>Confirm Password</div>
  <input type="password" name="confPassword" />
  <div><button type="submit">Register</button></div>
</form>