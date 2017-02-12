<form id="signUpForm" class="" method="POST" action="/auth.php">
    <div>
        <input type="text" id="first_name" name="first_name" value="" class="" placeholder="Имя"/>
    </div>
    <div>
        <input type="text" id="email" name="email" value="" class="" placeholder="Email"/>
    </div>
    <div>
        <input type="password" id="password" name="password" value="" class="" placeholder="Пароль"/>
    </div>
    <div>
        <div>Дата рождения:</div>
        <div>
            <span></span>
            <select id="birth_day" name="birth_day" class="">
                <option value="День">День</option>
                <?php
                for ($i=1; $i<32; $i++){
                    echo "<option value=\"$i\">$i</option>";
                }
                ?>
            </select>
        </div>
        <div>
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
        <div>
            <select id="birth_year" name="birth_year" class="">
                <option value="Год">Год</option>
                <?php
                for ($i=2001; $i>1900; $i--){
                    echo "<option value=\"$i\">$i</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div>
        <label><input id="sex_1" type="radio" name="sex" value="1" /> Мужской</label>
        <label><input id="sex_0" type="radio" name="sex" value="0" /> Женский</label>
        <div class="clear">
        </div>
    </div>
    <div>
        <input value="" type="text" id="city" name="city" placeholder="Город"/>
    </div>
    <button type="submit">Зарегистрироваться</button>
</form>
