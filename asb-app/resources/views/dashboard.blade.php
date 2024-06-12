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
        
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif

        <p>Add Client</p>
        <form action="{{ route('register') }}" method="POST">
            @csrf
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="John Doe" required>

                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>

                <label for="gender" class="form-label">Gender</label>
                <input type="text" name="gender" class="form-control" id="gender" required>
                <button class="btn btn-primary">Add Client</button>
        </form>

        <p>Delete Client</p>
        <form action="{{ route('create') }}" method="POST">
            @csrf
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>

                <button class="btn btn-primary">Delete Client</button>
        </form>

        <p>Update Client</p>
        <form action="{{ route('register') }}" method="POST">
            @csrf
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="John Doe" required>

                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>

                <label for="gender" class="form-label">Gender</label>
                <input type="text" name="gender" class="form-control" id="gender" required>
                <button class="btn btn-primary">Add Client</button>
        </form>

        <p>Assign User</p>
        <form action="{{ route('register') }}" method="POST">
            @csrf
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>

                <button class="btn btn-primary">Register Client</button>
        </form>
        
        <table border=1 class="table table-striped table-hover table-condensed">
            <tr>
                <th>id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Gender</th>
            </tr>
        </table>

    </body>
</html>