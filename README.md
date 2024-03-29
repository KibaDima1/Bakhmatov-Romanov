Состав:
1. Романов Артем (АСУ-18) 	| timeless24
2. Бахматов Дмитрий (АСУ-18) 	| KibaDima1

0) Идея проекта:
Сайт туристического агенства со следующими возможностями:
- просмотр контента (список туров) без авторизации
- регистрация на туры пользователем (редактирование текущих зарегистрированных туров) после авторизации
- регистрация / вход / выход пользователей
- панель администратора (после входа)

Ход работ:
1) Верстка
- Был взят начальный шаблон статического HTML,CSS сайта и изменено несколько моментов:
- убран лишний контент и реклама
- убраны лишние ссылки и страницы меню (оставлены: Главная и Туры)
- созданы формы: регистрация (register.php), вход (sign_in.php)
- добавлены новые стили в temp.css

2) Динамика (JS)
- Было решено сделать функционал валидации на клиенте с помощью js
- для более удобной работы был подключен jQuery.min
- все события подключаются после подгрузки страницы $().ready в файле main.js
- валидация была сделана к созданным формам
--- событие onClick перед вызовом событием сервера
--- в случае непрохождения, отменяем вызов события сервера preventDefault
--- проверка минимальная на пустой ввод

3) БД (MySQL) (дамп бд в каталоге)
- для формирования контента было создана база данных agency
- добавлены таблицы
--- "Клиенты-пользователи" users (ИД, ФИО, логин, пароль, флаг(админ_ли)
--- "Туры" tour (ИД, страна, город, отель, кол._звезд, дата_отлета, стоимость, кол._дней, описание)
--- "Регистрация" bid (ИД, ИД_тура, ИД_пользователя, дата_регистрации)
- был добавлен побочный пользователь бд "user" с правами CRUD для данной бд, но без прав на изменений структур бд и данных о пользователях)
- был добавлен пользователь в таблицу users "admin", чтобы он мог изменять данные таблиц, так скажем это менеджер компании
- было добавлено несколько записей в таблицу tours для дальнейшей работы

4) Сервер (php)
- для взаимодествия была выбрана библиотека mysqli (объектный)
- были добавлены файлы (статические методы для удобства):
--- классы описания таблиц: users, tour, bid 
--- класс для работы с таблицами: usersDAO, toursDAO, bidDAO
------ из них будут подгружаться данные на страницы и выводиться результаты в виде таблиц и прочего
--- доп. класс провайдер: DrawProvider (sql.php)
--- файл adminHandler.php для администрирования с разветвлением действий
------ то есть один файл на все редактирования менеджера (в идеале задумано было)


5) Сеанс
- для хранения текущих данных о пользователе применяется сессия
- для передачи данных между страницами также используется сессия

6) 
Правки:
1) Везде конкатенация (.) заменена на форматирование (sprintf)
2) Параметры авторизации читаются из внешнего файла прямо в функции в файле sql.php
3) Созданы классы ошибок, переопределяющие стандартные в файле exceptions.php
4) Код ошибки 501 можно выводить, но он может отличаться от кода вызванной ошибки, поэтому лучше будет ловить именно исключение под 501 и выводить его отдельно