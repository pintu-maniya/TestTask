@extends('layouts.usersLayout')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>User List</h2>
            </div>
            <div class="pull-right">
                    <form class="form-inline" action="getUser" method="get">
                      @csrf       

                      <div class="row">
                            <div class="col">
                            <input type="text" class="form-control col-md-2" name="noUser" placeholder="Enter number of user you want to see." value="1">
                            </div>
                            <div class="col">
                            <button type="submit" class="btn btn-primary btn-sm col-md-2">Submit</button>
                            </div>
                    </div>
                            
                            
                      </div>
                    </form>
                    <br>
            </div>        
        </div>
    </div>
   
 
   <div class="container">
    <table class="table table-bordered">
        @if(isset($getUsers['results']))
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>PostCode</th>

            </tr>        
            @foreach ($getUsers['results'] as $i => $user)
            <tr>                
                <td>{{ ++$i }}</td>
                <td>{{ $user['name']['title'] }} {{$user['name']['first']}} {{ $user['name']['last'] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>{{ $user['gender'] }}</td>
                <td>{{ $user['location']['city'] }}</td>
                <td>{{ $user['location']['state'] }}</td>           
                <td>{{ $user['location']['country'] }}</td>
                <td>{{ $user['location']['postcode'] }}</td>
            </tr>
            @endforeach
        @else
         <tr>
            <th colspan="8"> No Record found !!</th>   
        </tr>   
        @endif
    </table>
</div> 
      
@endsection