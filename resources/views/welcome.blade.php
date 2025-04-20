<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>مواعيد اليوم</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">مواعيد اليوم: {{ date('Y-m-d') }}</h5>
                        <a href="{{ route('appointments.index') }}" class="btn btn-primary">عرض كل المواعيد</a>
                    </div>
                    <div class="card-body">
                        @if($appointments->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>العنوان</th>
                                            <th>الوقت</th>
                                            <th>التصنيف</th>
                                            <th>الحالة</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($appointments as $appointment)
                                            <tr>
                                                <td>{{ $appointment->title }}</td>
                                                <td>{{ $appointment->time }}</td>
                                                <td>
                                                    <span class="badge bg-primary">{{ $appointment->category }}</span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-{{ $appointment->status == 'completed' ? 'success' : ($appointment->status == 'cancelled' ? 'danger' : 'warning') }}">
                                                        {{ $appointment->status }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('appointments.show', $appointment->id) }}" class="btn btn-sm btn-outline-info ms-2">عرض</a>
                                                    <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-sm btn-outline-primary ms-2">تعديل</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-4">
                                <h4>لا توجد مواعيد لهذا اليوم</h4>
                                <a href="{{ route('appointments.create') }}" class="btn btn-primary mt-3">إضافة موعد جديد</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>