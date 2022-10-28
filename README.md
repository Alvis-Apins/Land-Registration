<p>
Info:
</p>

Application for viewing, editing and deleting client, property and land unit information.

Demo video of the working application - https://streamable.com/aqjrro

---

Required Tools:
<ul>
<li>Laravel 9</li>
<li>PHP - 8.0</li>
<li>Vue 3</li>
<li>MySql</li>
<li>Composer</li>
</ul>

---

<p>
Setup:
</p>
Clone repository localy
<pre>git clone https://github.com/Alvis-Apins/Land-Registration.git</pre>
<ul>
<li>create .env file and copy contents from .env.example</li>
<li>in .env file configure connection to MySql database</li>
</ul>
<pre>
<b>composer install</b>
</pre>
<pre>
<b>npm install</b>
</pre>
<pre>
<b>php artisan migrate --seed</b>
</pre>
open 2 terminals and pass following commands in each terminal
<pre>
<b>php artisan serve</b>
</pre>
<pre>
<b>npm run dev</b>
</pre>
<ul>
<li>Aplication is up and running get the localhost address that php artisan serve provided</li>
<li>Click generate Api-key and refresh page</li>
</ul>

![Screenshot from 2022-10-28 18-05-52](https://user-images.githubusercontent.com/104777801/198668024-7e057e0e-b862-4e90-9642-5c4857c6abcc.png)




