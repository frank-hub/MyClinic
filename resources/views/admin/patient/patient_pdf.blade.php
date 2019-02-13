<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patient PDF</title>
    <style>
        #customers {
          font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        #customers td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;
        }
        
        #customers tr:nth-child(even){background-color: #f2f2f2;}
        
        #customers tr:hover {background-color: #ddd;}
        
        #customers th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #4CAF50;
          color: white;
        }
        </style>
        </head>
        <body>
        <table id="customers">
                <thead>
                    <tr>
                    <th>Patient N0.</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Number</th>
                    <th>Occupation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patients as $patient)
                        <tr>
                            <th scope="row">{{$patient->id}}</th>
                            <td>{{$patient->name}}</td>
                            <td>{{$patient->email}}</td>
                            <td>{{$patient->number}}</td>
                            <td>{{$patient->occupation}}</td>
                        @endforeach
                        </tr>
                </tbody>

        </table>
        
        </body>
        </html>