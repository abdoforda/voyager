<script>
    $(document).ready(function(e) {
        $(".login").ajaxForm({
            complete: function(data){
                if(data.status == 200){
                    success('تم تسجيل الدخول');
                    setTimeout(() => {
                        //window.location.href = window.location.href;
                        location.reload();
                    }, 2000);
                    return;
                }
                error(data);
            }
        });

        $(".width100").click(function(e) {
            $(this).closest(".div-qusation").find(".width100").removeClass("active");
            $(this).addClass("active");
        });

    });
</script>

<script>
$(document).ready(function(e) {
    $(".ajax").ajaxForm({
        
        complete: function(data){
            if(data.status == 200){
                //console.log(data.responseJSON);
                $(".ajax input[type=text], .ajax input[type=email], .ajax textarea").val('');
                if(data.responseJSON.message == "confirmed order"){
                    success("تمت عملية الدفع بنجاح");
                    window.location.href = "/thanks";
                }else{
                    success(data.responseJSON.message);
                }
                
                
                return;
            }
            
            error(data);

        }
    });
});
</script>
<script>
    function error(data){
        var errorString = '';
            $.each( data.responseJSON.errors, function( key, value) {
                errorString += value+"<br />";
            });

            Swal.fire({
                title: 'خطأ',
                html: errorString,
                icon: 'error',
                confirmButtonText: 'حسناََ'
            });
    }

    function success(m){

        Swal.fire({
                text: m,
                icon: 'success',
                confirmButtonText: 'حسناََ'
        });

       $(".close0").trigger('click');
    }

    function toast(m){
        const Toast = Swal.mixin({
        toast: true,
        position: 'center',
        showConfirmButton: false,
        timer: 6000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        Toast.fire({
        title: m
        })
    }

    function download(id,down){
        $.get('/download',{id,down},function(e){
            window.location.href = e;
        }).fail(function(err) {

            if(err.responseJSON.message == "Unauthenticated."){
                err.responseJSON.errors = ['يجب عليك تسجل عضوية لتحميل الملفات'];
            }
            
            console.log(err.responseJSON.message);
            error(err);
        });
    }

    function videoWatch(id){
        $.get('/videoWatch',{id},function(e){
            //window.location.href = e;
            $("#clickWatchVideo").trigger('click');
            $("#videoplayer").attr('src',e);
            console.log(e);
        }).fail(function(err) {

            if(err.responseJSON.message == "Unauthenticated."){
                err.responseJSON.errors = ['يجب عليك تسجل عضوية لتحميل الملفات'];
            }
            
            console.log(err.responseJSON.message);
            error(err);
        });
    }

    function delete_cart(id,ele){
        Swal.fire({
        title: 'هل تريد الحذف فعلا',
        showDenyButton: true,
        confirmButtonText: `حذف`,
        denyButtonText: `إلغاء`,
        }).then((result) => {


        if (result.isConfirmed) {
            
            $.get('/delete_cart',{id},function(e){
            $(ele).closest("tr").fadeOut();
        }).fail(function(err) {
            if(err.responseJSON.message == "Unauthenticated."){
                err.responseJSON.errors = ['يجب عليك تسجل عضوية لتحميل الملفات'];
            }
            
            console.log(err.responseJSON.message);
            error(err);
        });
        } else if (result.isDenied) {
            
        }
        })
    }

    function delete_all_cart(){
        Swal.fire({
        title: 'هل تريد الحذف فعلا',
        showDenyButton: true,
        confirmButtonText: `حذف`,
        denyButtonText: `إلغاء`,
        }).then((result) => {


        if (result.isConfirmed) {
            
            $.get('/delete_all_cart',function(e){
                location.reload();
            }).fail(function(err) {
                location.reload();
            });
        } else if (result.isDenied) {
            
        }
        })
    }

    function add_to_cart(id){
        $.get('/add_to_cart',{id},function(e){
            success('تم إضافة المنتج في السلة');
            setTimeout(() => {
                window.location.href = '/cart';
            }, 5000);
            }).fail(function(err) {
                error(err);
            });
    }

    function update_cart(id, ele){
        const count = $(ele).val();
        $.get('/update_cart',{id, count},function(e){
            success('تم تحديث سلة المشتريات');
            $(ele).closest('tr').find('.total_price').html(e);
            }).fail(function(err) {
                error(err);
        });
    }
</script>


    @if (session('status'))
    <script>
        toast("{{ session('status') }}");
    </script>
    @endif