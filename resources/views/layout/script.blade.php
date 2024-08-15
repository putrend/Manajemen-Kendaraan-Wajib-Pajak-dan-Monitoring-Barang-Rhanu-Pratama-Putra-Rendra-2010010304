<script src="{{ url('dist/js/adminlte.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- semua konfirmasi ada disini --}}
<script>
    $("#logout").on("click", function(e) {
        e.preventDefault();
        Swal.fire({
            title: "Apakah anda ingin logout?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Tidak",
            confirmButtonText: "Ya"
        }).then((result) => {
            if (result.isConfirmed) {
                $('#logoutform').submit() // this submits the form 
            }
        });
    })


    // CRUD Alert Start Here !
    // console.log($('#login_sukses').length)
    if ($('#login_sukses').length) {
        var text = "{{ session('login_sukses') }}"
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: text 
        });
    }

    // Create
    if ($('#success_create').length) {
        var text = "{{ session('success_create') }}"
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: text 
        });
    }

    if ($('#fail_create').length) {
        var text = "{{ session('fail_create') }}"
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "warning",
            title: text 
        });
    }

    // Edit
    if ($('#success_edit').length) {
        var text = "{{ session('success_edit') }}"
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: text 
        });
    }

    if ($('#fail_edit').length) {
        var text = "{{ session('fail_edit') }}"
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "warning",
            title: text 
        });
    }

    // Delete Script
    if ($('#success_delete').length) {
        var text = "{{ session('success_delete') }}"
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: text 
        });
    }

    $(document).ready(function() {
        $(".user-delete").on("click", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            
            Swal.fire({
                title: "Apakah Anda yakin ingin menghapus field ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Tidak",
                confirmButtonText: "Ya"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#user-delete-form').attr('action', '/user/' + id).submit(); // set action dan submit form
                }
            });
        });
    });

    $(document).ready(function() {
        $(".barang-delete").on("click", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            
            Swal.fire({
                title: "Apakah Anda yakin ingin menghapus field ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Tidak",
                confirmButtonText: "Ya"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#barang-delete-form').attr('action', '/barang/' + id).submit(); // set action dan submit form
                }
            });
        });
    });

    $(document).ready(function() {
        $(".barangkeluar-delete").on("click", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            
            Swal.fire({
                title: "Apakah Anda yakin ingin menghapus field ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Tidak",
                confirmButtonText: "Ya"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#barangkeluar-delete-form').attr('action', '/barangkeluar/' + id).submit(); // set action dan submit form
                }
            });
        });
    });

    $(document).ready(function() {
        $(".kategori-delete").on("click", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            
            Swal.fire({
                title: "Apakah Anda yakin ingin menghapus field ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Tidak",
                confirmButtonText: "Ya"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#kategori-delete-form').attr('action', '/kategori/' + id).submit(); // set action dan submit form
                }
            });
        });
    });

    $(document).ready(function() {
        $(".kategori-delete").on("click", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            
            Swal.fire({
                title: "Apakah Anda yakin ingin menghapus field ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Tidak",
                confirmButtonText: "Ya"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#kategori-delete-form').attr('action', '/kategori/' + id).submit(); // set action dan submit form
                }
            });
        });
    });

    $(document).ready(function() {
        $(".samsat-delete").on("click", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            
            Swal.fire({
                title: "Apakah Anda yakin ingin menghapus field ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Tidak",
                confirmButtonText: "Ya"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#samsat-delete-form').attr('action', '/samsat/' + id).submit(); // set action dan submit form
                }
            });
        });
    });

    $(document).ready(function() {
        $(".dealer-delete").on("click", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            
            Swal.fire({
                title: "Apakah Anda yakin ingin menghapus field ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Tidak",
                confirmButtonText: "Ya"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#dealer-delete-form').attr('action', '/dealer/' + id).submit(); // set action dan submit form
                }
            });
        });
    });

    $(document).ready(function() {
        $(".kendaraan-delete").on("click", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            
            Swal.fire({
                title: "Apakah Anda yakin ingin menghapus field ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Tidak",
                confirmButtonText: "Ya"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#kendaraan-delete-form').attr('action', '/kendaraan/' + id).submit(); // set action dan submit form
                }
            });
        });
    });

    $(document).ready(function() {
        $(".wajib-pajak-delete").on("click", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            
            Swal.fire({
                title: "Apakah Anda yakin ingin menghapus field ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Tidak",
                confirmButtonText: "Ya"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#wajib-pajak-delete-form').attr('action', '/wajib-pajak/' + id).submit(); // set action dan submit form
                }
            });
        });
    });

    $(document).ready(function() {
        $(".bpkb-delete").on("click", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            
            Swal.fire({
                title: "Apakah Anda yakin ingin menghapus field ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Tidak",
                confirmButtonText: "Ya"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#bpkb-delete-form').attr('action', '/bpkb/' + id).submit(); // set action dan submit form
                }
            });
        });
    });

    $(document).ready(function() {
        $(".stnk-delete").on("click", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            
            Swal.fire({
                title: "Apakah Anda yakin ingin menghapus field ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Tidak",
                confirmButtonText: "Ya"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#stnk-delete-form').attr('action', '/stnk/' + id).submit(); // set action dan submit form
                }
            });
        });
    });

    $(document).ready(function() {
        $(".mutasi-delete").on("click", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            
            Swal.fire({
                title: "Apakah Anda yakin ingin menghapus field ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Tidak",
                confirmButtonText: "Ya"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#mutasi-delete-form').attr('action', '/mutasi/' + id).submit(); // set action dan submit form
                }
            });
        });
    });

    // Confirm
    $(document).ready(function() {
        $(".mutasi-confirm").on("click", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            
            Swal.fire({
                title: "Apakah Anda yakin ingin berlakukan mutasi ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Tidak",
                confirmButtonText: "Ya"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#mutasi-confirm-form').attr('action', '/mutasi/' + id + '/berlakukan').submit(); // set action dan submit form
                }
            });
        });
    });

    $(document).ready(function() {
        $(".mutasi-cancel").on("click", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            
            Swal.fire({
                title: "Apakah Anda yakin ingin batalkan mutasi ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Tidak",
                confirmButtonText: "Ya"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#mutasi-cancel-form').attr('action', '/mutasi/' + id + '/batalkan').submit(); // set action dan submit form
                }
            });
        });
    });

    if ($('#success_berlaku').length) {
        var text = "{{ session('success_berlaku') }}"
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: text 
        });
    }

    if ($('#success_dibatalkan').length) {
        var text = "{{ session('success_dibatalkan') }}"
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: text 
        });
    }

    // Access Failed
    if ($('#fail_access').length) {
        var text = "{{ session('fail_access') }}"
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "warning",
            title: text 
        });
    }
</script>