<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Lawyer Requests - Admin Panel</title>
  <link rel="icon" href="img/logo Lawyer.png" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>
  <style>
    body {
      background-color: #121212;
      color: #e0e0e0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      padding-top: 56px;
    }

    .table thead {
      color: #00d1ff;
    }

    .badge-status {
      font-size: 0.9rem;
      padding: 0.4em 0.7em;
      border-radius: 8px;
      text-transform: capitalize;
    }

    .status-pending {
      background-color: #6c757d;
      color: white;
    }

    .status-accepted {
      background-color: #198754;
      color: white;
    }

    .status-deleted {
      background-color: #dc3545;
      color: white;
    }

    .card-header {
      background-color: #2a2a2a;
    }

    footer {
      text-align: center;
      padding: 15px;
      background-color: #1c1c1c;
      color: #aaa;
      border-top: 1px solid #333;
      margin-top: 30px;
      font-size: 0.9rem;
    }

    @media screen and (max-width: 768px) {
      .table-responsive {
        font-size: 14px;
      }
      .btn-sm {
        margin-top: 5px;
      }
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item"><a class="nav-link" href="/dashmin"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
        <li class="nav-item"><a class="nav-link active" href="/lawyerrequest"><i class="bi bi-person-badge"></i> Lawyers Requests</a></li>
        <li class="nav-item"><a class="nav-link" href="/approvedlawyers"><i class="bi bi-person-check"></i> Approved Lawyers</a></li>
        <li class="nav-item"><a class="nav-link" href="/clients"><i class="bi bi-people"></i> Clients</a></li>
        <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-folder"></i> Cases</a></li>
        <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-calendar-event"></i> Appointments</a></li>
      </ul>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger btn-sm">
          <i class="bi bi-box-arrow-right"></i> Logout
        </button>
      </form>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <h2 class="mb-3">Client Consultations</h2>

  <!-- Export Buttons -->
  <div class="mb-3 d-flex flex-wrap gap-2">
    <a href="{{ route('export.excel') }}" class="btn btn-success btn-sm">
      <i class="bi bi-file-earmark-excel"></i> Export to Excel
    </a>
    <a href="{{ route('export.pdf') }}" class="btn btn-danger btn-sm">
      <i class="bi bi-file-earmark-pdf"></i> Export to PDF
    </a>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-dark table-hover mt-3">
      <thead>
        <tr>
          <th>Name</th>
          <th>Phone</th>
          <th>Case Type</th>
          <th>Description</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($appointments as $app)
        <tr>
          <td>{{ $app->name }}</td>
          <td>{{ $app->phone }}</td>
          <td>{{ $app->casetype }}</td>
          <td>{{ $app->casedesc }}</td>
          <td>
            <span class="badge-status
              @if($app->status == 'pending') status-pending
              @elseif($app->status == 'accepted') status-accepted
              @elseif($app->status == 'deleted') status-deleted
              @endif">
              {{ $app->status }}
            </span>
          </td>
          <td>
            @if($app->status === 'pending')
              <form action="/admin/clients/{{ $app->id }}/accept" method="POST" style="display:inline-block">
                @csrf
                <button class="btn btn-success btn-sm">Accept</button>
              </form>
              <form action="/admin/clients/{{ $app->id }}/delete" method="POST" style="display:inline-block">
                @csrf
                <button class="btn btn-danger btn-sm">Delete</button>
              </form>
            @else
              <em>No actions</em>
            @endif
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="6" class="text-center">No consultation requests found.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<!-- Footer -->
<footer class="mt-5">
  &copy; 2025 <strong>Legal Connect</strong>. All rights reserved.
</footer>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
