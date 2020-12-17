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
    <title>Refactory Skill Test API - Documentation - Kuswandi</title>
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
                <a>GET STARTED</a>
            </li>
            <li class="scroll-to-link" data-target="get-characters">
                <a>Get Characters</a>
            </li>
            <li class="scroll-to-link" data-target="errors">
                <a>Errors</a>
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
        <div class="overflow-hidden content-section" id="content-get-characters">
            <h2 id="get-characters">get characters</h2>
            <pre><code class="bash">
# Here is a curl example
curl \
-X POST http://api.westeros.com/character/get \
-F 'secret_key=your_api_key' \
-F 'house=Stark,Bolton' \
-F 'offset=0' \
-F 'limit=50'
                </code></pre>
            <p>
                To get characters you need to make a POST call to the following url :<br>
                <code class="higlighted">http://api.westeros.com/character/get</code>
            </p>
            <br>
            <pre><code class="json">
Result example :

{
  query:{
    offset: 0,
    limit: 50,
    house: [
      "Stark",
      "Bolton"
    ],
  }
  result: [
    {
      id: 1,
      first_name: "Jon",
      last_name: "Snow",
      alive: true,
      house: "Stark",
      gender: "m",
      age: 14,
      location: "Winterfell"
    },
    {
      id: 2,
      first_name: "Eddard",
      last_name: "Stark",
      alive: false,
      house: "Stark",
      gender: "m",
      age: 35,
      location: 'Winterfell'
    },
    {
      id: 3,
      first_name: "Catelyn",
      last_name: "Stark",
      alive: false,
      house: "Stark",
      gender: "f",
      age: 33,
      location: "Winterfell"
    },
    {
      id: 4,
      first_name: "Roose",
      last_name: "Bolton",
      alive: false,
      house: "Bolton",
      gender: "m",
      age: 40,
      location: "Dreadfort"
    },
    {
      id: 5,
      first_name: "Ramsay",
      last_name: "Snow",
      alive: false,
      house: "Bolton",
      gender: "m",
      age: 15,
      location: "Dreadfort"
    },
  ]
}
                </code></pre>
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
                    <td>secret_key</td>
                    <td>String</td>
                    <td>Your API key.</td>
                </tr>
                <tr>
                    <td>search</td>
                    <td>String</td>
                    <td>(optional) A search word to find character by name.</td>
                </tr>
                <tr>
                    <td>house</td>
                    <td>String</td>
                    <td>
                        (optional) a string array of houses:
                    </td>
                </tr>
                <tr>
                    <td>alive</td>
                    <td>Boolean</td>
                    <td>
                        (optional) a boolean to filter alived characters
                    </td>
                </tr>
                <tr>
                    <td>gender</td>
                    <td>String</td>
                    <td>
                        (optional) a string to filter character by gender:<br>
                        m: male<br>
                        f: female
                    </td>
                </tr>
                <tr>
                    <td>offset</td>
                    <td>Integer</td>
                    <td>(optional - default: 0) A cursor for use in pagination. Pagination starts offset the specified offset.</td>
                </tr>
                <tr>
                    <td>limit</td>
                    <td>Integer</td>
                    <td>(optional - default: 10) A limit on the number of objects to be returned, between 1 and 100.</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="overflow-hidden content-section" id="content-errors">
            <h2 id="errors">Errors</h2>
            <p>
                The Westeros API uses the following error codes:
            </p>
            <table>
                <thead>
                <tr>
                    <th>Error Code</th>
                    <th>Meaning</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>X000</td>
                    <td>
                        Some parameters are missing. This error appears when you don't pass every mandatory parameters.
                    </td>
                </tr>
                <tr>
                    <td>X001</td>
                    <td>
                        Unknown or unvalid <code class="higlighted">secret_key</code>. This error appears if you use an unknow API key or if your API key expired.
                    </td>
                </tr>
                <tr>
                    <td>X002</td>
                    <td>
                        Unvalid <code class="higlighted">secret_key</code> for this domain. This error appears if you use an  API key non specified for your domain. Developper or Universal API keys doesn't have domain checker.
                    </td>
                </tr>
                <tr>
                    <td>X003</td>
                    <td>
                        Unknown or unvalid user <code class="higlighted">token</code>. This error appears if you use an unknow user <code class="higlighted">token</code> or if the user <code class="higlighted">token</code> expired.
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="overflow-hidden content-section" id="content-register">
            <h2 id="register">Register User</h2>
            <p>
                <b>POST</b><br>
                <code class="higlighted">https://refactory-skilltest.herokuapp.com/api/v1/register</code>
            </p>
            <br>
            <pre>
                <code class="json">
Result example :

{
  query:{
    offset: 0,
    limit: 50,
    house: [
      "Stark",
      "Bolton"
    ],
  }
  result: [
    {
      id: 1,
      first_name: "Jon",
      last_name: "Snow",
      alive: true,
      house: "Stark",
      gender: "m",
      age: 14,
      location: "Winterfell"
    },
    {
      id: 2,
      first_name: "Eddard",
      last_name: "Stark",
      alive: false,
      house: "Stark",
      gender: "m",
      age: 35,
      location: 'Winterfell'
    },
    {
      id: 3,
      first_name: "Catelyn",
      last_name: "Stark",
      alive: false,
      house: "Stark",
      gender: "f",
      age: 33,
      location: "Winterfell"
    },
    {
      id: 4,
      first_name: "Roose",
      last_name: "Bolton",
      alive: false,
      house: "Bolton",
      gender: "m",
      age: 40,
      location: "Dreadfort"
    },
    {
      id: 5,
      first_name: "Ramsay",
      last_name: "Snow",
      alive: false,
      house: "Bolton",
      gender: "m",
      age: 15,
      location: "Dreadfort"
    },
  ]
}
                </code>
            </pre>
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
    "message": "Login berhasil"
}
                </code>
            </pre>

            <p>
                <b>POST</b><br>
                <code class="higlighted">https://refactory-skilltest.herokuapp.com/api/v1/create_room</code>
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
    "message": "Login berhasil"
}
                </code>
            </pre>

            <p>
                <b>POST</b><br>
                <code class="higlighted">https://refactory-skilltest.herokuapp.com/api/v1/booking</code>
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
    "message": "Login berhasil"
}
                </code>
            </pre>

            <p>
                <b>POST</b><br>
                <code class="higlighted">https://refactory-skilltest.herokuapp.com/api/v1/check_booking</code>
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
    "message": "Login berhasil"
}
                </code>
            </pre>

            <p>
                <b>POST</b><br>
                <code class="higlighted">https://refactory-skilltest.herokuapp.com/api/v1/checkin</code>
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