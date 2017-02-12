$( "input#login-email" ).focus(function() {
    $( "span#hidden" ).text("Ваш email используется в качестве логина для входа на сайт.").css( "display", "inline" );
});
$( "input#login-password" ).focus(function() {
    $( "span#hidden" ).text("В целях безопасности ваш пароль маскируется.").css( "display", "inline" );
});
$( "input#signup-email" ).focus(function() {
    $( "span#hidden" ).text("Ваш email используется в качестве логина для входа на сайт.").css( "display", "inline" );
});
$( "input#signup-password" ).focus(function() {
    $( "span#hidden" ).text("В целях безопасности ваш пароль маскируется.").css( "display", "inline" );
});
$( "input#first_name" ).focus(function() {
    $( "span#hidden" ).text("Напишите как к Вам обращаться.").css( "display", "inline" );
});
$( "input#sex_1" ).focus(function() {
    $( "span#hidden" ).text("Укажите Ваш пол.").css( "display", "inline" );
});
$( "input#sex_0" ).focus(function() {
    $( "span#hidden" ).text("Укажите Ваш пол.").css( "display", "inline" );
});
$( "select#birth_day" ).focus(function() {
    $( "span#hidden" ).text("Выберите день Вашего рождения.").css( "display", "inline" );
});
$( "select#birth_month" ).focus(function() {
    $( "span#hidden" ).text("Выберите месяц Вашего рождения.").css( "display", "inline" );
});
$( "select#birth_year" ).focus(function() {
    $( "span#hidden" ).text("Выберите год Вашего рождения.").css( "display", "inline" );
});
$( "input#city" ).focus(function() {
    $( "span#hidden" ).text("В каком населённом пункте Вы проживаете?").css( "display", "inline" );
});
$( "#logoutButton" ).hover(function() {
    $( "span#hidden" ).text("Вы действительно хотите выйти из Вашего профиля?").css( "display", "inline" );
});
$( "#signoutButton" ).hover(function() {
    $( "span#hidden" ).text("ВНИМАНИЕ!!! ЕСЛИ ВЫ НАЖМЁТЕ НА ЭТУ КНОПКУ ВАШ АККАУНТ БУДЕТ УДАЛЁН!!!")
    .css( "display", "inline" );
});
$( ".profile" ).hover(function() {
    $( "span#hidden" ).text("").css( "display", "hidden" );
});
