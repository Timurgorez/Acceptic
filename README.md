<h1>Вызовы</h1>
<p><strong>npm i</strong> -- устанавливаем npm</p>
<p><strong>bower i</strong> -- устанавливаем зависимости bower(jquery,bootstrap и др.)</p>
<p><strong>gulp</strong> -- запускаем gulp (scss, watch, browserSync и т.д)</p>
<p><strong>gulp build</strong> -- собираем dist</p>
<p><strong>gulp remove-dist</strong> -- удаляем dist</p>
<p><strong>gulp deploy</strong> -- развертывание проекта на сервере из DIST папки через FTP;</p>
<p><strong>gulp clear-cache</strong> -- очистить кэш</p>



Bower (вызовы)
<bower init> --- Определенее файла bower.json , если его нет.
<bower i>  --- Устанавливает все зависимости которые записаны в bower.json.
<bower i какая-либо зависимость --save>  ---  Устанавливает определенную зависимость какую тебе нужно с ключом save
 (не только для разработки) --seve-dev -(только для разработки).
<npm install -g bower-update> --- установка плагина для обновления зависимостей до последней версии.
<bower-update> --- само обновление всех зависимостей.