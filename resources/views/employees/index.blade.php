@extends('../layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>{{ __('messages.FirstName')}}</th>
            <th>{{ __('messages.LastName')}}</th>
            <th>{{ __('messages.Email')}}</th>
            <th>{{ __('messages.Phone')}}</th>
            <th></th>
            <th></th>
            <th><a class="btn btn-warning btn-sm" href="/employee/create" role="button">{{ __('messages.CreateEmployee')}}</a></th>
          </tr><a class="btn btn-warning" href="{{ route('export') }}">{{ __('messages.ExportBulkData')}}</a>
        </thead>
        @foreach ($employees as $employee)
        <tr>
          <td> {{ $employee->name }} </td>
          <td> {{ $employee->last_name }} </td>
          <td> {{ $employee->email }} </td>
          <td> {{ $employee->phone }} </td>
          <td> <a class="btn btn-info btn-sm" href="/employee/show/{{$employee->id}}" role="button">{{ __('messages.View')}}</a> </td>
          <td> <a class="btn btn-info btn-sm" href="/employee/edit/{{$employee->id}}" role="button">{{ __('messages.Edit')}}</a> </td>
          <td> <form action="/employee/delete/{{$employee->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" type="submit">{{ __('messages.Delete')}}</button>
          </form> </td>


        </tr>
        @endforeach
      </table>
      {{ $employees->links() }}
    </div>
  </div>
@endsection