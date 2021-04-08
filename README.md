<h3>A Simple Laravel application for S3 Video Upload</h3>

<p>An authenticated user can upload video, where admin can manage users & videos. Videos will be stored in S3.</p>
<Strong>To Install The System Follow The Below Instructions</strong><br>
<ul>
<li>Clone repository to local machine.</li>
<li>Run cmd cp env.example to .env</li>
<li>Run cmd Composer install</li>
<li>Create database</li>
<li>Update database details in .env file</li>
<li>Update AWS details in .env file</li>    
<li>Run cmd php artisan key:generate</li>
<li>Run cmd php config:cache</li>
<li>Run cmd php artisan migrate</li>
<li>Run cmd php artisan db:seed</li>
<li>Run cmd php artisan storage:link</li>
<li>Run cmd php artisan serve and visit http://127.0.0.1:8000</li>
<li>Enter credentials</li>
    <br>
<p><strong>For admin:</strong><br>
<strong>username:</strong> admin@genit.sg<br>
<strong>password:</strong> admin</p>
    <p> For user you can sign up in register page </p>
    <strong>Screenshots:</strong>
    <br />
    <br />
    <img src="https://raw.githubusercontent.com/sin2san/Laravel-S3-Video-Upload/main/screenshots/Login.png" />
    <br />
    <br />
    <img src="https://raw.githubusercontent.com/sin2san/Laravel-S3-Video-Upload/main/screenshots/Register.png" />
    <br />
    <br />
    <img src="https://raw.githubusercontent.com/sin2san/Laravel-S3-Video-Upload/main/screenshots/single.png" />
    <br />
    <br />
    <img src="https://raw.githubusercontent.com/sin2san/Laravel-S3-Video-Upload/main/screenshots/videos.png" />
    <br />
    <br />
    <img src="https://raw.githubusercontent.com/sin2san/Laravel-S3-Video-Upload/main/screenshots/add.png" />
    <br />
    <br />
    <img src="https://raw.githubusercontent.com/sin2san/Laravel-S3-Video-Upload/main/screenshots/Dashboard.png" />
