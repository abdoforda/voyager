<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">القسم</th>
        <th scope="col">السنة والشهر</th>
        <th scope="col">إيميل</th>
        <th scope="col">مراسلات</th>
        <th scope="col">موارد</th>
        <th scope="col">داعم</th>
        <th scope="col">الأنظمة الإدارية</th>
        <th scope="col">منصه</th>
        <th scope="col">تم</th>
        <th scope="col">التصاديق</th>
        <th scope="col">أخري</th>
        <th scope="col">الإجازات</th>
        <th scope="col">الإستئذان</th>
        <th scope="col">الغياب</th>
        <th scope="col">التأخير</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($em->Items as $index => $item)
            <tr>
                <td>{{ $index+1 }}</td>
                <td>{{ $em->Cat->name }}</td>
                <td>{{ date('Y-m', strtotime($item->Year->year_month)) }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->correspondence }}</td>
                <td>{{ $item->supplier }}</td>
                <td>{{ $item->supporter }}</td>
                <td>{{ $item->administrative }}</td>
                <td>{{ $item->platform }}</td>
                <td>{{ $item->done }}</td>
                <td>{{ $item->ratification }}</td>
                <td>{{ $item->other }}</td>
                <td>{{ $item->holiday }}</td>
                <td>{{ $item->permission }}</td>
                <td>{{ $item->absence }}</td>
                <td>{{ $item->delay }}</td>
            </tr>
        @endforeach
    </tbody>
  </table>