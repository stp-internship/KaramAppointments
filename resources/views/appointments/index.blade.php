<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>جدول المواعيد</title>
    <!-- Bootstrap RTL CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
</head>
<body class="bg-light">
    <div class="container py-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">جدول المواعيد</h1>
            <a href="{{ route('appointments.create') }}" class="btn btn-primary">
                إضافة موعد جديد
            </a>
        </div>

        <!-- فلاتر البحث -->
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('appointments.index') }}" method="GET">
                    <div class="row align-items-end">
                        <div class="col-md-2 mb-3">
                            <label class="form-label">التاريخ</label>
                            <input type="date" name="date" class="form-control" value="{{ request('date') }}">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label">فترة المواعيد</label>
                            <select name="time_filter" class="form-select">
                                <option value="">الكل</option>
                                <option value="upcoming" {{ request('time_filter') == 'upcoming' ? 'selected' : '' }}>المواعيد القادمة</option>
                                <option value="past" {{ request('time_filter') == 'past' ? 'selected' : '' }}>المواعيد السابقة</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label">التصنيف</label>
                            <select name="category" class="form-select">
                                <option value="">الكل</option>
                                <option value="work" {{ request('category') == 'work' ? 'selected' : '' }}>عمل</option>
                                <option value="personal" {{ request('category') == 'personal' ? 'selected' : '' }}>شخصي</option>
                                <option value="meeting" {{ request('category') == 'meeting' ? 'selected' : '' }}>اجتماع</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label">الحالة</label>
                            <select name="status" class="form-select">
                                <option value="">الكل</option>
                                <option value="scheduled" {{ request('status') == 'scheduled' ? 'selected' : '' }}>قيد الانتظار</option>
                                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>مؤكد</option>
                                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>ملغي</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <button type="submit" class="btn btn-primary me-2">تطبيق الفلتر</button>
                            <a href="{{ route('appointments.index') }}" class="btn btn-secondary">إعادة تعيين</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- جدول المواعيد -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>العنوان</th>
                                <th>التاريخ</th>
                                <th>الوقت</th>
                                <th>التصنيف</th>
                                <th>الحالة</th>
                                <th>الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->title }}</td>
                                <td>{{ $appointment->date }}</td>
                                <td>{{ $appointment->time }}</td>
                                <td>
                                    <span class="badge bg-primary">{{ $appointment->category }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-success">{{ $appointment->status }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('appointments.show', $appointment->id) }}" class="btn btn-sm btn-outline-info ms-2">عرض</a>
                                    <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-sm btn-outline-primary ms-2">تعديل</a>
                                    <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">حذف</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>