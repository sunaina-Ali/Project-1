<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="card-header text-center">
                            <h4>View Data</h4>
                        </div>

                        <form action="{{ route('companyView', $companyData->id) }}">
                            @csrf
                            <div class="form-group mb-4 mt-3">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control form-control-sm" id="name"
                                    name="viewname" value="{{ $companyData->name }}" disabled>
                            </div>

                            <div class="form-group mb-3">
                                <label for="email1">Email:</label>
                                <input type="email" class="form-control form-control-sm" id="email1"
                                    name="viewemail" value="{{ $companyData->email }}" disabled>
                            </div>

                            <div class="form-group">
                                <label for="address">Website:</label>
                                <input type="text" class="form-control form-control-sm" id="website"
                                    name="viewwebsite" value="{{ $companyData->website }}" disabled>
                            </div>

                            <div class="mt-4">
                                <a href="{{ route('companyIndex') }}" class="btn btn-secondary">Close</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
