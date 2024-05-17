@extends('layouts.master')

@section('style')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        select {
            width: 200px;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

    </style>
@endsection

@section('content')
    <h1>Redis IO Pub/Sub Control Panel</h1>
    <form id="command-form">
        @csrf
        <label for="channel">Channel:</label>
        <select name="channel" id="channel">
            <option value="hotel-a-channel">Hotel A</option>
            <option value="hotel-b-channel">Hotel B</option>
            <option value="hotel-c-channel">Hotel C</option>
        </select>
        <br><br>
        <label for="room">Room:</label>
        <select name="room" id="room">
            <option value="room-01">N0 1</option>
            <option value="room-02">N0 2</option>
            <option value="room-03">N0 3</option>
            <option value="room-04">N0 4</option>
            <option value="room-05">N0 5</option>
            <option value="room-06">N0 6</option>
            <option value="room-07">N0 7</option>
        </select>
        <br><br>
        <label for="action">Command:</label>
        <select name="command" id="command">
            <option value="tv-on">TV ON</option>
            <option value="tv-off">TV OFF</option>
            <option value="tv-restart">TV RESTART</option>
            <option value="tv-notification">TV Notification</option>
        </select>
        <br><br>
        <button type="submit">Kirim</button>
    </form>
@endsection
@section('footer')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('command-form');

            form.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent default form submission behavior

                // Ambil data dari form
                const formData = new FormData(form);

                // Kirim permintaan POST ke server
                fetch('/', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Terjadi kesalahan saat mengirim data.');
                        }
                        return response.json();
                    })
                    .then(data => {
                        alert(`Status Command : ${data.status}`)
                        console.log('Response dari server:', data);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });
    </script>
@endsection
