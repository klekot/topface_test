<div class="form-style">
<form id="signUpForm" class="" method="POST" action="/auth.php">
<fieldset>
<legend><span class="number">1</span> Данные для входа</legend>
<input type="email" id="email" name="email" placeholder="Ваш Email *"/>
<input type="password" id="password" name="password" value="" class="" placeholder="Ваш пароль *"/>
<legend><span class="number">2</span> Личная информация</legend>
<input type="text" id="first_name" name="first_name" placeholder="Ваше имя *"/>
<div class="gender-selector" id="sex-div">
    <label for="sex-div">Ваш пол:</label>
    <label><input id="sex_1" type="radio" name="sex" value="1" checked="1" /> Мужской</label>
    <label><input id="sex_0" type="radio" name="sex" value="0" /> Женский</label>
    <div class="clear"></div>
</div>
<legend><span class="number">3</span> День рожденья</legend>
<div class="select-birthday">
    <select id="birth_day" name="birth_day" class="">
        <option value="День">День</option>
        <?php
        for ($i=1; $i<32; $i++){
            echo "<option value=\"$i\">$i</option>";
        }
        ?>
    </select>
</div>
<div class="select-birthday">
    <select id="birth_month" name="birth_month" class="">
        <option value="month">Месяц</option>
        <?php
        require_once 'months.php';
        foreach ($months as $number => $month) {
            echo "<option value=\"$number\">$month</option>";
        }
        ?>
    </select>
</div>
<div class="select-birthday">
    <select id="birth_year" name="birth_year" class="">
        <option value="Год">Год</option>
        <?php
        for ($i=2001; $i>1900; $i--){
            echo "<option value=\"$i\">$i</option>";
        }
        ?>
    </select>
</div>
</fieldset>
<fieldset>
<legend><span class="number">4</span> Место жительства</legend>
<div>
    <input value="" type="text" id="city" name="city" placeholder="Город"/>
</div>
</fieldset>
<input type="submit" value="Зарегистрироваться" />
</form>
</div>
<p>Уже зарегистрированы? Вы можете <a href="login">войти здесь</a>.</p>
