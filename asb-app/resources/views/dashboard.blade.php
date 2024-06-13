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
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="John Doe" required>

                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>

                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
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

        <table border=1 class="table table-striped table-hover table-condensed">
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{{$user['id']}}</td>
                <td>{{$user['name']}}</td>
                <td>{{$user['email']}}</td>
                <td>{{$user['password']}}</td>
            </tr>
            @endforeach
        </table>

    </body>
</html>