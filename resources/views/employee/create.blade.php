<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Employee Create</title>
</head>

<body>
    <div class="card m-5">
        <div class="card-body">
            <h2 class="card-title" style="color: rgba(46, 108, 190, 0.438)">Create Employee</h2>
            <form action="{{ route('employeeStore') }}" method="post">
                @csrf
                <div class="form-group">
                    <h5><label for="firstName">firstName</label></h5>
                    <input type="text" class="form-control" id="firstName" name="firstName">
                    @error('firstName')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <h5><label for="lastName">lastName</label></h5>
                    <input type="text" class="form-control" id="lastName" name="lastName">
                    @error('lastName')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="companyName">companyName</label>
                    <select class="form-control" id="companyName" name="companyName">
                        <option value="">Select Company</option>
                        @foreach ($company as $companies)
                            <option value="{{ $companies->id }}">{{ $companies->name }}</option>
                        @endforeach
                    </select>
                    @error('companyName')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <h5><label for="email">Email address</label></h5>
                    <input type="email" class="form-control" id="email" name="email">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <h5><label for="password">Password</label></h5>
                    <input type="password" class="form-control" id="password" name="password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <h5><label for="phone">Phone</label></h5>
                    <input type="text" class="form-control" id="phone" name="phone">
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>

</body>

</html>
