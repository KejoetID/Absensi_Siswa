<body>
    <div class="ui bottom fixed one item white inverted menu">
        <div class="item">
            <b>Copyright &copy;</b>
            <?= date('Y') ?> -
            <?= APP_NAME ?> -
            &nbsp;<a href="https://github.com/alfinf2"><strong>Alfin Fahreza</strong></a>
        </div>
    </div>
    <script src="<?= BASE_URL ?>/js/semantic.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    
<script>
    $(document).ready(function() {
        $("#search-input").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#absensi-table tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $("#search-button").on("click", function() {
            var date = $("#search-date").val();
            var subject = $("#search-subject").val().toLowerCase();
            
            $("#absensi-table tbody tr").filter(function() {
                var rowDate = $(this).find(".date").text();
                var rowSubject = $(this).find(".subject").text().toLowerCase();
                var showRow = true;
                
                if (date && rowDate !== date.split('-').reverse().join('/')) {
                    showRow = false;
                }
                
                if (subject && rowSubject !== subject) {
                    showRow = false;
                }
                
                $(this).toggle(showRow);
            });
        });
    });

    // Fitur unggah foto profil dengan penyimpanan di localStorage
    document.getElementById("profile-picture").addEventListener("click", function() {
        document.getElementById("upload-photo").click();
    });

    document.getElementById("upload-photo").addEventListener("change", function(event) {
        var file = event.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("profile-picture").src = e.target.result;
                localStorage.setItem("profileImage", e.target.result);
            }
            reader.readAsDataURL(file);
        }
    });

    // Memuat gambar dari localStorage jika ada
    document.addEventListener("DOMContentLoaded", function() {
        var savedImage = localStorage.getItem("profileImage");
        if (savedImage) {
            document.getElementById("profile-picture").src = savedImage;
        }
    });

     // Simpan timestamp login
     function setLoginTimestamp() {
            const now = new Date();
            localStorage.setItem('loginTimestamp', now.getTime());
        }

        // Cek status login
        function checkLoginStatus() {
            const loginTimestamp = localStorage.getItem('loginTimestamp');
            if (loginTimestamp) {
                const now = new Date().getTime();
                const oneDay = 24 * 60 * 60 * 1000;
                if (now - loginTimestamp > oneDay) {
                    alert('Anda telah logout karena tidak aktif lebih dari 1 hari.');
                    window.location.href = '/login';
                }
            }
        }

        // Panggil fungsi saat halaman dimuat
        window.onload = function() {
            checkLoginStatus();
        };

        // Update timestamp saat ada aktivitas
        document.addEventListener('mousemove', setLoginTimestamp);
        document.addEventListener('keypress', setLoginTimestamp);


        $(document).ready(function() {
        $("#search-input").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#absensi-table tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $("#search-button").on("click", function() {
            var date = $("#search-date").val();
            var subject = $("#search-subject").val().toLowerCase();
            
            $("#absensi-table tbody tr").filter(function() {
                var rowDate = $(this).find(".date").text();
                var rowSubject = $(this).find(".subject").text().toLowerCase();
                var showRow = true;
                
                if (date && rowDate !== date.split('-').reverse().join('/')) {
                    showRow = false;
                }
                
                if (subject && rowSubject !== subject) {
                    showRow = false;
                }
                
                $(this).toggle(showRow);
            });
        });
    });

    // Fitur unggah foto profil dengan penyimpanan di localStorage
    document.getElementById("profile-picture").addEventListener("click", function() {
        document.getElementById("upload-photo").click();
    });

    document.getElementById("upload-photo").addEventListener("change", function(event) {
        var file = event.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("profile-picture").src = e.target.result;
                localStorage.setItem("profileImage", e.target.result);
            }
            reader.readAsDataURL(file);
        }
    });

    // Memuat gambar dari localStorage jika ada
    document.addEventListener("DOMContentLoaded", function() {
        var savedImage = localStorage.getItem("profileImage");
        if (savedImage) {
            document.getElementById("profile-picture").src = savedImage;
        }
    });
    
</script>

</body>

</html>