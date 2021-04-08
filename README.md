<h3>A Simple Laravel application for S3 Video Upload</h3>

<p>An authenticated user can upload video, where admin can manage users & videos. Videos will be stored in S3.<br />
Also user can rate videos.</p>
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
    <p>Reference Video To Create S3 bucket and credentials : <a href="https://www.youtube.com/watch?v=nMDIVQsESBY" target="_blank">https://www.youtube.com/watch?v=nMDIVQsESBY</a><br />
    You can store your videos in a private bucket. The application will retrive it by assigning a presigned URL.</p>
    <strong>Screenshots:</strong>
    <br />
    <br />
    <p float="left">
    <img src="https://raw.githubusercontent.com/sin2san/Laravel-S3-Video-Upload/main/screenshots/Login.png" width="300" />
    <img src="https://raw.githubusercontent.com/sin2san/Laravel-S3-Video-Upload/main/screenshots/Register.png" width="300" />
    <img src="https://raw.githubusercontent.com/sin2san/Laravel-S3-Video-Upload/main/screenshots/single.png" width="300" />
    <img src="https://raw.githubusercontent.com/sin2san/Laravel-S3-Video-Upload/main/screenshots/videos.png" width="300" />
    <img src="https://raw.githubusercontent.com/sin2san/Laravel-S3-Video-Upload/main/screenshots/add.png" width="300" />
    <img src="https://raw.githubusercontent.com/sin2san/Laravel-S3-Video-Upload/main/screenshots/Dashboard.png" width="300" />
    </p>
