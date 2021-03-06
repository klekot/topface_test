# Oписание проекта

### Общая информация
Действующее приложение развёрнуто по адресу [http://topface-test.klekotnev.com](http://topface-test.klekotnev.com)

Это тестовый проект, подготовленный по техническому заданию работодателя.
Это тех.задание предусматривало некоторые ограничения на использование в решении определённых технологий.

### Приложение представляет следующие возможности:
 - зарегистрироваться на сайте, введя определённый набор сведений о себе;
 - залогиниться на сайте, используя данные, введённые при регистрации;
 - просмотреть введённые сведения о себе в отформатимрованном виде на странице пользователя;
 - отлогиниться из своего аккаунта, перейдя после этого к стартовой странице сайта;
 - удалить свой аккаунт на сайте без возможности его восстановления;
 - повторно зарегистрироваться на сайте по истечении срока, определённого в настройках приложения;
 - узнать сколько времени осталось до возможности повторной регистрации.

### Структура приложения
 - **/css/style.css** - файл с таблицами стилей, используемых на сайте;
 - **/images/bigbackground.jpg** - общий бэкграунд для сайта;
 - **/js/main.js** - файл с javascript кодом, использует библиотеку JQuery;
 - **404.php** - содержимое страницы, выводимой при запросе несуществующей страницы;
 - **auth.php** - скрипт,выполняющийся при авторизации пользователя на сайте;
 - **db_connect.php** - файл содержит класс "DbConnect", используемый для работы с базой данных сайта;
 - **db_dump.sql** - дамп базы данных, содержащий структуру и минимальный тестовый набор данных;
 - **double_reg_checker.php** - файл содержит класс "DoubleRegChecker", используемый для запрета повторной регистрации в течение заданного времени;
 - **index.php** - файл содержит html-шаблон, общий для всех страниц сайта;
 - **login.php** - страница, содержащая форму авторизации для входа на сайт;
 - **logout.php** - скрипт, отрабатывающий отлогинивание пользователя;
 - **months.php** - содержит массив с названиями месяцев в году;
 - **readme.md** - данный файл;
 - **reg_denied.php** - страница, показывающаяся пользователю при попытке повторной регистрации за определённый срок;
 - **router.php** - файл маршрутизации, который направляет пользователю тот или иной контент, в зависимости от запроса;
 - **settings.php** - файл настроек приложения;
 - **signout.php** - скрипт, отрабатывающий удаление пользователя из базы данных сайта;
 - **signup.php** - страница, содержащая форму регистрации пользователя на сайте;
 - **user_profile.php** - страница, выводящая пользователю сведения, введёные им при регистрации.

### Настройки приложения
Приложение использует набор констант, размещённых в файле "**settings.php**".
Так для изменения времени, в течение которого повторная регистрация будет недоступна, потребуется изменить значение константы "**FORBIDDEN_PERIOD**". На данный момент это время составляет _5 минут_.
