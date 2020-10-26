@extends('../layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>{{ __('messages.FirstName')}}</th>
            <th>{{ __('messages.Email')}}</th>
            <th>{{ __('messages.Website')}}</th>
            <th></th>
            <th></th>
            <th><a class="btn btn-warning btn-sm" href="/company/create" role="button">{{ __('messages.CreateCompany')}}</a></th>
          </tr>
        </thead>
        @foreach ($companies as $company)
        <tr>
          <td> {{ $company->name }} </td>
          <td> {{ $company->email }} </td>
          <td> {{ $company->website }} </td>
          <td> <a class="btn btn-info btn-sm" href="/company/show/{{$company->id}}" role="button">{{ __('messages.View')}}</a> </td>
          <td> <a class="btn btn-info btn-sm" href="/company/edit/{{$company->id}}" role="button">{{ __('messages.Edit')}}</a> </td>
          <td> <form action="/company/delete/{{$company->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" type="submit">{{ __('messages.Delete')}}</button>
          </form> </td>


        </tr>
        @endforeach
      </table>
      {{ $companies->links() }}
    </div>
  </div>
@endsection