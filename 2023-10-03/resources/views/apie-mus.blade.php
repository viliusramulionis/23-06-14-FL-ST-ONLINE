<h1>Apie Mus</h1>
<a href="/">Titulinis</a>
<h2>Pavadinimas: {{ $pavadinimas }}</h2>
@if($adresas)
    <p>Adresas: {{ $adresas }}</p>
@else
    <p>Adreso nėra</p>
@endif

@isset($salis)
    <div>Šalis egzistuoja</div>
@endisset

@empty($salis)
    <div>Šalis yra tuščias stringas</div>
@endempty

@for($i = 0; $i < 10; $i++) 
    Indeksas yra: {{ $i }} <br />
@endfor

@foreach($kolektyvas as $vardas)
    <li>{{ $vardas }}</li>
@endforeach