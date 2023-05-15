<h1>Регистрация</h1>

<?php if(isset($_SESSION['error'])):?>
<div style="color: red;"><?php echo $_SESSION['error']; unset($_SESSION['error']);?></div>
<?php endif;?>

<form method="post" action="/?action=reg">
<p><input type="text" name="username" placeholder="Имя пользователя"><input type="submit" value="Зарегистрироваться"></p>
</form>

<p><a href="/">Главная</a> </p>