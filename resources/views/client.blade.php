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
    <h1>Redis IO Pub/Sub Client Area</h1>

    <div>
        <label for="channel">Pilih Channel:</label>
        <select name="channel" id="channel">
            <option value="-">Pilih Channel</option>
            <option value="hotel-a-channel">Hotel A Channel</option>
            <option value="hotel-b-channel">Hotel B Channel</option>
            <option value="hotel-c-channel">Hotel C Channel</option>
        </select>
    </div>
    <div id="rooms">
        @for ($i = 1; $i <= 7; $i++)
            <div class="room">
                <h4>Room 0{{ $i }}</h4>
                <p class="message" id="message-room-0{{ $i }}"></p>
            </div>
        @endfor
    </div>
@endsection

@section('footer')
    <script src="https://cdn.socket.io/4.7.5/socket.io.min.js" integrity="sha384-2huaZvOR9iDzHqslqwpR87isEmrfxqyWOF7hr7BY6KG0+hVKLoEXMPUJw3ynWuhO" crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var socket = io('http://localhost:3000');
            // Inisialisasi selectedChannel
            var selectedChannel = "-";

            // Ubah selectedChannel ketika nilai dropdown berubah
            document.getElementById('channel').addEventListener('change', function() {
                selectedChannel = this.value;
                var messageElements = document.querySelectorAll('.message')
                messageElements.forEach(function(element) {
                    element.textContent = '';
                });
                socketChannel()
            });

            function socketChannel(){
                socket.on(selectedChannel, function(message){
                    console.log(message)
                    // Ambil data dari pesan
                    var channel = message.channel;
                    var command = message.command;
                    var room = message.room;

                    // Update pesan untuk room tertentu
                    var roomElement = document.getElementById(`message-${room}`);
                    if (roomElement) {
                        roomElement.textContent = "Command: " + command;
                    } else {
                        console.error("Room element not found for room: " + room);
                    }
                });
            }

            socketChannel()

        });
    </script>
@stop
