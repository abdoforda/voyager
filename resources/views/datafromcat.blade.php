
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">الموظف</th>
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

      @php
        $email2          = 0;
        $correspondence2 = 0;
        $supplier2       = 0;
        $supporter2      = 0;
        $administrative2 = 0;
        $platform2       = 0;
        $done2           = 0;
        $ratification2   = 0;
        $other2          = 0;
        $holiday2        = 0;
        $permission2     = 0;
        $absence2        = 0;
        $delay2          = 0;
      @endphp

        @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            @php
            $email          = 0;
            $correspondence = 0;
            $supplier       = 0;
            $supporter      = 0;
            $administrative = 0;
            $platform       = 0;
            $done           = 0;
            $ratification   = 0;
            $other          = 0;
            $holiday        = 0;
            $permission     = 0;
            $absence        = 0;
            $delay          = 0;

                if($request->date_end == null){
                    $date0 = date('Y-m-d',strtotime($request->date_start)-86400);
                    $date1 = date('Y-m-d',strtotime($request->date_start)+86400);
                    $years = App\Year::whereBetween('year_month', [$date0,$date1])->get();
                }else{
                    $date0 = date('Y-m-d',strtotime($request->date_start)-86400);
                    $date1 = date('Y-m-d',strtotime($request->date_end)+86400);
                    $years = App\Year::whereBetween('year_month', [$date0,$date1])->get();
                }

                foreach($years as $year){
                    $items = App\Item::where('user_id',$user->id)->where('year_id', $year->id)->get();
                    foreach ($items as $item) {
                        $email          += $item->email;
                        $correspondence += $item->correspondence;
                        $supplier       += $item->supplier;
                        $supporter      += $item->supporter;
                        $administrative += $item->administrative;
                        $platform       += $item->platform;
                        $done           += $item->done;
                        $ratification   += $item->ratification;
                        $other          += $item->other;
                        $holiday        += $item->holiday;
                        $permission     += $item->permission;
                        $absence        += $item->absence;
                        $delay          += $item->delay;

                        $email2          += $item->email;
                        $correspondence2 += $item->correspondence;
                        $supplier2       += $item->supplier;
                        $supporter2      += $item->supporter;
                        $administrative2 += $item->administrative;
                        $platform2       += $item->platform;
                        $done2           += $item->done;
                        $ratification2   += $item->ratification;
                        $other2          += $item->other;
                        $holiday2        += $item->holiday;
                        $permission2     += $item->permission;
                        $absence2        += $item->absence;
                        $delay2          += $item->delay;
                    }
                    
                }

            @endphp
            <td>{{ $email }}</td>
            <td>{{ $correspondence }}</td>
            <td>{{ $supplier }}</td>
            <td>{{ $supporter }}</td>
            <td>{{ $administrative }}</td>
            <td>{{ $platform }}</td>
            <td>{{ $done }}</td>
            <td>{{ $ratification }}</td>
            <td>{{ $other }}</td>
            <td>{{ $holiday }}</td>
            <td>{{ $permission }}</td>
            <td>{{ $absence }}</td>
            <td>{{ $delay }}</td>
        </tr>
        @endforeach

        <tr>
            <td>المجموع</td>
            <td>{{ $email2 }}</td>
            <td>{{ $correspondence2 }}</td>
            <td>{{ $supplier2 }}</td>
            <td>{{ $supporter2 }}</td>
            <td>{{ $administrative2 }}</td>
            <td>{{ $platform2 }}</td>
            <td>{{ $done2 }}</td>
            <td>{{ $ratification2 }}</td>
            <td>{{ $other2 }}</td>
            <td>{{ $holiday2 }}</td>
            <td>{{ $permission2 }}</td>
            <td>{{ $absence2 }}</td>
            <td>{{ $delay2 }}</td>
        </tr>
    </tbody>
  </table>