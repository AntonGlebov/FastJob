<form action="?module=send_ad&action=true" method="post">
    <input class="form-control" type='hidden' name='type' value='add'>

	<center><h2>Подать объявление</h2></center>
	<center><p style="color:#808080">Все поля обязательны для заполнения</p></center>
	
    <div class="form-group">
        <label for="jobTitle">Название работы</label>
        <input class="form-control" name="jobTitle" id="jobTitle" placeholder="Опишите коротко суть работы" required>
    </div>

    <div class="form-group">
        <label for="jobAddress">Адрес</label>
        <input class="form-control" name="jobAddress" id="jobAddress" placeholder="Место выполнения работы" required>
    </div>

    <div class="form-group">
        <label for="jobPrice">Цена</label>
        <input class="form-control" name="jobPrice" type="number" id="jobPrice" placeholder="Стоимость выполнения работы в руб., например: 200" required>
    </div>

    <div class="form-group">
        <label for="jobDesc">Описание работы</label>
        <textarea class="form-control" name="jobDesc" id="jobDesc" rows="3" placeholder="Подробно опишите предложение о работе" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Отправить</button>
</form>
