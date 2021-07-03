<form action="<?= base_url("Auth/doLogin") ?>" method="POST">
  <div>Email</div>
  <input type="text" name="email" />
  <div>Password</div>
  <input type="password" name="password" />
  <div><button type="submit">Login</button></div>
</form>