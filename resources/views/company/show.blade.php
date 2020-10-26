@extends('../layouts.app')

@section('content')
  <div class="container">
      <div class="card">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th>{{ __('messages.Name')}}</th>
              <th>{{ __('messages.Email')}}</th>
              <th>{{ __('messages.Website')}}</th>
              <th></th>
              <th></th>
            </tr>
            <tr>
              <td> {{ $company->name }} </td>
              <td> {{ $company->email }} </td>
              <td> {{ $company->website }} </td>
              <td> <a class="btn btn-info btn-sm" href="/company/edit/{{$company->id}}" role="button">Edit')}}</a> </td>
              <td> <form action="/company/delete/{{$company->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit">Delete')}}</button>
              </form> </td>
            </tr>
        </thead>
        </table>
      </div>
  </div>
@endsection