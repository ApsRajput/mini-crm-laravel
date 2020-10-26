@extends('../layouts.app')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
<br /> 
@endif

<div class="container">
    <div class="card">
      <table class="table">
        <thead class="thead-dark">
            <tr>
            <th><b>{{ $searchResults->count() }} results found for "{{ request('query') }}"</b></th>
            </tr>
        </thead>
        <tr>

        @foreach($searchResults->groupByType() as $type => $modelSearchResults)
            <h2>{{ ucfirst($type) }}</h2>

            @foreach($modelSearchResults as $searchResult)
                <ul>
                    <li><a href="{{ $searchResult->url }}">{{ $searchResult->title }}</a></li>
                </ul>
            @endforeach
        @endforeach
        </tr>
        </table>

    </div>
</div>


@endsection

