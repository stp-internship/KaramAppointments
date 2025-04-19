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
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">جدول المواعيد</h1>
            <button class="btn btn-primary">
                إضافة موعد جديد
            </button>
        </div>

        <!-- فلاتر البحث -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">التاريخ</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">التصنيف</label>
                        <select class="form-select">
                            <option value="">الكل</option>
                            <option value="work">عمل</option>
                            <option value="personal">شخصي</option>
                            <option value="meeting">اجتماع</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">الحالة</label>
                        <select class="form-select">
                            <option value="">الكل</option>
                            <option value="upcoming">قادم</option>
                            <option value="completed">مكتمل</option>
                            <option value="cancelled">ملغي</option>
                        </select>
                    </div>
                </div>
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
                                    <button class="btn btn-sm btn-outline-primary ms-2">تعديل</button>
                                    <button class="btn btn-sm btn-outline-danger">حذف</button>
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