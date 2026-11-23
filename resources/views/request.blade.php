<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Client Requests</title>
  <link rel="icon" href="img/logo Lawyer.png" type="image/png">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  <style>
    body {
      background: #f0f2f5;
    }
    .custom-container {
      max-width: 1200px;
      background-color: #ffffff;
      border-radius: 16px;
      padding: 30px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }
    .custom-heading {
      font-size: 1.75rem;
      font-weight: 600;
      color: #1e3a8a;
      margin-bottom: 25px;
      border-bottom: 2px solid #0d6efd;
      padding-bottom: 12px;
    }
    .table th,
    .table td {
      vertical-align: middle;
    }
    .btn-success,
    .btn-danger {
      border-radius: 30px;
      padding: 6px 16px;
      font-size: 0.875rem;
      font-weight: 500;
    }
    .btn-success:hover {
      background-color: #198754cc;
    }
    .btn-danger:hover {
      background-color: #dc3545cc;
    }
    .navbar {
      background-color: #1E2942;
    }
    .logo {
      height: 60px !important;
    }
    .badge {
      font-size: 0.85rem;
      padding: 6px 12px;
      border-radius: 12px;
    }
  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light px-4">
    <a class="navbar-brand" href="/">
      <img class="logo" src="{{ asset('img/logo Lawyer.png') }}" alt="Logo" />
    </a>
    <div class="ms-auto">
      <a href="/lawyerdash" class="btn btn-outline-primary">
        <i class="fas fa-paper-plane"></i> Back to Dashboard
      </a>
    </div>
  </nav>

  <div class="container py-5">
    <div class="custom-container mx-auto">
      <h2 class="custom-heading">
        Client Requests for {{ Auth::user()->lawyer_category }} Cases
      </h2>

      @if($requests->count())
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped align-middle">
            <thead class="table-primary text-center">
              <tr>
                <th>Client ID</th>
                <th>Case Type</th>
                <th>Description</th>
                <th>Submitted</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="text-center">
              @foreach($requests as $req)
                <tr>
                  <td>{{ $req->user_id }}</td>
                  <td>{{ $req->requested_for }}</td>
                  <td class="text-start">{{ $req->casedesc }}</td>
                  <td>{{ $req->created_at->diffForHumans() }}</td>
                  <td>
                   
                    
  @if($req->status === 'pending')
    <form action="{{ route('request.accept', $req->id) }}" method="POST" class="d-inline">
      @csrf
      <button type="submit" class="btn btn-success">Accept</button>
    </form>
  @endif

              <form action="{{ route('request.delete', $req->id) }}" method="POST" class="d-inline ms-2">
               @csrf
               @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                 </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @else
        <div class="alert alert-info text-center my-4">
          No requests available for your category yet.
        </div>
      @endif
    </div>
  </div>

</body>
</html>
