<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تفاصيل الموعد</title>
    <!-- Bootstrap RTL CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">تفاصيل الموعد</h5>
                        <a href="{{ route('appointments.index') }}" class="btn btn-outline-secondary btn-sm">
                            العودة للقائمة
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <h4 class="border-bottom pb-2">{{ $appointment->title }}</h4>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-bold">التاريخ:</label>
                                    <p>{{ $appointment->date }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-bold">الوقت:</label>
                                    <p>{{ $appointment->time }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-bold">التصنيف:</label>
                                    <p>
                                        <span class="badge bg-primary">
                                            @switch($appointment->category)
                                                @case('work')
                                                    عمل
                                                    @break
                                                @case('personal')
                                                    شخصي
                                                    @break
                                                @case('meeting')
                                                    اجتماع
                                                    @break
                                            @endswitch
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-bold">الحالة:</label>
                                    <p>
                                        <span class="badge {{ $appointment->status == 'completed' ? 'bg-success' : ($appointment->status == 'cancelled' ? 'bg-danger' : 'bg-warning') }}">
                                            @switch($appointment->status)
                                                @case('scheduled')
                                                    قيد الانتظار
                                                    @break
                                                @case('completed')
                                                    مؤكد
                                                    @break
                                                @case('cancelled')
                                                    ملغي
                                                    @break
                                            @endswitch
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="fw-bold">ملاحظات:</label>
                                    <p class="border rounded p-3 bg-light">{{ $appointment->notes ?? 'لا توجد ملاحظات' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-primary">
                                تعديل الموعد
                            </a>
                            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذا الموعد؟')">
                                    حذف الموعد
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>