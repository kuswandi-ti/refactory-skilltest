<!--
 API Documentation HTML Template  - 1.0.1
 Copyright © 2016 Florian Nicolas
 Licensed under the MIT license.
 https://github.com/ticlekiwi/API-Documentation-HTML-Template
 !-->
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <title>Refactory Skill Test API - Documentation</title>
    <meta name="description" content="">
    <meta name="author" content="ticlekiwi">

    <meta http-equiv="cleartype" content="on">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('documentation/css/hightlightjs-dark.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.8.0/highlight.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,500|Source+Code+Pro:300" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('documentation/css/style.css') }}" media="all">
    <script>hljs.initHighlightingOnLoad();</script>
</head>

<body>
<div class="left-menu">
    <div class="content-logo">
        <img alt="platform by Emily van den Heever from the Noun Project" title="platform by Emily van den Heever from the Noun Project" src="{{ asset('documentation/images/logo.png') }}" height="32" />
        <span>API Documentation</span>
    </div>
    <div class="content-menu">
        <ul>
            <li class="scroll-to-link active" data-target="get-started">
                <a>Get Started</a>
            </li>
            <li class="scroll-to-link" data-target="register">
                <a>Register User</a>
            </li>
            <li class="scroll-to-link" data-target="login">
                <a>Login User</a>
            </li>
            <li class="scroll-to-link" data-target="create-room">
                <a>Create Room</a>
            </li>
            <li class="scroll-to-link" data-target="list-room">
                <a>List Room</a>
            </li>
            <li class="scroll-to-link" data-target="booking-room">
                <a>Booking Room</a>
            </li>
            <li class="scroll-to-link" data-target="booking-check">
                <a>Booking Check</a>
            </li>
            <li class="scroll-to-link" data-target="checkin">
                <a>Check In</a>
            </li>
        </ul>
    </div>
</div>
<div class="content-page">
    <div class="content-code"></div>
    <div class="content">
        <div class="overflow-hidden content-section" id="content-get-started">
            <h1 id="get-started">Get started</h1>
            <pre>
    API Endpoint

        https://api.westeros.com/
            </pre>
            <p>
                The Westeros API provides programmatic access to read Game of Thrones data. Retrieve a character, provide an oauth connexion, retrieve a familly, filter them, etc.
            </p>
            <p>
                To use this API, you need an <strong>API key</strong>. Please contact us at <a href="mailto:jon.snow@nightswatch.wes">jon.snow@nightswatch.wes</a> to get your own API key.
            </p>
        </div>        

        <div class="overflow-hidden content-section" id="content-register">
            <h2 id="register">Register User</h2>

            <pre>
                <code class="json">
Result example :

{
    "success": true,
    "message": "User berhasil register."
}
                </code>
            </pre>

            <p>
                <b>POST</b><br>
                <code class="higlighted">https://refactory-skilltest.herokuapp.com/api/v1/register</code>
                <br><br>Screenshoot :<br>
                <img src="{{ asset('documentation/images/register_berhasil.jpg') }}" />
                <br><br>Email konfirmasi :<br>
                <img src="{{ asset('documentation/images/email_register_berhasil.jpg') }}" />
            </p>

            <br>
            
            <h4>QUERY PARAMETERS</h4>
            <table>
                <thead>
                    <tr>
                        <th>Field</th>
                        <th>Type</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>name</td>
                        <td>String</td>
                        <td>Nama User</td>
                    </tr>
                    <tr>
                        <td>email</td>
                        <td>String</td>
                        <td>Email User (unique)</td>
                    </tr>
                    <tr>
                        <td>password</td>
                        <td>String</td>
                        <td>Password</td>
                    </tr>
                    <tr>
                        <td>photo</td>
                        <td>String</td>
                        <td>Image URL</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="overflow-hidden content-section" id="content-login">
            <h2 id="login">Login User</h2>

            <pre>
                <code class="json">
Result example :

{
    "success": true,
    "message": "Login berhasil"
}
                </code>
            </pre>

            <p>
                <b>POST</b><br>
                <code class="higlighted">https://refactory-skilltest.herokuapp.com/api/v1/login</code>
                <br><br>Screenshoot :<br>
                <img src="{{ asset('documentation/images/login_berhasil.jpg') }}" />
            </p>

            <br> 

            <h4>QUERY PARAMETERS</h4>
            <table>
                <thead>
                    <tr>
                        <th>Field</th>
                        <th>Type</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>email</td>
                        <td>String</td>
                        <td>Email user yang sudah ter-register</td>
                    </tr>
                    <tr>
                        <td>password</td>
                        <td>String</td>
                        <td>Password</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="overflow-hidden content-section" id="content-create-room">
            <h2 id="create-room">Create Room</h2>

            <pre>
                <code class="json">
Result example :

{
    "success": true,
    "message": "Ruangan berhasil disimpan."
}
                </code>
            </pre>

            <p>
                <b>POST</b><br>
                <code class="higlighted">https://refactory-skilltest.herokuapp.com/api/v1/create_room</code>
                <br><br>Screenshoot :<br>
                <img src="{{ asset('documentation/images/create_room.jpg') }}" />
            </p>

            <br> 

            <h4>QUERY PARAMETERS</h4>
            <table>
                <thead>
                    <tr>
                        <th>Field</th>
                        <th>Type</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>room_name</td>
                        <td>String</td>
                        <td>Nama ruangan</td>
                    </tr>
                    <tr>
                        <td>room_capacity</td>
                        <td>String</td>
                        <td>Kapasitas ruangan</td>
                    </tr>
                    <tr>
                        <td>photo</td>
                        <td>String</td>
                        <td>URL image ruangan</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="overflow-hidden content-section" id="content-list-room">
            <h2 id="list-room">List Room</h2>

            <pre>
                <code class="json">
Result example :

{
    "success": true,
    "data": [
        {
            "id": 1,
            "room_name": "Ruangan Meeting 01",
            "room_capacity": "15",
            "photo": "https://kuswandi.scriptproject.web.id/refactory/room-01.jpg",
            "created_at": "2020-12-15 16:52:04",
            "updated_at": null,
            "deleted_at": null
        },
        {
            "id": 2,
            "room_name": "Ruangan Meeting 02",
            "room_capacity": "14",
            "photo": "https://kuswandi.scriptproject.web.id/refactory/room-02.jpg",
            "created_at": "2020-12-15 16:52:04",
            "updated_at": null,
            "deleted_at": null
        },
        {
            "id": 3,
            "room_name": "Ruangan Meeting 03",
            "room_capacity": "13",
            "photo": "https://kuswandi.scriptproject.web.id/refactory/room-03.jpg",
            "created_at": "2020-12-15 16:52:04",
            "updated_at": null,
            "deleted_at": null
        },
        {
            "id": 4,
            "room_name": "Ruangan Meeting 04",
            "room_capacity": "12",
            "photo": "https://kuswandi.scriptproject.web.id/refactory/room-04.jpg",
            "created_at": "2020-12-15 16:52:04",
            "updated_at": null,
            "deleted_at": null
        },
        {
            "id": 5,
            "room_name": "Ruangan Meeting 05",
            "room_capacity": "11",
            "photo": "https://kuswandi.scriptproject.web.id/refactory/room-05.jpg",
            "created_at": "2020-12-15 16:52:04",
            "updated_at": null,
            "deleted_at": null
        },
        {
            "id": 6,
            "room_name": "Ruangan Meeting 06",
            "room_capacity": "10",
            "photo": "https://kuswandi.scriptproject.web.id/refactory/room-06.jpg",
            "created_at": "2020-12-15 16:52:04",
            "updated_at": null,
            "deleted_at": null
        },
        {
            "id": 7,
            "room_name": "Ruangan Meeting 07",
            "room_capacity": "20",
            "photo": "https://kuswandi.scriptproject.web.id/refactory/room-07.jpg",
            "created_at": "2020-12-15 16:52:04",
            "updated_at": null,
            "deleted_at": null
        },
        {
            "id": 8,
            "room_name": "Ruangan Meeting 08",
            "room_capacity": "19",
            "photo": "https://kuswandi.scriptproject.web.id/refactory/room-08.jpg",
            "created_at": "2020-12-15 16:52:04",
            "updated_at": null,
            "deleted_at": null
        },
        {
            "id": 9,
            "room_name": "Ruangan Meeting 09",
            "room_capacity": "18",
            "photo": "https://kuswandi.scriptproject.web.id/refactory/room-09.jpg",
            "created_at": "2020-12-15 16:52:04",
            "updated_at": null,
            "deleted_at": null
        },
        {
            "id": 10,
            "room_name": "Ruangan Meeting 10",
            "room_capacity": "17",
            "photo": "https://kuswandi.scriptproject.web.id/refactory/room-10.jpg",
            "created_at": "2020-12-15 16:52:04",
            "updated_at": null,
            "deleted_at": null
        }
    ]
}
                </code>
            </pre>

            <p>
                <b>GET</b><br>
                <code class="higlighted">https://refactory-skilltest.herokuapp.com/api/v1/list_rooms</code>
                <br><br>Screenshoot :<br>
                <img src="{{ asset('documentation/images/list-room.jpg') }}" />
            </p>

            <br> 

            <h4>QUERY PARAMETERS</h4>
            <table>
                <thead>
                    <tr>
                        <th>Field</th>
                        <th>Type</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="overflow-hidden content-section" id="content-booking-room">
            <h2 id="booking-room">Booking Room</h2>

            <pre>
                <code class="json">
Result example :

{
    "success": true,
    "data": [
        {
            "id": 11,
            "room_name": "Ruangan Meeting 11",
            "room_capacity": "30",
            "photo": "/app/public/1608191505.jpg",
            "created_at": "2020-12-17 07:51:46",
            "updated_at": "2020-12-17 07:51:46",
            "deleted_at": null
        }
    ],
    "message": "Booking berhasil disimpan."
}
                </code>
            </pre>

            <p>
                <b>POST</b><br>
                <code class="higlighted">https://refactory-skilltest.herokuapp.com/api/v1/booking</code>
                <br><br>Screenshoot :<br>
                <img src="{{ asset('documentation/images/booking.jpg') }}" />
                <br><br>Email konfirmasi :<br>
                <img src="{{ asset('documentation/images/email_booking.jpg') }}" />
            </p>

            <br> 

            <h4>QUERY PARAMETERS</h4>
            <table>
                <thead>
                    <tr>
                        <th>Field</th>
                        <th>Type</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>user_id</td>
                        <td>Integer</td>
                        <td>ID dari user yang sudah terdaftar</td>
                    </tr>
                    <tr>
                        <td>room_id</td>
                        <td>Integer</td>
                        <td>ID dari ruangan yang akan dibooking</td>
                    </tr>
                    <tr>
                        <td>total_person</td>
                        <td>Integer</td>
                        <td>Total orang yang akan mengisi ruangan</td>
                    </tr>
                    <tr>
                        <td>booking_time</td>
                        <td>Date</td>
                        <td>Tanggal booking</td>
                    </tr>
                    <tr>
                        <td>noted</td>
                        <td>String</td>
                        <td>Keterangan / note booking</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="overflow-hidden content-section" id="content-booking-check">
            <h2 id="booking-check">Booking Check</h2>

            <pre>
                <code class="json">
Result example :

{
    "success": true,
    "message": "Tanggal booking anda sama dengan hari ini"
}
                </code>
            </pre>

            <p>
                <b>POST</b><br>
                <code class="higlighted">https://refactory-skilltest.herokuapp.com/api/v1/check_booking</code>
                <br><br>Screenshoot :<br>
                <img src="{{ asset('documentation/images/booking_check.jpg') }}" />
                <br><br>Email konfirmasi :<br>
                <img src="{{ asset('documentation/images/email_booking_check.jpg') }}" />
            </p>

            <br> 

            <h4>QUERY PARAMETERS</h4>
            <table>
                <thead>
                    <tr>
                        <th>Field</th>
                        <th>Type</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>booking_id</td>
                        <td>Integer</td>
                        <td>ID dari booking yang sudah dilakukan sebelumnya</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="overflow-hidden content-section" id="content-checkin">
            <h2 id="checkin">Check In</h2>

            <pre>
                <code class="json">
Result example :

{
    "success": true,
    "data": [
        {
            "id": 3,
            "user_id": 5,
            "room_id": 11,
            "total_person": 20,
            "booking_time": "2020-12-17 00:00:00",
            "noted": "Booking via API",
            "check_in_time": "2020-12-17 00:00:00",
            "check_out_time": "2020-12-30 00:00:00",
            "created_at": "2020-12-17 07:54:42",
            "updated_at": "2020-12-17 08:01:33",
            "deleted_at": null
        }
    ],
    "message": "Check In berhasil disimpan."
}
                </code>
            </pre>

            <p>
                <b>POST</b><br>
                <code class="higlighted">https://refactory-skilltest.herokuapp.com/api/v1/checkin</code>
                <br><br>Screenshoot :<br>
                <img src="{{ asset('documentation/images/checkin_berhasil.jpg') }}" />
                <br><br>Email konfirmasi :<br>
                <img src="{{ asset('documentation/images/email_checkin.jpg') }}" />
            </p>

            <br> 

            <h4>QUERY PARAMETERS</h4>
            <table>
                <thead>
                    <tr>
                        <th>Field</th>
                        <th>Type</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>booking_id</td>
                        <td>Integer</td>
                        <td>ID dari booking yang sudah dilakukan sebelumnya</td>
                    </tr>
                    <tr>
                        <td>check_in_time</td>
                        <td>Integer</td>
                        <td>Tanggal Check In</td>
                    </tr>
                    <tr>
                        <td>check_out_time</td>
                        <td>Integer</td>
                        <td>Tanggal Check Out</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="content-code"></div>
</div>
<script src="{{ asset('documentation/js/script.js') }}"></script>
</body>
</html>