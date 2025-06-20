<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- 1)method: <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="card m-5">
        <div class="card-body">
            <h2 class="card-title" style="color: rgba(46, 108, 190, 0.438)">Edit Employee</h2>
            <form action="{{ route('employeeUpdate', $employeeData->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group mb-4 mt-3">
                    <h5><label for="name">firstName</label></h5>
                    <input type="text" class="form-control form-control-sm" id="firstName" name="editFirstName"
                        value="{{ old('editFirstName', $employeeData->firstName) }}">
                    @error('editFirstName')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-4 mt-3">
                    <h5><label for="name">lastName</label></h5>
                    <input type="text" class="form-control form-control-sm" id="lastName" name="editLastName"
                        value="{{ old('editLastName', $employeeData->lastName) }}">
                    @error('editLastName')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <h5><label for="exampleFormControlSelect1">companyName</label></h5>
                    <select class="form-control" id="exampleFormControlSelect1" name="editCompanyName">
                        <option value="">Select Company</option>
                        @foreach ($allCompany as $companies)
                            @if ($employeeData->companyName === $companies->id)
                                <option value="{{ $companies->id }}" selected>{{ $companies->name }}</option>
                            @else
                                <option value="{{ $companies->id }}">{{ $companies->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('editCompanyName')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <h5><label for="email">Email</label></h5>
                    <input type="email" class="form-control form-control-sm" id="email" name="editEmail"
                        value="{{ old('editEmail', $employeeData->email) }}">
                    @error('editEmail')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <h5><label for="password">Password</label></h5>
                    <input type="text" class="form-control form-control-sm" id="password" name="editPassword"
                        value="{{ old('editPassword', $employeeData->password) }}">
                    @error('editPassword')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <h5><label for="phone">Phone</label></h5>
                    <input type="text" class="form-control form-control-sm" id="phone" name="editPhone"
                        value="{{ old('editPhone', $employeeData->phone) }}">
                    @error('editPhone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
