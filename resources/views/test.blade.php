<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Eloquent</title>

    </head>
    <body>
        
     @foreach($boxes as $box)

         <h3>{{ $box->name }}</h3>
                        
             <ul>
                 @foreach($box->retentions as $retention)
                    <li> {{ $retention->product->name }} | {{ $retention->lot }}</li>
                  @endforeach
             </ul> 
     @endforeach

    </body>
</html> 

