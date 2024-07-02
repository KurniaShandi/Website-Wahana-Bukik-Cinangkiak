{{-- API --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // $(document).ready(function() {
    //     // Event listener untuk perubahan pada dropdown provinsi
    //     $('#provinsi').on('change', function() {
    //         var selectedProvinceId = $(this).val(); // Mengambil ID provinsi yang dipilih
    //         var kabupatenSettings = {
    //             "url": "https://api.binderbyte.com/wilayah/kabupaten?api_key=695cf8f6f477d63a3ed2dce5123745c2cb3a4520c4e729df53636299cd1d686b&id_provinsi=" + selectedProvinceId,
    //             "method": "GET",
    //             "timeout": 0,
    //         };

    //         $.ajax(kabupatenSettings).done(function(response) {
    //             console.log(response);
    //             if (response.code === "200") {
    //                 var kabupatenList = '<option value="">Pilih Kabupaten/Kota</option>';
    //                 response.value.forEach(function(kabupaten) {
    //                     kabupatenList += '<option value="' + kabupaten.name + '">' +
    //                         kabupaten.name +
    //                         '</option>';
    //                 });
    //                 $('#kab_kota').html(kabupatenList);
    //             } else {
    //                 console.error('Gagal mengambil data kabupaten/kota:', response.messages);
    //             }
    //         });
    //     });

    //     // Mengambil data provinsi saat halaman dimuat pertama kali
    //     var provinsiSettings = {
    //         "url": "https://api.binderbyte.com/wilayah/provinsi?api_key=695cf8f6f477d63a3ed2dce5123745c2cb3a4520c4e729df53636299cd1d686b",
    //         "method": "GET",
    //         "timeout": 0,
    //     };

    //     $.ajax(provinsiSettings).done(function(response) {
    //         console.log(response);
    //         if (response.code === "200") {
    //             var provinceList = '<option value="">Pilih Provinsi</option>';
    //             response.value.forEach(function(province) {
    //                 provinceList += '<option value="' + province.id + '">' + province.name +
    //                     '</option>';
    //             });
    //             $('#provinsi').html(provinceList);
    //         } else {
    //             console.error('Gagal mengambil data provinsi:', response.messages);
    //         }
    //     });
    // });

    $(document).ready(function() {
        // Event listener untuk perubahan pada dropdown provinsi
        $('#provinsi').on('change', function() {
            var selectedProvinceId = $(this).val(); // Mengambil ID provinsi yang dipilih
            var selectedProvinceName = $('#provinsi option:selected')
        .text(); // Mengambil nama provinsi yang dipilih
            $('#nama_provinsi').val(selectedProvinceName); // Menyimpan nama provinsi di input hidden

            var kabupatenSettings = {
                "url": "https://api.binderbyte.com/wilayah/kabupaten?api_key=695cf8f6f477d63a3ed2dce5123745c2cb3a4520c4e729df53636299cd1d686b&id_provinsi=" +
                    selectedProvinceId,
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(kabupatenSettings).done(function(response) {
                console.log(response);
                if (response.code === "200") {
                    var kabupatenList = '<option value="">Pilih Kabupaten/Kota</option>';
                    response.value.forEach(function(kabupaten) {
                        kabupatenList += '<option value="' + kabupaten.name + '">' +
                            kabupaten.name +
                            '</option>';
                    });
                    $('#kab_kota').html(kabupatenList);
                } else {
                    console.error('Gagal mengambil data kabupaten/kota:', response.messages);
                }
            });
        });

        // Event listener untuk perubahan pada dropdown kabupaten
        $('#kab_kota').on('change', function() {
            var selectedKabupatenName = $('#kab_kota option:selected')
        .text(); // Mengambil nama kabupaten yang dipilih
            $('#nama_kabupaten').val(selectedKabupatenName); // Menyimpan nama kabupaten di input hidden
        });

        // Mengambil data provinsi saat halaman dimuat pertama kali
        var provinsiSettings = {
            "url": "https://api.binderbyte.com/wilayah/provinsi?api_key=695cf8f6f477d63a3ed2dce5123745c2cb3a4520c4e729df53636299cd1d686b",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(provinsiSettings).done(function(response) {
            console.log(response);
            if (response.code === "200") {
                var provinceList = '<option value="">Pilih Provinsi</option>';
                response.value.forEach(function(province) {
                    provinceList += '<option value="' + province.id + '">' + province.name +
                        '</option>';
                });
                $('#provinsi').html(provinceList);
            } else {
                console.error('Gagal mengambil data provinsi:', response.messages);
            }
        });
    });
</script>
