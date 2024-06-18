<!doctype html>
  <head>
    <title>ASB Test Dashbaord</title>
</head>
    <body>
        
        <nav style="text-align:right;">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Logout</button>
                    </form>
            </div>
        </nav>

        <p>Add Client</p>
        <form action="{{ route('create') }}" method="POST">
            @csrf
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="John" required>

                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Doe" required>

                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>

                <label for="gender" class="form-label">Gender</label>
                <select id="gender" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <button>Add Client</button>

        </form>

        <p>Delete Client</p>
        <form action="{{ route('delete') }}" method="POST">
            @csrf
            @method('DELETE')
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
                <button>Delete Client</button>
        </form>
        
        <br>
        
        <a href="{{ route('export') }}">Export CSV</a>
        
        <br>



        <table border=1>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Gender</th>
            </tr>
            @foreach($user as $client)
            <tr>
                <td>{{$client['id']}}</td>
                <td>{{$client['first_name']}}</td>
                <td>{{$client['last_name']}}</td>
                <td>{{$client['email']}}</td>
                <td>{{$client['gender']}}</td>
            </tr>
            @endforeach
        </table>

    </body>
</html>