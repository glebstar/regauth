<?php if(isset($_SESSION['hash'])):?>
    <h1>Внимание!</h1>
    <p>Ваш ключ: <?php echo $_SESSION['hash']; unset($_SESSION['hash']);?></p>
    <p>Запомните, или запишите!</p>
<?php else:?>
    <h1>Главная страница</h1>
    <?php if(isAuth()): ?>
        <h3>Привет, <?php echo getUserName();?></h3>
        <p><a href="/?action=logout">Выход</a></p>
    <?php else: ?>
        <?php if(isset($_SESSION['error'])):?>
            <div style="color: red;"><?php echo $_SESSION['error']; unset($_SESSION['error']);?></div>
        <?php endif;?>
        <form method="post" action="/?action=login">
        <p><input type="text" name="hash" placeholder="ключ"><input type="submit" value="Логин"></p>
        </form>
        <p><a href="/?action=reg">Регистрация</a> </p>
    <?php endif;?>
<?php endif;?>
