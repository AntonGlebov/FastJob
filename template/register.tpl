<form action="?module=register&action=true" method="post">
    <input class="form-control" type='hidden' name='type' value='register'>

	<center><h2>Регистрация</h2></center>
	<center><p style="color:#808080">Все поля обязательны для заполнения</p></center>
	
    <div class="form-group">
        <label for="username">Логин</label>
        <input class="form-control" name="username" id="username" placeholder="Укажите свой логин" maxlength="15" required>
    </div>

    <div class="form-group">
        <label for="password">Пароль</label>
        <input class="form-control" name="password" id="password" placeholder="Укажите пароль" type="password" required>
    </div>

    <div class="form-group">
        <label for="password2">Повторите пароль</label>
        <input class="form-control" name="password2" id="password2" placeholder="Укажите пароль" type="password" required>
    </div>

    <div class="form-group">
        <label for="firstname">Ваше имя</label>
        <input class="form-control" name="firstname" id="firstname" placeholder="Как вас зовут?" required>
    </div>

    <div class="form-group">
        <label for="phone">Ваш телефон</label>
        <input class="form-control" name="phone" id="phone" placeholder="Укажите сот. телефон" required>
    </div>

    <button type="submit" class="btn btn-primary">Регистрация</button>
</form>