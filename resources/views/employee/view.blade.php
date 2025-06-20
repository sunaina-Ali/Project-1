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
            <div class="card-header text-center">
                <h4>View Data</h4>
            </div>
            <form action="{{ route('employeeView', $employee->id) }}">
                @csrf
                <div class="form-group mb-4 mt-3">
                    <label for="name">firstName:</label>
                    <input type="text" class="form-control form-control-sm" id="viewFirstName" name="viewFirstName"
                        value="{{ $employee->firstName }}" disabled>
                </div>

                <div class="form-group mb-4 mt-3">
                    <label for="name">lastName:</label>
                    <input type="text" class="form-control form-control-sm" id="viewLastName" name="viewLastName"
                        value="{{ $employee->lastName }}" disabled>
                </div>

                <div class="form-group">
                    <label for="companyName">Company Name:</label>
                    <input type="text" class="form-control form-control-sm" id="viewCompanyName"
                        name="viewCompanyName" value="{{ $employee->company->name }}" disabled>
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control form-control-sm" id="viewEmail" name="viewEmail"
                        value="{{ $employee->email }}" disabled>
                </div>

                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control form-control-sm" id="viewPhone" name="viewPhone"
                        value="{{ $employee->phone }}" disabled>
                </div>

                <div class="mt-4">
                    <a href="{{ route('employeeIndex') }}" class="btn btn-secondary">Close</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
